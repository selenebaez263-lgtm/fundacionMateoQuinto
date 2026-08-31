<?php
// api/index.php
// Router único de la API en PHP puro. Reemplaza a backend/server.js +
// backend/routes/proyectos.js + backend/routes/imagenes.js, con exactamente
// las mismas rutas, métodos y respuestas para que el frontend (login.php,
// dashboard.php, editor.php, panel-proyectos.php, panel-imagenes.php,
// estadisticas.php, donar.php, auto-textos.js) no necesite ningún cambio de
// lógica, solo apuntar a esta carpeta en vez de a http://localhost:3000.

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

require __DIR__ . '/jwt.php';
$config = require __DIR__ . '/config.php';
$pdo = require __DIR__ . '/db.php';

const JWT_SECRET_KEY = 'JWT_SECRET';

function json_out($data, int $status = 200): void
{
    http_response_code($status);
    echo json_encode($data);
    exit;
}

function body_json(): array
{
    $raw = file_get_contents('php://input');
    if (!$raw) return [];
    $data = json_decode($raw, true);
    return is_array($data) ? $data : [];
}

function bearer_token(): ?string
{
    $header = $_SERVER['HTTP_AUTHORIZATION'] ?? ($_SERVER['REDIRECT_HTTP_AUTHORIZATION'] ?? null);
    if (!$header) {
        // Algunos servidores (Apache+PHP-FPM) no exponen Authorization directo.
        if (function_exists('apache_request_headers')) {
            $headers = apache_request_headers();
            foreach ($headers as $k => $v) {
                if (strtolower($k) === 'authorization') { $header = $v; break; }
            }
        }
    }
    if (!$header) return null;
    if (preg_match('/Bearer\s+(.*)$/i', $header, $m)) {
        return $m[1];
    }
    return null;
}

/** Corta la ejecución con 401/403 si no hay token válido; si es válido, lo regresa. */
function requireAuth(string $secret): array
{
    $token = bearer_token();
    if (!$token) {
        json_out(['error' => 'Acceso no autorizado. Token faltante.'], 401);
    }
    $payload = jwt_decode($token, $secret);
    if (!$payload) {
        json_out(['error' => 'Token inválido o expirado.'], 403);
    }
    return $payload;
}

/** Corta la ejecución con 403 si el usuario autenticado no es el administrador principal. */
function requireSuperAdmin(array $payload, array $config): void
{
    $usuarioActual = $payload['usuario'] ?? null;
    if ($usuarioActual !== $config['ADMIN_USER']) {
        json_out(['error' => 'Solo el usuario administrador principal puede gestionar otros usuarios.'], 403);
    }
}

/** Corta la ejecución con 403 si el token no corresponde al rol esperado ('admin' o 'practicante'). */
function requireRole(array $payload, string $rolEsperado): void
{
    // Los tokens de admin generados antes de este cambio no traen 'rol'; se
    // tratan como 'admin' para no romper sesiones ya iniciadas.
    $rol = $payload['rol'] ?? 'admin';
    if ($rol !== $rolEsperado) {
        json_out(['error' => 'No tienes permiso para acceder a este recurso.'], 403);
    }
}

// ---------------------------------------------------------------
// Resolver la ruta relativa a esta carpeta /api, sin importar en
// qué subdirectorio esté instalado el sitio.
// ---------------------------------------------------------------
$scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$route = $requestPath;
if ($scriptDir !== '' && str_starts_with($route, $scriptDir)) {
    $route = substr($route, strlen($scriptDir));
}
// Si se accedió directamente a index.php, quítalo también.
$route = preg_replace('#^/?index\.php#', '', $route);
$route = trim($route, '/');
$parts = $route === '' ? [] : explode('/', $route);
$method = $_SERVER['REQUEST_METHOD'];

$JWT_SECRET = $config['JWT_SECRET'];
$JWT_EXPIRES = $config['JWT_EXPIRES_IN'];

// ==========================================
// Ruta de estado
// ==========================================
if ($parts === ['status'] && $method === 'GET') {
    json_out(['ok' => true, 'mensaje' => '✅ API de Mateo Quinto A.C. corriendo y conectada a SQLite (PHP)']);
}

// ==========================================
// 1. AUTENTICACIÓN Y USUARIOS
// ==========================================

// POST /api/auth/login
if ($parts === ['auth', 'login'] && $method === 'POST') {
    $body = body_json();
    $usuario = $body['usuario'] ?? null;
    $password = $body['password'] ?? null;

    if (!$usuario || !$password) {
        json_out(['error' => 'Por favor, ingresa usuario y contraseña.'], 400);
    }

    $stmt = $pdo->prepare('SELECT * FROM admin_users WHERE usuario = ?');
    $stmt->execute([$usuario]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password_hash'])) {
        json_out(['error' => 'Credenciales incorrectas.'], 401);
    }

    $token = jwt_encode(['id' => $user['id'], 'usuario' => $user['usuario'], 'rol' => 'admin'], $JWT_SECRET, $JWT_EXPIRES);
    json_out(['token' => $token, 'usuario' => $user['usuario']]);
}

// GET /api/admin/users
if ($parts === ['admin', 'users'] && $method === 'GET') {
    requireAuth($JWT_SECRET);
    $rows = $pdo->query('SELECT id, usuario, creado_en FROM admin_users')->fetchAll();
    json_out($rows);
}

// POST /api/admin/users  (crear/registrar un nuevo administrador — solo el admin principal)
if ($parts === ['admin', 'users'] && $method === 'POST') {
    $auth = requireAuth($JWT_SECRET);
    requireSuperAdmin($auth, $config);
    $body = body_json();
    $usuario = isset($body['usuario']) ? trim($body['usuario']) : null;
    $password = $body['password'] ?? null;

    if (!$usuario || !$password) {
        json_out(['error' => 'Especifica un nombre de usuario y una contraseña.'], 400);
    }
    if (strlen($password) < 6) {
        json_out(['error' => 'La contraseña debe tener al menos 6 caracteres.'], 400);
    }

    $existe = $pdo->prepare('SELECT id FROM admin_users WHERE usuario = ?');
    $existe->execute([$usuario]);
    if ($existe->fetch()) {
        json_out(['error' => "El usuario \"$usuario\" ya existe."], 409);
    }

    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
    $stmt = $pdo->prepare('INSERT INTO admin_users (usuario, password_hash) VALUES (?, ?)');
    $stmt->execute([$usuario, $hash]);

    json_out(['id' => $pdo->lastInsertId(), 'usuario' => $usuario, 'message' => "Usuario \"$usuario\" creado correctamente."], 201);
}

// DELETE /api/admin/users/:usuario  (eliminar un administrador — solo el admin principal)
if (count($parts) === 3 && $parts[0] === 'admin' && $parts[1] === 'users' && $method === 'DELETE') {
    $auth = requireAuth($JWT_SECRET);
    requireSuperAdmin($auth, $config);
    $usuarioTarget = $parts[2];

    if ($usuarioTarget === $config['ADMIN_USER']) {
        json_out(['error' => 'No puedes eliminar al usuario administrador principal.'], 400);
    }
    if (isset($auth['usuario']) && $auth['usuario'] === $usuarioTarget) {
        json_out(['error' => 'No puedes eliminar tu propio usuario mientras tienes la sesión activa.'], 400);
    }

    $total = (int)$pdo->query('SELECT COUNT(*) AS c FROM admin_users')->fetch()['c'];
    if ($total <= 1) {
        json_out(['error' => 'Debe existir al menos un usuario administrador.'], 400);
    }

    $stmt = $pdo->prepare('DELETE FROM admin_users WHERE usuario = ?');
    $stmt->execute([$usuarioTarget]);
    if ($stmt->rowCount() === 0) {
        json_out(['error' => "El usuario \"$usuarioTarget\" no fue encontrado."], 404);
    }
    json_out(['message' => "Usuario \"$usuarioTarget\" eliminado correctamente."]);
}

// POST /api/admin/change-password
if ($parts === ['admin', 'change-password'] && $method === 'POST') {
    requireAuth($JWT_SECRET);
    $body = body_json();
    $usuarioTarget = $body['usuarioTarget'] ?? null;
    $nuevaPassword = $body['nuevaPassword'] ?? null;

    if (!$usuarioTarget || !$nuevaPassword) {
        json_out(['error' => 'Especifica usuario y nueva contraseña.'], 400);
    }
    if (strlen($nuevaPassword) < 6) {
        json_out(['error' => 'La contraseña debe tener al menos 6 caracteres.'], 400);
    }

    $hash = password_hash($nuevaPassword, PASSWORD_BCRYPT, ['cost' => 10]);
    $stmt = $pdo->prepare('UPDATE admin_users SET password_hash = ? WHERE usuario = ?');
    $stmt->execute([$hash, $usuarioTarget]);

    if ($stmt->rowCount() === 0) {
        json_out(['error' => "El usuario \"$usuarioTarget\" no fue encontrado."], 404);
    }
    json_out(['message' => "Contraseña de \"$usuarioTarget\" modificada con éxito."]);
}

// ==========================================
// 2. GESTIÓN DE CONTENIDO DE PÁGINAS
// ==========================================

// GET /api/contenido/:pagina
if (count($parts) === 2 && $parts[0] === 'contenido' && $method === 'GET') {
    header('Cache-Control: no-store');
    $pagina = $parts[1];
    $stmt = $pdo->prepare('SELECT id, seccion, contenido FROM contenido_paginas WHERE pagina = ?');
    $stmt->execute([$pagina]);
    json_out($stmt->fetchAll());
}

// POST /api/contenido
if ($parts === ['contenido'] && $method === 'POST') {
    requireAuth($JWT_SECRET);
    $body = body_json();
    $pagina = $body['pagina'] ?? null;
    $seccion = $body['seccion'] ?? null;
    $contenido = $body['contenido'] ?? '';

    if (!$pagina || !$seccion) {
        json_out(['error' => 'Faltan campos obligatorios (página/sección).'], 400);
    }

    $stmt = $pdo->prepare('
        INSERT INTO contenido_paginas (pagina, seccion, contenido, actualizado_en)
        VALUES (?, ?, ?, CURRENT_TIMESTAMP)
        ON CONFLICT(pagina, seccion) DO UPDATE SET
            contenido = excluded.contenido,
            actualizado_en = CURRENT_TIMESTAMP
    ');
    $stmt->execute([$pagina, $seccion, $contenido]);

    json_out(['message' => 'Texto guardado correctamente.']);
}

// DELETE /api/contenido/:id
if (count($parts) === 2 && $parts[0] === 'contenido' && $method === 'DELETE') {
    requireAuth($JWT_SECRET);
    $id = $parts[1];
    $stmt = $pdo->prepare('DELETE FROM contenido_paginas WHERE id = ?');
    $stmt->execute([$id]);
    if ($stmt->rowCount() === 0) {
        json_out(['error' => 'No se encontró ese texto.'], 404);
    }
    json_out(['message' => 'Texto eliminado correctamente.']);
}

// ==========================================
// 3. DONATIVOS Y VOLUNTARIADO
// ==========================================

// POST /api/donaciones (público)
if ($parts === ['donaciones'] && $method === 'POST') {
    $body = body_json();
    $monto = isset($body['monto']) ? (float)$body['monto'] : 0;

    if ($monto <= 0) {
        json_out(['error' => 'El monto debe ser mayor a 0.'], 400);
    }

    $stmt = $pdo->prepare('INSERT INTO donaciones (nombre, email, monto) VALUES (?, ?, ?)');
    $stmt->execute([$body['nombre'] ?? null, $body['email'] ?? null, $monto]);

    json_out(['id' => $pdo->lastInsertId(), 'message' => 'Donativo registrado correctamente.'], 201);
}

// GET /api/donaciones/stats (protegido)
if ($parts === ['donaciones', 'stats'] && $method === 'GET') {
    requireAuth($JWT_SECRET);
    $totales = $pdo->query('SELECT COUNT(*) AS total_donaciones, COALESCE(SUM(monto), 0) AS monto_total, COALESCE(AVG(monto), 0) AS monto_promedio FROM donaciones')->fetch();
    $recientes = $pdo->query('SELECT * FROM donaciones ORDER BY id DESC LIMIT 8')->fetchAll();
    json_out(array_merge($totales, ['recientes' => $recientes]));
}

// GET /api/donaciones (protegido)
if ($parts === ['donaciones'] && $method === 'GET') {
    requireAuth($JWT_SECRET);
    json_out($pdo->query('SELECT * FROM donaciones ORDER BY id DESC')->fetchAll());
}

// POST /api/voluntarios (público)
if ($parts === ['voluntarios'] && $method === 'POST') {
    $body = body_json();
    $nombre = $body['nombre'] ?? null;
    $email = $body['email'] ?? null;

    if (!$nombre || !$email) {
        json_out(['error' => 'Nombre y correo son obligatorios.'], 400);
    }

    $stmt = $pdo->prepare('INSERT INTO voluntarios (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)');
    $stmt->execute([$nombre, $email, $body['telefono'] ?? null, $body['mensaje'] ?? null]);

    json_out(['id' => $pdo->lastInsertId(), 'message' => 'Registro de voluntariado recibido.'], 201);
}

// GET /api/voluntarios/stats (protegido)
if ($parts === ['voluntarios', 'stats'] && $method === 'GET') {
    requireAuth($JWT_SECRET);
    $totales = $pdo->query('SELECT COUNT(*) AS total_voluntarios FROM voluntarios')->fetch();
    $recientes = $pdo->query('SELECT * FROM voluntarios ORDER BY id DESC LIMIT 8')->fetchAll();
    json_out(array_merge($totales, ['recientes' => $recientes]));
}

// GET /api/voluntarios (protegido)
if ($parts === ['voluntarios'] && $method === 'GET') {
    requireAuth($JWT_SECRET);
    json_out($pdo->query('SELECT * FROM voluntarios ORDER BY id DESC')->fetchAll());
}

// ==========================================
// 4. PROYECTOS
// ==========================================

// GET /api/proyectos (público, ?todos=1 para incluir inactivos)
if ($parts === ['proyectos'] && $method === 'GET') {
    $soloActivos = ($_GET['todos'] ?? '') !== '1';
    $sql = $soloActivos
        ? 'SELECT * FROM proyectos WHERE activo = 1 ORDER BY orden ASC, id DESC'
        : 'SELECT * FROM proyectos ORDER BY orden ASC, id DESC';
    json_out($pdo->query($sql)->fetchAll());
}

// POST /api/proyectos (protegido)
if ($parts === ['proyectos'] && $method === 'POST') {
    requireAuth($JWT_SECRET);
    $body = body_json();
    $titulo = $body['titulo'] ?? null;
    if (!$titulo) json_out(['error' => 'El titulo es requerido.'], 400);

    $stmt = $pdo->prepare('INSERT INTO proyectos (titulo, descripcion, imagen_id, orden) VALUES (?, ?, ?, ?)');
    $stmt->execute([$titulo, $body['descripcion'] ?? '', $body['imagen_id'] ?? null, $body['orden'] ?? 0]);

    json_out(['id' => $pdo->lastInsertId()], 201);
}

// PATCH /api/proyectos/:id/estado (protegido)
if (count($parts) === 3 && $parts[0] === 'proyectos' && $parts[2] === 'estado' && $method === 'PATCH') {
    requireAuth($JWT_SECRET);
    $id = $parts[1];
    $existe = $pdo->prepare('SELECT id FROM proyectos WHERE id = ?');
    $existe->execute([$id]);
    if (!$existe->fetch()) json_out(['error' => 'Proyecto no encontrado.'], 404);

    $body = body_json();
    $activo = !empty($body['activo']) ? 1 : 0;
    $pdo->prepare('UPDATE proyectos SET activo = ?, actualizado_en = CURRENT_TIMESTAMP WHERE id = ?')
        ->execute([$activo, $id]);

    json_out(['ok' => true]);
}

// PUT /api/proyectos/:id (protegido)
if (count($parts) === 2 && $parts[0] === 'proyectos' && $method === 'PUT') {
    requireAuth($JWT_SECRET);
    $id = $parts[1];
    $existe = $pdo->prepare('SELECT id FROM proyectos WHERE id = ?');
    $existe->execute([$id]);
    if (!$existe->fetch()) json_out(['error' => 'Proyecto no encontrado.'], 404);

    $body = body_json();
    $pdo->prepare('
        UPDATE proyectos SET titulo = ?, descripcion = ?, imagen_id = ?, orden = ?, actualizado_en = CURRENT_TIMESTAMP
        WHERE id = ?
    ')->execute([
        $body['titulo'] ?? null,
        $body['descripcion'] ?? '',
        $body['imagen_id'] ?? null,
        $body['orden'] ?? 0,
        $id,
    ]);

    json_out(['ok' => true]);
}

// DELETE /api/proyectos/:id (protegido)
if (count($parts) === 2 && $parts[0] === 'proyectos' && $method === 'DELETE') {
    requireAuth($JWT_SECRET);
    $id = $parts[1];
    $existe = $pdo->prepare('SELECT id FROM proyectos WHERE id = ?');
    $existe->execute([$id]);
    if (!$existe->fetch()) json_out(['error' => 'Proyecto no encontrado.'], 404);

    $pdo->prepare('DELETE FROM proyectos WHERE id = ?')->execute([$id]);
    json_out(['ok' => true]);
}

// ==========================================
// 6. PRACTICANTES (ESTUDIANTES EN ESTADÍA/PRÁCTICAS)
// ==========================================

// POST /api/practicantes/login (público) — acceso del estudiante a su propio portal
if ($parts === ['practicantes', 'login'] && $method === 'POST') {
    $body = body_json();
    $usuario = $body['usuario'] ?? null;
    $password = $body['password'] ?? null;

    if (!$usuario || !$password) {
        json_out(['error' => 'Ingresa usuario y contraseña.'], 400);
    }

    $stmt = $pdo->prepare('SELECT * FROM practicantes WHERE usuario = ?');
    $stmt->execute([$usuario]);
    $p = $stmt->fetch();

    if (!$p || !password_verify($password, $p['password_hash'])) {
        json_out(['error' => 'Credenciales incorrectas.'], 401);
    }
    if (!$p['activo']) {
        json_out(['error' => 'Tu cuenta de practicante está dada de baja. Contacta a tu supervisor.'], 403);
    }

    $token = jwt_encode(['id' => $p['id'], 'usuario' => $p['usuario'], 'rol' => 'practicante'], $JWT_SECRET, $JWT_EXPIRES);
    json_out(['token' => $token, 'usuario' => $p['usuario'], 'nombre_completo' => $p['nombre_completo']]);
}

// GET /api/practicantes/me (practicante) — sus propios datos + horas acumuladas
if ($parts === ['practicantes', 'me'] && $method === 'GET') {
    $auth = requireAuth($JWT_SECRET);
    requireRole($auth, 'practicante');

    $stmt = $pdo->prepare('SELECT id, usuario, nombre_completo, escuela, carrera, cuatrimestre, supervisor, fecha_inicio, fecha_fin, horas_requeridas, activo FROM practicantes WHERE id = ?');
    $stmt->execute([$auth['id']]);
    $p = $stmt->fetch();
    if (!$p) json_out(['error' => 'Practicante no encontrado.'], 404);

    $horas = $pdo->prepare('SELECT COALESCE(SUM(horas), 0) AS total FROM practicante_actividades WHERE practicante_id = ?');
    $horas->execute([$auth['id']]);
    $p['horas_completadas'] = (float)$horas->fetch()['total'];

    json_out($p);
}

// GET /api/practicantes/me/actividades (practicante) — su propia bitácora
if ($parts === ['practicantes', 'me', 'actividades'] && $method === 'GET') {
    $auth = requireAuth($JWT_SECRET);
    requireRole($auth, 'practicante');

    $stmt = $pdo->prepare('SELECT id, fecha, descripcion, horas FROM practicante_actividades WHERE practicante_id = ? ORDER BY fecha DESC, id DESC');
    $stmt->execute([$auth['id']]);
    json_out($stmt->fetchAll());
}

// GET /api/practicantes (admin) — listar todos con horas acumuladas
if ($parts === ['practicantes'] && $method === 'GET') {
    $auth = requireAuth($JWT_SECRET);
    requireRole($auth, 'admin');

    $rows = $pdo->query('
        SELECT pr.id, pr.usuario, pr.nombre_completo, pr.escuela, pr.carrera, pr.cuatrimestre,
               pr.supervisor, pr.fecha_inicio, pr.fecha_fin, pr.horas_requeridas, pr.activo,
               COALESCE((SELECT SUM(horas) FROM practicante_actividades WHERE practicante_id = pr.id), 0) AS horas_completadas
        FROM practicantes pr
        ORDER BY pr.nombre_completo ASC
    ')->fetchAll();
    json_out($rows);
}

// POST /api/practicantes (admin) — registrar nuevo practicante
if ($parts === ['practicantes'] && $method === 'POST') {
    $auth = requireAuth($JWT_SECRET);
    requireRole($auth, 'admin');

    $body = body_json();
    $usuario = isset($body['usuario']) ? trim($body['usuario']) : null;
    $password = $body['password'] ?? null;
    $nombreCompleto = isset($body['nombre_completo']) ? trim($body['nombre_completo']) : null;

    if (!$usuario || !$password || !$nombreCompleto) {
        json_out(['error' => 'Usuario, contraseña y nombre completo son obligatorios.'], 400);
    }
    if (strlen($password) < 6) {
        json_out(['error' => 'La contraseña debe tener al menos 6 caracteres.'], 400);
    }

    $existe = $pdo->prepare('SELECT id FROM practicantes WHERE usuario = ?');
    $existe->execute([$usuario]);
    if ($existe->fetch()) {
        json_out(['error' => "Ya existe un practicante con el usuario \"$usuario\"."], 409);
    }

    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
    $stmt = $pdo->prepare('
        INSERT INTO practicantes (usuario, password_hash, nombre_completo, escuela, carrera, cuatrimestre, supervisor, fecha_inicio, fecha_fin, horas_requeridas)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ');
    $stmt->execute([
        $usuario,
        $hash,
        $nombreCompleto,
        $body['escuela'] ?? null,
        $body['carrera'] ?? null,
        $body['cuatrimestre'] ?? null,
        $body['supervisor'] ?? null,
        $body['fecha_inicio'] ?? null,
        $body['fecha_fin'] ?? null,
        isset($body['horas_requeridas']) ? (int)$body['horas_requeridas'] : 0,
    ]);

    json_out(['id' => $pdo->lastInsertId(), 'message' => "Practicante \"$nombreCompleto\" registrado correctamente."], 201);
}

// PUT /api/practicantes/:id (admin) — editar datos de un practicante
if (count($parts) === 2 && $parts[0] === 'practicantes' && $method === 'PUT') {
    $auth = requireAuth($JWT_SECRET);
    requireRole($auth, 'admin');

    $id = $parts[1];
    $existe = $pdo->prepare('SELECT id FROM practicantes WHERE id = ?');
    $existe->execute([$id]);
    if (!$existe->fetch()) json_out(['error' => 'Practicante no encontrado.'], 404);

    $body = body_json();
    $pdo->prepare('
        UPDATE practicantes SET
            nombre_completo = ?, escuela = ?, carrera = ?, cuatrimestre = ?, supervisor = ?,
            fecha_inicio = ?, fecha_fin = ?, horas_requeridas = ?, activo = ?
        WHERE id = ?
    ')->execute([
        $body['nombre_completo'] ?? null,
        $body['escuela'] ?? null,
        $body['carrera'] ?? null,
        $body['cuatrimestre'] ?? null,
        $body['supervisor'] ?? null,
        $body['fecha_inicio'] ?? null,
        $body['fecha_fin'] ?? null,
        isset($body['horas_requeridas']) ? (int)$body['horas_requeridas'] : 0,
        !empty($body['activo']) ? 1 : 0,
        $id,
    ]);

    // Si además se envía una nueva contraseña, se actualiza aparte.
    if (!empty($body['password'])) {
        if (strlen($body['password']) < 6) {
            json_out(['error' => 'Datos actualizados, pero la nueva contraseña debe tener al menos 6 caracteres.'], 400);
        }
        $hash = password_hash($body['password'], PASSWORD_BCRYPT, ['cost' => 10]);
        $pdo->prepare('UPDATE practicantes SET password_hash = ? WHERE id = ?')->execute([$hash, $id]);
    }

    json_out(['ok' => true]);
}

// DELETE /api/practicantes/:id (admin) — eliminar practicante y su bitácora
if (count($parts) === 2 && $parts[0] === 'practicantes' && $method === 'DELETE') {
    $auth = requireAuth($JWT_SECRET);
    requireRole($auth, 'admin');

    $id = $parts[1];
    $existe = $pdo->prepare('SELECT id FROM practicantes WHERE id = ?');
    $existe->execute([$id]);
    if (!$existe->fetch()) json_out(['error' => 'Practicante no encontrado.'], 404);

    $pdo->prepare('DELETE FROM practicante_actividades WHERE practicante_id = ?')->execute([$id]);
    $pdo->prepare('DELETE FROM practicantes WHERE id = ?')->execute([$id]);
    json_out(['ok' => true]);
}

// GET /api/practicantes/:id/actividades (admin) — bitácora de un practicante específico
if (count($parts) === 3 && $parts[0] === 'practicantes' && $parts[2] === 'actividades' && $method === 'GET') {
    $auth = requireAuth($JWT_SECRET);
    requireRole($auth, 'admin');

    $practicanteId = $parts[1];
    $stmt = $pdo->prepare('SELECT id, fecha, descripcion, horas FROM practicante_actividades WHERE practicante_id = ? ORDER BY fecha DESC, id DESC');
    $stmt->execute([$practicanteId]);
    json_out($stmt->fetchAll());
}

// POST /api/practicantes/:id/actividades (admin) — registrar actividad/horas
if (count($parts) === 3 && $parts[0] === 'practicantes' && $parts[2] === 'actividades' && $method === 'POST') {
    $auth = requireAuth($JWT_SECRET);
    requireRole($auth, 'admin');

    $practicanteId = $parts[1];
    $existe = $pdo->prepare('SELECT id FROM practicantes WHERE id = ?');
    $existe->execute([$practicanteId]);
    if (!$existe->fetch()) json_out(['error' => 'Practicante no encontrado.'], 404);

    $body = body_json();
    $fecha = $body['fecha'] ?? date('Y-m-d');
    $descripcion = trim($body['descripcion'] ?? '');
    $horas = isset($body['horas']) ? (float)$body['horas'] : 0;

    if ($descripcion === '' || $horas <= 0) {
        json_out(['error' => 'Describe la actividad y especifica horas mayores a 0.'], 400);
    }

    $stmt = $pdo->prepare('INSERT INTO practicante_actividades (practicante_id, fecha, descripcion, horas, registrado_por) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$practicanteId, $fecha, $descripcion, $horas, $auth['usuario'] ?? null]);

    json_out(['id' => $pdo->lastInsertId(), 'message' => 'Actividad registrada correctamente.'], 201);
}

// DELETE /api/practicante-actividades/:id (admin) — eliminar una actividad de la bitácora
if (count($parts) === 2 && $parts[0] === 'practicante-actividades' && $method === 'DELETE') {
    $auth = requireAuth($JWT_SECRET);
    requireRole($auth, 'admin');

    $id = $parts[1];
    $stmt = $pdo->prepare('DELETE FROM practicante_actividades WHERE id = ?');
    $stmt->execute([$id]);
    if ($stmt->rowCount() === 0) json_out(['error' => 'Actividad no encontrada.'], 404);
    json_out(['message' => 'Actividad eliminada correctamente.']);
}

// ==========================================
// 5. IMÁGENES / VIDEO
// ==========================================

// GET /api/imagenes (público)
if ($parts === ['imagenes'] && $method === 'GET') {
    json_out($pdo->query('SELECT * FROM imagenes ORDER BY id DESC')->fetchAll());
}

// POST /api/imagenes (protegido, multipart/form-data campo "imagen")
if ($parts === ['imagenes'] && $method === 'POST') {
    requireAuth($JWT_SECRET);

    if (empty($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        json_out(['error' => 'No se recibió ningún archivo.'], 400);
    }

    $tiposImagen = ['.jpg', '.jpeg', '.png', '.webp'];
    $tiposVideo = ['.mp4', '.webm'];
    $tiposPermitidos = array_merge($tiposImagen, $tiposVideo);

    $original = $_FILES['imagen']['name'];
    $ext = strtolower('.' . pathinfo($original, PATHINFO_EXTENSION));

    if (!in_array($ext, $tiposPermitidos, true)) {
        json_out(['error' => 'Solo se permiten imagenes (JPG, PNG, WEBP) o video (MP4, WEBM).'], 400);
    }

    // Límite: hasta 80 MB (el banner de inicio.php usa video). También revisa
    // upload_max_filesize / post_max_size en php.ini si subes archivos grandes.
    $maxBytes = 80 * 1024 * 1024;
    if ($_FILES['imagen']['size'] > $maxBytes) {
        json_out(['error' => 'El archivo supera el límite de 80 MB.'], 400);
    }

    $uploadsDir = __DIR__ . '/../uploads';
    if (!is_dir($uploadsDir)) mkdir($uploadsDir, 0775, true);

    $filename = 'img_' . round(microtime(true) * 1000) . $ext;
    $destino = $uploadsDir . '/' . $filename;

    if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $destino)) {
        json_out(['error' => 'No se pudo guardar el archivo en el servidor.'], 500);
    }

    $tipo = in_array($ext, $tiposVideo, true) ? 'video' : 'imagen';
    $rutaPublica = '/uploads/' . $filename;
    $descripcion = $_POST['descripcion'] ?? '';

    $stmt = $pdo->prepare('INSERT INTO imagenes (nombre_archivo, ruta, descripcion, tipo) VALUES (?, ?, ?, ?)');
    $stmt->execute([$filename, $rutaPublica, $descripcion, $tipo]);

    json_out(['id' => $pdo->lastInsertId(), 'ruta' => $rutaPublica, 'tipo' => $tipo], 201);
}

// DELETE /api/imagenes/:id (protegido)
if (count($parts) === 2 && $parts[0] === 'imagenes' && $method === 'DELETE') {
    requireAuth($JWT_SECRET);
    $id = $parts[1];

    $stmt = $pdo->prepare('SELECT * FROM imagenes WHERE id = ?');
    $stmt->execute([$id]);
    $imagen = $stmt->fetch();
    if (!$imagen) json_out(['error' => 'Imagen no encontrada.'], 404);

    $rutaArchivo = __DIR__ . '/../uploads/' . $imagen['nombre_archivo'];
    if (is_file($rutaArchivo)) unlink($rutaArchivo);

    $pdo->prepare('DELETE FROM imagenes WHERE id = ?')->execute([$id]);
    json_out(['ok' => true]);
}

// ==========================================
// Ninguna ruta coincidió
// ==========================================
json_out(['error' => 'Ruta de API no encontrada.'], 404);

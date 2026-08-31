<?php
// api/seed.php
// Crea (o actualiza la contraseña de) el usuario admin, leyendo las
// credenciales desde config.php. Se corre UNA VEZ desde la terminal:
//   php seed.php
// (parado dentro de la carpeta sitio/api/)

if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    die('Este script solo puede ejecutarse desde la línea de comandos.');
}

$config = require __DIR__ . '/config.php';
$pdo = require __DIR__ . '/db.php';

$usuario = $config['ADMIN_USER'];
$password = $config['ADMIN_PASSWORD'];

if (!$usuario || !$password) {
    fwrite(STDERR, "Faltan ADMIN_USER y/o ADMIN_PASSWORD en config.php\n");
    exit(1);
}

$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

$stmt = $pdo->prepare('SELECT id FROM admin_users WHERE usuario = ?');
$stmt->execute([$usuario]);
$existente = $stmt->fetch();

if ($existente) {
    $pdo->prepare('UPDATE admin_users SET password_hash = ? WHERE usuario = ?')->execute([$hash, $usuario]);
    echo "Contraseña actualizada para el usuario \"$usuario\".\n";
} else {
    $pdo->prepare('INSERT INTO admin_users (usuario, password_hash) VALUES (?, ?)')->execute([$usuario, $hash]);
    echo "Usuario admin \"$usuario\" creado correctamente.\n";
}

echo "Listo. Ya puedes iniciar sesión en login.php con esas credenciales.\n";

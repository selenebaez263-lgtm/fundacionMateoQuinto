<?php
require_once __DIR__ . '/config.php';
?>
<?php
$config = require __DIR__ . '/api/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Panel de administración | Mateo Quinto A.C.</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#faf9f7] min-h-screen">
  <script src="auto-textos.js"></script>

<header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
  <div class="flex items-center gap-3">
    <img src="logo.png" alt="Mateo Quinto A.C." class="h-9 w-auto">
    <span class="font-bold text-[#012d1d]">Panel de administración</span>
  </div>
  <button id="btnLogout" class="text-sm text-gray-500 hover:underline">Cerrar sesión</button>
</header>

<main class="max-w-4xl mx-auto px-6 py-10">
  <h1 class="text-2xl font-bold text-[#012d1d] mb-2">Hola, <span id="nombreAdmin">administrador</span></h1>
  <p class="text-gray-500 mb-8">Desde aquí puedes editar el contenido de cada sección del sitio: textos, imágenes y proyectos.</p>

  <div id="seccionLider" class="mb-8 bg-white border border-red-200 rounded-xl p-6 shadow-sm hidden">
    <div class="flex items-center justify-between mb-2">
      <div class="flex items-center gap-2">
        <span class="inline-block w-3 h-3 bg-red-600 rounded-full"></span>
        <h2 class="text-lg font-bold text-[#012d1d]">Gestión de Seguridad y Usuarios</h2>
      </div>
      <button id="btnVerUsuarios" type="button" class="text-xs bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-1.5 rounded-md font-medium transition-colors">
        📋 Cargar / Ver lista de usuarios
      </button>
    </div>
    
    <p class="text-sm text-gray-600 mb-4">Consulta la lista de usuarios activos, agrega un nuevo administrador o modifica la contraseña de uno existente para revocar su acceso.</p>

    <div id="listaUsuariosContainer" class="hidden mb-6 bg-gray-50 border border-gray-200 rounded-lg p-4">
      <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Usuarios registrados en la Base de Datos:</h3>
      <ul id="listaUsuarios" class="divide-y divide-gray-200 text-sm"></ul>
    </div>

    <!-- Agregar nuevo usuario administrador -->
    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6">
      <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">➕ Agregar nuevo usuario administrador</h3>
      <div id="nuevoUsuarioAlert" class="hidden text-sm rounded-md px-3 py-2 mb-3 border"></div>
      <form id="formNuevoUsuario" class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
        <div>
          <label class="block text-xs text-gray-600 mb-1 font-medium">Nombre de usuario</label>
          <input id="nuevoUsuarioInput" type="text" required class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="ej. mauricio">
        </div>
        <div>
          <label class="block text-xs text-gray-600 mb-1 font-medium">Contraseña (mín. 6 caracteres)</label>
          <input id="nuevoUsuarioPassword" type="password" required minlength="6" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="••••••••">
        </div>
        <div>
          <button type="submit" id="btnNuevoUsuario" class="w-full bg-[#012d1d] text-white rounded-md py-2 text-sm font-medium hover:opacity-90 transition-opacity">
            Crear usuario
          </button>
        </div>
      </form>
    </div>

    <div id="pwdAlert" class="hidden text-sm rounded-md px-3 py-2 mb-4 border"></div>

    <form id="formCambiarPwd" class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
      <div>
        <label class="block text-xs text-gray-600 mb-1 font-medium">Usuario afectado</label>
        <input id="usuarioTarget" type="text" required class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="ej. admin">
      </div>
      <div>
        <label class="block text-xs text-gray-600 mb-1 font-medium">Nueva Contraseña</label>
        <input id="nuevaPassword" type="password" required class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="••••••••">
      </div>
      <div>
        <button type="submit" id="btnCambiarPwd" class="w-full bg-red-700 text-white rounded-md py-2 text-sm font-medium hover:bg-red-800 transition-colors">
          Actualizar Contraseña
        </button>
      </div>
    </form>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <a href="editor.php?pagina=inicio" class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#012d1d] transition-colors">
      <p class="font-bold text-[#012d1d]">Inicio</p>
      <p class="text-sm text-gray-500 mt-1">Video, mensaje principal y accesos rápidos</p>
    </a>
    <a href="editor.php?pagina=objetivos" class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#012d1d] transition-colors">
      <p class="font-bold text-[#012d1d]">Quiénes somos</p>
      <p class="text-sm text-gray-500 mt-1">Misión, visión y objetivos</p>
    </a>
    <a href="editor.php?pagina=nuestra_labor" class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#012d1d] transition-colors">
      <p class="font-bold text-[#012d1d]">Nuestra obra</p>
      <p class="text-sm text-gray-500 mt-1">Programas y atención integral</p>
    </a>
    <a href="panel-proyectos.php" class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#012d1d] transition-colors">
      <p class="font-bold text-[#012d1d]">Proyectos</p>
      <p class="text-sm text-gray-500 mt-1">Tarjetas de proyectos e impacto</p>
    </a>
    <a href="editor.php?pagina=productos" class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#012d1d] transition-colors">
      <p class="font-bold text-[#012d1d]">Productos</p>
      <p class="text-sm text-gray-500 mt-1">Fresa, jitomate, huevo, etc.</p>
    </a>
    <a href="editor.php?pagina=contacto" class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#012d1d] transition-colors">
      <p class="font-bold text-[#012d1d]">Contacto</p>
      <p class="text-sm text-gray-500 mt-1">Datos de contacto y redes</p>
    </a>
  </div>

  <div class="mt-8 flex flex-wrap gap-3">
    <a href="panel-imagenes.php" class="inline-block bg-[#012d1d] text-white rounded-lg px-5 py-3 font-medium hover:opacity-90">
      Administrar imágenes del sitio
    </a>
    <a href="panel-practicantes.php" class="inline-block bg-[#97472c] text-white rounded-lg px-5 py-3 font-medium hover:opacity-90">
      🎓 Administrar practicantes
    </a>
    <a href="estadisticas.php" class="inline-block bg-white border border-gray-300 text-[#012d1d] rounded-lg px-5 py-3 font-medium hover:border-[#012d1d] transition-colors">
      📊 Ver estadísticas (donativos y voluntariado)
    </a>
  </div>
</main>

<script>
  const token = sessionStorage.getItem("mq_token");

  if (!token) {
    window.location.href = "login.php";
  }

  document.getElementById("nombreAdmin").textContent = sessionStorage.getItem("mq_usuario") || "administrador";

  // La sección de "Gestión de Seguridad y Usuarios" (crear/eliminar usuarios,
  // cambiar contraseñas) solo se muestra al usuario administrador principal.
  // El backend también valida esto de forma independiente; ocultarla aquí es
  // solo para no confundir a los demás usuarios con opciones que no pueden usar.
  const USUARIO_ADMIN_PRINCIPAL = <?php echo json_encode($config['ADMIN_USER']); ?>;
  const usuarioActual = sessionStorage.getItem("mq_usuario");
  if (usuarioActual === USUARIO_ADMIN_PRINCIPAL) {
    document.getElementById("seccionLider").classList.remove("hidden");
  }

  // Cargar lista de usuarios
  document.getElementById("btnVerUsuarios").addEventListener("click", async () => {
    const container = document.getElementById("listaUsuariosContainer");
    const ul = document.getElementById("listaUsuarios");

    if (!container.classList.contains("hidden")) {
      container.classList.add("hidden");
      return;
    }

    ul.innerHTML = "<li class='py-2 text-gray-500'>Cargando usuarios...</li>";
    container.classList.remove("hidden");

    try {
      const resp = await fetch("api/admin/users", {
        headers: { "Authorization": `Bearer ${token}` }
      });

      const data = await resp.json();

      if (!resp.ok) {
        throw new Error(data.error || "No se pudo obtener la lista de usuarios.");
      }

      ul.innerHTML = "";
      if (data.length === 0) {
        ul.innerHTML = "<li class='py-2 text-gray-500'>No hay usuarios registrados.</li>";
        return;
      }

      data.forEach(user => {
        const li = document.createElement("li");
        li.className = "py-2 flex justify-between items-center";
        li.innerHTML = `
          <span class="font-semibold text-gray-800">${user.usuario}</span>
          <span class="flex items-center gap-3">
            <button type="button" onclick="seleccionarUsuario('${user.usuario}')" class="text-xs text-red-700 font-medium hover:underline">Seleccionar</button>
            <button type="button" onclick="eliminarUsuario('${user.usuario}')" class="text-xs text-gray-500 font-medium hover:underline hover:text-red-700">Eliminar</button>
          </span>
        `;
        ul.appendChild(li);
      });

    } catch (err) {
      ul.innerHTML = `<li class='py-2 text-red-600'>${err.message}</li>`;
    }
  });

  function seleccionarUsuario(usuario) {
    document.getElementById("usuarioTarget").value = usuario;
    document.getElementById("nuevaPassword").focus();
  }

  async function eliminarUsuario(usuario) {
    if (!confirm(`¿Eliminar al usuario "${usuario}"? Perderá acceso al panel de inmediato.`)) return;
    try {
      const resp = await fetch(`api/admin/users/${encodeURIComponent(usuario)}`, {
        method: "DELETE",
        headers: { "Authorization": `Bearer ${token}` }
      });
      const data = await resp.json();
      if (!resp.ok) throw new Error(data.error || "No se pudo eliminar el usuario.");
      document.getElementById("btnVerUsuarios").click();
      document.getElementById("btnVerUsuarios").click();
    } catch (err) {
      alert(err.message);
    }
  }

  // Crear nuevo usuario administrador
  document.getElementById("formNuevoUsuario").addEventListener("submit", async (e) => {
    e.preventDefault();
    const usuario = document.getElementById("nuevoUsuarioInput").value.trim();
    const password = document.getElementById("nuevoUsuarioPassword").value;
    const btn = document.getElementById("btnNuevoUsuario");
    const alertBox = document.getElementById("nuevoUsuarioAlert");

    alertBox.className = "hidden text-sm rounded-md px-3 py-2 mb-3 border";
    btn.disabled = true;
    btn.textContent = "Creando...";

    try {
      const resp = await fetch("api/admin/users", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Authorization": `Bearer ${token}`
        },
        body: JSON.stringify({ usuario, password }),
      });

      const data = await resp.json();
      if (!resp.ok) throw new Error(data.error || "No se pudo crear el usuario.");

      alertBox.textContent = data.message;
      alertBox.classList.add("bg-green-50", "text-green-700", "border-green-200");
      alertBox.classList.remove("hidden");
      document.getElementById("formNuevoUsuario").reset();

      // Si la lista de usuarios está abierta, refréscala
      const container = document.getElementById("listaUsuariosContainer");
      if (!container.classList.contains("hidden")) {
        container.classList.add("hidden");
        document.getElementById("btnVerUsuarios").click();
      }
    } catch (err) {
      alertBox.textContent = err.message;
      alertBox.classList.add("bg-red-50", "text-red-700", "border-red-200");
      alertBox.classList.remove("hidden");
    } finally {
      btn.disabled = false;
      btn.textContent = "Crear usuario";
    }
  });

  // Cambiar contraseña
  document.getElementById("formCambiarPwd").addEventListener("submit", async (e) => {
    e.preventDefault();
    const usuarioTarget = document.getElementById("usuarioTarget").value.trim();
    const nuevaPassword = document.getElementById("nuevaPassword").value;
    const btn = document.getElementById("btnCambiarPwd");
    const alertBox = document.getElementById("pwdAlert");

    alertBox.className = "hidden text-sm rounded-md px-3 py-2 mb-4 border";
    btn.disabled = true;
    btn.textContent = "Actualizando...";

    try {
      const resp = await fetch("api/admin/change-password", {
        method: "POST",
        headers: { 
          "Content-Type": "application/json",
          "Authorization": `Bearer ${token}` 
        },
        body: JSON.stringify({ usuarioTarget, nuevaPassword }),
      });

      const data = await resp.json();

      if (!resp.ok) {
        throw new Error(data.error || "No se pudo actualizar la contraseña.");
      }

      alertBox.textContent = data.message;
      alertBox.classList.add("bg-green-50", "text-green-700", "border-green-200");
      alertBox.classList.remove("hidden");
      document.getElementById("formCambiarPwd").reset();
    } catch (err) {
      alertBox.textContent = err.message;
      alertBox.classList.add("bg-red-50", "text-red-700", "border-red-200");
      alertBox.classList.remove("hidden");
    } finally {
      btn.disabled = false;
      btn.textContent = "Actualizar Contraseña";
    }
  });

  // Cerrar sesión
  document.getElementById("btnLogout").addEventListener("click", () => {
    sessionStorage.clear();
    window.location.href = "inicio.php";
  });
</script>

</body>
</html>
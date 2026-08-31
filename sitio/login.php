<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iniciar sesión | Mateo Quinto A.C.</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#faf9f7] min-h-screen flex items-center justify-center px-4">

<div class="w-full max-w-sm bg-white border border-gray-200 rounded-xl p-8 shadow-sm">
  <div class="text-center mb-6">
    <img src="logo.png" alt="Mateo Quinto A.C." class="h-14 w-auto mx-auto mb-3">
    <h1 class="text-xl font-bold text-[#012d1d]">Iniciar sesión</h1>
  </div>

  <div id="errorMsg" class="hidden bg-red-50 text-red-700 text-sm rounded-md px-3 py-2 mb-4 border border-red-200"></div>

  <form id="formLogin" class="space-y-4">
    <div>
      <label class="block text-sm text-gray-600 mb-1">Usuario</label>
      <input id="usuario" type="text" autocomplete="username" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-[#012d1d]" placeholder="admin">
    </div>
    <div>
      <label class="block text-sm text-gray-600 mb-1">Contraseña</label>
      <input id="password" type="password" autocomplete="current-password" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-[#012d1d]" placeholder="••••••••">
    </div>
    <button id="btnLogin" type="submit" class="w-full bg-[#012d1d] text-white rounded-md py-2 font-medium hover:opacity-90 transition-opacity">
      Entrar
    </button>
  </form>

  <p class="text-center text-xs text-gray-400 mt-6">¿Eres practicante? <a href="practicante-login.php" class="underline hover:text-[#012d1d]">Entra aquí a tu portal</a>.</p>
</div>

<script>
  if (sessionStorage.getItem("mq_token")) {
    window.location.href = "dashboard.php";
  }

  document.getElementById("formLogin").addEventListener("submit", async (e) => {
    e.preventDefault();
    const usuario = document.getElementById("usuario").value.trim();
    const password = document.getElementById("password").value;
    const btn = document.getElementById("btnLogin");
    const errorBox = document.getElementById("errorMsg");

    errorBox.classList.add("hidden");
    btn.disabled = true;
    btn.textContent = "Entrando...";

    try {
      const resp = await fetch("api/auth/login", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ usuario, password }),
      });
      
      const data = await resp.json();

      if (!resp.ok) {
        throw new Error(data.error || "No se pudo iniciar sesión.");
      }

      sessionStorage.setItem("mq_token", data.token);
      sessionStorage.setItem("mq_usuario", data.usuario);

      window.location.href = "dashboard.php";
    } catch (err) {
      errorBox.textContent = err.message;
      errorBox.classList.remove("hidden");
      btn.disabled = false;
      btn.textContent = "Entrar";
    }
  });
</script>

</body>
</html>
<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mi estadía | Mateo Quinto A.C.</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#faf9f7] min-h-screen">

<header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
  <div class="flex items-center gap-3">
    <img src="logo.png" alt="Mateo Quinto A.C." class="h-9 w-auto">
    <span class="font-bold text-[#012d1d]">Portal de practicantes</span>
  </div>
  <button id="btnLogout" class="text-sm text-gray-500 hover:underline">Cerrar sesión</button>
</header>

<main class="max-w-3xl mx-auto px-6 py-10">

  <h1 class="text-2xl font-bold text-[#012d1d] mb-1">Hola, <span id="nombrePracticante">practicante</span></h1>
  <p class="text-gray-500 mb-8">Aquí puedes ver tus datos de estadía, tus horas acumuladas y tus actividades registradas.</p>

  <div id="cargando" class="text-sm text-gray-400">Cargando información...</div>
  <div id="errorBox" class="hidden bg-red-50 text-red-700 text-sm rounded-md px-3 py-2 mb-4 border border-red-200"></div>

  <div id="contenido" class="hidden space-y-8">

    <!-- Datos de la escuela / estadía -->
    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
      <h2 class="font-bold text-[#012d1d] mb-4">Datos de tu estadía</h2>
      <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
        <div>
          <dt class="text-xs font-semibold text-gray-500 uppercase">Escuela</dt>
          <dd id="datoEscuela" class="text-gray-800 mt-0.5">—</dd>
        </div>
        <div>
          <dt class="text-xs font-semibold text-gray-500 uppercase">Carrera</dt>
          <dd id="datoCarrera" class="text-gray-800 mt-0.5">—</dd>
        </div>
        <div>
          <dt class="text-xs font-semibold text-gray-500 uppercase">Cuatrimestre / Generación</dt>
          <dd id="datoCuatrimestre" class="text-gray-800 mt-0.5">—</dd>
        </div>
        <div>
          <dt class="text-xs font-semibold text-gray-500 uppercase">Supervisor</dt>
          <dd id="datoSupervisor" class="text-gray-800 mt-0.5">—</dd>
        </div>
        <div>
          <dt class="text-xs font-semibold text-gray-500 uppercase">Fecha de inicio</dt>
          <dd id="datoInicio" class="text-gray-800 mt-0.5">—</dd>
        </div>
        <div>
          <dt class="text-xs font-semibold text-gray-500 uppercase">Fecha de término</dt>
          <dd id="datoFin" class="text-gray-800 mt-0.5">—</dd>
        </div>
      </dl>
    </div>

    <!-- Horas -->
    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
      <h2 class="font-bold text-[#012d1d] mb-4">Horas de práctica</h2>
      <div class="flex items-end justify-between mb-2">
        <span class="text-2xl font-bold text-[#012d1d]"><span id="horasCompletadas">0</span>h</span>
        <span class="text-sm text-gray-500">de <span id="horasRequeridas">0</span>h requeridas</span>
      </div>
      <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden">
        <div id="barraProgreso" class="h-3 bg-[#97472c] transition-all" style="width: 0%"></div>
      </div>
      <p id="porcentajeTexto" class="text-xs text-gray-400 mt-2">0% completado</p>
    </div>

    <!-- Bitácora de actividades -->
    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
      <h2 class="font-bold text-[#012d1d] mb-4">Mis actividades registradas</h2>
      <div id="listaActividades" class="divide-y divide-gray-100 text-sm"></div>
    </div>

  </div>
</main>

<script>
  const token = sessionStorage.getItem("mq_prac_token");
  if (!token) {
    window.location.href = "practicante-login.php";
  }

  document.getElementById("nombrePracticante").textContent = sessionStorage.getItem("mq_prac_nombre") || sessionStorage.getItem("mq_prac_usuario") || "practicante";

  function fmtFecha(f) {
    if (!f) return "—";
    try {
      const d = new Date(f + "T00:00:00");
      return d.toLocaleDateString("es-MX", { year: "numeric", month: "long", day: "numeric" });
    } catch { return f; }
  }

  async function cargarDatos() {
    const cargando = document.getElementById("cargando");
    const errorBox = document.getElementById("errorBox");
    const contenido = document.getElementById("contenido");

    try {
      const respMe = await fetch("api/practicantes/me", {
        headers: { "Authorization": `Bearer ${token}` }
      });
      const me = await respMe.json();
      if (!respMe.ok) throw new Error(me.error || "No se pudo cargar tu información.");

      document.getElementById("datoEscuela").textContent = me.escuela || "—";
      document.getElementById("datoCarrera").textContent = me.carrera || "—";
      document.getElementById("datoCuatrimestre").textContent = me.cuatrimestre || "—";
      document.getElementById("datoSupervisor").textContent = me.supervisor || "—";
      document.getElementById("datoInicio").textContent = fmtFecha(me.fecha_inicio);
      document.getElementById("datoFin").textContent = fmtFecha(me.fecha_fin);

      const requeridas = me.horas_requeridas || 0;
      const completadas = me.horas_completadas || 0;
      const porcentaje = requeridas > 0 ? Math.min(100, Math.round((completadas / requeridas) * 100)) : 0;

      document.getElementById("horasCompletadas").textContent = completadas;
      document.getElementById("horasRequeridas").textContent = requeridas;
      document.getElementById("barraProgreso").style.width = `${porcentaje}%`;
      document.getElementById("porcentajeTexto").textContent = `${porcentaje}% completado`;

      const respAct = await fetch("api/practicantes/me/actividades", {
        headers: { "Authorization": `Bearer ${token}` }
      });
      const actividades = await respAct.json();
      if (!respAct.ok) throw new Error(actividades.error || "No se pudieron cargar tus actividades.");

      const lista = document.getElementById("listaActividades");
      if (actividades.length === 0) {
        lista.innerHTML = `<p class="text-xs text-gray-400 py-2">Todavía no tienes actividades registradas.</p>`;
      } else {
        lista.innerHTML = "";
        actividades.forEach(a => {
          const row = document.createElement("div");
          row.className = "py-3 flex justify-between items-start gap-3";
          row.innerHTML = `
            <div class="min-w-0">
              <p class="text-gray-800">${a.descripcion}</p>
              <p class="text-xs text-gray-400 mt-0.5">${fmtFecha(a.fecha)}</p>
            </div>
            <span class="flex-shrink-0 text-xs font-semibold text-[#012d1d] bg-gray-100 rounded-full px-2 py-1">${a.horas}h</span>
          `;
          lista.appendChild(row);
        });
      }

      cargando.classList.add("hidden");
      contenido.classList.remove("hidden");

    } catch (err) {
      cargando.classList.add("hidden");
      errorBox.textContent = err.message;
      errorBox.classList.remove("hidden");
      if (err.message.includes("Token") || err.message.includes("autorizado")) {
        sessionStorage.removeItem("mq_prac_token");
        setTimeout(() => window.location.href = "practicante-login.php", 1500);
      }
    }
  }

  document.getElementById("btnLogout").addEventListener("click", () => {
    sessionStorage.removeItem("mq_prac_token");
    sessionStorage.removeItem("mq_prac_usuario");
    sessionStorage.removeItem("mq_prac_nombre");
    window.location.href = "practicante-login.php";
  });

  cargarDatos();
</script>

</body>
</html>

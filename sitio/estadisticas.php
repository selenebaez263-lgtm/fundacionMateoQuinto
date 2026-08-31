<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Estadísticas | Mateo Quinto A.C.</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#faf9f7] min-h-screen">

<header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
  <div class="flex items-center gap-3">
    <img src="logo.png" alt="Mateo Quinto A.C." class="h-9 w-auto">
    <span class="font-bold text-[#012d1d]">Estadísticas</span>
  </div>
  <div class="flex items-center gap-4 text-sm">
    <a href="dashboard.php" class="text-gray-600 hover:underline">← Volver al panel</a>
    <button id="btnLogout" class="text-gray-500 hover:underline">Cerrar sesión</button>
  </div>
</header>

<main class="w-full max-w-5xl mx-auto px-6 py-10">

  <h1 class="text-2xl font-bold text-[#012d1d] mb-2">Donativos y voluntariado</h1>
  <p class="text-gray-500 mb-8">
    Datos registrados directamente desde el sitio público: quién dona (intención de donativo antes de pagar en Stripe)
    y quién se registra como voluntario desde el formulario de <code class="bg-gray-100 px-1 rounded">donar.php</code>.
  </p>

  <div id="loadingMsg" class="text-center text-gray-400 py-10">Cargando estadísticas...</div>
  <div id="errorMsg" class="hidden bg-red-50 text-red-700 text-sm rounded-md px-3 py-2 mb-4 border border-red-200"></div>

  <div id="contenidoStats" class="hidden">

    <!-- Tarjetas resumen -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
      <div class="bg-white border border-gray-200 rounded-xl p-5">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Donativos registrados</p>
        <p id="statTotalDonaciones" class="text-3xl font-bold text-[#012d1d] mt-1">0</p>
      </div>
      <div class="bg-white border border-gray-200 rounded-xl p-5">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Monto total (MXN)</p>
        <p id="statMontoTotal" class="text-3xl font-bold text-[#012d1d] mt-1">$0</p>
      </div>
      <div class="bg-white border border-gray-200 rounded-xl p-5">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Aporte promedio</p>
        <p id="statMontoPromedio" class="text-3xl font-bold text-[#012d1d] mt-1">$0</p>
      </div>
      <div class="bg-white border border-gray-200 rounded-xl p-5">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Voluntarios registrados</p>
        <p id="statTotalVoluntarios" class="text-3xl font-bold text-[#012d1d] mt-1">0</p>
      </div>
    </div>

    <p class="text-xs text-gray-400 mb-10 -mt-6">
      Nota: el monto y el conteo de donativos reflejan la <strong>intención de donar</strong> capturada antes de
      redirigir a Stripe. Este sitio no recibe confirmación bancaria de Stripe (requeriría configurar un webhook con
      credenciales propias de Stripe), así que trátalo como una referencia y no como conciliación contable.
    </p>

    <!-- Donativos recientes -->
    <div class="mb-10">
      <h2 class="font-bold text-[#012d1d] mb-4">Últimos donativos</h2>
      <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
          <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
            <tr>
              <th class="text-left px-4 py-3">Nombre</th>
              <th class="text-left px-4 py-3">Correo</th>
              <th class="text-right px-4 py-3">Monto</th>
              <th class="text-left px-4 py-3">Fecha</th>
            </tr>
          </thead>
          <tbody id="tablaDonaciones" class="divide-y divide-gray-100"></tbody>
        </table>
        <p id="sinDonaciones" class="hidden text-center text-xs text-gray-400 py-6">Aún no hay donativos registrados.</p>
      </div>
    </div>

    <!-- Voluntarios recientes -->
    <div class="mb-10">
      <h2 class="font-bold text-[#012d1d] mb-4">Últimos voluntarios registrados</h2>
      <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
          <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
            <tr>
              <th class="text-left px-4 py-3">Nombre</th>
              <th class="text-left px-4 py-3">Correo</th>
              <th class="text-left px-4 py-3">Teléfono</th>
              <th class="text-left px-4 py-3">Mensaje</th>
              <th class="text-left px-4 py-3">Fecha</th>
            </tr>
          </thead>
          <tbody id="tablaVoluntarios" class="divide-y divide-gray-100"></tbody>
        </table>
        <p id="sinVoluntarios" class="hidden text-center text-xs text-gray-400 py-6">Aún no hay voluntarios registrados.</p>
      </div>
    </div>

  </div>
</main>

<script src="nav.js" defer></script>
<script>
  const API_BASE = "";
  const token = sessionStorage.getItem("mq_token");
  if (!token) {
    window.location.href = "login.php";
  }

  function formatoMoneda(n) {
    return new Intl.NumberFormat('es-MX', { style: 'currency', currency: 'MXN', maximumFractionDigits: 0 }).format(n || 0);
  }
  function formatoFecha(f) {
    if (!f) return '—';
    return new Date(f.replace(' ', 'T') + 'Z').toLocaleString('es-MX', { dateStyle: 'medium', timeStyle: 'short' });
  }
  function escapeHtml(s) {
    return (s ?? '').toString().replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
  }

  async function cargarEstadisticas() {
    const loading = document.getElementById("loadingMsg");
    const errorBox = document.getElementById("errorMsg");
    const contenido = document.getElementById("contenidoStats");

    try {
      const [respDon, respVol] = await Promise.all([
        fetch(`${API_BASE}api/donaciones/stats`, { headers: { Authorization: `Bearer ${token}` } }),
        fetch(`${API_BASE}api/voluntarios/stats`, { headers: { Authorization: `Bearer ${token}` } }),
      ]);

      if (!respDon.ok || !respVol.ok) {
        throw new Error("No se pudieron cargar las estadísticas. Verifica que el servidor backend esté corriendo.");
      }

      const donaciones = await respDon.json();
      const voluntarios = await respVol.json();

      document.getElementById("statTotalDonaciones").textContent = donaciones.total_donaciones ?? 0;
      document.getElementById("statMontoTotal").textContent = formatoMoneda(donaciones.monto_total);
      document.getElementById("statMontoPromedio").textContent = formatoMoneda(donaciones.monto_promedio);
      document.getElementById("statTotalVoluntarios").textContent = voluntarios.total_voluntarios ?? 0;

      const tablaDonaciones = document.getElementById("tablaDonaciones");
      const sinDonaciones = document.getElementById("sinDonaciones");
      tablaDonaciones.innerHTML = "";
      if (!donaciones.recientes || donaciones.recientes.length === 0) {
        sinDonaciones.classList.remove("hidden");
      } else {
        donaciones.recientes.forEach(d => {
          const tr = document.createElement("tr");
          tr.innerHTML = `
            <td class="px-4 py-3">${escapeHtml(d.nombre) || '<span class="text-gray-400">Anónimo</span>'}</td>
            <td class="px-4 py-3">${escapeHtml(d.email) || '<span class="text-gray-400">—</span>'}</td>
            <td class="px-4 py-3 text-right font-semibold text-[#012d1d]">${formatoMoneda(d.monto)}</td>
            <td class="px-4 py-3 text-gray-500">${formatoFecha(d.creado_en)}</td>
          `;
          tablaDonaciones.appendChild(tr);
        });
      }

      const tablaVoluntarios = document.getElementById("tablaVoluntarios");
      const sinVoluntarios = document.getElementById("sinVoluntarios");
      tablaVoluntarios.innerHTML = "";
      if (!voluntarios.recientes || voluntarios.recientes.length === 0) {
        sinVoluntarios.classList.remove("hidden");
      } else {
        voluntarios.recientes.forEach(v => {
          const tr = document.createElement("tr");
          tr.innerHTML = `
            <td class="px-4 py-3">${escapeHtml(v.nombre)}</td>
            <td class="px-4 py-3">${escapeHtml(v.email)}</td>
            <td class="px-4 py-3">${escapeHtml(v.telefono) || '<span class="text-gray-400">—</span>'}</td>
            <td class="px-4 py-3 text-gray-600 max-w-xs truncate" title="${escapeHtml(v.mensaje)}">${escapeHtml(v.mensaje) || '—'}</td>
            <td class="px-4 py-3 text-gray-500">${formatoFecha(v.creado_en)}</td>
          `;
          tablaVoluntarios.appendChild(tr);
        });
      }

      loading.classList.add("hidden");
      contenido.classList.remove("hidden");
    } catch (err) {
      loading.classList.add("hidden");
      errorBox.textContent = err.message;
      errorBox.classList.remove("hidden");
    }
  }

  document.getElementById("btnLogout").addEventListener("click", () => {
    sessionStorage.clear();
    window.location.href = "inicio.php";
  });

  cargarEstadisticas();
</script>

</body>
</html>
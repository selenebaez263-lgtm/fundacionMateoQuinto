<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Practicantes | Mateo Quinto A.C.</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#faf9f7] min-h-screen">

<header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
  <div class="flex items-center gap-3">
    <img src="logo.png" alt="Mateo Quinto A.C." class="h-9 w-auto">
    <span class="font-bold text-[#012d1d]">Panel de Practicantes</span>
  </div>
  <div class="flex items-center gap-4 text-sm">
    <a href="dashboard.php" class="text-gray-600 hover:underline">← Volver al panel</a>
    <button id="btnLogout" class="text-gray-500 hover:underline">Cerrar sesión</button>
  </div>
</header>

<main class="w-full max-w-6xl mx-auto px-6 py-10">

  <p class="text-sm text-gray-500 mb-8 text-center">Registra a los estudiantes que hacen su servicio social, prácticas o estadía aquí. Cada uno recibe su propio usuario para ver sus horas y actividades en <a href="practicante-login.php" class="underline text-[#012d1d]" target="_blank">practicante-login.php</a>.</p>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

    <!-- Formulario alta / edición -->
    <div class="bg-white border border-dashed border-gray-400 rounded-xl p-6 shadow-sm h-fit">
      <h2 id="formTitulo" class="font-bold text-[#012d1d] mb-4">Registrar nuevo practicante</h2>

      <div id="statusAlert" class="hidden text-sm rounded-md px-3 py-2 mb-4 border"></div>

      <form id="formPracticante" class="space-y-4">
        <input type="hidden" id="practicanteId" value="">

        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Usuario (para entrar)</label>
            <input id="usuarioInput" type="text" required class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="ej. juan.perez">
          </div>
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1"><span id="passLabel">Contraseña</span></label>
            <input id="passwordInput" type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="mín. 6 caracteres">
          </div>
        </div>

        <div>
          <label class="block text-xs font-semibold text-gray-600 mb-1">Nombre completo</label>
          <input id="nombreInput" type="text" required class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="ej. Juan Pérez López">
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Escuela / Universidad</label>
            <input id="escuelaInput" type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="ej. UPAM">
          </div>
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Carrera</label>
            <input id="carreraInput" type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="ej. Desarrollo de Software">
          </div>
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Cuatrimestre / Generación</label>
            <input id="cuatrimestreInput" type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="ej. 9° cuatrimestre">
          </div>
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Supervisor asignado</label>
            <input id="supervisorInput" type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="ej. Ing. Mauricio Gamboa">
          </div>
        </div>

        <div class="grid grid-cols-3 gap-3">
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Fecha de inicio</label>
            <input id="inicioInput" type="date" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]">
          </div>
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Fecha de término</label>
            <input id="finInput" type="date" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]">
          </div>
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Horas requeridas</label>
            <input id="horasReqInput" type="number" min="0" value="0" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]">
          </div>
        </div>

        <label class="flex items-center gap-2 text-sm text-gray-600">
          <input id="activoInput" type="checkbox" checked class="rounded border-gray-300">
          Cuenta activa (puede iniciar sesión)
        </label>

        <div class="flex gap-3">
          <button id="btnGuardar" type="submit" class="bg-[#012d1d] text-white rounded-md px-5 py-2 text-sm font-medium hover:opacity-90 transition-opacity">
            Registrar practicante
          </button>
          <button id="btnCancelar" type="button" class="hidden text-sm text-gray-500 hover:underline">Cancelar edición</button>
        </div>
      </form>
    </div>

    <!-- Lista + bitácora -->
    <div>
      <h2 class="font-bold text-[#012d1d] mb-4">Practicantes registrados</h2>
      <div id="listaPracticantes" class="space-y-3"></div>
    </div>

  </div>

  <!-- Modal de actividades -->
  <div id="modalActividades" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center px-4 z-50">
    <div class="bg-white rounded-xl shadow-lg max-w-lg w-full max-h-[85vh] overflow-y-auto p-6">
      <div class="flex justify-between items-start mb-4">
        <div>
          <h3 class="font-bold text-[#012d1d]">Bitácora de actividades</h3>
          <p id="modalNombre" class="text-sm text-gray-500"></p>
        </div>
        <button id="btnCerrarModal" class="text-gray-400 hover:text-gray-700">✕</button>
      </div>

      <div id="modalAlert" class="hidden text-sm rounded-md px-3 py-2 mb-4 border"></div>

      <form id="formActividad" class="grid grid-cols-3 gap-2 mb-5 items-end">
        <input type="hidden" id="modalPracticanteId" value="">
        <div class="col-span-3 sm:col-span-1">
          <label class="block text-xs font-semibold text-gray-600 mb-1">Fecha</label>
          <input id="actFecha" type="date" class="w-full border border-gray-300 rounded-md px-2 py-2 text-sm focus:outline-none focus:border-[#012d1d]">
        </div>
        <div class="col-span-3 sm:col-span-1">
          <label class="block text-xs font-semibold text-gray-600 mb-1">Horas</label>
          <input id="actHoras" type="number" min="0.5" step="0.5" class="w-full border border-gray-300 rounded-md px-2 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="ej. 4">
        </div>
        <div class="col-span-3 sm:col-span-1">
          <button type="submit" class="w-full bg-[#012d1d] text-white rounded-md py-2 text-sm font-medium hover:opacity-90 transition-opacity">Agregar</button>
        </div>
        <div class="col-span-3">
          <label class="block text-xs font-semibold text-gray-600 mb-1">Descripción de la actividad</label>
          <input id="actDescripcion" type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="ej. Diseño de la base de datos del sitio">
        </div>
      </form>

      <div id="listaActividadesModal" class="divide-y divide-gray-100 text-sm"></div>
    </div>
  </div>

</main>

<script>
  const token = sessionStorage.getItem("mq_token");
  if (!token) {
    window.location.href = "login.php";
  }

  const API = "api";
  const form = document.getElementById("formPracticante");
  const practicanteId = document.getElementById("practicanteId");
  const usuarioInput = document.getElementById("usuarioInput");
  const passwordInput = document.getElementById("passwordInput");
  const passLabel = document.getElementById("passLabel");
  const nombreInput = document.getElementById("nombreInput");
  const escuelaInput = document.getElementById("escuelaInput");
  const carreraInput = document.getElementById("carreraInput");
  const cuatrimestreInput = document.getElementById("cuatrimestreInput");
  const supervisorInput = document.getElementById("supervisorInput");
  const inicioInput = document.getElementById("inicioInput");
  const finInput = document.getElementById("finInput");
  const horasReqInput = document.getElementById("horasReqInput");
  const activoInput = document.getElementById("activoInput");
  const formTitulo = document.getElementById("formTitulo");
  const btnGuardar = document.getElementById("btnGuardar");
  const btnCancelar = document.getElementById("btnCancelar");
  const statusAlert = document.getElementById("statusAlert");
  const listaPracticantes = document.getElementById("listaPracticantes");

  function mostrarAlerta(mensaje, tipo) {
    statusAlert.textContent = mensaje;
    statusAlert.className = "text-sm rounded-md px-3 py-2 mb-4 border";
    statusAlert.classList.add(...(tipo === "ok" ? ["bg-green-50", "text-green-700", "border-green-200"] : ["bg-red-50", "text-red-700", "border-red-200"]));
  }

  function limpiarFormulario() {
    practicanteId.value = "";
    form.reset();
    activoInput.checked = true;
    horasReqInput.value = 0;
    usuarioInput.disabled = false;
    passwordInput.required = true;
    passLabel.textContent = "Contraseña";
    formTitulo.textContent = "Registrar nuevo practicante";
    btnGuardar.textContent = "Registrar practicante";
    btnCancelar.classList.add("hidden");
  }

  async function cargarPracticantes() {
    listaPracticantes.innerHTML = `<p class="text-xs text-gray-400 py-2">Cargando practicantes...</p>`;
    try {
      const resp = await fetch(`${API}/practicantes`, { headers: { "Authorization": `Bearer ${token}` } });
      const data = await resp.json();
      if (!resp.ok) throw new Error(data.error || "No se pudo cargar la lista.");

      if (data.length === 0) {
        listaPracticantes.innerHTML = `<p class="text-xs text-gray-400 py-2">Todavía no hay practicantes registrados.</p>`;
        return;
      }

      listaPracticantes.innerHTML = "";
      data.forEach(p => {
        const pct = p.horas_requeridas > 0 ? Math.min(100, Math.round((p.horas_completadas / p.horas_requeridas) * 100)) : 0;
        const div = document.createElement("div");
        div.className = "bg-white border border-gray-200 rounded-lg p-4 text-sm";
        div.innerHTML = `
          <div class="flex justify-between items-start gap-3">
            <div class="min-w-0">
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#012d1d]">${p.nombre_completo}</span>
                ${p.activo ? '<span class="text-[10px] bg-green-100 text-green-700 px-2 py-0.5 rounded-full">Activo</span>' : '<span class="text-[10px] bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full">De baja</span>'}
              </div>
              <p class="text-gray-500 text-xs mt-1">${p.usuario} · ${p.escuela || "Sin escuela"} · ${p.carrera || "Sin carrera"}</p>
              <p class="text-gray-400 text-[11px] mt-1">${p.horas_completadas}h de ${p.horas_requeridas}h (${pct}%)</p>
              <div class="w-full bg-gray-100 rounded-full h-1.5 mt-1 overflow-hidden">
                <div class="h-1.5 bg-[#97472c]" style="width: ${pct}%"></div>
              </div>
            </div>
            <div class="flex flex-col gap-1 text-xs flex-shrink-0">
              <button data-action="actividades" class="text-[#012d1d] hover:underline font-medium">Ver / agregar horas</button>
              <button data-action="editar" class="text-blue-600 hover:underline font-medium">Editar</button>
              <button data-action="eliminar" class="text-red-600 hover:underline font-medium">Eliminar</button>
            </div>
          </div>
        `;

        div.querySelector('[data-action="editar"]').addEventListener("click", () => {
          practicanteId.value = p.id;
          usuarioInput.value = p.usuario;
          usuarioInput.disabled = true;
          passwordInput.value = "";
          passwordInput.required = false;
          passLabel.textContent = "Nueva contraseña (opcional)";
          nombreInput.value = p.nombre_completo;
          escuelaInput.value = p.escuela || "";
          carreraInput.value = p.carrera || "";
          cuatrimestreInput.value = p.cuatrimestre || "";
          supervisorInput.value = p.supervisor || "";
          inicioInput.value = p.fecha_inicio || "";
          finInput.value = p.fecha_fin || "";
          horasReqInput.value = p.horas_requeridas || 0;
          activoInput.checked = !!p.activo;
          formTitulo.textContent = `Editando: ${p.nombre_completo}`;
          btnGuardar.textContent = "Actualizar practicante";
          btnCancelar.classList.remove("hidden");
          window.scrollTo({ top: 0, behavior: "smooth" });
        });

        div.querySelector('[data-action="eliminar"]').addEventListener("click", async () => {
          if (!confirm(`¿Eliminar definitivamente a "${p.nombre_completo}"? Se borrará también su bitácora de actividades.`)) return;
          try {
            const resp2 = await fetch(`${API}/practicantes/${p.id}`, { method: "DELETE", headers: { "Authorization": `Bearer ${token}` } });
            const data2 = await resp2.json();
            if (!resp2.ok) throw new Error(data2.error || "No se pudo eliminar.");
            cargarPracticantes();
          } catch (err) {
            mostrarAlerta(err.message, "error");
          }
        });

        div.querySelector('[data-action="actividades"]').addEventListener("click", () => abrirModal(p));

        listaPracticantes.appendChild(div);
      });
    } catch (err) {
      listaPracticantes.innerHTML = `<p class="text-xs text-red-500 py-2">${err.message}</p>`;
    }
  }

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    btnGuardar.disabled = true;
    const editando = !!practicanteId.value;
    btnGuardar.textContent = editando ? "Actualizando..." : "Registrando...";

    const payload = {
      nombre_completo: nombreInput.value.trim(),
      escuela: escuelaInput.value.trim(),
      carrera: carreraInput.value.trim(),
      cuatrimestre: cuatrimestreInput.value.trim(),
      supervisor: supervisorInput.value.trim(),
      fecha_inicio: inicioInput.value || null,
      fecha_fin: finInput.value || null,
      horas_requeridas: parseInt(horasReqInput.value, 10) || 0,
      activo: activoInput.checked,
    };
    if (!editando) {
      payload.usuario = usuarioInput.value.trim();
      payload.password = passwordInput.value;
    } else if (passwordInput.value) {
      payload.password = passwordInput.value;
    }

    try {
      const url = editando ? `${API}/practicantes/${practicanteId.value}` : `${API}/practicantes`;
      const method = editando ? "PUT" : "POST";

      const resp = await fetch(url, {
        method,
        headers: { "Content-Type": "application/json", "Authorization": `Bearer ${token}` },
        body: JSON.stringify(payload),
      });
      const data = await resp.json();
      if (!resp.ok) throw new Error(data.error || "No se pudo guardar.");

      mostrarAlerta(editando ? "Practicante actualizado correctamente." : `Practicante registrado. Usuario: "${payload.usuario}".`, "ok");
      limpiarFormulario();
      cargarPracticantes();
    } catch (err) {
      mostrarAlerta(err.message, "error");
    } finally {
      btnGuardar.disabled = false;
      btnGuardar.textContent = editando ? "Actualizar practicante" : "Registrar practicante";
    }
  });

  btnCancelar.addEventListener("click", limpiarFormulario);

  // ---- Modal de actividades / horas ----
  const modal = document.getElementById("modalActividades");
  const modalNombre = document.getElementById("modalNombre");
  const modalPracticanteId = document.getElementById("modalPracticanteId");
  const formActividad = document.getElementById("formActividad");
  const listaActividadesModal = document.getElementById("listaActividadesModal");
  const modalAlert = document.getElementById("modalAlert");

  function mostrarAlertaModal(mensaje, tipo) {
    modalAlert.textContent = mensaje;
    modalAlert.className = "text-sm rounded-md px-3 py-2 mb-4 border";
    modalAlert.classList.add(...(tipo === "ok" ? ["bg-green-50", "text-green-700", "border-green-200"] : ["bg-red-50", "text-red-700", "border-red-200"]));
  }

  async function abrirModal(p) {
    modalNombre.textContent = `${p.nombre_completo} · ${p.usuario}`;
    modalPracticanteId.value = p.id;
    document.getElementById("actFecha").value = new Date().toISOString().slice(0, 10);
    document.getElementById("actHoras").value = "";
    document.getElementById("actDescripcion").value = "";
    modalAlert.classList.add("hidden");
    modal.classList.remove("hidden");
    await cargarActividadesModal(p.id);
  }

  async function cargarActividadesModal(id) {
    listaActividadesModal.innerHTML = `<p class="text-xs text-gray-400 py-2">Cargando...</p>`;
    try {
      const resp = await fetch(`${API}/practicantes/${id}/actividades`, { headers: { "Authorization": `Bearer ${token}` } });
      const data = await resp.json();
      if (!resp.ok) throw new Error(data.error || "No se pudo cargar la bitácora.");

      if (data.length === 0) {
        listaActividadesModal.innerHTML = `<p class="text-xs text-gray-400 py-2">Sin actividades registradas todavía.</p>`;
        return;
      }
      listaActividadesModal.innerHTML = "";
      data.forEach(a => {
        const row = document.createElement("div");
        row.className = "py-2 flex justify-between items-center gap-3";
        row.innerHTML = `
          <div class="min-w-0">
            <p class="text-gray-800 text-sm">${a.descripcion}</p>
            <p class="text-xs text-gray-400">${a.fecha}</p>
          </div>
          <div class="flex items-center gap-2 flex-shrink-0">
            <span class="text-xs font-semibold text-[#012d1d] bg-gray-100 rounded-full px-2 py-1">${a.horas}h</span>
            <button data-id="${a.id}" class="text-xs text-red-600 hover:underline">Eliminar</button>
          </div>
        `;
        row.querySelector("button").addEventListener("click", async () => {
          if (!confirm("¿Eliminar esta actividad?")) return;
          try {
            const r = await fetch(`${API}/practicante-actividades/${a.id}`, { method: "DELETE", headers: { "Authorization": `Bearer ${token}` } });
            const d = await r.json();
            if (!r.ok) throw new Error(d.error || "No se pudo eliminar.");
            cargarActividadesModal(id);
            cargarPracticantes();
          } catch (err) {
            mostrarAlertaModal(err.message, "error");
          }
        });
        listaActividadesModal.appendChild(row);
      });
    } catch (err) {
      listaActividadesModal.innerHTML = `<p class="text-xs text-red-500 py-2">${err.message}</p>`;
    }
  }

  formActividad.addEventListener("submit", async (e) => {
    e.preventDefault();
    const id = modalPracticanteId.value;
    const payload = {
      fecha: document.getElementById("actFecha").value,
      horas: parseFloat(document.getElementById("actHoras").value),
      descripcion: document.getElementById("actDescripcion").value.trim(),
    };
    try {
      const resp = await fetch(`${API}/practicantes/${id}/actividades`, {
        method: "POST",
        headers: { "Content-Type": "application/json", "Authorization": `Bearer ${token}` },
        body: JSON.stringify(payload),
      });
      const data = await resp.json();
      if (!resp.ok) throw new Error(data.error || "No se pudo registrar la actividad.");

      document.getElementById("actHoras").value = "";
      document.getElementById("actDescripcion").value = "";
      await cargarActividadesModal(id);
      cargarPracticantes();
    } catch (err) {
      mostrarAlertaModal(err.message, "error");
    }
  });

  document.getElementById("btnCerrarModal").addEventListener("click", () => modal.classList.add("hidden"));
  modal.addEventListener("click", (e) => { if (e.target === modal) modal.classList.add("hidden"); });

  document.getElementById("btnLogout").addEventListener("click", () => {
    sessionStorage.clear();
    window.location.href = "inicio.php";
  });

  cargarPracticantes();
</script>

</body>
</html>

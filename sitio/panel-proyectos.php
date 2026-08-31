<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Proyectos | Mateo Quinto A.C.</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#faf9f7] min-h-screen">

<header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
  <div class="flex items-center gap-3">
    <img src="logo.png" alt="Mateo Quinto A.C." class="h-9 w-auto">
    <span class="font-bold text-[#012d1d]">Panel de Proyectos</span>
  </div>
  <div class="flex items-center gap-4 text-sm">
    <a href="dashboard.php" class="text-gray-600 hover:underline">← Volver al panel</a>
    <button id="btnLogout" class="text-gray-500 hover:underline">Cerrar sesión</button>
  </div>
</header>

<main class="w-full max-w-6xl mx-auto px-6 py-10">

  <div class="flex items-center justify-center gap-3 mb-8 text-sm text-gray-500">
    <a href="editor.php" class="hover:text-[#012d1d] hover:underline">Ir a Textos</a>
    <span>·</span>
    <span class="font-bold text-[#012d1d]">Proyectos</span>
    <span>·</span>
    <a href="panel-imagenes.php" class="hover:text-[#012d1d] hover:underline">Ir a Imágenes y video</a>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

    
    <div class="bg-white border border-dashed border-gray-400 rounded-xl p-6 shadow-sm h-fit">
      <h2 id="formTitulo" class="font-bold text-[#012d1d] mb-4">Agregar nuevo proyecto</h2>

      <div id="statusAlert" class="hidden text-sm rounded-md px-3 py-2 mb-4 border"></div>

      <form id="formProyecto" class="space-y-4">
        <input type="hidden" id="proyectoId" value="">

        <div>
          <label class="block text-xs font-semibold text-gray-600 mb-1">Título</label>
          <input id="tituloInput" type="text" required class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="ej. Eco-Tecnologías">
        </div>

        <div>
          <label class="block text-xs font-semibold text-gray-600 mb-1">Descripción</label>
          <textarea id="descripcionInput" rows="4" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="Describe el proyecto..."></textarea>
        </div>

        <div>
          <label class="block text-xs font-semibold text-gray-600 mb-1">Imagen asociada</label>
          <select id="imagenSelect" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm bg-white focus:outline-none focus:border-[#012d1d]">
            <option value="">Sin imagen</option>
          </select>
          <p class="text-xs text-gray-400 mt-1">¿No aparece la imagen que buscas? Súbela primero en <a href="panel-imagenes.php" class="underline">Imágenes y video</a>.</p>
        </div>

        <div>
          <label class="block text-xs font-semibold text-gray-600 mb-1">Orden (menor número aparece primero)</label>
          <input id="ordenInput" type="number" value="0" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]">
        </div>

        <div class="flex gap-3">
          <button id="btnGuardar" type="submit" class="bg-[#012d1d] text-white rounded-md px-5 py-2 text-sm font-medium hover:opacity-90 transition-opacity">
            Guardar proyecto
          </button>
          <button id="btnCancelar" type="button" class="hidden text-sm text-gray-500 hover:underline">Cancelar edición</button>
        </div>
      </form>
    </div>

    
    <div>
      <h2 class="font-bold text-[#012d1d] mb-4">Proyectos existentes</h2>
      <div id="listaProyectos" class="space-y-3"></div>
    </div>

  </div>

</main>

<script>
  const token = sessionStorage.getItem("mq_token");
  if (!token) {
    window.location.href = "login.php";
  }

  const API = "api";

  const form = document.getElementById("formProyecto");
  const proyectoId = document.getElementById("proyectoId");
  const tituloInput = document.getElementById("tituloInput");
  const descripcionInput = document.getElementById("descripcionInput");
  const imagenSelect = document.getElementById("imagenSelect");
  const ordenInput = document.getElementById("ordenInput");
  const formTitulo = document.getElementById("formTitulo");
  const btnGuardar = document.getElementById("btnGuardar");
  const btnCancelar = document.getElementById("btnCancelar");
  const statusAlert = document.getElementById("statusAlert");
  const listaProyectos = document.getElementById("listaProyectos");

  function mostrarAlerta(mensaje, tipo) {
    statusAlert.textContent = mensaje;
    statusAlert.className = "text-sm rounded-md px-3 py-2 mb-4 border";
    if (tipo === "ok") {
      statusAlert.classList.add("bg-green-50", "text-green-700", "border-green-200");
    } else {
      statusAlert.classList.add("bg-red-50", "text-red-700", "border-red-200");
    }
  }

  function limpiarFormulario() {
    proyectoId.value = "";
    form.reset();
    ordenInput.value = 0;
    formTitulo.textContent = "Agregar nuevo proyecto";
    btnGuardar.textContent = "Guardar proyecto";
    btnCancelar.classList.add("hidden");
  }

 
  async function cargarImagenesSelect() {
    try {
      const resp = await fetch(`${API}/imagenes`);
      const data = await resp.json();
      if (!resp.ok) throw new Error();

      imagenSelect.innerHTML = '<option value="">Sin imagen</option>';
      data.forEach(img => {
        const opt = document.createElement("option");
        opt.value = img.id;
        opt.textContent = `${img.tipo === "video" ? "🎬" : "🖼️"} ${img.nombre_archivo}`;
        imagenSelect.appendChild(opt);
      });
    } catch (err) {
    
    }
  }

  async function cargarProyectos() {
    listaProyectos.innerHTML = `<p class="text-xs text-gray-400 py-2">Cargando proyectos...</p>`;

    try {
      const resp = await fetch(`${API}/proyectos?todos=1`, {
        headers: { "Authorization": `Bearer ${token}` }
      });
      const data = await resp.json();
      if (!resp.ok) throw new Error(data.error || "No se pudo cargar la lista.");

      if (data.length === 0) {
        listaProyectos.innerHTML = `<p class="text-xs text-gray-400 py-2">No hay proyectos registrados todavía.</p>`;
        return;
      }

      listaProyectos.innerHTML = "";
      data.forEach(p => {
        const div = document.createElement("div");
        div.className = "bg-white border border-gray-200 rounded-lg p-4 text-sm";
        div.innerHTML = `
          <div class="flex justify-between items-start gap-3">
            <div class="min-w-0">
              <div class="flex items-center gap-2">
                <span class="font-bold text-[#012d1d]">${p.titulo}</span>
                ${p.activo ? '<span class="text-[10px] bg-green-100 text-green-700 px-2 py-0.5 rounded-full">Activo</span>' : '<span class="text-[10px] bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full">De baja</span>'}
              </div>
              <p class="text-gray-500 text-xs mt-1 line-clamp-2">${p.descripcion || "Sin descripción"}</p>
              <p class="text-gray-400 text-[11px] mt-1">Orden: ${p.orden ?? 0}${p.imagen_id ? " · Imagen #" + p.imagen_id : ""}</p>
            </div>
            <div class="flex flex-col gap-1 text-xs flex-shrink-0">
              <button data-action="editar" class="text-blue-600 hover:underline font-medium">Editar</button>
              <button data-action="estado" class="text-amber-600 hover:underline font-medium">${p.activo ? "Dar de baja" : "Dar de alta"}</button>
              <button data-action="eliminar" class="text-red-600 hover:underline font-medium">Eliminar</button>
            </div>
          </div>
        `;

        div.querySelector('[data-action="editar"]').addEventListener("click", () => {
          proyectoId.value = p.id;
          tituloInput.value = p.titulo;
          descripcionInput.value = p.descripcion || "";
          imagenSelect.value = p.imagen_id || "";
          ordenInput.value = p.orden ?? 0;
          formTitulo.textContent = `Editando: ${p.titulo}`;
          btnGuardar.textContent = "Actualizar proyecto";
          btnCancelar.classList.remove("hidden");
          window.scrollTo({ top: 0, behavior: "smooth" });
        });

        div.querySelector('[data-action="estado"]').addEventListener("click", async () => {
          try {
            const resp = await fetch(`${API}/proyectos/${p.id}/estado`, {
              method: "PATCH",
              headers: {
                "Content-Type": "application/json",
                "Authorization": `Bearer ${token}`
              },
              body: JSON.stringify({ activo: !p.activo }),
            });
            const data = await resp.json();
            if (!resp.ok) throw new Error(data.error || "No se pudo cambiar el estado.");
            cargarProyectos();
          } catch (err) {
            mostrarAlerta(err.message, "error");
          }
        });

        div.querySelector('[data-action="eliminar"]').addEventListener("click", async () => {
          if (!confirm(`¿Eliminar definitivamente "${p.titulo}"? Esta acción no se puede deshacer.`)) return;
          try {
            const resp = await fetch(`${API}/proyectos/${p.id}`, {
              method: "DELETE",
              headers: { "Authorization": `Bearer ${token}` }
            });
            const data = await resp.json();
            if (!resp.ok) throw new Error(data.error || "No se pudo eliminar.");
            cargarProyectos();
          } catch (err) {
            mostrarAlerta(err.message, "error");
          }
        });

        listaProyectos.appendChild(div);
      });

    } catch (err) {
      listaProyectos.innerHTML = `<p class="text-xs text-red-500 py-2">${err.message}</p>`;
    }
  }

 
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    btnGuardar.disabled = true;
    const editando = !!proyectoId.value;
    btnGuardar.textContent = editando ? "Actualizando..." : "Guardando...";

    const payload = {
      titulo: tituloInput.value.trim(),
      descripcion: descripcionInput.value.trim(),
      imagen_id: imagenSelect.value || null,
      orden: parseInt(ordenInput.value, 10) || 0,
    };

    try {
      const url = editando ? `${API}/proyectos/${proyectoId.value}` : `${API}/proyectos`;
      const method = editando ? "PUT" : "POST";

      const resp = await fetch(url, {
        method,
        headers: {
          "Content-Type": "application/json",
          "Authorization": `Bearer ${token}`
        },
        body: JSON.stringify(payload),
      });

      const data = await resp.json();
      if (!resp.ok) throw new Error(data.error || "No se pudo guardar el proyecto.");

      mostrarAlerta(editando ? "Proyecto actualizado correctamente." : "Proyecto creado correctamente.", "ok");
      limpiarFormulario();
      cargarProyectos();

    } catch (err) {
      mostrarAlerta(err.message, "error");
    } finally {
      btnGuardar.disabled = false;
      btnGuardar.textContent = editando ? "Actualizar proyecto" : "Guardar proyecto";
    }
  });

  btnCancelar.addEventListener("click", limpiarFormulario);

  document.getElementById("btnLogout").addEventListener("click", () => {
    sessionStorage.clear();
    window.location.href = "inicio.php";
  });


  cargarImagenesSelect();
  cargarProyectos();
</script>

</body>
</html>
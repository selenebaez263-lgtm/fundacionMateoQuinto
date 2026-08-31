<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editor de contenido | Mateo Quinto A.C.</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#faf9f7] min-h-screen">

<header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
  <div class="flex items-center gap-3">
    <img src="logo.png" alt="Mateo Quinto A.C." class="h-9 w-auto">
    <span class="font-bold text-[#012d1d]">Editor de contenido</span>
  </div>
  <div class="flex items-center gap-4 text-sm">
    <a href="dashboard.php" class="text-gray-600 hover:underline">← Volver al panel</a>
    <button id="btnLogout" class="text-gray-500 hover:underline">Cerrar sesión</button>
  </div>
</header>

<main class="w-full max-w-6xl mx-auto px-6 py-10">

  <div class="flex justify-center mb-6">
    <select id="selectPagina" class="border border-gray-300 rounded-md px-4 py-2 bg-white font-medium text-[#012d1d] focus:outline-none">
      <option value="inicio">Inicio</option>
      <option value="objetivos">Quiénes somos (Objetivos)</option>
      <option value="nuestra_labor">Nuestra obra</option>
      <option value="proyectos">Proyectos</option>
      <option value="productos">Productos</option>
      <option value="contacto">Contacto</option>
    </select>
  </div>

  <div class="mb-6">
    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 text-center">Secciones editables en esta página (clic para usarla)</p>
    <div id="chipsSecciones" class="flex flex-wrap justify-center gap-2"></div>
  </div>

  <div class="flex items-center justify-center gap-3 mb-6 text-sm text-gray-500">
    <span class="font-bold text-[#012d1d]">Editor de textos</span>
    <span>·</span>
    <a href="panel-proyectos.php" class="hover:text-[#012d1d] hover:underline">Ir a Proyectos</a>
    <span>·</span>
    <a href="panel-imagenes.php" class="hover:text-[#012d1d] hover:underline">Ir a Imágenes y video</a>
  </div>

  <div id="textosExistentes" class="mb-6 space-y-3"></div>

  <div class="bg-white border border-dashed border-gray-400 rounded-xl p-6 shadow-sm">
    <h2 class="font-bold text-[#012d1d] mb-4">Agregar / actualizar texto</h2>
    
    <div id="statusAlert" class="hidden text-sm rounded-md px-3 py-2 mb-4 border"></div>

    <form id="formTexto" class="space-y-4">
      <div>
        <label class="block text-xs font-semibold text-gray-600 mb-1">Sección o Nombre del Campo (ej: hero_titulo, descripcion_producto)</label>
        <input id="seccionInput" type="text" required class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="Ingresa la sección...">
        <p id="seccionAyuda" class="text-xs text-gray-500 mt-1 italic"></p>
      </div>

      <div>
        <label class="block text-xs font-semibold text-gray-600 mb-1">Contenido</label>
        <textarea id="contenidoInput" rows="4" required class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="Escribe el texto aquí..."></textarea>
      </div>

      <button id="btnGuardar" type="submit" class="bg-[#012d1d] text-white rounded-md px-5 py-2 text-sm font-medium hover:opacity-90 transition-opacity">
        Guardar texto
      </button>
    </form>
  </div>

</main>

<script>
  const token = sessionStorage.getItem("mq_token");
  if (!token) {
    window.location.href = "login.php";
  }

  // Secciones que ya están conectadas al sitio público (data-txt) para cada página.
  // Si guardas un texto con una de estas claves, se reflejará automáticamente
  // en la página pública correspondiente al recargarla.
  const SECCIONES_POR_PAGINA = {
    inicio: ["hero_tagline", "hero_descripcion", "objetivo_titulo", "objetivo_texto", "feature1_titulo", "feature1_texto", "feature2_titulo", "feature2_texto", "valores_titulo", "valores_texto"],
    objetivos: ["hero_titulo", "mision_texto", "vision_texto", "cta_titulo", "cta_texto"],
    nuestra_labor: ["hero_titulo", "hero_texto", "objetivos_titulo", "objetivos_texto", "objetivo1_titulo", "objetivo1_texto", "objetivo2_titulo", "objetivo2_texto", "objetivo3_titulo", "objetivo3_texto", "objetivo4_titulo", "objetivo4_texto", "atencion_titulo", "atencion_texto", "logros_titulo", "logros_texto", "cta_titulo", "cta_texto"],
    proyectos: ["hero_titulo", "hero_texto", "cta_titulo", "cta_texto"],
    productos: ["hero_titulo", "hero_texto", "producto1_titulo", "producto1_texto", "producto2_titulo", "producto2_texto", "producto3_titulo", "producto3_texto", "producto4_titulo", "producto4_texto", "producto5_titulo", "producto5_texto", "producto6_titulo", "producto6_texto", "cierre_titulo", "cierre_texto"],
    contacto: ["hero_titulo", "hero_texto", "form_titulo", "info_titulo", "frase_cierre"],
  };

  // Descripción legible de cada campo, para que el usuario sepa qué texto
  // está modificando sin tener que adivinarlo a partir de la clave técnica.
  const ETIQUETAS_POR_PAGINA = {
    inicio: {
      hero_tagline: "Frase principal sobre el video de portada",
      hero_descripcion: "Descripción debajo de la frase principal",
      objetivo_titulo: "Título de la sección \"Nuestro objetivo\"",
      objetivo_texto: "Párrafo de la sección \"Nuestro objetivo\"",
      feature1_titulo: "Título de la 1ª característica destacada",
      feature1_texto: "Descripción de la 1ª característica destacada",
      feature2_titulo: "Título de la 2ª característica destacada",
      feature2_texto: "Descripción de la 2ª característica destacada",
      valores_titulo: "Título de la sección de valores",
      valores_texto: "Texto introductorio de la sección de valores",
    },
    objetivos: {
      hero_titulo: "Título principal de la página \"Quiénes somos\"",
      mision_texto: "Texto de la Misión",
      vision_texto: "Texto de la Visión",
      cta_titulo: "Título de la llamada a la acción (final de página)",
      cta_texto: "Texto de la llamada a la acción (final de página)",
    },
    nuestra_labor: {
      hero_titulo: "Título principal de \"Nuestra obra\"",
      hero_texto: "Texto debajo del título principal",
      objetivos_titulo: "Título de la sección de objetivos (rueda)",
      objetivos_texto: "Texto introductorio de la sección de objetivos",
      objetivo1_titulo: "Título del objetivo 1 (rueda de programas)",
      objetivo1_texto: "Descripción del objetivo 1 (rueda de programas)",
      objetivo2_titulo: "Título del objetivo 2 (rueda de programas)",
      objetivo2_texto: "Descripción del objetivo 2 (rueda de programas)",
      objetivo3_titulo: "Título del objetivo 3 (rueda de programas)",
      objetivo3_texto: "Descripción del objetivo 3 (rueda de programas)",
      objetivo4_titulo: "Título del objetivo 4 (rueda de programas)",
      objetivo4_texto: "Descripción del objetivo 4 (rueda de programas)",
      atencion_titulo: "Título de la sección de atención integral",
      atencion_texto: "Texto de la sección de atención integral",
      logros_titulo: "Título de la sección de logros",
      logros_texto: "Texto de la sección de logros",
      cta_titulo: "Título de la llamada a la acción (final de página)",
      cta_texto: "Texto de la llamada a la acción (final de página)",
    },
    proyectos: {
      hero_titulo: "Título principal de la página de Proyectos",
      hero_texto: "Texto debajo del título principal",
      cta_titulo: "Título de la llamada a la acción (final de página)",
      cta_texto: "Texto de la llamada a la acción (final de página)",
    },
    productos: {
      hero_titulo: "Título principal de la página de Productos",
      hero_texto: "Texto debajo del título principal",
      producto1_titulo: "Nombre del producto 1 (tarjeta)",
      producto1_texto: "Descripción del producto 1 (tarjeta)",
      producto2_titulo: "Nombre del producto 2 (tarjeta)",
      producto2_texto: "Descripción del producto 2 (tarjeta)",
      producto3_titulo: "Nombre del producto 3 (tarjeta)",
      producto3_texto: "Descripción del producto 3 (tarjeta)",
      producto4_titulo: "Nombre del producto 4 (tarjeta)",
      producto4_texto: "Descripción del producto 4 (tarjeta)",
      producto5_titulo: "Nombre del producto 5 (tarjeta)",
      producto5_texto: "Descripción del producto 5 (tarjeta)",
      producto6_titulo: "Nombre del producto 6 (tarjeta)",
      producto6_texto: "Descripción del producto 6 (tarjeta)",
      cierre_titulo: "Título de cierre al final de la página",
      cierre_texto: "Texto de cierre al final de la página",
    },
    contacto: {
      hero_titulo: "Título principal de la página de Contacto",
      hero_texto: "Texto debajo del título principal",
      form_titulo: "Título del formulario de contacto",
      info_titulo: "Título de la sección de información de contacto",
      frase_cierre: "Frase de cierre al final de la página",
    },
  };

  function obtenerEtiqueta(pagina, clave) {
    return (ETIQUETAS_POR_PAGINA[pagina] && ETIQUETAS_POR_PAGINA[pagina][clave]) || clave;
  }

  function renderChipsSecciones() {
    const contenedor = document.getElementById("chipsSecciones");
    const pagina = selectPagina.value;
    const claves = SECCIONES_POR_PAGINA[pagina] || [];
    contenedor.innerHTML = "";
    claves.forEach(clave => {
      const chip = document.createElement("button");
      chip.type = "button";
      chip.title = `Clave técnica: ${clave}`;
      chip.className = "flex flex-col items-start text-left bg-white border border-gray-300 rounded-lg px-3 py-1.5 hover:border-[#012d1d] transition-colors max-w-[220px]";
      chip.innerHTML = `
        <span class="text-xs font-medium text-gray-700 leading-snug">${obtenerEtiqueta(pagina, clave)}</span>
        <span class="text-[10px] font-mono text-gray-400">${clave}</span>
      `;
      chip.addEventListener("click", () => {
        const input = document.getElementById("seccionInput");
        input.value = clave;
        input.dispatchEvent(new Event("input"));
        document.getElementById("contenidoInput").focus();
      });
      contenedor.appendChild(chip);
    });
  }

  // Detectar la página por parámetros de la URL o usar el select
  const urlParams = new URLSearchParams(window.location.search);
  const paginaParam = urlParams.get('pagina') || 'productos';
  const selectPagina = document.getElementById("selectPagina");
  selectPagina.value = paginaParam;

  selectPagina.addEventListener("change", (e) => {
    window.location.href = `editor.php?pagina=${e.target.value}`;
  });

  // Cargar contenidos existentes
  async function cargarContenido() {
    const contenedor = document.getElementById("textosExistentes");
    const pagina = selectPagina.value;

    try {
      const resp = await fetch(`api/contenido/${pagina}`, { cache: "no-store" });
      const data = await resp.json();

      if (!resp.ok) throw new Error();

      if (data.length === 0) {
        contenedor.innerHTML = `<p class="text-center text-xs text-gray-400 py-2">No hay textos guardados para esta página aún.</p>`;
        return;
      }

      contenedor.innerHTML = `<h3 class="text-xs font-bold text-gray-500 uppercase">Textos guardados en "${pagina}":</h3>`;
      data.forEach(item => {
        const div = document.createElement("div");
        div.className = "bg-white border border-gray-200 rounded-lg p-3 text-sm flex justify-between items-center hover:border-[#012d1d]";
        const info = document.createElement("div");
        info.className = "min-w-0 cursor-pointer flex-1";
        info.innerHTML = `
            <span class="font-bold text-[#012d1d] block text-xs">${obtenerEtiqueta(pagina, item.seccion)}</span>
            <span class="text-gray-400 block text-[10px] font-mono">${item.seccion}</span>
            <span class="text-gray-600 text-xs line-clamp-1">${item.contenido}</span>
        `;
        info.onclick = () => {
          const input = document.getElementById("seccionInput");
          input.value = item.seccion;
          input.dispatchEvent(new Event("input"));
          document.getElementById("contenidoInput").value = item.contenido;
          document.getElementById("contenidoInput").scrollIntoView({ behavior: "smooth", block: "center" });
        };

        const acciones = document.createElement("div");
        acciones.className = "flex items-center gap-3 flex-shrink-0 pl-3";

        const btnEditar = document.createElement("span");
        btnEditar.className = "text-xs text-blue-600 font-medium hover:underline cursor-pointer";
        btnEditar.textContent = "Editar";
        btnEditar.onclick = info.onclick;

        const btnEliminar = document.createElement("button");
        btnEliminar.type = "button";
        btnEliminar.className = "text-xs text-red-600 font-medium hover:underline";
        btnEliminar.textContent = "Eliminar";
        btnEliminar.onclick = async () => {
          if (!confirm(`¿Eliminar el texto "${item.seccion}"? Esta acción no se puede deshacer.`)) return;
          try {
            const resp = await fetch(`api/contenido/${item.id}`, {
              method: "DELETE",
              headers: { "Authorization": `Bearer ${token}` }
            });
            const data = await resp.json();
            if (!resp.ok) throw new Error(data.error || "No se pudo eliminar.");
            cargarContenido();
          } catch (err) {
            mostrarAlerta(err.message);
          }
        };

        acciones.appendChild(btnEditar);
        acciones.appendChild(btnEliminar);
        div.appendChild(info);
        div.appendChild(acciones);
        contenedor.appendChild(div);
      });

    } catch (err) {
      contenedor.innerHTML = `<p class="text-center text-xs text-red-500">Error al cargar datos.</p>`;
    }
  }

  function mostrarAlerta(mensaje, tipo) {
    const alertBox = document.getElementById("statusAlert");
    alertBox.textContent = mensaje;
    alertBox.className = "text-sm rounded-md px-3 py-2 mb-4 border";
    if (tipo === "ok") {
      alertBox.classList.add("bg-green-50", "text-green-700", "border-green-200");
    } else {
      alertBox.classList.add("bg-red-50", "text-red-700", "border-red-200");
    }
  }

  // Guardar/Actualizar
  document.getElementById("formTexto").addEventListener("submit", async (e) => {
    e.preventDefault();
    const btn = document.getElementById("btnGuardar");
    const seccion = document.getElementById("seccionInput").value.trim();
    const contenido = document.getElementById("contenidoInput").value.trim();
    const pagina = selectPagina.value;

    document.getElementById("statusAlert").className = "hidden text-sm rounded-md px-3 py-2 mb-4 border";
    btn.disabled = true;
    btn.textContent = "Guardando...";

    try {
      const resp = await fetch("api/contenido", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Authorization": `Bearer ${token}`
        },
        body: JSON.stringify({ pagina, seccion, contenido }),
      });

      const data = await resp.json();

      if (!resp.ok) {
        throw new Error(data.error || "No se pudo guardar.");
      }

      mostrarAlerta(data.message, "ok");
      
      // Limpiar y recargar lista
      document.getElementById("seccionInput").value = "";
      document.getElementById("contenidoInput").value = "";
      cargarContenido();

    } catch (err) {
      mostrarAlerta(err.message, "error");
    } finally {
      btn.disabled = false;
      btn.textContent = "Guardar texto";
    }
  });

  document.getElementById("btnLogout").addEventListener("click", () => {
    sessionStorage.clear();
    window.location.href = "inicio.php";
  });

  // Muestra qué texto del sitio corresponde a la clave escrita/seleccionada
  document.getElementById("seccionInput").addEventListener("input", (e) => {
    const ayuda = document.getElementById("seccionAyuda");
    const clave = e.target.value.trim();
    const pagina = selectPagina.value;
    const etiqueta = clave && ETIQUETAS_POR_PAGINA[pagina] ? ETIQUETAS_POR_PAGINA[pagina][clave] : null;
    ayuda.textContent = etiqueta ? `→ Este campo corresponde a: ${etiqueta}` : "";
  });

  // Inicializar
  renderChipsSecciones();
  cargarContenido();
</script>

</body>
</html>
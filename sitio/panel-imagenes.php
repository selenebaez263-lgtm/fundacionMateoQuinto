<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Imágenes y video | Mateo Quinto A.C.</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#faf9f7] min-h-screen">

<header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
  <div class="flex items-center gap-3">
    <img src="logo.png" alt="Mateo Quinto A.C." class="h-9 w-auto">
    <span class="font-bold text-[#012d1d]">Panel de Imágenes y video</span>
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
    <a href="panel-proyectos.php" class="hover:text-[#012d1d] hover:underline">Ir a Proyectos</a>
    <span>·</span>
    <span class="font-bold text-[#012d1d]">Imágenes y video</span>
  </div>

  <div id="statusAlert" class="hidden text-sm rounded-md px-3 py-2 mb-6 border"></div>

  <!-- ======================================================= -->
  <!-- 1. ASIGNAR IMAGEN A UNA SECCIÓN DEL SITIO (esto es lo que realmente cambia lo que se ve en la página pública) -->
  <!-- ======================================================= -->
  <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm mb-8">
    <h2 class="font-bold text-[#012d1d] mb-1">Cambiar una imagen o video del sitio</h2>
    <p class="text-xs text-gray-500 mb-5">Elige la página y la sección que quieres cambiar, después sube un archivo nuevo o elige uno ya subido. El cambio se aplicará automáticamente en el sitio público.</p>

    <div class="flex justify-center mb-6">
      <select id="selectPaginaImg" class="border border-gray-300 rounded-md px-4 py-2 bg-white font-medium text-[#012d1d] focus:outline-none">
        <option value="inicio">Inicio</option>
        <option value="objetivos">Quiénes somos (Objetivos)</option>
        <option value="nuestra_labor">Nuestra obra</option>
        <option value="proyectos">Proyectos</option>
        <option value="productos">Productos</option>
        <option value="contacto">Contacto</option>
      </select>
    </div>

    <div class="mb-6">
      <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 text-center">Secciones con imagen o video en esta página (clic para elegirla)</p>
      <div id="chipsSeccionesImg" class="flex flex-wrap justify-center gap-2"></div>
    </div>

    <div id="seccionImgActiva" class="hidden border-t border-gray-200 pt-6">
      <div class="grid md:grid-cols-2 gap-6">
        <div>
          <p class="text-xs font-semibold text-gray-600 mb-2">Sección seleccionada</p>
          <p id="etiquetaSeccionActiva" class="font-bold text-[#012d1d] mb-1"></p>
          <p id="estadoSeccionActiva" class="text-xs text-gray-500 mb-4"></p>

          <div id="previewActual" class="w-full h-40 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center mb-3"></div>

          <button id="btnRestaurar" type="button" class="hidden text-xs text-red-600 hover:underline">Restaurar imagen/video original</button>
        </div>

        <div>
          <label class="block text-xs font-semibold text-gray-600 mb-1">Subir un archivo nuevo para esta sección</label>
          <input id="archivoSeccionInput" type="file" accept=".jpg,.jpeg,.png,.webp,.mp4,.webm" class="w-full text-sm border border-gray-300 rounded-md px-3 py-2 mb-3 focus:outline-none focus:border-[#012d1d]">
          <button id="btnSubirParaSeccion" type="button" class="w-full bg-[#012d1d] text-white rounded-md px-5 py-2 text-sm font-medium hover:opacity-90 transition-opacity mb-4">
            Subir y usar en esta sección
          </button>

          <p class="text-xs font-semibold text-gray-600 mb-2">O elige un archivo ya subido a la biblioteca</p>
          <div id="galeriaSeleccion" class="grid grid-cols-3 gap-2 max-h-48 overflow-y-auto border border-gray-200 rounded-lg p-2"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- ======================================================= -->
  <!-- 2. BIBLIOTECA GENERAL DE ARCHIVOS -->
  <!-- ======================================================= -->
  <div class="bg-white border border-dashed border-gray-400 rounded-xl p-6 shadow-sm mb-8">
    <h2 class="font-bold text-[#012d1d] mb-4">Subir imagen o video a la biblioteca</h2>

    <form id="formSubir" class="space-y-4">
      <div>
        <label class="block text-xs font-semibold text-gray-600 mb-1">Archivo (JPG, PNG, WEBP, MP4 o WEBM)</label>
        <input id="archivoInput" type="file" accept=".jpg,.jpeg,.png,.webp,.mp4,.webm" required class="w-full text-sm border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-[#012d1d]">
      </div>

      <div>
        <label class="block text-xs font-semibold text-gray-600 mb-1">Descripción (opcional)</label>
        <input id="descripcionInput" type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#012d1d]" placeholder="ej. Banner principal de inicio">
      </div>

      <button id="btnSubir" type="submit" class="bg-[#012d1d] text-white rounded-md px-5 py-2 text-sm font-medium hover:opacity-90 transition-opacity">
        Subir archivo
      </button>
    </form>
  </div>

  <h2 class="font-bold text-[#012d1d] mb-4">Archivos subidos</h2>
  <div id="galeria" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4"></div>

</main>

<script>
  const token = sessionStorage.getItem("mq_token");
  if (!token) {
    window.location.href = "login.php";
  }

  const API = "api";

  // Secciones de imagen/video conectadas al sitio público (data-img, data-bg,
  // data-poster, data-video). Guardar una ruta con una de estas claves en la
  // tabla contenido_paginas hace que se refleje automáticamente en la página
  // pública correspondiente al recargarla (vía auto-imagenes.js).
  const SECCIONES_IMG_POR_PAGINA = {
    inicio: [
      { clave: "img_joven_cuidando_la_crianza_de", etiqueta: "Joven cuidando la crianza de codornices", tipo: "img", predeterminada: "img/1.jpg" },
      { clave: "img_celebracion_comunitaria_con", etiqueta: "Celebración comunitaria con piñata", tipo: "img", predeterminada: "img/2.jpg" },
      { clave: "img_jovenes_jugando_basquetbol_e", etiqueta: "Jóvenes jugando basquetbol en comunidad", tipo: "img", predeterminada: "img/3.jpg" },
      { clave: "img_taller_comunitario", etiqueta: "Taller comunitario", tipo: "img", predeterminada: "img/4.jpg" },
      { clave: "video_poster", etiqueta: "Imagen de portada del video de inicio", tipo: "poster", predeterminada: "img/videoinicio.jpg" },
      { clave: "video_src", etiqueta: "Video de fondo de inicio", tipo: "video", predeterminada: "video/inicio.mp4" }
    ],
    objetivos: [
      { clave: "bg_hero", etiqueta: "Fondo del encabezado (Quiénes somos)", tipo: "bg", predeterminada: "img/gimnasio.jpg" }
    ],
    nuestra_labor: [
      { clave: "img_nuestra_obra_mateo_quinto_a", etiqueta: "Nuestra Obra - Mateo Quinto A.C.", tipo: "img", predeterminada: "img/hogares-cabanas.jpg" },
      { clave: "img_joven_cuidando_la_crianza_de", etiqueta: "Joven cuidando la crianza de codornices", tipo: "img", predeterminada: "img/1.jpg" },
      { clave: "img_celebracion_comunitaria_con", etiqueta: "Celebración comunitaria con piñata", tipo: "img", predeterminada: "img/2.jpg" },
      { clave: "img_jovenes_jugando_basquetbol_e", etiqueta: "Jóvenes jugando basquetbol en comunidad", tipo: "img", predeterminada: "img/3.jpg" },
      { clave: "img_taller_comunitario", etiqueta: "Taller comunitario", tipo: "img", predeterminada: "img/4.jpg" }
    ],
    proyectos: [
      { clave: "img_reforestacion_comunitaria_en", etiqueta: "Reforestación comunitaria en la comunidad Mateo Quinto", tipo: "img", predeterminada: "img/ecotecnologia.jpg" },
      { clave: "img_hogares_de_vida_independient", etiqueta: "Hogares de vida independiente en la comunidad Mateo Quinto", tipo: "img", predeterminada: "img/hogares-cabanas.jpg" },
      { clave: "img_conejo_en_la_granja_de_la_co", etiqueta: "Conejo en la granja de la comunidad Mateo Quinto", tipo: "img", predeterminada: "img/granja-conejos-aves.jpg" },
      { clave: "img_gallinas_en_la_granja_de_la", etiqueta: "Gallinas en la granja de la comunidad Mateo Quinto", tipo: "img", predeterminada: "img/codorniz1.jpg" },
      { clave: "img_codornices_en_la_granja_de_l", etiqueta: "Codornices en la granja de la comunidad Mateo Quinto", tipo: "img", predeterminada: "img/gallina1.jpg" },
      { clave: "img_jitomates_cultivados_en_el_i", etiqueta: "Jitomates cultivados en el invernadero de la comunidad Mateo Quinto", tipo: "img", predeterminada: "img/cultivos-invernadero-jitomates.jpg" },
      { clave: "img_invernadero_de_la_comunidad", etiqueta: "Invernadero de la comunidad Mateo Quinto", tipo: "img", predeterminada: "img/fr1.jpg" },
      { clave: "img_cultivos_de_la_comunidad_mat", etiqueta: "Cultivos de la comunidad Mateo Quinto", tipo: "img", predeterminada: "img/fr4.jpg" },
      { clave: "video_poster_hero", etiqueta: "Imagen de portada del video del encabezado", tipo: "poster", predeterminada: "video/mq-banner-poster.jpg" },
      { clave: "video_src_hero", etiqueta: "Video de fondo del encabezado", tipo: "video", predeterminada: "video/mq-banner-proyectos.mp4" },
      { clave: "bg_cta", etiqueta: "Fondo de la sección final (llamada a la acción)", tipo: "bg", predeterminada: "img/panoramica.jpg" }
    ],
    productos: [
      { clave: "img_cesta_de_tilapia_fresca_de_m", etiqueta: "Cesta de tilapia fresca de Mateo Quinto A.C.", tipo: "img", predeterminada: "img/catalogo-6-tilapia.jpg" },
      { clave: "img_cesta_de_tilapia_fresca_de_m_2", etiqueta: "Cesta de tilapia fresca de Mateo Quinto A.C.", tipo: "img", predeterminada: "img/pez1.jpg" },
      { clave: "img_cesta_de_tilapia_fresca_de_m_3", etiqueta: "Cesta de tilapia fresca de Mateo Quinto A.C.", tipo: "img", predeterminada: "img/pez2.jpg" },
      { clave: "img_cesta_de_tilapia_fresca_de_m_4", etiqueta: "Cesta de tilapia fresca de Mateo Quinto A.C.", tipo: "img", predeterminada: "img/pez3.jpg" },
      { clave: "img_cuidado_de_aves_en_el_bosque", etiqueta: "Cuidado de aves en el bosque de la comunidad", tipo: "img", predeterminada: "img/cuidado-aves-bosque.jpg" },
      { clave: "img_crianza_de_aves_en_la_granja", etiqueta: "Crianza de aves en la granja", tipo: "img", predeterminada: "img/catalogo-1-cria-aves.jpg" },
      { clave: "img_crianza_de_aves_en_la_granja_2", etiqueta: "Crianza de aves en la granja", tipo: "img", predeterminada: "img/gallina1.jpg" },
      { clave: "img_crianza_de_aves_en_la_granja_3", etiqueta: "Crianza de aves en la granja", tipo: "img", predeterminada: "img/gallina2.jpg" },
      { clave: "img_cesta_de_huevo_de_codorniz_d", etiqueta: "Cesta de huevo de codorniz de Mateo Quinto A.C.", tipo: "img", predeterminada: "img/catalogo-7-huevo-codorniz.jpg" },
      { clave: "img_cesta_de_huevo_de_codorniz_d_2", etiqueta: "Cesta de huevo de codorniz de Mateo Quinto A.C.", tipo: "img", predeterminada: "img/codorniz1.jpg" },
      { clave: "img_cesta_de_huevo_de_codorniz_d_3", etiqueta: "Cesta de huevo de codorniz de Mateo Quinto A.C.", tipo: "img", predeterminada: "img/codorniz2.jpg" },
      { clave: "img_cesta_de_huevo_de_codorniz_d_4", etiqueta: "Cesta de huevo de codorniz de Mateo Quinto A.C.", tipo: "img", predeterminada: "img/codorniz3.jpg" },
      { clave: "img_cesta_de_huevo_de_gallina_de", etiqueta: "Cesta de huevo de gallina de Mateo Quinto A.C.", tipo: "img", predeterminada: "img/catalogo-4-huevo-gallina.jpg" },
      { clave: "img_gallinas_en_libre_pastoreo", etiqueta: "Gallinas en libre pastoreo", tipo: "img", predeterminada: "img/huevo1.jpg" },
      { clave: "img_gallinas_en_libre_pastoreo_2", etiqueta: "Gallinas en libre pastoreo", tipo: "img", predeterminada: "img/huevo2.jpg" },
      { clave: "img_gallinas_en_libre_pastoreo_3", etiqueta: "Gallinas en libre pastoreo", tipo: "img", predeterminada: "img/huevo3.jpg" },
      { clave: "img_fresas_cosechadas_en_el_inve", etiqueta: "Fresas cosechadas en el invernadero", tipo: "img", predeterminada: "img/fr3.jpg" },
      { clave: "img_invernadero_de_fresas_de_la", etiqueta: "Invernadero de fresas de la comunidad", tipo: "img", predeterminada: "img/fr2.jpg" },
      { clave: "img_invernadero_de_fresas_de_la_2", etiqueta: "Invernadero de fresas de la comunidad", tipo: "img", predeterminada: "img/fr1.jpg" },
      { clave: "img_invernadero_de_fresas_de_la_3", etiqueta: "Invernadero de fresas de la comunidad", tipo: "img", predeterminada: "img/fr4.jpg" },
      { clave: "img_fresas_cosechadas_en_el_inve_2", etiqueta: "Fresas cosechadas en el invernadero", tipo: "img", predeterminada: "img/invernadero-jitomates.jpg" },
      { clave: "img_invernadero_de_fresas_de_la_4", etiqueta: "Invernadero de fresas de la comunidad", tipo: "img", predeterminada: "img/jitomate.jpg" },
      { clave: "img_invernadero_de_fresas_de_la_5", etiqueta: "Invernadero de fresas de la comunidad", tipo: "img", predeterminada: "img/2jitomate.jpg" },
      { clave: "img_invernadero_de_fresas_de_la_6", etiqueta: "Invernadero de fresas de la comunidad", tipo: "img", predeterminada: "img/jitomateverde.jpg" },
      { clave: "bg_hero", etiqueta: "Fondo del encabezado (Productos)", tipo: "bg", predeterminada: "img/gallina1.jpg" }
    ],
    contacto: [
      { clave: "img_cultivos_en_el_invernadero_c", etiqueta: "Cultivos en el invernadero comunitario de Mateo Quinto A.C.", tipo: "img", predeterminada: "img/invernadero-jitomates.jpg" },
      { clave: "bg_hero", etiqueta: "Fondo del encabezado (Contacto)", tipo: "bg", predeterminada: "img/contacto.jpg" }
    ]
  };

  const selectPaginaImg = document.getElementById("selectPaginaImg");
  const chipsSeccionesImg = document.getElementById("chipsSeccionesImg");
  const seccionImgActiva = document.getElementById("seccionImgActiva");
  const etiquetaSeccionActiva = document.getElementById("etiquetaSeccionActiva");
  const estadoSeccionActiva = document.getElementById("estadoSeccionActiva");
  const previewActual = document.getElementById("previewActual");
  const btnRestaurar = document.getElementById("btnRestaurar");
  const archivoSeccionInput = document.getElementById("archivoSeccionInput");
  const btnSubirParaSeccion = document.getElementById("btnSubirParaSeccion");
  const galeriaSeleccion = document.getElementById("galeriaSeleccion");

  let seccionSeleccionada = null; // { clave, etiqueta, tipo, predeterminada }
  let contenidoActualPagina = []; // respuesta de api/contenido/:pagina
  let galeriaCompleta = []; // respuesta de api/imagenes

  function mostrarAlerta(mensaje, tipo) {
    const statusAlert = document.getElementById("statusAlert");
    statusAlert.textContent = mensaje;
    statusAlert.className = "text-sm rounded-md px-3 py-2 mb-6 border";
    if (tipo === "ok") {
      statusAlert.classList.add("bg-green-50", "text-green-700", "border-green-200");
    } else {
      statusAlert.classList.add("bg-red-50", "text-red-700", "border-red-200");
    }
  }

  function esVideo(ruta) {
    return /\.(mp4|webm)$/i.test(ruta || "");
  }

  function renderPreview(ruta) {
    previewActual.innerHTML = "";
    if (!ruta) {
      previewActual.innerHTML = `<span class="text-xs text-gray-400">Sin vista previa</span>`;
      return;
    }
    if (esVideo(ruta)) {
      previewActual.innerHTML = `<video src="${ruta}" class="w-full h-full object-cover" muted autoplay loop playsinline></video>`;
    } else {
      previewActual.innerHTML = `<img src="${ruta}" class="w-full h-full object-cover">`;
    }
  }

  async function cargarContenidoPagina() {
    const pagina = selectPaginaImg.value;
    const resp = await fetch(`${API}/contenido/${pagina}`, { cache: "no-store" });
    contenidoActualPagina = resp.ok ? await resp.json() : [];
  }

  function obtenerOverride(clave) {
    return contenidoActualPagina.find(item => item.seccion === clave);
  }

  function renderChipsSeccionesImg() {
    const claves = SECCIONES_IMG_POR_PAGINA[selectPaginaImg.value] || [];
    chipsSeccionesImg.innerHTML = "";
    claves.forEach(sec => {
      const override = obtenerOverride(sec.clave);
      const chip = document.createElement("button");
      chip.type = "button";
      chip.textContent = sec.etiqueta + (override ? " ✓" : "");
      chip.className = "text-xs bg-white border border-gray-300 rounded-full px-3 py-1 text-gray-600 hover:border-[#012d1d] hover:text-[#012d1d] transition-colors" +
        (override ? " border-green-400 text-green-700" : "");
      chip.addEventListener("click", () => seleccionarSeccionImg(sec));
      chipsSeccionesImg.appendChild(chip);
    });
  }

  function seleccionarSeccionImg(sec) {
    seccionSeleccionada = sec;
    seccionImgActiva.classList.remove("hidden");
    etiquetaSeccionActiva.textContent = sec.etiqueta;

    const override = obtenerOverride(sec.clave);
    if (override && override.contenido) {
      estadoSeccionActiva.innerHTML = `<span class="text-green-700 font-medium">Personalizada</span> — se está usando una imagen distinta a la original.`;
      renderPreview(override.contenido);
      btnRestaurar.classList.remove("hidden");
      btnRestaurar.dataset.id = override.id;
    } else {
      estadoSeccionActiva.textContent = "Usando la imagen/video original del sitio.";
      renderPreview(sec.predeterminada);
      btnRestaurar.classList.add("hidden");
    }

    renderGaleriaSeleccion();
  }

  function renderGaleriaSeleccion() {
    galeriaSeleccion.innerHTML = "";
    if (galeriaCompleta.length === 0) {
      galeriaSeleccion.innerHTML = `<p class="col-span-3 text-[11px] text-gray-400 py-2 text-center">No hay archivos en la biblioteca todavía.</p>`;
      return;
    }
    galeriaCompleta.forEach(img => {
      const rutaCompleta = img.ruta.replace(/^\//, "");
      const item = document.createElement("button");
      item.type = "button";
      item.className = "border border-gray-200 rounded overflow-hidden hover:border-[#012d1d]";
      item.title = img.descripcion || img.nombre_archivo;
      item.innerHTML = img.tipo === "video"
        ? `<video src="${rutaCompleta}" class="w-full h-14 object-cover bg-black" muted></video>`
        : `<img src="${rutaCompleta}" class="w-full h-14 object-cover">`;
      item.addEventListener("click", () => asignarImagenASeccion(rutaCompleta));
      galeriaSeleccion.appendChild(item);
    });
  }

  async function asignarImagenASeccion(ruta) {
    if (!seccionSeleccionada) return;
    try {
      const resp = await fetch(`${API}/contenido`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Authorization": `Bearer ${token}`
        },
        body: JSON.stringify({
          pagina: selectPaginaImg.value,
          seccion: seccionSeleccionada.clave,
          contenido: ruta
        })
      });
      const data = await resp.json();
      if (!resp.ok) throw new Error(data.error || "No se pudo guardar.");

      mostrarAlerta(`Imagen actualizada para "${seccionSeleccionada.etiqueta}".`, "ok");
      await cargarContenidoPagina();
      renderChipsSeccionesImg();
      seleccionarSeccionImg(seccionSeleccionada);
    } catch (err) {
      mostrarAlerta(err.message, "error");
    }
  }

  btnSubirParaSeccion.addEventListener("click", async () => {
    if (!seccionSeleccionada) {
      mostrarAlerta("Primero elige una sección de la página.", "error");
      return;
    }
    const archivo = archivoSeccionInput.files[0];
    if (!archivo) {
      mostrarAlerta("Elige un archivo para subir.", "error");
      return;
    }

    btnSubirParaSeccion.disabled = true;
    btnSubirParaSeccion.textContent = "Subiendo...";

    try {
      const formData = new FormData();
      formData.append("imagen", archivo);
      formData.append("descripcion", seccionSeleccionada.etiqueta);

      const resp = await fetch(`${API}/imagenes`, {
        method: "POST",
        headers: { "Authorization": `Bearer ${token}` },
        body: formData
      });
      const data = await resp.json();
      if (!resp.ok) throw new Error(data.error || "No se pudo subir el archivo.");

      await asignarImagenASeccion(data.ruta.replace(/^\//, ""));
      await cargarGaleria();
      archivoSeccionInput.value = "";
    } catch (err) {
      mostrarAlerta(err.message, "error");
    } finally {
      btnSubirParaSeccion.disabled = false;
      btnSubirParaSeccion.textContent = "Subir y usar en esta sección";
    }
  });

  btnRestaurar.addEventListener("click", async () => {
    if (!seccionSeleccionada || !btnRestaurar.dataset.id) return;
    if (!confirm("¿Restaurar la imagen/video original de esta sección?")) return;
    try {
      const resp = await fetch(`${API}/contenido/${btnRestaurar.dataset.id}`, {
        method: "DELETE",
        headers: { "Authorization": `Bearer ${token}` }
      });
      const data = await resp.json();
      if (!resp.ok) throw new Error(data.error || "No se pudo restaurar.");

      mostrarAlerta("Se restauró la imagen/video original.", "ok");
      await cargarContenidoPagina();
      renderChipsSeccionesImg();
      seleccionarSeccionImg(seccionSeleccionada);
    } catch (err) {
      mostrarAlerta(err.message, "error");
    }
  });

  selectPaginaImg.addEventListener("change", async () => {
    seccionSeleccionada = null;
    seccionImgActiva.classList.add("hidden");
    await cargarContenidoPagina();
    renderChipsSeccionesImg();
  });

  // ======================================================
  // Biblioteca general (subir / listar / eliminar archivos)
  // ======================================================
  const formSubir = document.getElementById("formSubir");
  const archivoInput = document.getElementById("archivoInput");
  const descripcionInput = document.getElementById("descripcionInput");
  const btnSubir = document.getElementById("btnSubir");
  const galeria = document.getElementById("galeria");

  async function cargarGaleria() {
    galeria.innerHTML = `<p class="col-span-full text-xs text-gray-400 py-2">Cargando archivos...</p>`;

    try {
      const resp = await fetch(`${API}/imagenes`);
      const data = await resp.json();
      if (!resp.ok) throw new Error();
      galeriaCompleta = data;

      if (data.length === 0) {
        galeria.innerHTML = `<p class="col-span-full text-xs text-gray-400 py-2">No se ha subido ningún archivo todavía.</p>`;
        renderGaleriaSeleccion();
        return;
      }

      galeria.innerHTML = "";
      data.forEach(img => {
        const card = document.createElement("div");
        card.className = "bg-white border border-gray-200 rounded-lg overflow-hidden text-sm";

        const rutaCompleta = img.ruta.replace(/^\//, "");
        const preview = img.tipo === "video"
          ? `<video src="${rutaCompleta}" class="w-full h-32 object-cover bg-black" muted></video>`
          : `<img src="${rutaCompleta}" alt="${img.descripcion || img.nombre_archivo}" class="w-full h-32 object-cover">`;

        card.innerHTML = `
          ${preview}
          <div class="p-2">
            <p class="text-xs font-medium text-[#012d1d] truncate" title="${img.nombre_archivo}">${img.nombre_archivo}</p>
            <p class="text-[11px] text-gray-400 truncate">${img.descripcion || "Sin descripción"}</p>
            <div class="flex justify-between items-center mt-2">
              <button data-action="usar" class="text-[11px] text-green-700 hover:underline">Usar en sección</button>
              <button data-action="copiar" class="text-[11px] text-blue-600 hover:underline">Copiar ruta</button>
              <button data-action="eliminar" class="text-[11px] text-red-600 hover:underline">Eliminar</button>
            </div>
          </div>
        `;

        card.querySelector('[data-action="usar"]').addEventListener("click", () => {
          if (!seccionSeleccionada) {
            mostrarAlerta("Primero elige una sección de la página arriba.", "error");
            window.scrollTo({ top: 0, behavior: "smooth" });
            return;
          }
          asignarImagenASeccion(rutaCompleta);
        });

        card.querySelector('[data-action="copiar"]').addEventListener("click", () => {
          navigator.clipboard.writeText(rutaCompleta).then(() => {
            mostrarAlerta(`Ruta copiada: ${rutaCompleta}`, "ok");
          });
        });

        card.querySelector('[data-action="eliminar"]').addEventListener("click", async () => {
          if (!confirm(`¿Eliminar "${img.nombre_archivo}"? Esta acción no se puede deshacer.`)) return;
          try {
            const resp = await fetch(`${API}/imagenes/${img.id}`, {
              method: "DELETE",
              headers: { "Authorization": `Bearer ${token}` }
            });
            const data = await resp.json();
            if (!resp.ok) throw new Error(data.error || "No se pudo eliminar.");
            cargarGaleria();
          } catch (err) {
            mostrarAlerta(err.message, "error");
          }
        });

        galeria.appendChild(card);
      });

      renderGaleriaSeleccion();

    } catch (err) {
      galeria.innerHTML = `<p class="col-span-full text-xs text-red-500 py-2">Error al cargar los archivos.</p>`;
    }
  }

  formSubir.addEventListener("submit", async (e) => {
    e.preventDefault();
    const archivo = archivoInput.files[0];
    if (!archivo) return;

    btnSubir.disabled = true;
    btnSubir.textContent = "Subiendo...";

    const formData = new FormData();
    formData.append("imagen", archivo);
    formData.append("descripcion", descripcionInput.value.trim());

    try {
      const resp = await fetch(`${API}/imagenes`, {
        method: "POST",
        headers: { "Authorization": `Bearer ${token}` },
        body: formData,
      });

      const data = await resp.json();
      if (!resp.ok) throw new Error(data.error || "No se pudo subir el archivo.");

      mostrarAlerta("Archivo subido correctamente.", "ok");
      formSubir.reset();
      cargarGaleria();

    } catch (err) {
      mostrarAlerta(err.message, "error");
    } finally {
      btnSubir.disabled = false;
      btnSubir.textContent = "Subir archivo";
    }
  });

  document.getElementById("btnLogout").addEventListener("click", () => {
    sessionStorage.clear();
    window.location.href = "inicio.php";
  });

  // Inicializar
  (async () => {
    await cargarContenidoPagina();
    renderChipsSeccionesImg();
    await cargarGaleria();
  })();
</script>

</body>
</html>

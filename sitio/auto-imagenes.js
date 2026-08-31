// sitio/auto-imagenes.js
// Igual que auto-textos.js pero para imágenes, fondos y video: lee de la
// misma tabla "contenido_paginas" (vía api/contenido/:pagina) y reemplaza
// automáticamente el src / background-image / poster de los elementos
// marcados con data-img, data-bg, data-poster o data-video.
document.addEventListener("DOMContentLoaded", async () => {
  const path = window.location.pathname;
  let pagina = path.split("/").pop().replace(".php", "").replace(".html", "");
  if (!pagina || pagina === "index") pagina = "inicio";

  const elementosImg = document.querySelectorAll("[data-img]");
  const elementosBg = document.querySelectorAll("[data-bg]");
  const elementosPoster = document.querySelectorAll("[data-poster]");
  const elementosVideo = document.querySelectorAll("[data-video]");

  if (
    elementosImg.length === 0 &&
    elementosBg.length === 0 &&
    elementosPoster.length === 0 &&
    elementosVideo.length === 0
  ) {
    return;
  }

  try {
    const resp = await fetch(`api/contenido/${pagina}`, { cache: "no-store" });
    if (!resp.ok) return;
    const datos = await resp.json();

    const mapa = {};
    datos.forEach((item) => {
      mapa[item.seccion] = item.contenido;
    });

    elementosImg.forEach((el) => {
      const clave = el.getAttribute("data-img");
      if (mapa[clave] && mapa[clave].trim() !== "") {
        el.setAttribute("src", mapa[clave]);
      }
    });

    elementosBg.forEach((el) => {
      const clave = el.getAttribute("data-bg");
      if (mapa[clave] && mapa[clave].trim() !== "") {
        el.style.backgroundImage = `url('${mapa[clave]}')`;
      }
    });

    elementosPoster.forEach((el) => {
      const clave = el.getAttribute("data-poster");
      if (mapa[clave] && mapa[clave].trim() !== "") {
        el.setAttribute("poster", mapa[clave]);
      }
    });

    elementosVideo.forEach((el) => {
      const clave = el.getAttribute("data-video");
      if (mapa[clave] && mapa[clave].trim() !== "") {
        el.setAttribute("src", mapa[clave]);
        const videoPadre = el.closest("video");
        if (videoPadre) videoPadre.load();
      }
    });
  } catch (error) {
    // Si la API falla, la página conserva sus imágenes por defecto.
    console.warn("⚠️ No se pudieron cargar las imágenes dinámicas:", error);
  }
});

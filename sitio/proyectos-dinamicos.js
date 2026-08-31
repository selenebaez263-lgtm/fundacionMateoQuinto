// sitio/proyectos-dinamicos.js
// La cuadrícula de proyectos.php trae 4 proyectos fijos escritos en el HTML.
// Este script agrega, además, los proyectos creados/activados desde
// panel-proyectos.php (tabla "proyectos" en la base de datos), para que lo
// que se guarda en el panel realmente aparezca en el sitio público.
document.addEventListener("DOMContentLoaded", async () => {
  const grid = document.getElementById("proyectosGrid");
  if (!grid) return;

  try {
    const [respProyectos, respImagenes] = await Promise.all([
      fetch("api/proyectos", { cache: "no-store" }), // solo activos por defecto
      fetch("api/imagenes", { cache: "no-store" }),
    ]);

    if (!respProyectos.ok) return;
    const proyectos = await respProyectos.json();
    const imagenes = respImagenes.ok ? await respImagenes.json() : [];

    const mapaImagenes = {};
    imagenes.forEach((img) => {
      mapaImagenes[img.id] = img.ruta.replace(/^\//, "");
    });

    if (!Array.isArray(proyectos) || proyectos.length === 0) return;

    proyectos.forEach((p) => {
      const ruta = p.imagen_id && mapaImagenes[p.imagen_id]
        ? mapaImagenes[p.imagen_id]
        : "img/panoramica.jpg"; // imagen de respaldo si el proyecto no tiene imagen asignada

      const esVideo = /\.(mp4|webm)$/i.test(ruta);
      const media = esVideo
        ? `<video class="project-image w-full h-full object-cover transition-transform duration-700" src="${ruta}" muted loop autoplay playsinline></video>`
        : `<img class="project-image w-full h-full object-cover transition-transform duration-700" alt="${(p.titulo || "").replace(/"/g, "&quot;")}" src="${ruta}">`;

      const card = document.createElement("div");
      card.className = "col-span-12 md:col-span-6 project-card group relative overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest transition-all-custom";
      card.innerHTML = `
        <div class="h-80 w-full relative overflow-hidden">
          ${media}
        </div>
        <div class="p-8">
          <h3 class="font-headline-md text-headline-md text-primary mb-4">${(p.titulo || "").replace(/</g, "&lt;")}</h3>
          <p class="font-body-md text-body-md text-on-surface-variant mb-6 max-w-2xl">${(p.descripcion || "").replace(/</g, "&lt;")}</p>
        </div>
      `;
      grid.appendChild(card);
    });
  } catch (error) {
    console.warn("⚠️ No se pudieron cargar los proyectos del panel:", error);
  }
});

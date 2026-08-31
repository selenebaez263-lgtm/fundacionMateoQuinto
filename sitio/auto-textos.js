// sitio/js/auto-textos.js - Carga y reemplaza automáticamente los textos desde SQLite
document.addEventListener("DOMContentLoaded", async () => {
  // 1. Obtener el nombre de la página actual según el archivo HTML/PHP
  // Ej: /MATEOQUINTO/sitio/productos.php -> 'productos'
  const path = window.location.pathname;
  let pagina = path.split("/").pop().replace(".php", "").replace(".html", "");
  
  if (!pagina || pagina === "index") {
    pagina = "inicio";
  }

  // 2. Buscar en la página todas las etiquetas que tengan el atributo 'data-txt'
  const elementos = document.querySelectorAll("[data-txt]");
  if (elementos.length === 0) return;

  try {
    // 3. Consultar a Node.js todos los textos de esta página
    const resp = await fetch(`api/contenido/${pagina}`, { cache: "no-store" });
    if (!resp.ok) return;

    const datos = await resp.json();

    // Convertir la respuesta a un objeto de mapeo { seccion: contenido }
    const mapaTextos = {};
    datos.forEach((item) => {
      mapaTextos[item.seccion] = item.contenido;
    });

    // 4. Inyectar automáticamente el texto donde corresponda
    elementos.forEach((el) => {
      const claveSeccion = el.getAttribute("data-txt");
      
      // Si la sección existe en la Base de Datos y no está vacía, reemplaza el contenido
      if (mapaTextos[claveSeccion] && mapaTextos[claveSeccion].trim() !== "") {
        el.textContent = mapaTextos[claveSeccion];
      }
    });
  } catch (error) {
    // Si la API falla, la página simplemente conserva sus textos por defecto
    console.warn("⚠️ No se pudieron cargar los textos dinámicos:", error);
  }
});
// sitio/nav.js
// Comportamiento único y consistente para la barra de navegación en TODAS las páginas.
// Resuelve 3 problemas que existían antes:
//   1) El enlace activo (negrita/subrayado) casi siempre marcaba "Contacto" sin importar
//      en qué página estabas realmente (bug de copiar/pegar). Ahora se detecta la página
//      actual por la URL y se marca el enlace correcto en TODAS las páginas.
//   2) El header no era "sticky" en todas las páginas (en algunas se iba con el scroll y
//      en otras no), lo que se sentía como que la barra "se movía". Ahora el header usa
//      la misma clase sticky en todas partes (ver el bloque <header id="main-header">).
//   3) El botón de menú móvil solo mostraba un alert() y no abría nada. Ahora sí despliega
//      un menú real.
document.addEventListener("DOMContentLoaded", () => {
  // ---------- 1. Resaltar la página activa ----------
  const path = window.location.pathname.split("/").pop();
  const paginaActual = (path || "inicio.php").replace(".php", "").replace(".html", "") || "inicio";

  const ACTIVE_CLASSES = ["text-primary", "border-b-2", "border-secondary", "font-bold"];
  const INACTIVE_CLASSES = ["text-on-surface-variant", "hover:text-secondary"];

  document.querySelectorAll("[data-nav]").forEach((link) => {
    const esActual = link.getAttribute("data-nav") === paginaActual;
    link.classList.remove(...ACTIVE_CLASSES, ...INACTIVE_CLASSES);
    if (esActual) {
      link.classList.add(...ACTIVE_CLASSES);
      link.setAttribute("aria-current", "page");
    } else {
      link.classList.add(...INACTIVE_CLASSES);
      link.removeAttribute("aria-current");
    }
  });

  // ---------- 2. Sombra al hacer scroll (misma clase en todas las páginas) ----------
  const header = document.getElementById("main-header");
  if (header) {
    const onScroll = () => {
      if (window.scrollY > 12) {
        header.classList.add("scrolled-nav");
      } else {
        header.classList.remove("scrolled-nav");
      }
    };
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();
  }

  // ---------- 3. Menú móvil real (antes solo hacía alert()) ----------
  const toggleBtn = document.getElementById("mobile-menu-toggle");
  const mobileMenu = document.getElementById("mobile-menu");
  const menuIcon = document.getElementById("mobile-menu-icon");
  if (toggleBtn && mobileMenu) {
    toggleBtn.addEventListener("click", () => {
      const abierto = !mobileMenu.classList.contains("hidden");
      mobileMenu.classList.toggle("hidden");
      toggleBtn.setAttribute("aria-expanded", String(!abierto));
      if (menuIcon) menuIcon.textContent = abierto ? "menu" : "close";
    });
    // Cerrar el menú móvil al navegar a un enlace
    mobileMenu.querySelectorAll("a").forEach((a) => {
      a.addEventListener("click", () => {
        mobileMenu.classList.add("hidden");
        toggleBtn.setAttribute("aria-expanded", "false");
        if (menuIcon) menuIcon.textContent = "menu";
      });
    });
  }

  // ---------- 4. Enlace "Acceder" -> se convierte en "Panel" si ya iniciaste sesión ----------
  const token = sessionStorage.getItem("mq_token");
  document.querySelectorAll("[data-admin-link]").forEach((el) => {
    if (token) {
      el.textContent = "Panel";
      el.setAttribute("href", "dashboard.php");
    } else {
      el.textContent = "Acceder";
      el.setAttribute("href", "login.php");
    }
  });
});

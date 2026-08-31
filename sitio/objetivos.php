<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Mateo Quinto A.C. | Nuestra Identidad</title>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="config.js"></script>
        <link rel="stylesheet" href="styles.css"/>
        <script src="auto-textos.js"></script>
<script src="nav.js" defer></script>
</head>
<body class="font-body-md text-body-md bg-background">
<header id="main-header" class="w-full sticky top-0 z-50 bg-surface/95 backdrop-blur-md transition-all duration-300">
<nav class="flex justify-between items-center h-20 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
<a href="inicio.php" class="flex items-center gap-3 font-headline-md text-lg md:text-headline-md font-bold text-primary whitespace-nowrap flex-shrink-0">
<img alt="Mateo Quinto A.C." class="h-12 w-auto" src="logo.png"/>
Mateo Quinto A.C.
</a>
<div class="hidden lg:flex items-center gap-6 xl:gap-8">
<a href="inicio.php" data-nav="inicio" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 pb-1">Inicio</a>
<a href="objetivos.php" data-nav="objetivos" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 pb-1">Quiénes somos</a>
<a href="nuestra_labor.php" data-nav="nuestra_labor" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 pb-1">Nuestra Obra</a>
<a href="proyectos.php" data-nav="proyectos" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 pb-1">Proyectos</a>
<a href="productos.php" data-nav="productos" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 pb-1">Productos</a>
<a href="contacto.php" data-nav="contacto" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 pb-1">Contacto</a>
</div>
<div class="flex items-center gap-3">
<a href="donar.php" class="hidden sm:inline-block bg-primary text-on-primary px-6 py-2.5 rounded-lg font-label-md text-label-md hover:opacity-90 active:scale-[0.98] transition-all">Donar</a>
<a href="login.php" data-admin-link class="hidden lg:inline-block text-on-surface-variant text-label-md hover:text-primary transition-colors duration-200">Acceder</a>
<button id="mobile-menu-toggle" class="lg:hidden text-primary" aria-label="Abrir menú" aria-expanded="false">
<span class="material-symbols-outlined text-3xl" id="mobile-menu-icon">menu</span>
</button>
</div>
</nav>
<div id="mobile-menu" class="hidden lg:hidden bg-surface border-t border-outline-variant px-margin-mobile py-4">
<a href="inicio.php" data-nav="inicio" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 block py-2 text-base">Inicio</a>
<a href="objetivos.php" data-nav="objetivos" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 block py-2 text-base">Quiénes somos</a>
<a href="nuestra_labor.php" data-nav="nuestra_labor" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 block py-2 text-base">Nuestra Obra</a>
<a href="proyectos.php" data-nav="proyectos" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 block py-2 text-base">Proyectos</a>
<a href="productos.php" data-nav="productos" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 block py-2 text-base">Productos</a>
<a href="contacto.php" data-nav="contacto" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 block py-2 text-base">Contacto</a>
<a href="donar.php" class="block py-2 mt-2 text-center bg-primary text-on-primary rounded-lg font-label-md">Donar</a>
<a href="login.php" data-admin-link class="block py-2 mt-2 text-center text-on-surface-variant text-label-md">Acceder</a>
</div>
</header>

<main>
<section class="relative pt-16 pb-24 px-margin-mobile md:px-margin-desktop overflow-hidden">
<div class="absolute inset-0 z-0">
<div class="w-full h-full bg-cover bg-center" style="background-image: url('img/gimnasio.jpg')"></div>
<div class="absolute inset-0 bg-primary/70 mix-blend-multiply"></div>
</div>
<div class="max-w-container-max mx-auto relative z-10">
<div class="max-w-[720px]">
<h1 class="font-headline-xl-mobile md:font-headline-xl text-headline-xl-mobile md:text-headline-xl text-white mb-6" data-txt="hero_titulo">
                            Misión, Visión
                    </h1>
</div>
</div>
</section>

<section class="py-24 px-margin-desktop max-w-container-max mx-auto">
<div class="grid md:grid-cols-2 gap-16 items-start">
<div class="p-12 bg-white border border-outline-variant/30 rounded-xl hover:border-primary transition-colors group">
<div class="mb-8 flex items-center gap-4">
<span class="material-symbols-outlined text-secondary text-4xl" style="font-variation-settings: 'FILL' 1;">favorite</span>
<h2 class="font-headline-lg text-headline-lg text-primary">Misión</h2>
</div>
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed" data-txt="mision_texto">
Proporcionar hogar permanente y formación integral a niñas, adolescentes y jóvenes en estado de orfandad y que presenten alguna discapacidad; en un ambiente espiritual, familiar y en armonía con la naturaleza, donde se fomente el desarrollo de sus capacidades particulares, buscando su incorporación a la sociedad.
</p>
</div>
<div class="p-12 bg-primary-container text-on-primary-container rounded-xl shadow-lg shadow-primary/10">
<div class="mb-8 flex items-center gap-4">
<span class="material-symbols-outlined text-secondary-container text-4xl" style="font-variation-settings: 'FILL' 1;">visibility</span>
<h2 class="font-headline-lg text-headline-lg text-white">Visión</h2>
</div>
<p class="font-body-lg text-body-lg text-primary-fixed-dim leading-relaxed" data-txt="vision_texto">
Ser una comunidad católica con laicos comprometidos compartiendo la vida, los bienes y la fe con un compromiso fundamentado en las Bienaventuranzas, estableciendo un centro ecológico-productivo, tendiente a la sustentabilidad y a la protección del medio ambiente.
</p>
</div>
</div>
</section>

<section class="relative py-32 px-margin-desktop overflow-hidden">
<div class="absolute inset-0 z-0">
<div class="w-full h-full bg-cover bg-center" data-bg="bg_cta_objetivos" style="background-image: url('img/taller-educativo.jpg')"></div>
<div class="absolute inset-0 bg-primary/80 mix-blend-multiply"></div>
</div>
<div class="max-w-3xl mx-auto text-center relative z-10">
<h2 class="font-headline-xl text-headline-xl text-white mb-8" data-txt="cta_titulo">Sé parte de nuestra historia</h2>
<p class="font-body-lg text-body-lg text-white/80 mb-12" data-txt="cta_texto">
                    Tu apoyo es la semilla que permite el crecimiento de una comunidad más justa, humana y sostenible. Únete a nosotros hoy mismo.
                </p>
<div class="flex flex-col sm:flex-row justify-center gap-6">
<a href="donar.php" class="bg-white text-primary px-10 py-4 rounded-lg font-label-md text-label-md hover:bg-white/90 transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">volunteer_activism</span>
                        Donar Ahora
</a>
<a href="contacto.php" class="border-2 border-white text-white px-10 py-4 rounded-lg font-label-md text-label-md hover:bg-white hover:text-primary transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined">mail</span>
                        Contáctanos
</a>
</div>
</div>
</section>
</main>

<footer class="bg-primary-container text-on-primary w-full">
<div class="max-w-container-max mx-auto py-12 px-margin-mobile md:px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-8">
<div class="flex items-center gap-3">
<img alt="Mateo Quinto A.C." class="h-10 w-auto" src="logo.png"/>
<span class="font-headline-md text-headline-md font-bold">Mateo Quinto A.C.</span>

</div>
<div class="flex gap-4">
<a aria-label="Facebook" class="w-10 h-10 rounded-full border border-on-primary/20 flex items-center justify-center text-on-primary hover:bg-on-primary/10 transition-all" href="https://www.facebook.com/mateoquintoac/" rel="noopener noreferrer" target="_blank">
<svg viewBox="0 0 24 24" style="width:18px;height:18px;fill:currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.2c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12z"/></svg>
</a>
<a aria-label="Instagram" class="w-10 h-10 rounded-full border border-on-primary/20 flex items-center justify-center text-on-primary hover:bg-on-primary/10 transition-all" href="https://www.instagram.com/comunidadmv/" rel="noopener noreferrer" target="_blank">
<svg viewBox="0 0 24 24" style="width:18px;height:18px;fill:currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.2c3.2 0 3.6 0 4.9.07 1.2.06 2 .25 2.4.42.6.24 1 .53 1.5 1s.76.9 1 1.5c.17.4.36 1.2.42 2.4.06 1.3.07 1.7.07 4.9s0 3.6-.07 4.9c-.06 1.2-.25 2-.42 2.4a4 4 0 0 1-1 1.5 4 4 0 0 1-1.5 1c-.4.17-1.2.36-2.4.42-1.3.06-1.7.07-4.9.07s-3.6 0-4.9-.07c-1.2-.06-2-.25-2.4-.42a4 4 0 0 1-1.5-1 4 4 0 0 1-1-1.5c-.17-.4-.36-1.2-.42-2.4C2.21 15.6 2.2 15.2 2.2 12s0-3.6.07-4.9c.06-1.2.25-2 .42-2.4a4 4 0 0 1 1-1.5 4 4 0 0 1 1.5-1c.4-.17 1.2-.36 2.4-.42C8.4 2.21 8.8 2.2 12 2.2zm0 1.8c-3.15 0-3.5 0-4.8.07-1 .04-1.55.21-1.9.35-.5.19-.85.42-1.22.79-.37.37-.6.72-.79 1.22-.14.35-.31.9-.35 1.9C3.07 8.5 3.06 8.85 3.06 12s0 3.5.07 4.8c.04 1 .21 1.55.35 1.9.19.5.42.85.79 1.22.37.37.72.6 1.22.79.35.14.9.31 1.9.35 1.3.06 1.65.07 4.8.07s3.5 0 4.8-.07c1-.04 1.55-.21 1.9-.35.5-.19.85-.42 1.22-.79.37-.37.6-.72.79-1.22.14-.35.31-.9.35-1.9.06-1.3.07-1.65.07-4.8s0-3.5-.07-4.8c-.04-1-.21-1.55-.35-1.9a3.2 3.2 0 0 0-.79-1.22 3.2 3.2 0 0 0-1.22-.79c-.35-.14-.9-.31-1.9-.35-1.3-.06-1.65-.07-4.8-.07zm0 4.4a5.6 5.6 0 1 1 0 11.2 5.6 5.6 0 0 1 0-11.2zm0 1.8a3.8 3.8 0 1 0 0 7.6 3.8 3.8 0 0 0 0-7.6zm5.8-2a1.3 1.3 0 1 1 0 2.6 1.3 1.3 0 0 1 0-2.6z"/></svg>
</a>
<a aria-label="TikTok" class="w-10 h-10 rounded-full border border-on-primary/20 flex items-center justify-center text-on-primary hover:bg-on-primary/10 transition-all" href="https://www.tiktok.com/@comunidad.mateo.q/" rel="noopener noreferrer" target="_blank">
<svg viewBox="0 0 24 24" style="width:18px;height:18px;fill:currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M16.6 2h-3.2v13.3a2.7 2.7 0 1 1-2.2-2.66v-3.24a5.9 5.9 0 1 0 5.4 5.9V8.4a7.6 7.6 0 0 0 4.4 1.4V6.6a4.4 4.4 0 0 1-4.4-4.4z"/></svg>
</a>
<a aria-label="Correo" class="w-10 h-10 rounded-full border border-on-primary/20 flex items-center justify-center text-on-primary hover:bg-on-primary/10 transition-all" href="mailto:mateoquinto.ac@gmail.com">
<span class="material-symbols-outlined">mail</span>
</a>
</div>
</div>
</footer>

<script>
        const observerOptions = { threshold: 0.1 };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-8');
                }
            });
        }, observerOptions);

        document.querySelectorAll('section').forEach(section => {
            section.classList.add('transition-all', 'duration-700', 'ease-out', 'opacity-0', 'translate-y-8');
            observer.observe(section);
        });

        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('bg-white/90', 'backdrop-blur-md', 'shadow-sm');
            } else {
                header.classList.remove('bg-white/90', 'backdrop-blur-md', 'shadow-sm');
            }
        });
    </script>

    <a aria-label="Contactar por WhatsApp" class="whatsapp-float whatsapp-float--pulse" href="https://wa.me/522741359415?text=Hola.%20Quisiera%20contactarme%20con%20la%20Comunidad%20Mateo%20Quinto" rel="noopener noreferrer" target="_blank">
        <img alt="Mateo Quinto A.C." src="logo.png"/>
    </a>
</body>
</html>
<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Proyectos | Mateo Quinto A.C.</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="config.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="styles.css"/>
    <script src="auto-textos.js"></script>
    <script src="auto-imagenes.js"></script>
    <script src="proyectos-dinamicos.js"></script>
<script src="nav.js" defer></script>
</head>
<script src="carousel.js"></script>

<body class="bg-background text-on-background selection:bg-secondary-fixed selection:text-on-secondary-fixed">
<header id="main-header" class="w-full sticky top-0 z-50 bg-surface/95 backdrop-blur-md transition-all duration-300">
<nav class="flex justify-between items-center h-20 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
<a href="inicio.php" class="flex items-center gap-3 font-headline-md text-headline-md font-bold text-primary">
<img alt="Mateo Quinto A.C." class="h-12 w-auto" src="logo.png"/>
Mateo Quinto A.C.
</a>
<div class="hidden md:flex items-center gap-8">
<a href="inicio.php" data-nav="inicio" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 pb-1">Inicio</a>
<a href="objetivos.php" data-nav="objetivos" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 pb-1">Quiénes somos</a>
<a href="nuestra_labor.php" data-nav="nuestra_labor" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 pb-1">Nuestra Obra</a>
<a href="proyectos.php" data-nav="proyectos" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 pb-1">Proyectos</a>
<a href="productos.php" data-nav="productos" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 pb-1">Productos</a>
<a href="contacto.php" data-nav="contacto" class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors duration-200 pb-1">Contacto</a>
</div>
<div class="flex items-center gap-3">
<a href="donar.php" class="hidden sm:inline-block bg-primary text-on-primary px-6 py-2.5 rounded-lg font-label-md text-label-md hover:opacity-90 active:scale-[0.98] transition-all">Donar</a>
<a href="login.php" data-admin-link class="hidden md:inline-block text-on-surface-variant text-label-md hover:text-primary transition-colors duration-200">Acceder</a>
<button id="mobile-menu-toggle" class="md:hidden text-primary" aria-label="Abrir menú" aria-expanded="false">
<span class="material-symbols-outlined text-3xl" id="mobile-menu-icon">menu</span>
</button>
</div>
</nav>
<div id="mobile-menu" class="hidden md:hidden bg-surface border-t border-outline-variant px-margin-mobile py-4">
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

<section class="relative min-h-[60vh] flex items-center pt-16 pb-24 px-margin-mobile md:px-margin-desktop overflow-hidden" id="proyectos-hero">
    <div class="absolute inset-0 z-0">
        <video autoplay class="w-full h-full object-cover" loop muted playsinline poster="video/mq-banner-poster.jpg" data-poster="video_poster_hero">
            <source src="video/mq-banner-proyectos.mp4" type="video/mp4" data-video="video_src_hero"/>
        </video>
        <div class="absolute inset-0 bg-primary/70 mix-blend-multiply"></div>
    </div>
    <button aria-label="Activar o silenciar el sonido del video" class="absolute bottom-6 right-6 z-10 w-10 h-10 rounded-full bg-black/30 text-white flex items-center justify-center border border-white/30 hover:bg-black/50 transition-colors" id="muteBtnProyectos" onclick="toggleProyectosSound()">
        <span class="material-symbols-outlined text-lg" id="muteIconProyectos">volume_off</span>
    </button>
    <div class="w-full max-w-container-max mx-auto relative z-10">
        <div class="max-w-[720px] text-left">
            <h1 class="font-headline-xl-mobile md:font-headline-xl text-headline-xl-mobile md:text-headline-xl text-white mb-6" data-txt="hero_titulo">
                Nuestros Proyectos
            </h1>
            <p class="font-body-lg text-body-lg text-white/90 leading-relaxed" data-txt="hero_texto">
                En Mateo Quinto A.C., creemos en el crecimiento orgánico de las comunidades. Cada proyecto es una semilla plantada con el firme compromiso de nutrir el desarrollo social y la restauración ambiental de nuestra región.
            </p>
        </div>
    </div>
</section>

<section class="py-16 px-margin-desktop">
<div class="max-w-container-max mx-auto bento-grid" id="proyectosGrid">
<div class="col-span-12 md:col-span-8 project-card group relative overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest transition-all-custom">
<div class="h-96 w-full relative overflow-hidden">
<img data-img="img_reforestacion_comunitaria_en" class="project-image w-full h-full object-cover transition-transform duration-700" alt="Reforestación comunitaria en la comunidad Mateo Quinto" src="img/ecotecnologia.jpg"/>
<div class="absolute top-6 left-6">

</div>
</div>
<div class="p-8">
<h3 class="font-headline-md text-headline-md text-primary mb-4">Eco-Tecnologías</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-6 max-w-2xl">
                        En Mateo Quinto estamos comprometidos con llevar un estilo de vida más sustentable, es por ello que contamos con eco-tecnologías que nos ayudan al cuidado del medio ambiente y el ahorro de energía y gastos.
                    </p>

</div>
</div>
<div class="col-span-12 md:col-span-4 project-card group overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest transition-all-custom">
<div class="h-64 w-full relative overflow-hidden">
<img data-img="img_hogares_de_vida_independient" class="project-image w-full h-full object-cover transition-transform duration-700" alt="Hogares de vida independiente en la comunidad Mateo Quinto" src="img/hogares-cabanas.jpg"/>
<div class="absolute top-6 left-6">

</div>
</div>
<div class="p-8">
<h3 class="font-headline-md text-headline-md text-primary mb-2">Hogares de Vida Independiente</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-6">
                        Viviendas adaptadas y dignas que promueven la autonomía personal para nuestras chicas con discapacidades motrices y mentales.
                    </p>
</div>
</div>
<div class="col-span-12 md:col-span-4 project-card group overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest transition-all-custom">
<div class="h-64 w-full relative overflow-hidden">
<div aria-label="Fotos de la granja de conejos y aves" class="carousel absolute inset-0 w-full h-full" id="carousel-granja">
    <div class="carousel-slide active">
        <img data-img="img_conejo_en_la_granja_de_la_co" class="w-full h-full object-cover" alt="Conejo en la granja de la comunidad Mateo Quinto" src="img/granja-conejos-aves.jpg"/>
    </div>
    <div class="carousel-slide">
        <img data-img="img_gallinas_en_la_granja_de_la" class="w-full h-full object-cover" alt="Gallinas en la granja de la comunidad Mateo Quinto" src="img/codorniz1.jpg"/>
    </div>
    <div class="carousel-slide">
        <img data-img="img_codornices_en_la_granja_de_l" class="w-full h-full object-cover" alt="Codornices en la granja de la comunidad Mateo Quinto" src="img/gallina1.jpg"/>
    </div>
    <button aria-label="Foto anterior" class="carousel-arrow left-3" data-carousel-prev="" type="button">
        <span class="material-symbols-outlined">chevron_left</span>
    </button>
    <button aria-label="Foto siguiente" class="carousel-arrow right-3" data-carousel-next="" type="button">
        <span class="material-symbols-outlined">chevron_right</span>
    </button>
</div>
<div class="absolute top-6 left-6 z-10">
</div>
</div>
<div class="p-8">
<h3 class="font-headline-md text-headline-md text-primary mb-2">Granja de conejos y aves</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-6"> Además de los invernaderos, contamos con animales de granja que proveen beneficios de bienestar y desarrollo para las personas que se encuentran a nuestro cuidado; con una granja de gallinas y de codornices, recogemos sus huevos y carne para consumo propio. </p>
</div>
</div> 

<div class="col-span-12 md:col-span-8 project-card group overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest transition-all-custom">
<div class="h-96 w-full relative overflow-hidden">
<div aria-label="Fotos de cultivos bajo invernadero" class="carousel absolute inset-0 w-full h-full" id="carousel-cultivos">
    <div class="carousel-slide active">
        <img data-img="img_jitomates_cultivados_en_el_i" class="w-full h-full object-cover" alt="Jitomates cultivados en el invernadero de la comunidad Mateo Quinto" src="img/cultivos-invernadero-jitomates.jpg"/>
    </div>
    <div class="carousel-slide">
        <img data-img="img_invernadero_de_la_comunidad" class="w-full h-full object-cover" alt="Invernadero de la comunidad Mateo Quinto" src="img/fr1.jpg"/>
    </div>
    <div class="carousel-slide">
        <img data-img="img_cultivos_de_la_comunidad_mat" class="w-full h-full object-cover" alt="Cultivos de la comunidad Mateo Quinto" src="img/fr4.jpg"/>
    </div>
    <button aria-label="Foto anterior" class="carousel-arrow left-3" data-carousel-prev="" type="button">
        <span class="material-symbols-outlined">chevron_left</span>
    </button>
    <button aria-label="Foto siguiente" class="carousel-arrow right-3" data-carousel-next="" type="button">
        <span class="material-symbols-outlined">chevron_right</span>
    </button>
</div>
<div class="absolute top-6 left-6 z-10">

</div>
</div>
<div class="p-8">
<h3 class="font-headline-md text-headline-md text-primary mb-4">Cultivos bajo invernadero</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-6 max-w-2xl"> El compromiso con el medio ambiente, nos ha llevado al desarrollo de medidas de producción y tecnologías para la conservación de recursos naturales. En Mateo Quinto contamos con diferentes herramientas para llevar una vida más sustentable y reducir la huella de carbono. Por esto, tenemos diferentes unidades de producción y conservación de recursos naturales, así como tecnologías para el reciclaje de materiales y el uso de energía alternativa. </p>
</div>
</div>

</section>

<section class="relative py-24 px-margin-desktop overflow-hidden">
<div class="absolute inset-0 z-0">
<div class="w-full h-full bg-cover bg-center" data-bg="bg_cta" style="background-image: url('img/panoramica.jpg')"></div>
<div class="absolute inset-0 bg-primary/80 mix-blend-multiply"></div>
</div>
<div class="max-w-[720px] mx-auto text-center relative z-10 text-on-primary">
<h2 class="font-headline-xl text-headline-xl mb-6" data-txt="cta_titulo">Apoya un Proyecto</h2>
<p class="font-body-lg text-body-lg mb-10 opacity-90" data-txt="cta_texto">
                Tu contribución, ya sea como donante o voluntario, es el catalizador que permite que estas iniciativas florezcan y transformen vidas.
            </p>
<div class="flex flex-col sm:flex-row justify-center gap-6">
<a href="donar.php" class="bg-secondary-container text-on-secondary-container px-10 py-4 rounded-lg font-label-md text-lg hover:scale-105 transition-all duration-300 shadow-lg block text-center">Quiero Donar</a>
<a href="https://forms.gle/GEYwTgJBVDgvoML37" class="border-2 border-on-primary text-on-primary px-10 py-4 rounded-lg font-label-md text-lg hover:bg-on-primary hover:text-primary transition-all duration-300 block text-center" rel="noopener noreferrer" target="_blank">Ser Voluntario</a>
</div>
</div>
</section>

<footer class="bg-primary-container text-on-primary w-full border-t border-white/15">
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


    <a aria-label="Contactar por WhatsApp" class="whatsapp-float whatsapp-float--pulse" href="https://wa.me/522741359415?text=Hola.%20Quisiera%20contactarme%20con%20la%20Comunidad%20Mateo%20Quinto" rel="noopener noreferrer" target="_blank">
        <img alt="Mateo Quinto A.C." src="logo.png"/>
    </a>

<script>
    (function() {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-8');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('section').forEach(section => {
            section.classList.add('transition-all', 'duration-700', 'ease-out', 'opacity-0', 'translate-y-8');
            revealObserver.observe(section);
        });
    })();
</script>

</body>
</html>
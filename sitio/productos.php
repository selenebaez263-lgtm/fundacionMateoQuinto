<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Productos | Mateo Quinto A.C.</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="config.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="styles.css"/>
<script src="auto-textos.js"></script>
<script src="nav.js" defer></script>
</head>
<body class="bg-background text-on-background selection:bg-secondary-fixed selection:text-on-secondary-fixed">
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

<section class="relative min-h-[60vh] flex items-center pt-16 pb-24 px-margin-mobile md:px-margin-desktop overflow-hidden" id="proyectos-hero">
    <div class="absolute inset-0 z-0">
        <video autoplay class="w-full h-full object-cover" loop muted playsinline poster="video/mq-banner-poster.jpg" data-poster="video_poster_hero">
            <source src="video/productos.mp4" type="video/mp4" data-video="video_src_hero"/>
        </video>
        <div class="absolute inset-0 bg-primary/70 mix-blend-multiply"></div>
    </div>
    <button aria-label="Activar o silenciar el sonido del video" class="absolute bottom-6 right-6 z-10 w-10 h-10 rounded-full bg-black/30 text-white flex items-center justify-center border border-white/30 hover:bg-black/50 transition-colors" id="muteBtnProyectos" onclick="toggleProyectosSound()">
        <span class="material-symbols-outlined text-lg" id="muteIconProyectos">volume_off</span>
    </button>
    <div class="w-full max-w-container-max mx-auto relative z-10">
        <div class="max-w-[720px] text-left">
            <h1 class="font-headline-xl-mobile md:font-headline-xl text-headline-xl-mobile md:text-headline-xl text-white mb-6" data-txt="hero_titulo">
                Nuestros Productos
            </h1>
            <p class="font-body-lg text-body-lg text-white/90 leading-relaxed" data-txt="hero_texto">
  En Mateo Quinto A.C. cultivamos y criamos nuestros propios alimentos como parte de nuestro modelo de vida independiente y soberanía alimentaria. Esta es una muestra de lo que se produce en la comunidad, resultado del trabajo diario de nuestras chicas y jóvenes.
            </p>
        </div>
    </div>
</section>


<section class="py-16 px-margin-desktop">
<div class="max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-10 transition-all-custom hover:shadow-xl hover:-translate-y-1">
        <div class="carousel relative rounded-lg overflow-hidden mb-6 h-48">
             <div class="carousel-slide active">
                <img alt="Cesta de tilapia fresca de Mateo Quinto A.C." class="w-full h-full object-cover" src="img/pez1.jpg"/>
            </div>
             <div class="carousel-slide active">
                <img alt="Cesta de tilapia fresca de Mateo Quinto A.C." class="w-full h-full object-cover" src="img/pez2.jpg"/>
            </div>
             <div class="carousel-slide active">
                <img alt="Cesta de tilapia fresca de Mateo Quinto A.C." class="w-full h-full object-cover" src="img/pez3.jpg"/>
            </div>
            <button aria-label="Foto anterior" class="carousel-arrow left-2" data-carousel-prev="" style="width:32px;height:32px" type="button">
                <span class="material-symbols-outlined" style="font-size:18px">chevron_left</span>
            </button>
            <button aria-label="Foto siguiente" class="carousel-arrow right-2" data-carousel-next="" style="width:32px;height:32px" type="button">
                <span class="material-symbols-outlined" style="font-size:18px">chevron_right</span>
            </button>
        </div>
         <span class="text-secondary font-label-md text-label-md uppercase tracking-wider">Acuicultura</span>
        <h3 class="font-headline-md text-headline-md text-primary mt-2 mb-4" data-txt="producto1_titulo">Tilapia</h3>
        <p class="font-body-md text-body-md text-on-surface-variant" data-txt="producto1_texto">
            Criamos tilapia en nuestros estanques como parte de un sistema de acuicultura sustentable que aprovecha el agua captada en la comunidad. Esta actividad enseña a nuestros residentes técnicas de producción responsable con el medio ambiente.
        </p>
    </div>

    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-10 transition-all-custom hover:shadow-xl hover:-translate-y-1">
        <div class="carousel relative rounded-lg overflow-hidden mb-6 h-48">
            <div class="carousel-slide active">
                <img alt="Cuidado de aves en el bosque de la comunidad" class="w-full h-full object-cover" src="img/cuidado-aves-bosque.jpg"/>
            </div>
            <div class="carousel-slide">
                <img alt="Crianza de aves en la granja" class="w-full h-full object-cover" src="img/catalogo-1-cria-aves.jpg"/>
            </div>
             <div class="carousel-slide">
                <img alt="Crianza de aves en la granja" class="w-full h-full object-cover" src="img/gallina1.jpg"/>
            </div>
             <div class="carousel-slide">
                <img alt="Crianza de aves en la granja" class="w-full h-full object-cover" src="img/gallina2.jpg"/>
            </div>
            <button aria-label="Foto anterior" class="carousel-arrow left-2" data-carousel-prev="" style="width:32px;height:32px" type="button">
                <span class="material-symbols-outlined" style="font-size:18px">chevron_left</span>
            </button>
            <button aria-label="Foto siguiente" class="carousel-arrow right-2" data-carousel-next="" style="width:32px;height:32px" type="button">
                <span class="material-symbols-outlined" style="font-size:18px">chevron_right</span>
            </button>
        </div>
        <span class="text-secondary font-label-md text-label-md uppercase tracking-wider">Avicultura</span>
        <h3 class="font-headline-md text-headline-md text-primary mt-2 mb-4" data-txt="producto2_titulo">Pollo</h3>
        <p class="font-body-md text-body-md text-on-surface-variant" data-txt="producto2_texto">
            En nuestro gallinero se crían pollos como parte de los talleres de granja. Además de contribuir a la alimentación de la comunidad, es un espacio donde se aprende sobre el cuidado animal y el manejo responsable de aves de corral.
        </p>
    </div>

    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-10 transition-all-custom hover:shadow-xl hover:-translate-y-1">
        <div class="carousel relative rounded-lg overflow-hidden mb-6 h-48">
           
             <div class="carousel-slide active">
                <img alt="Cesta de huevo de codorniz de Mateo Quinto A.C." class="w-full h-full object-cover" src="img/codorniz1.jpg"/>
            </div>
             <div class="carousel-slide active">
                <img alt="Cesta de huevo de codorniz de Mateo Quinto A.C." class="w-full h-full object-cover" src="img/codorniz2.jpg"/>
            </div>
             <div class="carousel-slide active">
                <img alt="Cesta de huevo de codorniz de Mateo Quinto A.C." class="w-full h-full object-cover" src="img/codorniz3.jpg"/>
            </div>
             <button aria-label="Foto anterior" class="carousel-arrow left-2" data-carousel-prev="" style="width:32px;height:32px" type="button">
                <span class="material-symbols-outlined" style="font-size:18px">chevron_left</span>
            </button>
             <button aria-label="Foto siguiente" class="carousel-arrow right-2" data-carousel-next="" style="width:32px;height:32px" type="button">
                <span class="material-symbols-outlined" style="font-size:18px">chevron_right</span>
            </button>
        </div>
        <span class="text-secondary font-label-md text-label-md uppercase tracking-wider">Avicultura</span>
        <h3 class="font-headline-md text-headline-md text-primary mt-2 mb-4" data-txt="producto3_titulo">Huevo de codorniz</h3>
        <p class="font-body-md text-body-md text-on-surface-variant" data-txt="producto3_texto">
            Producimos huevo de codorniz dentro de nuestra granja, una alternativa nutritiva y de bajo impacto ambiental que fortalece nuestros programas de autosuficiencia alimentaria.
        </p>
    </div>

    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-10 transition-all-custom hover:shadow-xl hover:-translate-y-1">
        <div class="carousel relative rounded-lg overflow-hidden mb-6 h-48">
            
             <div class="carousel-slide">
                <img alt="Gallinas en libre pastoreo" class="w-full h-full object-cover" src="img/huevo1.jpg"/>
            </div>
             <div class="carousel-slide">
                <img alt="Gallinas en libre pastoreo" class="w-full h-full object-cover" src="img/huevo2.jpg"/>
            </div>
             <div class="carousel-slide">
                <img alt="Gallinas en libre pastoreo" class="w-full h-full object-cover" src="img/huevo3.jpg"/>
            </div>
            <button aria-label="Foto anterior" class="carousel-arrow left-2" data-carousel-prev="" style="width:32px;height:32px" type="button">
                <span class="material-symbols-outlined" style="font-size:18px">chevron_left</span>
            </button>
            <button aria-label="Foto siguiente" class="carousel-arrow right-2" data-carousel-next="" style="width:32px;height:32px" type="button">
                <span class="material-symbols-outlined" style="font-size:18px">chevron_right</span>
            </button>
        </div>
        <span class="text-secondary font-label-md text-label-md uppercase tracking-wider">Avicultura</span>
        <h3 class="font-headline-md text-headline-md text-primary mt-2 mb-4" data-txt="producto4_titulo">Huevo de gallina</h3>
        <p class="font-body-md text-body-md text-on-surface-variant" data-txt="producto4_texto">
            Nuestras gallinas ponedoras producen huevo fresco todos los días, un alimento básico que forma parte de la dieta diaria de las y los integrantes de la comunidad.
        </p>
    </div>

    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-10 transition-all-custom hover:shadow-xl hover:-translate-y-1">
        <div class="carousel relative rounded-lg overflow-hidden mb-6 h-48">
            <div class="carousel-slide active">
                <img alt="Fresas cosechadas en el invernadero" class="w-full h-full object-cover" src="img/fr3.jpg"/>
            </div>
            <div class="carousel-slide">
                <img alt="Invernadero de fresas de la comunidad" class="w-full h-full object-cover" src="img/fr2.jpg"/>
            </div>
            <div class="carousel-slide">
                <img alt="Invernadero de fresas de la comunidad" class="w-full h-full object-cover" src="img/fr1.jpg"/>
            </div>
            <div class="carousel-slide">
                <img alt="Invernadero de fresas de la comunidad" class="w-full h-full object-cover" src="img/fr4.jpg"/>
            </div>
            <button aria-label="Foto anterior" class="carousel-arrow left-2" data-carousel-prev="" style="width:32px;height:32px" type="button">
                <span class="material-symbols-outlined" style="font-size:18px">chevron_left</span>
            </button>
            <button aria-label="Foto siguiente" class="carousel-arrow right-2" data-carousel-next="" style="width:32px;height:32px" type="button">
                <span class="material-symbols-outlined" style="font-size:18px">chevron_right</span>
            </button>
        </div>
        <span class="text-secondary font-label-md text-label-md uppercase tracking-wider">Agricultura</span>
        <h3 class="font-headline-md text-headline-md text-primary mt-2 mb-4" data-txt="producto5_titulo">Fresas</h3>
        <p class="font-body-md text-body-md text-on-surface-variant" data-txt="producto5_texto">
            Cultivamos fresas dentro de nuestros invernaderos, aplicando prácticas agrícolas sostenibles que cuidan el suelo y optimizan el uso del agua, dentro de nuestro proyecto de cultivos bajo invernadero.
        </p>
    </div>
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-10 transition-all-custom hover:shadow-xl hover:-translate-y-1">
        <div class="carousel relative rounded-lg overflow-hidden mb-6 h-48">
            <div class="carousel-slide active">
                <img alt="Fresas cosechadas en el invernadero" class="w-full h-full object-cover" src="img/invernadero-jitomates.jpg"/>
            </div>
            <div class="carousel-slide">
                <img alt="Invernadero de fresas de la comunidad" class="w-full h-full object-cover" src="img/jitomate.jpg"/>
            </div>
            <div class="carousel-slide">
                <img alt="Invernadero de fresas de la comunidad" class="w-full h-full object-cover" src="img/2jitomate.jpg"/>
            </div>
            <div class="carousel-slide">
                <img alt="Invernadero de fresas de la comunidad" class="w-full h-full object-cover" src="img/jitomateverde.jpg"/>
            </div>
            <button aria-label="Foto anterior" class="carousel-arrow left-2" data-carousel-prev="" style="width:32px;height:32px" type="button">
                <span class="material-symbols-outlined" style="font-size:18px">chevron_left</span>
            </button>
            <button aria-label="Foto siguiente" class="carousel-arrow right-2" data-carousel-next="" style="width:32px;height:32px" type="button">
                <span class="material-symbols-outlined" style="font-size:18px">chevron_right</span>
            </button>
        </div>
        <span class="text-secondary font-label-md text-label-md uppercase tracking-wider">Agricultura</span>
        <h3 class="font-headline-md text-headline-md text-primary mt-2 mb-4" data-txt="producto6_titulo">Jitomate</h3>
        <p class="font-body-md text-body-md text-on-surface-variant" data-txt="producto6_texto">
            Dentro de nuestro proyecto de producción en invernadero, nos dedicamos al cultivo de jitomate bajo prácticas agrícolas sostenibles. Nuestro enfoque garantiza la conservación del suelo y la máxima eficiencia en el uso de los recursos hídricos.
        </p>
    </div>
   

</div>
</section>

<section class="relative py-24 px-margin-desktop overflow-hidden">
<div class="absolute inset-0 z-0">
<div class="w-full h-full bg-cover bg-center" data-bg="bg_banner_productos" style="background-image: url('img/taller-manualidades.jpg')"></div>
<div class="absolute inset-0 bg-primary/75 mix-blend-multiply"></div>
</div>
<div class="max-w-[720px] mx-auto text-center relative z-10 text-white">
<h2 class="font-headline-xl text-headline-xl mb-6" data-txt="banner_productos_titulo">Manualidades hechas con dedicación</h2>
<p class="font-body-lg text-body-lg mb-10 opacity-90" data-txt="banner_productos_texto">
                Además de nuestra producción agrícola y ganadera, nuestras chicas y jóvenes elaboran manualidades en talleres de bisutería, tejido y bordado, desarrollando nuevas habilidades.
            </p>
</div>
</section>

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

    < <a aria-label="Contactar por WhatsApp" class="whatsapp-float whatsapp-float--pulse" href="https://wa.me/522741359415?text=Hola.%20Quisiera%20contactarme%20con%20la%20Comunidad%20Mateo%20Quinto" rel="noopener noreferrer" target="_blank">
        <img alt="Mateo Quinto A.C." src="logo.png"/>
    </a>

    <script src="carousel.js"></script>
</body>
</html>
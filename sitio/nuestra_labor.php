<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Nuestra Labor | Mateo Quinto A.C.</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="config.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet"/>
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
<section class="relative h-[560px] flex items-center overflow-hidden organic-shape bg-primary">
<div class="absolute inset-0 z-0">
<img alt="Nuestra Obra - Mateo Quinto A.C." class="w-full h-full object-cover" src="img/hogares-cabanas.jpg"/>
<div class="absolute inset-0 bg-primary/80"></div>
</div>
<div class="absolute inset-0 z-0 opacity-30" style="background-image: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.08) 0, transparent 40%), radial-gradient(circle at 80% 60%, rgba(255,255,255,0.06) 0, transparent 45%);"></div>
<div class="relative z-10 px-margin-desktop max-w-container-max mx-auto w-full">
<div class="max-w-3xl">
<span class="text-secondary-container font-label-md text-label-md bg-secondary-fixed/20 px-3 py-1 rounded-sm mb-6 inline-block">Nuestra Obra</span>
<h1 class="font-headline-xl text-headline-xl text-on-primary text-balance mb-8" data-txt="hero_titulo">
                    Programas que transforman vidas
                </h1>
<p class="font-body-lg text-body-lg text-primary-fixed-dim max-w-xl" data-txt="hero_texto">
                    Diversos programas que trabajan de manera integral y en conjunto para acompañar a cada niña, adolescente y joven de nuestra comunidad en su desarrollo pleno.
                </p>
</div>
</div>
</section>

<section class="py-24 px-margin-desktop max-w-container-max mx-auto">
<div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll">
<h2 class="font-headline-lg text-headline-lg text-primary mb-4">Programas</h2>
<p class="font-body-md text-body-md text-on-surface-variant">
                Pasa el cursor sobre cada programa para conocer más sobre nuestra labor diaria.
            </p>
</div>

<div class="relative w-full max-w-[600px] aspect-square mx-auto" id="programas-wheel">

<svg class="absolute inset-0 w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
<circle cx="50" cy="50" r="40" fill="none" stroke="#c1c8c2" stroke-width="0.5" stroke-dasharray="2 2"/>
</svg>

<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-24 h-24 md:w-32 md:h-32 rounded-full bg-surface-container-lowest shadow-md flex items-center justify-center p-4">
<img alt="Mateo Quinto A.C." class="w-full h-full object-contain" src="logo.png"/>
</div>

<div class="programa-item reveal-on-scroll group absolute w-[42%] md:w-[38%]" style="left:50%; top:9%; transform: translate(-50%,-50%); transition-delay: 0ms;" data-desc="Apoyo académico personalizado que respeta el ritmo y las capacidades de cada niña y joven de la comunidad.">
<div class="bg-primary-fixed-dim rounded-xl p-4 md:p-5 text-center shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-default">
<h3 class="font-label-md text-label-md md:text-body-md font-bold text-on-primary-fixed group-hover:text-secondary transition-colors duration-300">Regularización escolar</h3>
</div>
</div>

<div class="programa-item reveal-on-scroll group absolute w-[42%] md:w-[38%]" style="left:84.6%; top:30%; transform: translate(-50%,-50%); transition-delay: 120ms;" data-desc="Talleres de formación productiva y laboral que preparan a nuestras jóvenes para su incorporación al mundo del trabajo.">
<div class="bg-primary-fixed-dim rounded-xl p-4 md:p-5 text-center shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-default">
<h3 class="font-label-md text-label-md md:text-body-md font-bold text-on-primary-fixed group-hover:text-secondary transition-colors duration-300">Formación productiva y laboral</h3>
</div>
</div>

<div class="programa-item reveal-on-scroll group absolute w-[42%] md:w-[38%]" style="left:84.6%; top:70%; transform: translate(-50%,-50%); transition-delay: 240ms;" data-desc="Espacios de lectura compartida que fomentan la sociabilización, el lenguaje y el vínculo comunitario.">
<div class="bg-primary-fixed-dim rounded-xl p-4 md:p-5 text-center shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-default">
<h3 class="font-label-md text-label-md md:text-body-md font-bold text-on-primary-fixed group-hover:text-secondary transition-colors duration-300">Círculos de lectura</h3>
</div>
</div>

<div class="programa-item reveal-on-scroll group absolute w-[42%] md:w-[38%]" style="left:50%; top:91%; transform: translate(-50%,-50%); transition-delay: 360ms;" data-desc="Desarrollo de destrezas para la vida diaria, la convivencia y el cuidado personal.">
<div class="bg-primary-fixed-dim rounded-xl p-4 md:p-5 text-center shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-default">
<h3 class="font-label-md text-label-md md:text-body-md font-bold text-on-primary-fixed group-hover:text-secondary transition-colors duration-300">Habilidades socio-adaptativas</h3>
</div>
</div>

<div class="programa-item reveal-on-scroll group absolute w-[42%] md:w-[38%]" style="left:15.4%; top:70%; transform: translate(-50%,-50%); transition-delay: 480ms;" data-desc="Terapias y ejercicios de fisioterapia que fortalecen la independencia y la motricidad fina.">
<div class="bg-primary-fixed-dim rounded-xl p-4 md:p-5 text-center shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-default">
<h3 class="font-label-md text-label-md md:text-body-md font-bold text-on-primary-fixed group-hover:text-secondary transition-colors duration-300">Independencia y motricidad fina</h3>
</div>
</div>

<div class="programa-item reveal-on-scroll group absolute w-[42%] md:w-[38%]" style="left:15.4%; top:30%; transform: translate(-50%,-50%); transition-delay: 600ms;" data-desc="Acompañamiento pedagógico especializado, adaptado al tipo de discapacidad de cada integrante.">
<div class="bg-primary-fixed-dim rounded-xl p-4 md:p-5 text-center shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-default">
<h3 class="font-label-md text-label-md md:text-body-md font-bold text-on-primary-fixed group-hover:text-secondary transition-colors duration-300">Educación especial - profesional</h3>
</div>
</div>

</div>

<p class="text-center font-body-md text-body-md text-on-surface-variant max-w-xl mx-auto mt-16 min-h-[3rem] transition-opacity duration-300" id="programa-desc">
    Pasa el cursor sobre un programa para leer más sobre él.
</p>
</section>

<section class="py-24 bg-surface-container-low" id="valores">
<div class="px-margin-desktop max-w-container-max mx-auto">
<div class="text-center mb-16 max-w-2xl mx-auto reveal-on-scroll">
<h2 class="font-headline-lg text-headline-lg text-primary mb-4" data-txt="objetivos_titulo">Objetivos Estratégicos</h2>
<p class="font-body-md text-body-md text-on-surface-variant" data-txt="objetivos_texto">
                        Guiamos nuestras acciones diarias a través de metas claras que fortalecen nuestra comunidad y garantizan un impacto duradero.
                    </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-12 gap-6">
<div class="md:col-span-7 bg-white p-10 rounded-xl border border-outline-variant/30 flex flex-col justify-between group overflow-hidden relative cursor-pointer transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 reveal-on-scroll" onclick="toggleObjetivo('01')">
<div class="relative z-10">
<span class="text-primary font-bold text-headline-md opacity-20 block mb-4">01</span>
<h3 class="font-headline-md text-headline-md text-primary mb-4" data-txt="objetivo1_titulo">Atención Integral</h3>
<p class="text-on-surface-variant" data-txt="objetivo1_texto">Proporcionar atención integral y especializada adaptada a las necesidades únicas de cada integrante de nuestra comunidad.</p>
<div class="hidden mt-6 pt-6 border-t border-outline-variant/30" id="objetivo-detail-01">
<ul class="space-y-3">
<li class="flex items-start gap-3 text-on-surface-variant"><span class="material-symbols-outlined text-secondary text-xl">check_circle</span><span>Cuidado médico y psicológico personalizado</span></li>
<li class="flex items-start gap-3 text-on-surface-variant"><span class="material-symbols-outlined text-secondary text-xl">check_circle</span><span>Fisioterapia y terapia del lenguaje</span></li>
<li class="flex items-start gap-3 text-on-surface-variant"><span class="material-symbols-outlined text-secondary text-xl">check_circle</span><span>Acompañamiento espiritual</span></li>
</ul>
</div>
<span class="flex items-center gap-1 text-secondary font-label-md text-label-md mt-5">
                            Ver más
                            <span class="material-symbols-outlined text-lg" id="objetivo-arrow-01">expand_more</span>
</span>
</div>
<span class="material-symbols-outlined absolute -right-4 -bottom-4 text-9xl text-surface-container opacity-50 group-hover:scale-110 transition-transform">medical_services</span>
</div>

<div class="md:col-span-5 bg-secondary-container p-10 rounded-xl flex flex-col justify-between cursor-pointer transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 reveal-on-scroll" onclick="toggleObjetivo('02')">
<div>
<span class="text-on-secondary-container font-bold text-headline-md opacity-30 block mb-4">02</span>
<h3 class="font-headline-md text-headline-md text-on-secondary-container mb-4" data-txt="objetivo2_titulo">Autonomía y Vida Independiente</h3>
<p class="text-on-secondary-container/80" data-txt="objetivo2_texto">Fomentar la autonomía a través de talleres de vida independiente que empoderan a nuestros residentes.</p>
<div class="hidden mt-6 pt-6 border-t border-on-secondary-container/20" id="objetivo-detail-02">
<ul class="space-y-3">
<li class="flex items-start gap-3 text-on-secondary-container/80"><span class="material-symbols-outlined text-on-secondary-container text-xl">check_circle</span><span>Talleres de habilidades socio-adaptativas</span></li>
<li class="flex items-start gap-3 text-on-secondary-container/80"><span class="material-symbols-outlined text-on-secondary-container text-xl">check_circle</span><span>Independencia y motricidad fina</span></li>
<li class="flex items-start gap-3 text-on-secondary-container/80"><span class="material-symbols-outlined text-on-secondary-container text-xl">check_circle</span><span>Fomento de autoestima y seguridad</span></li>
</ul>
</div>
</div>
<div class="mt-6 flex items-center justify-between">
<div class="flex gap-2">
<span class="w-2 h-2 rounded-full bg-on-secondary-container"></span>
<span class="w-2 h-2 rounded-full bg-on-secondary-container/40"></span>
<span class="w-2 h-2 rounded-full bg-on-secondary-container/40"></span>
</div>
<span class="material-symbols-outlined text-on-secondary-container text-lg" id="objetivo-arrow-02">expand_more</span>
</div>
</div>

<div class="md:col-span-5 bg-primary p-10 rounded-xl text-white cursor-pointer transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 reveal-on-scroll" onclick="toggleObjetivo('03')">
<span class="text-primary-fixed-dim font-bold text-headline-md opacity-30 block mb-4">03</span>
<h3 class="font-headline-md text-headline-md mb-4" data-txt="objetivo3_titulo">Sostenibilidad Ambiental</h3>
<p class="text-primary-fixed-dim/80 mb-8" data-txt="objetivo3_texto">Promover la sostenibilidad ambiental y la soberanía alimentaria integrando prácticas regenerativas en nuestro entorno.</p>
<div class="hidden mb-6 pt-6 border-t border-white/15" id="objetivo-detail-03">
<ul class="space-y-3">
<li class="flex items-start gap-3 text-primary-fixed-dim/80"><span class="material-symbols-outlined text-secondary-container text-xl">check_circle</span><span>Sistema de tratamiento y reuso de agua</span></li>
<li class="flex items-start gap-3 text-primary-fixed-dim/80"><span class="material-symbols-outlined text-secondary-container text-xl">check_circle</span><span>Calentadores solares y captación de lluvia</span></li>
<li class="flex items-start gap-3 text-primary-fixed-dim/80"><span class="material-symbols-outlined text-secondary-container text-xl">check_circle</span><span>Invernaderos y granjas de producción propia</span></li>
</ul>
</div>
<div class="flex items-center justify-between">
<div class="flex items-center gap-2 text-secondary-container">
<span class="material-symbols-outlined">eco</span>
<span class="font-label-md text-label-md">Soberanía Alimentaria</span>
</div>
<span class="material-symbols-outlined text-secondary-container text-lg" id="objetivo-arrow-03">expand_more</span>
</div>
</div>

<div class="md:col-span-7 bg-white p-10 rounded-xl border border-outline-variant/30 flex flex-col justify-between group overflow-hidden relative cursor-pointer transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 reveal-on-scroll" onclick="toggleObjetivo('04')">
<div class="relative z-10">
<span class="text-primary font-bold text-headline-md opacity-20 block mb-4">04</span>
<h3 class="font-headline-md text-headline-md text-primary mb-4" data-txt="objetivo4_titulo">Tejido Social</h3>
<p class="text-on-surface-variant" data-txt="objetivo4_texto">Fortalecer el tejido social mediante programas estratégicos de voluntariado y la participación activa de la comunidad.</p>
<div class="hidden mt-6 pt-6 border-t border-outline-variant/30" id="objetivo-detail-04">
<ul class="space-y-3">
<li class="flex items-start gap-3 text-on-surface-variant"><span class="material-symbols-outlined text-primary text-xl">check_circle</span><span>Programas de voluntariado</span></li>
<li class="flex items-start gap-3 text-on-surface-variant"><span class="material-symbols-outlined text-primary text-xl">check_circle</span><span>Círculos de lectura</span></li>
<li class="flex items-start gap-3 text-on-surface-variant"><span class="material-symbols-outlined text-primary text-xl">check_circle</span><span>Participación en actividades comunitarias</span></li>
</ul>
</div>
<span class="flex items-center gap-1 text-primary font-label-md text-label-md mt-5">
                            Ver más
                            <span class="material-symbols-outlined text-lg" id="objetivo-arrow-04">expand_more</span>
</span>
</div>
<span class="material-symbols-outlined absolute -right-4 -bottom-4 text-9xl text-surface-container opacity-50 group-hover:rotate-12 transition-transform">group</span>
</div>
</div>
</div>
</section>

<section class="py-24 px-margin-desktop bg-surface-container-low">
<div class="max-w-container-max mx-auto">
<div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll">
<h2 class="font-headline-lg text-headline-lg text-primary mb-4" data-txt="atencion_titulo">Atención Integral</h2>
<p class="font-body-md text-body-md text-on-surface-variant" data-txt="atencion_texto">Cubrimos las necesidades básicas y acompañamos el desarrollo de cada integrante de nuestra comunidad.</p>
</div>

<div class="flex flex-wrap justify-center gap-3 mb-16 reveal-on-scroll" id="atencion-tabs">
<button type="button" class="atencion-tab flex items-center gap-2 bg-white rounded-full pl-2.5 pr-6 py-2.5 border-2 border-secondary/25 transition-all duration-200 hover:shadow-md" data-key="alimentacion" data-accent="secondary" onclick="showAtencion('alimentacion')">
<span class="tab-icon-wrap w-8 h-8 rounded-full bg-secondary/15 flex items-center justify-center transition-colors duration-200">
<span class="tab-icon material-symbols-outlined text-secondary text-lg transition-colors duration-200" style="font-variation-settings: 'FILL' 1;">restaurant</span>
</span>
<span class="tab-label font-label-md text-label-md text-secondary transition-colors duration-200">Alimentación</span>
</button>
<button type="button" class="atencion-tab flex items-center gap-2 bg-white rounded-full pl-2.5 pr-6 py-2.5 border-2 border-error/25 transition-all duration-200 hover:shadow-md" data-key="medicamentos" data-accent="error" onclick="showAtencion('medicamentos')">
<span class="tab-icon-wrap w-8 h-8 rounded-full bg-error/15 flex items-center justify-center transition-colors duration-200">
<span class="tab-icon material-symbols-outlined text-error text-lg transition-colors duration-200" style="font-variation-settings: 'FILL' 1;">medication</span>
</span>
<span class="tab-label font-label-md text-label-md text-error transition-colors duration-200">Medicamentos</span>
</button>
<button type="button" class="atencion-tab flex items-center gap-2 bg-white rounded-full pl-2.5 pr-6 py-2.5 border-2 border-info/25 transition-all duration-200 hover:shadow-md" data-key="ropa" data-accent="info" onclick="showAtencion('ropa')">
<span class="tab-icon-wrap w-8 h-8 rounded-full bg-info/15 flex items-center justify-center transition-colors duration-200">
<span class="tab-icon material-symbols-outlined text-info text-lg transition-colors duration-200" style="font-variation-settings: 'FILL' 1;">checkroom</span>
</span>
<span class="tab-label font-label-md text-label-md text-info transition-colors duration-200">Ropa</span>
</button>
<button type="button" class="atencion-tab flex items-center gap-2 bg-white rounded-full pl-2.5 pr-6 py-2.5 border-2 border-primary/25 transition-all duration-200 hover:shadow-md" data-key="zapatos" data-accent="primary" onclick="showAtencion('zapatos')">
<span class="tab-icon-wrap w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center transition-colors duration-200">
<span class="tab-icon material-symbols-outlined text-primary text-lg transition-colors duration-200" style="font-variation-settings: 'FILL' 1;">footprint</span>
</span>
<span class="tab-label font-label-md text-label-md text-primary transition-colors duration-200">Zapatos</span>
</button>
<button type="button" class="atencion-tab flex items-center gap-2 bg-white rounded-full pl-2.5 pr-6 py-2.5 border-2 border-error/25 transition-all duration-200 hover:shadow-md" data-key="asistencia" data-accent="error" onclick="showAtencion('asistencia')">
<span class="tab-icon-wrap w-8 h-8 rounded-full bg-error/15 flex items-center justify-center transition-colors duration-200">
<span class="tab-icon material-symbols-outlined text-error text-lg transition-colors duration-200" style="font-variation-settings: 'FILL' 1;">medical_services</span>
</span>
<span class="tab-label font-label-md text-label-md text-error transition-colors duration-200">Asistencia y Rehabilitación Médica</span>
</button>
<button type="button" class="atencion-tab flex items-center gap-2 bg-white rounded-full pl-2.5 pr-6 py-2.5 border-2 border-primary/25 transition-all duration-200 hover:shadow-md" data-key="capacitacion" data-accent="primary" onclick="showAtencion('capacitacion')">
<span class="tab-icon-wrap w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center transition-colors duration-200">
<span class="tab-icon material-symbols-outlined text-primary text-lg transition-colors duration-200" style="font-variation-settings: 'FILL' 1;">school</span>
</span>
<span class="tab-label font-label-md text-label-md text-primary transition-colors duration-200">Capacitación</span>
</button>
</div>

<div class="max-w-3xl mx-auto bg-white p-10 md:p-12 rounded-xl border border-outline-variant/30 reveal-on-scroll" id="atencion-card">
<div class="w-14 h-14 rounded-full bg-secondary/10 flex items-center justify-center mb-6" id="atencion-icon-wrap">
<span class="material-symbols-outlined text-secondary text-3xl" id="atencion-icon" style="font-variation-settings: 'FILL' 1;">restaurant</span>
</div>
<h3 class="font-headline-md text-headline-md text-primary mb-4" id="atencion-title">Alimentación</h3>
<div id="atencion-desc"></div>
<ul class="space-y-3 mt-2" id="atencion-list"></ul>
</div>
</div>
</section>

<section class="py-24 px-margin-desktop max-w-container-max mx-auto">
<div class="bg-primary rounded-2xl text-white reveal-on-scroll overflow-hidden">
<div class="grid grid-cols-1 lg:grid-cols-2 items-stretch">

    <div class="p-12 md:p-16">
        <div class="mb-10">
            <span class="material-symbols-outlined text-secondary-container text-5xl mb-4 inline-block" style="font-variation-settings: 'FILL' 1;">emoji_events</span>
            <h2 class="font-headline-lg text-headline-lg mb-4" data-txt="logros_titulo">Logros</h2>
            <p class="text-primary-fixed-dim" data-txt="logros_texto">Resultados que reflejan el impacto de nuestro acompañamiento diario.</p>
        </div>
        <div class="space-y-5">
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-secondary-container">check_circle</span>
                <p class="text-primary-fixed-dim">Integración favorable en un ambiente de familia</p>
            </div>
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-secondary-container">check_circle</span>
                <p class="text-primary-fixed-dim">Saben que son valiosos</p>
            </div>
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-secondary-container">check_circle</span>
                <p class="text-primary-fixed-dim">Han incrementado su autoestima y seguridad, pues van avanzando a su independencia en cuanto a su cuidado personal, participación comunitaria y cuidado del entorno</p>
            </div>
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-secondary-container">check_circle</span>
                <p class="text-primary-fixed-dim">Han alcanzado cierto sentido de responsabilidad a su trabajo escolar y laboral</p>
            </div>
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-secondary-container">check_circle</span>
                <p class="text-primary-fixed-dim">Entienden y participan en los proyectos productivos de la Comunidad</p>
            </div>
            <div class="flex items-start gap-3">
                <span class="material-symbols-outlined text-secondary-container">check_circle</span>
                <p class="text-primary-fixed-dim">Buen nivel de sociabilización y compenetración importante en su vida espiritual</p>
            </div>
        </div>
    </div>

    <div class="relative min-h-[360px] lg:min-h-full">
        <div aria-label="Fotos de la comunidad" class="carousel absolute inset-0" id="logros-carousel">
            <div class="carousel-slide active">
                <img alt="Joven cuidando la crianza de codornices" class="w-full h-full object-cover" src="img/1.jpg"/>
            </div>
            <div class="carousel-slide">
                <img alt="Celebración comunitaria con piñata" class="w-full h-full object-cover" src="img/taller-manualidades.jpg"/>
            </div>
            <div class="carousel-slide">
                <img alt="Jóvenes jugando basquetbol en comunidad" class="w-full h-full object-cover" src="img/3.jpg"/>
            </div>
            <div class="carousel-slide">
                <img alt="Taller comunitario" class="w-full h-full object-cover" src="img/4.jpg"/>
            </div>

            <button aria-label="Foto anterior" class="carousel-arrow left-3" data-carousel-prev="" type="button">
                <span class="material-symbols-outlined">chevron_left</span>
            </button>
            <button aria-label="Foto siguiente" class="carousel-arrow right-3" data-carousel-next="" type="button">
                <span class="material-symbols-outlined">chevron_right</span>
            </button>
        </div>
    </div>

</div>
</div>
</section>


<section class="py-32 px-margin-desktop max-w-container-max mx-auto text-center">
<div class="max-w-3xl mx-auto reveal-on-scroll">
<h2 class="font-headline-xl text-headline-xl text-primary mb-8" data-txt="cta_titulo">Sé parte de nuestra obra</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-12" data-txt="cta_texto">
                Cada programa se sostiene gracias al apoyo de personas como tú. Súmate a esta labor diaria.
            </p>
<div class="flex flex-col sm:flex-row justify-center gap-6">
<a href="donar.php" class="bg-primary text-on-primary px-10 py-4 rounded-lg font-label-md text-label-md hover:bg-primary-container transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">volunteer_activism</span>
                    Donar Ahora
</a>
<a href="contacto.php" class="border-2 border-secondary text-secondary px-10 py-4 rounded-lg font-label-md text-label-md hover:bg-secondary hover:text-white transition-all flex items-center justify-center gap-2">
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

 <a aria-label="Contactar por WhatsApp" class="whatsapp-float whatsapp-float--pulse" href="https://wa.me/522741359415?text=Hola.%20Quisiera%20contactarme%20con%20la%20Comunidad%20Mateo%20Quinto" rel="noopener noreferrer" target="_blank">
        <img alt="Mateo Quinto A.C." src="logo.png"/>
    </a>

<script>

    const observerOptions = { threshold: 0.15 };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);
    document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));

    // Descripción central que cambia según el programa bajo el cursor
    const descEl = document.getElementById('programa-desc');
    const defaultDesc = descEl.textContent.trim();
    document.querySelectorAll('.programa-item').forEach(item => {
        item.addEventListener('mouseenter', () => {
            descEl.style.opacity = 0;
            setTimeout(() => {
                descEl.textContent = item.dataset.desc;
                descEl.style.opacity = 1;
            }, 150);
        });
        item.addEventListener('mouseleave', () => {
            descEl.style.opacity = 0;
            setTimeout(() => {
                descEl.textContent = defaultDesc;
                descEl.style.opacity = 1;
            }, 150);
        });
    });

    
    const accentMap = {
        secondary: { bg10: 'bg-secondary/10', bg15: 'bg-secondary/15', text: 'text-secondary', bgSolid: 'bg-secondary' },
        error:     { bg10: 'bg-error/10',     bg15: 'bg-error/15',     text: 'text-error',     bgSolid: 'bg-error' },
        info:      { bg10: 'bg-info/10',      bg15: 'bg-info/15',      text: 'text-info',      bgSolid: 'bg-info' },
        primary:   { bg10: 'bg-primary/10',   bg15: 'bg-primary/15',   text: 'text-primary',   bgSolid: 'bg-primary' }
    };

    const atencionData = {
        alimentacion: {
            icon: 'restaurant',
            accent: 'secondary',
            title: 'Alimentación',
            paragraphs: [
                'Todos los días preparamos los alimentos pensando en lo que cada quien necesita: hay personas que llevan dietas más suaves, otras que deben cuidar el azúcar o la sal, y quienes simplemente necesitan una buena comida caliente en su mesa. Una parte de lo que comemos sale de nuestros propios invernaderos y granjas.'
            ],
            list: [
                'Desayuno, comida y cena todos los días del año',
                'Dietas especiales según indicación médica',
                'Verduras, huevo y carne producidos en la Comunidad'
            ]
        },
        medicamentos: {
            icon: 'medication',
            accent: 'error',
            title: 'Medicamentos',
            paragraphs: [
                'Varias de las personas que viven en la Comunidad llevan tratamientos de por vida, así que damos seguimiento puntual a cada uno: desde conseguir el medicamento hasta asegurarnos de que se tome como corresponde y en su horario.'
            ],
            list: [
                'Seguimiento diario de tratamientos',
                'Consultas y revisiones médicas periódicas',
                'Gestión de medicamentos de uso continuo'
            ]
        },
        ropa: {
            icon: 'checkroom',
            accent: 'info',
            title: 'Ropa',
            paragraphs: [
                'Vestimos a cada integrante de la Comunidad según la temporada y sus necesidades particulares, muchas veces gracias a donaciones que recibimos y que organizamos para que le lleguen a quien más lo necesita.'
            ],
            list: [
                'Ropa de uso diario para todas las edades',
                'Abrigo y ropa de temporada de frío',
                'Prendas adaptadas para quienes lo requieren'
            ]
        },
        zapatos: {
            icon: 'footprint',
            accent: 'primary',
            title: 'Zapatos',
            paragraphs: [
                'El calzado adecuado hace una gran diferencia para quienes tienen alguna dificultad para caminar o mantener el equilibrio, así que procuramos que cada persona cuente con zapatos cómodos y en buen estado.'
            ],
            list: [
                'Calzado adaptado a cada tipo de discapacidad',
                'Reposición conforme crecen o se desgastan',
                'Zapato especial para terapias de rehabilitación'
            ]
        },
        asistencia: {
            icon: 'medical_services',
            accent: 'error',
            title: 'Asistencia y Rehabilitación Médica',
            paragraphs: [
                'Al tener discapacidades diferentes, cada una de las personas que viven aquí requieren de rehabilitación física y mental.'
            ],
            list: ['Fisioterapia', 'Terapia del lenguaje', 'Medicamentos']
        },
        capacitacion: {
            icon: 'school',
            accent: 'primary',
            title: 'Capacitación · Escuela-Taller',
            paragraphs: [
                'Todo esto fue a partir de sus aptitudes y basado en estudios médicos, pedagógicos y psicológicos.',
                'Las clases las impartía una maestra en educación especial, para lograr un crecimiento y realización personal. Se enfoca, igualmente, en su formación espiritual católica.',
                'Todos los miembros de la comunidad se involucran en diferentes actividades:'
            ],
            list: [
                'Manualidades (bisutería, tejido y bordado)',
                'Producción (granja de gallinas, guajolotes, codornices, conejos y borregos)',
                'Elaboración de fertilizante natural (lombricomposta)',
                'Siembra de hortalizas y granos',
                'Huerto',
                'Conservación, dentro del programa de reforestación del terreno de la Comunidad, manejo de la materia orgánica y cuidado del agua'
            ]
        }
    };

    function showAtencion(key) {
        const data = atencionData[key];
        if (!data) return;
        const accent = accentMap[data.accent] || accentMap.secondary;

        document.getElementById('atencion-title').textContent = data.title;
        document.getElementById('atencion-icon').textContent = data.icon;

        const iconWrap = document.getElementById('atencion-icon-wrap');
        iconWrap.className = 'w-14 h-14 rounded-full flex items-center justify-center mb-6 ' + accent.bg10;
        document.getElementById('atencion-icon').className = 'material-symbols-outlined text-3xl ' + accent.text;
        document.getElementById('atencion-icon').style.fontVariationSettings = "'FILL' 1";

        const descWrap = document.getElementById('atencion-desc');
        descWrap.innerHTML = '';
        data.paragraphs.forEach((p, i) => {
            const el = document.createElement('p');
            el.className = 'text-on-surface-variant ' + (i === data.paragraphs.length - 1 ? 'mb-2' : 'mb-4');
            if (i === data.paragraphs.length - 1 && data.paragraphs.length > 1) {
                el.className = 'font-label-md text-label-md ' + accent.text + ' mb-4';
            }
            el.textContent = p;
            descWrap.appendChild(el);
        });

        const listWrap = document.getElementById('atencion-list');
        listWrap.innerHTML = '';
        data.list.forEach(item => {
            const li = document.createElement('li');
            li.className = 'flex items-start gap-3 text-on-surface-variant';
            li.innerHTML = '<span class="material-symbols-outlined text-xl ' + accent.text + '" style="font-variation-settings: \'FILL\' 1;">check_circle</span><span>' + item + '</span>';
            listWrap.appendChild(li);
        });

        document.querySelectorAll('.atencion-tab').forEach(btn => {
            const btnAccent = accentMap[btn.dataset.accent] || accentMap.secondary;
            const active = btn.dataset.key === key;

            Object.values(accentMap).forEach(a => btn.classList.remove(a.bgSolid));
            btn.classList.toggle(btnAccent.bgSolid, active);
            btn.classList.toggle('bg-white', !active);
            btn.classList.toggle('shadow-md', active);

            const iconWrapBtn = btn.querySelector('.tab-icon-wrap');
            Object.values(accentMap).forEach(a => iconWrapBtn.classList.remove(a.bg15));
            iconWrapBtn.classList.toggle('bg-white/25', active);
            iconWrapBtn.classList.toggle(btnAccent.bg15, !active);

            const iconEl = btn.querySelector('.tab-icon');
            const labelEl = btn.querySelector('.tab-label');
            Object.values(accentMap).forEach(a => { iconEl.classList.remove(a.text); labelEl.classList.remove(a.text); });
            iconEl.classList.toggle('text-white', active);
            labelEl.classList.toggle('text-white', active);
            iconEl.classList.toggle(btnAccent.text, !active);
            labelEl.classList.toggle(btnAccent.text, !active);
        });
    }

    showAtencion('alimentacion');

    function toggleObjetivo(id) {
        const detail = document.getElementById('objetivo-detail-' + id);
        const arrow = document.getElementById('objetivo-arrow-' + id);
        if (!detail) return;
        detail.classList.toggle('hidden');
        if (arrow) arrow.textContent = detail.classList.contains('hidden') ? 'expand_more' : 'expand_less';
    }
</script>

<script src="carousel.js"></script>

</body>
</html>
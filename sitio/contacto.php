<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Contacto - Mateo Quinto A.C.</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="config.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="styles.css"/>
    <script src="auto-textos.js"></script>
<script src="nav.js" defer></script>
</head>
<body class="bg-surface text-on-background selection:bg-secondary-fixed selection:text-on-secondary-fixed">

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
<div class="w-full h-full bg-cover bg-center" style="background-image: url('img/contacto.jpg')"></div>
<div class="absolute inset-0 bg-primary/70 mix-blend-multiply"></div>
</div>
<div class="max-w-container-max mx-auto relative z-10">
<div class="max-w-[720px]">
<h1 class="font-headline-xl-mobile md:font-headline-xl text-headline-xl-mobile md:text-headline-xl text-white mb-6" data-txt="hero_titulo">
                        Contacto
                    </h1>
<p class="font-body-lg text-body-lg text-white/90 leading-relaxed" data-txt="hero_texto">
                        Estamos aquí para escucharte. Ya sea que quieras ser voluntario, donar o simplemente conocer más sobre nuestra labor comunitaria, tu mensaje es el primer paso para cultivar un cambio real.
                    </p>
</div>
</div>
</section>

<section class="py-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
<div class="lg:col-span-7 bg-white p-8 md:p-12 border border-outline-variant rounded shadow-sm">
<h2 class="font-headline-md text-headline-md text-primary mb-8" data-txt="form_titulo">Envíanos un mensaje</h2>
<form action="mailto:mateoquinto.ac@gmail.com" class="space-y-6" id="contact-form" method="POST">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="block font-label-md text-label-md text-on-surface-variant uppercase" for="name">Nombre Completo</label>
<input class="w-full px-4 py-3 rounded border border-outline bg-surface-bright focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all" id="name" name="name" placeholder="Juan Pérez" type="text"/>
</div>
<div class="space-y-2">
<label class="block font-label-md text-label-md text-on-surface-variant uppercase" for="email">Correo Electrónico</label>
<input class="w-full px-4 py-3 rounded border border-outline bg-surface-bright focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all" id="email" name="email" placeholder="juan@ejemplo.com" type="email"/>
</div>
</div>
<div class="space-y-2">
<label class="block font-label-md text-label-md text-on-surface-variant uppercase" for="subject">Asunto</label>
<select class="w-full px-4 py-3 rounded border border-outline bg-surface-bright focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all" id="subject" name="subject">
<option value="general">Consulta General</option>
<option value="volunteer">Voluntariado</option>
<option value="donation">Donaciones</option>
<option value="media">Prensa y Colaboraciones</option>
</select>
</div>
<div class="space-y-2">
<label class="block font-label-md text-label-md text-on-surface-variant uppercase" for="message">Mensaje</label>
<textarea class="w-full px-4 py-3 rounded border border-outline bg-surface-bright focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all" id="message" name="message" placeholder="¿Cómo podemos ayudarte hoy?" rows="6"></textarea>
</div>
<button class="bg-primary text-on-primary px-10 py-4 rounded font-label-md text-label-md uppercase tracking-widest hover:bg-opacity-90 transition-all flex items-center justify-center space-x-2" type="submit">
<span>Enviar Mensaje</span>
<span class="material-symbols-outlined">send</span>
</button>
</form>
</div>

<div class="lg:col-span-5 space-y-8">
<div class="bg-primary-container text-white p-8 md:p-10 rounded">
<h3 class="font-headline-md text-headline-md mb-6" data-txt="info_titulo">Nuestra Comunidad</h3>
<div class="space-y-6">
<div class="flex items-start space-x-4">
<span class="material-symbols-outlined text-secondary-container">location_on</span>
<a class="font-body-md text-body-md leading-snug hover:text-secondary-fixed transition-colors" href="https://goo.gl/maps/29G2gwNhr2xQnTrx5" rel="noopener noreferrer" target="_blank">
                                    Km. 14 Carretera a Tehuacán, Rancho las Ánimas. Colonia Las Ánimas, C.P. 72980. Amozoc, Puebla, México.
                                </a>
</div>
<div class="flex items-start space-x-4">
<span class="material-symbols-outlined text-secondary-container">call</span>
<a class="font-body-md text-body-md hover:text-secondary-fixed transition-colors" href="https://wa.me/522741359415?text=Hola.%20Quisiera%20contactarme%20con%20la%20Comunidad%20Mateo%20Quinto" rel="noopener noreferrer" target="_blank">+52 274 135 9415</a>
</div>
<div class="flex items-start space-x-4">
<span class="material-symbols-outlined text-secondary-container">mail</span>
<a class="font-body-md text-body-md hover:text-secondary-fixed transition-colors" href="mailto:mateoquinto.ac@gmail.com">mateoquinto.ac@gmail.com</a>
</div>
</div>
<hr class="my-8 border-on-primary-container opacity-30"/>
<div class="flex space-x-4">
<a aria-label="Facebook" class="social-icon bg-white/10 text-white hover:bg-secondary hover:text-on-secondary" href="https://www.facebook.com/mateoquintoac/" rel="noopener noreferrer" target="_blank">
<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.2c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12z"/></svg>
</a>
<a aria-label="Instagram" class="social-icon bg-white/10 text-white hover:bg-secondary hover:text-on-secondary" href="https://www.instagram.com/comunidadmv/" rel="noopener noreferrer" target="_blank">
<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.2c3.2 0 3.6 0 4.9.07 1.2.06 2 .25 2.4.42.6.24 1 .53 1.5 1s.76.9 1 1.5c.17.4.36 1.2.42 2.4.06 1.3.07 1.7.07 4.9s0 3.6-.07 4.9c-.06 1.2-.25 2-.42 2.4a4 4 0 0 1-1 1.5 4 4 0 0 1-1.5 1c-.4.17-1.2.36-2.4.42-1.3.06-1.7.07-4.9.07s-3.6 0-4.9-.07c-1.2-.06-2-.25-2.4-.42a4 4 0 0 1-1.5-1 4 4 0 0 1-1-1.5c-.17-.4-.36-1.2-.42-2.4C2.21 15.6 2.2 15.2 2.2 12s0-3.6.07-4.9c.06-1.2.25-2 .42-2.4a4 4 0 0 1 1-1.5 4 4 0 0 1 1.5-1c.4-.17 1.2-.36 2.4-.42C8.4 2.21 8.8 2.2 12 2.2zm0 1.8c-3.15 0-3.5 0-4.8.07-1 .04-1.55.21-1.9.35-.5.19-.85.42-1.22.79-.37.37-.6.72-.79 1.22-.14.35-.31.9-.35 1.9C3.07 8.5 3.06 8.85 3.06 12s0 3.5.07 4.8c.04 1 .21 1.55.35 1.9.19.5.42.85.79 1.22.37.37.72.6 1.22.79.35.14.9.31 1.9.35 1.3.06 1.65.07 4.8.07s3.5 0 4.8-.07c1-.04 1.55-.21 1.9-.35.5-.19.85-.42 1.22-.79.37-.37.6-.72.79-1.22.14-.35.31-.9.35-1.9.06-1.3.07-1.65.07-4.8s0-3.5-.07-4.8c-.04-1-.21-1.55-.35-1.9a3.2 3.2 0 0 0-.79-1.22 3.2 3.2 0 0 0-1.22-.79c-.35-.14-.9-.31-1.9-.35-1.3-.06-1.65-.07-4.8-.07zm0 4.4a5.6 5.6 0 1 1 0 11.2 5.6 5.6 0 0 1 0-11.2zm0 1.8a3.8 3.8 0 1 0 0 7.6 3.8 3.8 0 0 0 0-7.6zm5.8-2a1.3 1.3 0 1 1 0 2.6 1.3 1.3 0 0 1 0-2.6z"/></svg>
</a>
<a aria-label="TikTok" class="social-icon bg-white/10 text-white hover:bg-secondary hover:text-on-secondary" href="https://www.tiktok.com/@comunidad.mateo.q/" rel="noopener noreferrer" target="_blank">
<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.6 2h-3.2v13.3a2.7 2.7 0 1 1-2.2-2.66v-3.24a5.9 5.9 0 1 0 5.4 5.9V8.4a7.6 7.6 0 0 0 4.4 1.4V6.6a4.4 4.4 0 0 1-4.4-4.4z"/></svg>
</a>
<a aria-label="WhatsApp" class="social-icon bg-white/10 text-white hover:bg-secondary hover:text-on-secondary" href="https://wa.me/522741359415?text=Hola.%20Quisiera%20contactarme%20con%20la%20Comunidad%20Mateo%20Quinto" rel="noopener noreferrer" target="_blank">
<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M16.001 3C9.373 3 4 8.373 4 15c0 2.362.687 4.564 1.874 6.418L4 29l7.762-1.834A11.94 11.94 0 0 0 16.001 27C22.628 27 28 21.627 28 15S22.628 3 16.001 3zm0 21.6c-1.98 0-3.822-.58-5.373-1.578l-.385-.242-4.605 1.088 1.115-4.483-.256-.4A9.566 9.566 0 0 1 5.4 15c0-5.85 4.75-10.6 10.601-10.6S26.6 9.15 26.6 15 21.852 24.6 16.001 24.6zm5.815-7.938c-.318-.16-1.884-.929-2.176-1.035-.292-.106-.505-.16-.717.16-.212.318-.823 1.035-1.01 1.248-.186.212-.372.239-.69.08-.318-.16-1.343-.495-2.559-1.577-.946-.844-1.585-1.885-1.771-2.203-.186-.318-.02-.49.14-.649.144-.143.318-.372.478-.558.16-.186.212-.318.318-.53.106-.212.053-.398-.027-.558-.08-.16-.717-1.728-.983-2.366-.259-.62-.522-.536-.717-.546l-.611-.011c-.212 0-.558.08-.85.398-.292.318-1.115 1.09-1.115 2.658s1.141 3.083 1.3 3.297c.16.212 2.245 3.428 5.44 4.808.76.328 1.353.524 1.815.671.762.242 1.456.208 2.005.126.612-.091 1.884-.77 2.15-1.514.266-.744.266-1.381.186-1.514-.08-.133-.292-.212-.61-.372z"/></svg>
</a>
</div>
</div>

<div class="relative rounded overflow-hidden h-72 border border-outline-variant shadow-sm">
<iframe allowfullscreen="" class="w-full h-full" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.362235263235!2d-98.06803939999999!3d19.047804799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x867e01dd8a21fe05%3A0x65a59bdb360f412!2sMateo%20Quinto%20A.C.!5e0!3m2!1ses!2smx!4v1784525797526!5m2!1ses!2smx" style="border:0;"></iframe>
</div>
</div>
</div>
</section>

<section class="h-96 relative w-full overflow-hidden">
<img class="w-full h-full object-cover grayscale-[0.2]" alt="Cultivos en el invernadero comunitario de Mateo Quinto A.C." src="img/invernadero-jitomates.jpg"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/60 to-transparent"></div>
<div class="absolute bottom-12 left-margin-mobile md:left-margin-desktop">
<h2 class="font-headline-xl text-headline-xl text-white italic" data-txt="frase_cierre">"Sembrando comunidad, cosechando futuro."</h2>
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
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = this.querySelector('button');
            const originalText = btn.innerHTML;

            const name = this.querySelector('#name').value.trim();
            const email = this.querySelector('#email').value.trim();
            const subjectLabel = this.querySelector('#subject').selectedOptions[0].text;
            const message = this.querySelector('#message').value.trim();

            const body = `Nombre: ${name}\nCorreo: ${email}\n\n${message}`;
            const mailtoLink = `mailto:mateoquinto.ac@gmail.com?subject=${encodeURIComponent('Contacto web - ' + subjectLabel)}&body=${encodeURIComponent(body)}`;

            btn.innerHTML = '<span class="material-symbols-outlined animate-spin">sync</span><span>Abriendo tu correo...</span>';
            btn.disabled = true;

            window.location.href = mailtoLink;

            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            }, 2000);
        });

        window.addEventListener('scroll', function() {
            const scroll = window.pageYOffset;
            const divider = document.querySelector('section img');
            if (divider) {
                divider.style.transform = `translateY(${scroll * 0.05}px)`;
            }
        });
    </script>

   <a aria-label="Contactar por WhatsApp" class="whatsapp-float whatsapp-float--pulse" href="https://wa.me/522741359415?text=Hola.%20Quisiera%20contactarme%20con%20la%20Comunidad%20Mateo%20Quinto" rel="noopener noreferrer" target="_blank">
        <img alt="Mateo Quinto A.C." src="logo.png"/>
    </a>

</body>
</html>
<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html class="scroll-smooth" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Mateo Quinto A.C. | Una comunidad que vive en familia</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="config.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,400;0,8..60,600;0,8..60,700;1,8..60,400&family=Hanken+Grotesk:wght@400;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <link rel="stylesheet" href="styles.css"/>
    <script src="auto-textos.js"></script>
<script src="nav.js" defer></script>

    </head>
<body class="bg-surface font-body-md text-on-surface selection:bg-secondary/30">

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

    <section class="relative min-h-[90vh] flex items-center overflow-hidden bg-primary" id="inicio">
        <div class="absolute inset-0 z-0">
            <video autoplay class="w-full h-full object-cover" loop muted playsinline poster="video/mq-banner-poster.jpg">
                <source src="video/inicio.mp4" type="video/mp4"/>
            </video>
            <div class="absolute inset-0 bg-primary/80"></div>
        </div>
        <button aria-label="Activar o silenciar el sonido del video" class="absolute bottom-6 right-6 z-10 w-10 h-10 rounded-full bg-black/30 text-white flex items-center justify-center border border-white/30 hover:bg-black/50 transition-colors" id="muteBtn" onclick="toggleHeroSound()">
            <span class="material-symbols-outlined text-lg" id="muteIcon">volume_off</span>
        </button>
        <div class="relative z-10 w-full max-w-container-max mx-auto px-margin-mobile md:px-gutter py-stack-xl">
            <div class="max-w-3xl">
            
                <h1 class="font-headline-xl text-headline-xl text-white mb-6 md:text-headline-xl lg:text-[64px] leading-tight">
                    Mateo Quinto A.C. <br/><span class="text-secondary-fixed-dim italic" data-txt="hero_tagline">Un hogar donde el amor, la dignidad y la inclusión hacen la diferencia.</span>
                </h1>
                <p class="font-body-lg text-body-lg text-white/90 mb-10 max-w-2xl leading-relaxed" data-txt="hero_descripcion">
                    Somos una comunidad dedicada a brindar hogar, cuidado y formación integral a niñas, adolescentes y jóvenes con discapacidad en situación de abandono. Un espacio donde se vive con amor, respeto y conexión con la naturaleza.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a class="bg-secondary text-on-primary px-8 py-4 rounded-lg font-label-md text-label-md font-bold hover:brightness-110 active:scale-[0.98] transition-all shadow-lg shadow-secondary/20" href="objetivos.php">
                        Conoce más
                    </a>
                    <a class="border border-white/30 text-white px-8 py-4 rounded-lg font-label-md text-label-md hover:bg-white/10 active:scale-[0.98] transition-all backdrop-blur-sm" href="nuestra_labor.php">
                        Nuestra Obra
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-stack-xl bg-surface-container-low" id="nosotros">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-stack-lg items-center">
                <div class="space-y-6">
                    <h2 class="font-headline-lg text-headline-lg text-primary" data-txt="objetivo_titulo">Nuestro Objetivo</h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed" data-txt="objetivo_texto">
                        Formamos integralmente a niñas, adolescentes y jóvenes de orfandad y que presenten una discapacidad, a través de valores como compromiso, empatía, familia, sustentabilidad y solidaridad.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                        <div class="flex gap-4 items-start">
                            <div class="w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">home_health</span>
                            </div>
                            <div>
                                <h4 class="font-headline-sm text-headline-sm text-primary mb-1">Un Hogar Real</h4>
                                <p class="text-on-surface-variant text-body-md">Más que una institución, somos una familia que acoge con amor.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">eco</span>
                            </div>
                            <div>
                                <h4 class="font-headline-sm text-headline-sm text-primary mb-1">Vida Natural</h4>
                                <p class="text-on-surface-variant text-body-md">Conexión a través del contacto directo con la tierra y el entorno.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div aria-label="Fotos de la comunidad" class="carousel relative rounded-xl overflow-hidden shadow-xl aspect-[4/3]" id="home-carousel">
                        <div class="carousel-slide active">
                            <img alt="Joven cuidando la crianza de codornices" src="img/1.jpg"/>
                        </div>
                        <div class="carousel-slide">
                            <img alt="Celebración comunitaria con piñata" src="img/taller-manualidades.jpg"/>
                        </div>
                        <div class="carousel-slide">
                            <img alt="Jóvenes jugando basquetbol en comunidad" src="img/3.jpg"/>
                        </div>
                        <div class="carousel-slide">
                            <img alt="Taller comunitario" src="img/4.jpg"/>
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

    <section class="py-stack-xl bg-surface relative overflow-hidden" id="valores">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-stack-lg">
                <h2 class="font-headline-lg text-headline-lg text-primary mb-4">Valores que nos Guían</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Construimos un entorno seguro y transparente donde cada persona encuentra el apoyo, el respeto y la atención que merece.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-stack-md">
                <div class="bg-surface-container-lowest p-10 rounded-2xl border border-outline-variant/30 hover-lift text-center group cursor-pointer" onclick="openValorModal('compromiso')">
                    <div class="w-20 h-20 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-secondary text-4xl" style="font-variation-settings: 'FILL' 1;">handshake</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-3">Compromiso</h3>
                    <div class="flex items-center justify-center gap-2 text-on-surface-variant">
                        <span class="material-symbols-outlined text-lg">touch_app</span>
                        <span class="font-label-md text-label-md">Presiona para más información</span>
                    </div>
                </div>
                <div class="bg-surface-container-lowest p-10 rounded-2xl border border-outline-variant/30 hover-lift text-center group cursor-pointer" onclick="openValorModal('empatia')">
                    <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-primary text-4xl" style="font-variation-settings: 'FILL' 1;">diversity_3</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-3">Empatía</h3>
                    <div class="flex items-center justify-center gap-2 text-on-surface-variant">
                        <span class="material-symbols-outlined text-lg">touch_app</span>
                        <span class="font-label-md text-label-md">Presiona para más información</span>
                    </div>
                </div>
                <div class="bg-surface-container-lowest p-10 rounded-2xl border border-outline-variant/30 hover-lift text-center group cursor-pointer" onclick="openValorModal('familia')">
                    <div class="w-20 h-20 bg-secondary-container/10 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-secondary text-4xl" style="font-variation-settings: 'FILL' 1;">family_restroom</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-3">Familia</h3>
                    <div class="flex items-center justify-center gap-2 text-on-surface-variant">
                        <span class="material-symbols-outlined text-lg">touch_app</span>
                        <span class="font-label-md text-label-md">Presiona para más información</span>
                    </div>
                </div>
                <div class="bg-surface-container-lowest p-10 rounded-2xl border border-outline-variant/30 hover-lift text-center group cursor-pointer" onclick="openValorModal('sustentabilidad')">
                    <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-primary text-4xl" style="font-variation-settings: 'FILL' 1;">eco</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-3">Sustentabilidad</h3>
                    <div class="flex items-center justify-center gap-2 text-on-surface-variant">
                        <span class="material-symbols-outlined text-lg">touch_app</span>
                        <span class="font-label-md text-label-md">Presiona para más información</span>
                    </div>
                </div>
                <div class="bg-surface-container-lowest p-10 rounded-2xl border border-outline-variant/30 hover-lift text-center group cursor-pointer" onclick="openValorModal('solidaridad')">
                    <div class="w-20 h-20 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-secondary text-4xl" style="font-variation-settings: 'FILL' 1;">volunteer_activism</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-3">Solidaridad</h3>
                    <div class="flex items-center justify-center gap-2 text-on-surface-variant">
                        <span class="material-symbols-outlined text-lg">touch_app</span>
                        <span class="font-label-md text-label-md">Presiona para más información</span>
                    </div>
                </div>
            </div>
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

    <script>
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 20) {
                header.classList.add('py-2', 'shadow-md');
            } else {
                header.classList.remove('py-2', 'shadow-md');
            }
        });
    </script>

    <script>
        const valoresData = {
            compromiso: {
                title: 'Compromiso',
                icon: 'handshake',
                iconBg: 'bg-secondary/10',
                iconColor: 'text-secondary',
                desc: 'Estamos comprometidos con el bienestar y desarrollo de las personas que forman parte de nuestra comunidad, así como la protección y cuidado del medio ambiente.'
            },
            empatia: {
                title: 'Empatía',
                icon: 'diversity_3',
                iconBg: 'bg-primary/10',
                iconColor: 'text-primary',
                desc: 'Fomentamos la empatía y el respeto hacia las personas con discapacidad y sus necesidades específicas, promoviendo su inclusión y participación activa en la sociedad.'
            },
            familia: {
                title: 'Familia',
                icon: 'family_restroom',
                iconBg: 'bg-secondary/10',
                iconColor: 'text-secondary',
                desc: 'Consideramos a nuestra comunidad como una familia, en la que se promueve el amor, el respeto y la colaboración entre miembros.'
            },
            sustentabilidad: {
                title: 'Sustentabilidad',
                icon: 'eco',
                iconBg: 'bg-primary/10',
                iconColor: 'text-primary',
                desc: 'Nos preocupamos por el impacto ambiental de nuestras actividades, promoviendo prácticas sustentables y amigables con el medio ambiente.'
            },
            solidaridad: {
                title: 'Solidaridad',
                icon: 'volunteer_activism',
                iconBg: 'bg-secondary/10',
                iconColor: 'text-secondary',
                desc: 'Fomentamos la solidaridad entre los miembros de nuestra comunidad, así como con otras organizaciones y grupos sociales, compartiendo nuestros conocimientos y experiencias para generar un cambio positivo en la sociedad.'
            }
        };

        function openValorModal(id) {
            const data = valoresData[id];
            if (!data) return;
            document.getElementById('valor-modal-title').textContent = data.title;
            document.getElementById('valor-modal-desc').textContent = data.desc;

            const iconEl = document.getElementById('valor-modal-icon');
            iconEl.textContent = data.icon;
            iconEl.className = 'material-symbols-outlined text-3xl ' + data.iconColor;

            const iconWrap = document.getElementById('valor-modal-icon-wrap');
            iconWrap.className = 'w-16 h-16 rounded-full flex items-center justify-center mb-6 ' + data.iconBg;

            const modal = document.getElementById('valor-modal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            requestAnimationFrame(() => {
                document.getElementById('valor-modal-backdrop').classList.remove('opacity-0');
                document.getElementById('valor-modal-backdrop').classList.add('opacity-100');
                const card = document.getElementById('valor-modal-card');
                card.classList.remove('opacity-0', 'scale-95');
                card.classList.add('opacity-100', 'scale-100');
            });
        }

        function closeValorModal() {
            const backdrop = document.getElementById('valor-modal-backdrop');
            const card = document.getElementById('valor-modal-card');
            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            card.classList.remove('opacity-100', 'scale-100');
            card.classList.add('opacity-0', 'scale-95');
            document.body.style.overflow = '';
            setTimeout(() => {
                document.getElementById('valor-modal').classList.add('hidden');
            }, 300);
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeValorModal();
        });
    </script>

    <script src="carousel.js"></script>

    <script>
        function toggleHeroSound() {
            const video = document.querySelector('#inicio video');
            const icon = document.getElementById('muteIcon');
            video.muted = !video.muted;
            icon.textContent = video.muted ? 'volume_off' : 'volume_up';
        }
    </script>
   
    <div class="fixed inset-0 z-[100] hidden" id="valor-modal">
        <div class="absolute inset-0 bg-primary/50 backdrop-blur-sm opacity-0 transition-opacity duration-300" id="valor-modal-backdrop" onclick="closeValorModal()"></div>
        <div class="relative z-10 flex items-center justify-center min-h-screen p-6">
            <div class="relative bg-white rounded-2xl max-w-lg w-full p-10 shadow-2xl scale-95 opacity-0 transition-all duration-300" id="valor-modal-card">
                <button aria-label="Cerrar" class="absolute top-5 right-5 w-9 h-9 rounded-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container transition-colors" onclick="closeValorModal()">
                    <span class="material-symbols-outlined">close</span>
                </button>
                <div class="w-16 h-16 rounded-full bg-secondary/10 flex items-center justify-center mb-6" id="valor-modal-icon-wrap">
                    <span class="material-symbols-outlined text-secondary text-3xl" id="valor-modal-icon">handshake</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-primary mb-4" id="valor-modal-title">Compromiso</h3>
                <p class="text-on-surface-variant leading-relaxed" id="valor-modal-desc"></p>
            </div>
        </div>
    </div>

     <a aria-label="Contactar por WhatsApp" class="whatsapp-float whatsapp-float--pulse" href="https://wa.me/522741359415?text=Hola.%20Quisiera%20contactarme%20con%20la%20Comunidad%20Mateo%20Quinto" rel="noopener noreferrer" target="_blank">
        <img alt="Mateo Quinto A.C." src="logo.png"/>
    </a>

</body>
</html>
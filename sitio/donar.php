<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Donar | Mateo Quinto A.C.</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="config.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

        <link rel="stylesheet" href="styles.css"/>
        <script src="auto-textos.js"></script>
<script src="nav.js" defer></script>
</head>
<body class="bg-surface text-on-surface font-body-md selection:bg-secondary-fixed selection:text-on-secondary-fixed">

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
<div class="w-full h-full bg-cover bg-center" style="background-image: url('img/gym2.jpg')"></div>
<div class="absolute inset-0 bg-primary/70 mix-blend-multiply"></div>
</div>
<div class="max-w-container-max mx-auto relative z-10">
<div class="max-w-[720px]">
<h1 class="font-headline-xl-mobile md:font-headline-xl text-headline-xl-mobile md:text-headline-xl text-white mb-6">
                  Tu ayuda transforma realidades

                    </h1>
<p class="font-body-lg text-body-lg text-white/90 leading-relaxed">
              Para seguir haciendo un impacto positivo, aceptamos y agradecemos diferentes tipos de apoyo. Somos un equipo apasionado, altruista, trabajador y que siempre busca llevar una mejor calidad de vida a quienes lo necesitan. </p>
</div>
</div>
</section>

        <section class="py-24 bg-surface" id="donar">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-stretch">
                    
                    <div class="lg:col-span-5 bg-white border border-outline-variant rounded-xl p-8 md:p-12 h-fit">
                        <h2 class="font-headline-md text-headline-md text-primary mb-8">Elige tu aporte</h2>

                        <div class="mb-6">
                            <label class="block font-label-md text-on-surface-variant mb-2" for="donation-amount">¿Cuánto quieres aportar? (MXN)</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-2xl">$</span>
                                <input class="w-full pl-10 pr-4 py-6 border border-outline-variant rounded-lg focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all font-headline-md text-headline-md text-primary" id="donation-amount" min="1" placeholder="0" type="number"/>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                            <div>
                                <label class="block font-label-md text-on-surface-variant mb-2" for="donor-nombre">Nombre (opcional)</label>
                                <input class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all" id="donor-nombre" placeholder="Tu nombre" type="text"/>
                            </div>
                            <div>
                                <label class="block font-label-md text-on-surface-variant mb-2" for="donor-email">Correo (opcional)</label>
                                <input class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all" id="donor-email" placeholder="tucorreo@ejemplo.com" type="email"/>
                            </div>
                        </div>

                        <button class="w-full bg-secondary text-on-secondary py-5 rounded-lg font-headline-md hover:opacity-90 transition-all shadow-lg shadow-secondary/20" id="btn-pagar">
                            Continuar al pago
                        </button>
                        <p class="mt-2 text-center text-error text-label-md hidden" id="donation-error">Por favor ingresa un monto válido.</p>
                        <p class="mt-2 text-center text-on-surface-variant text-label-md hidden" id="donation-guardando">Registrando tu donativo...</p>

                        <div class="mt-6 flex items-center justify-center gap-2 text-on-surface-variant opacity-70 text-label-md">
                            <span class="material-symbols-outlined text-sm">lock</span>
                            Pago 100% seguro y encriptado
                        </div>
                    </div>

                    <div class="lg:col-span-7 bg-primary-fixed rounded-xl p-8 md:p-12 flex flex-col justify-center border border-outline-variant">
                        <div class="max-w-lg">
                            <span class="material-symbols-outlined text-primary text-5xl mb-6">groups</span>
                            <h3 class="font-headline-md text-headline-md text-primary mb-4">¿Prefieres donar tu tiempo?</h3>
                            <p class="font-body-md text-on-surface-variant mb-8 leading-relaxed">
                                La transformación real sucede en el campo. Únete a nuestras brigadas de reforestación, talleres comunitarios o programas de mentoría. Tu presencia es el recurso más valioso.
                            </p>
                            <button type="button" id="btn-abrir-voluntariado" class="inline-block bg-primary text-on-primary px-8 py-4 rounded-lg font-label-md hover:opacity-90 transition-all">
                                Quiero ser voluntario
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>

      
        <div id="modal-voluntariado" class="hidden fixed inset-0 z-[60] flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-black/50" id="modal-voluntariado-overlay"></div>
            <div class="relative bg-white rounded-xl p-8 max-w-md w-full shadow-xl">
                <button type="button" id="btn-cerrar-voluntariado" class="absolute top-4 right-4 text-on-surface-variant hover:text-primary" aria-label="Cerrar">
                    <span class="material-symbols-outlined">close</span>
                </button>
                <h3 class="font-headline-md text-headline-md text-primary mb-2">Registro de voluntariado</h3>
                <p class="text-on-surface-variant text-body-md mb-6">Déjanos tus datos y te contactaremos para coordinar tu participación.</p>

                <div id="voluntariado-alert" class="hidden text-sm rounded-md px-3 py-2 mb-4 border"></div>

                <form id="form-voluntariado" class="space-y-4">
                    <div>
                        <label class="block font-label-md text-on-surface-variant mb-1" for="vol-nombre">Nombre completo</label>
                        <input required class="w-full px-4 py-2.5 border border-outline-variant rounded-lg focus:ring-1 focus:ring-primary focus:border-primary outline-none" id="vol-nombre" type="text"/>
                    </div>
                    <div>
                        <label class="block font-label-md text-on-surface-variant mb-1" for="vol-email">Correo electrónico</label>
                        <input required class="w-full px-4 py-2.5 border border-outline-variant rounded-lg focus:ring-1 focus:ring-primary focus:border-primary outline-none" id="vol-email" type="email"/>
                    </div>
                    <div>
                        <label class="block font-label-md text-on-surface-variant mb-1" for="vol-telefono">Teléfono</label>
                        <input class="w-full px-4 py-2.5 border border-outline-variant rounded-lg focus:ring-1 focus:ring-primary focus:border-primary outline-none" id="vol-telefono" type="tel"/>
                    </div>
                    <div>
                        <label class="block font-label-md text-on-surface-variant mb-1" for="vol-mensaje">¿Cómo te gustaría ayudar?</label>
                        <textarea class="w-full px-4 py-2.5 border border-outline-variant rounded-lg focus:ring-1 focus:ring-primary focus:border-primary outline-none" id="vol-mensaje" rows="3"></textarea>
                    </div>
                    <button type="submit" id="btn-enviar-voluntariado" class="w-full bg-primary text-on-primary py-3 rounded-lg font-label-md hover:opacity-90 transition-all">
                        Enviar registro
                    </button>
                </form>
            </div>
        </div>

        <section class="py-24 border-y border-outline-variant">
            <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop text-center">
                <h2 class="font-headline-lg text-primary mb-12">Métodos de pago aceptados</h2>
                <div class="flex flex-wrap justify-center gap-12 opacity-80">
                    <div class="flex flex-col items-center gap-2">
                        <span class="material-symbols-outlined text-5xl text-primary">credit_card</span>
                        <span class="font-label-md">Crédito/Débito</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <span class="material-symbols-outlined text-5xl text-primary">payments</span>
                        <span class="font-label-md">PayPal</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <span class="material-symbols-outlined text-5xl text-primary">account_balance</span>
                        <span class="font-label-md">SPEI / Transferencia</span>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <span class="material-symbols-outlined text-5xl text-primary">receipt_long</span>
                        <span class="font-label-md">Recibo deducible</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-primary text-on-primary">
            <div class="max-w-4xl mx-auto px-margin-mobile text-center">
                <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">eco</span>
                <h2 class="font-headline-xl-mobile md:font-headline-xl mb-8">Cada semilla cuenta en este bosque</h2>
                <p class="font-body-lg mb-12 opacity-90">Tu generosidad es la fuerza que nos permite seguir cultivando un futuro más justo y verde para todos.</p>
                <div class="flex justify-center gap-6">
                    <a href="#donar" class="bg-secondary-fixed text-on-secondary-fixed-variant px-12 py-4 rounded-lg font-label-md hover:opacity-90 transition-all inline-block">
                        Donar ahora
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="w-full bg-primary-container">
        <div class="flex flex-col md:flex-row justify-between items-center py-12 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
            <div class="flex items-center gap-3 mb-8 md:mb-0">
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
        const API_BASE = "";
        const STRIPE_LINK = "https://donate.stripe.com/6oU8wRc8i5bGbIE9nx9MY01";

        const amountInput = document.getElementById('donation-amount');
        const btnPagar = document.getElementById('btn-pagar');
        const donationError = document.getElementById('donation-error');
        const donationGuardando = document.getElementById('donation-guardando');

        btnPagar.addEventListener('click', async () => {
            const monto = parseFloat(amountInput.value);

            if (!monto || monto <= 0) {
                donationError.classList.remove('hidden');
                amountInput.focus();
                return;
            }
            donationError.classList.add('hidden');
            donationGuardando.classList.remove('hidden');
            btnPagar.disabled = true;

            const nombre = document.getElementById('donor-nombre').value.trim();
            const email = document.getElementById('donor-email').value.trim();

            try {
                await fetch(`${API_BASE}api/donaciones`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ nombre, email, monto }),
                });
            } catch (err) {
               
                console.warn('No se pudo registrar el donativo localmente:', err);
            }

            const montoEnCentavos = Math.round(monto * 100);
            window.location.href = `${STRIPE_LINK}?prefilled_amount=${montoEnCentavos}`;
        });

        const modalVoluntariado = document.getElementById('modal-voluntariado');
        const abrirVoluntariado = () => modalVoluntariado.classList.remove('hidden');
        const cerrarVoluntariado = () => modalVoluntariado.classList.add('hidden');

        document.getElementById('btn-abrir-voluntariado').addEventListener('click', abrirVoluntariado);
        document.getElementById('btn-cerrar-voluntariado').addEventListener('click', cerrarVoluntariado);
        document.getElementById('modal-voluntariado-overlay').addEventListener('click', cerrarVoluntariado);

        document.getElementById('form-voluntariado').addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = document.getElementById('btn-enviar-voluntariado');
            const alertBox = document.getElementById('voluntariado-alert');

            const nombre = document.getElementById('vol-nombre').value.trim();
            const email = document.getElementById('vol-email').value.trim();
            const telefono = document.getElementById('vol-telefono').value.trim();
            const mensaje = document.getElementById('vol-mensaje').value.trim();

            alertBox.className = 'hidden text-sm rounded-md px-3 py-2 mb-4 border';
            btn.disabled = true;
            btn.textContent = 'Enviando...';

            try {
                const resp = await fetch(`${API_BASE}api/voluntarios`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ nombre, email, telefono, mensaje }),
                });
                const data = await resp.json();
                if (!resp.ok) throw new Error(data.error || 'No se pudo enviar tu registro.');

                alertBox.textContent = '¡Gracias! Tu registro de voluntariado fue recibido. Te contactaremos pronto.';
                alertBox.classList.add('bg-green-50', 'text-green-700', 'border-green-200');
                alertBox.classList.remove('hidden');
                document.getElementById('form-voluntariado').reset();
                setTimeout(cerrarVoluntariado, 2200);
            } catch (err) {
                alertBox.textContent = err.message;
                alertBox.classList.add('bg-red-50', 'text-red-700', 'border-red-200');
                alertBox.classList.remove('hidden');
            } finally {
                btn.disabled = false;
                btn.textContent = 'Enviar registro';
            }
        });
    </script>

   
   
    < <a aria-label="Contactar por WhatsApp" class="whatsapp-float whatsapp-float--pulse" href="https://wa.me/522741359415?text=Hola.%20Quisiera%20contactarme%20con%20la%20Comunidad%20Mateo%20Quinto" rel="noopener noreferrer" target="_blank">
        <img alt="Mateo Quinto A.C." src="logo.png"/>
    </a>

</body>
</html>
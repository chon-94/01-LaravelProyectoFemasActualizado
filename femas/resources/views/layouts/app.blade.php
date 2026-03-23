<!-- resources/views/layouts/app.blade.php -->
<!-- Layout principal: contiene navbar, footer y estructura base para todas las vistas -->

<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<!-- lang="es": declara el idioma para accesibilidad y SEO -->
<!-- class="scroll-smooth": habilita scroll suave para enlaces con anclas -->

    <head>
        <!-- Metadatos básicos -->
        <meta charset="UTF-8">
        <!-- charset="UTF-8": soporta caracteres especiales y acentos en español -->
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- viewport: hace la página responsive en móviles -->
        
        <title>Femas | Portafolio Profesional</title>
        <!-- Título que aparece en la pestaña del navegador y en resultados de búsqueda -->
        
        <!-- Bootstrap CSS desde CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Vite: carga Tailwind CSS y JS compilados -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

<body>

    {{-- Barra de navegación fija con menú adaptable a móvil y desktop --}}
    <nav class="fixed top-0 left-0 right-0 z-50 w-11/12 mx-auto mt-4 bg-orange-200/35 backdrop-blur-sm rounded-full text-sm py-3 border-2 border-black transition shadow-lg">

        <div class="container mx-auto px-4 flex items-center justify-between">
            <!-- Contenedor flexible: separa logo (izquierda) y menú (derecha) -->
            
            {{-- Logo: siempre visible en todos los dispositivos --}}
            <div>
                <a href="{{ route('home') }}">
                    <!-- route('home'): genera la URL de la ruta nombrada -->
                    <img src="{{ asset('images/fema.png') }}" class="h-10 w-auto">
                    <!-- asset(): genera URL pública para archivos en public/ -->
                    <!-- h-10: altura fija, w-auto: mantiene proporción -->
                </a>
            </div>
            {{-- Logo: siempre visible en todos los dispositivos --}}            

            {{-- Botón hamburguesa: solo visible en móvil (md:hidden) --}}
            <button id="mobile-menu-btn" class="md:hidden p-2 text-dark hover:bg-orange-300 rounded-lg transition">
                <!-- Icono de menú (tres líneas) - visible cuando el menú está cerrado -->
                <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <!-- Icono de cerrar (X) - oculto por defecto, visible cuando el menú está abierto -->
                <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            {{-- Botón hamburguesa: solo visible en móvil (md:hidden) --}}

            {{-- Menú desktop: oculto en móvil, visible desde md (≥768px) --}}
            <div class="hidden md:flex items-center space-x-1">
                <!-- Enlaces con clase nav-carousel-link para control JS del carousel -->
                <!-- data-slide-target: identificador para navegar a slides específicos -->
                <a href="#" class="nav-carousel-link px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition" data-slide-target="home">Inicio</a>
                <a href="#" class="nav-carousel-link px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition" data-slide-target="diferencial">Diferencial</a>
                <a href="#" class="nav-carousel-link px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition" data-slide-target="mision">Misión</a>
                <a href="#" class="nav-carousel-link px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition" data-slide-target="vision">Visión</a>
                <!-- Enlaces con anclas para scroll suave a secciones de home.blade.php -->
                <a href="{{ route('home') }}#proyectos" class="px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition">Proyectos</a>
                <a href="{{ route('home') }}#contacto" class="px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition">Contáctame</a>
            </div>
            {{-- Menú desktop: oculto en móvil, visible desde md (≥768px) --}}

        </div>
        
        {{-- Menú móvil: oculto por defecto, se muestra con JavaScript --}}
        <div id="mobile-menu" class="hidden md:hidden mt-4 mx-4 pb-4 bg-orange-200/50 rounded-2xl border border-black/20">
            <!-- flex-col: apila los enlaces verticalmente para móvil -->
            <div class="flex flex-col space-y-2 px-4">
                <!-- Los mismos enlaces que desktop, pero en formato vertical centrado -->
                <a href="#" class="nav-carousel-link block px-4 py-3 text-dark hover:bg-orange-300 hover:text-white rounded-xl transition text-center" data-slide-target="home"> Inicio</a>
                <a href="#" class="nav-carousel-link block px-4 py-3 text-dark hover:bg-orange-300 hover:text-white rounded-xl transition text-center" data-slide-target="diferencial"> Diferencial</a>
                <a href="#" class="nav-carousel-link block px-4 py-3 text-dark hover:bg-orange-300 hover:text-white rounded-xl transition text-center" data-slide-target="mision"> Misión</a>
                <a href="#" class="nav-carousel-link block px-4 py-3 text-dark hover:bg-orange-300 hover:text-white rounded-xl transition text-center" data-slide-target="vision">Visión</a>
                <a href="{{ route('home') }}#proyectos" class="block px-4 py-3 text-dark hover:bg-orange-300 hover:text-white rounded-xl transition text-center"> Proyectos</a>
                <a href="{{ route('home') }}#contacto" class="block px-4 py-3 text-dark hover:bg-orange-300 hover:text-white rounded-xl transition text-center">Contáctame</a>
            </div>
        </div>
        {{-- Menú móvil: oculto por defecto, se muestra con JavaScript --}}

    </nav>
    {{-- /NAV BAR RESPONSIVE --}}


    {{-- CONTENIDO PRINCIPAL --}}
    {{-- pt-20: padding top para compensar la altura del navbar fijo --}}
    <main class="pt-20 bg-yellow-100">
        @yield('content') {{-- @yield('content'): punto de inyección para el contenido de cada vista --}}
    </main>
    {{-- /CONTENIDO PRINCIPAL --}}


    {{-- FOOTER --}}
    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <!-- date('Y'): muestra el año actual automáticamente -->
            <p>&copy; {{ date('Y') }} Fema</p>
        </div>
    </footer>
    {{-- /FOOTER --}}


    {{-- SCRIPTS GLOBALES --}}
    
    <!-- Bootstrap JS desde CDN (bundle incluye Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    // Esperar a que el DOM esté completamente cargado antes de ejecutar
    document.addEventListener('DOMContentLoaded', function() {
        
        // Toggle del menú móvil
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        
        if (mobileBtn) {
            mobileBtn.addEventListener('click', function() {
                // Mostrar/ocultar menú
                mobileMenu.classList.toggle('hidden');
                // Alternar iconos (menú / X)
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });
        }
        
        // Cerrar menú móvil al hacer click en un enlace
        const mobileLinks = document.querySelectorAll('#mobile-menu a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        });
        
        // Control del carousel desde los enlaces del navbar
        const carouselEl = document.getElementById('carouselFema');
        if (carouselEl) {
            const carousel = bootstrap.Carousel.getOrCreateInstance(carouselEl);
            const carouselLinks = document.querySelectorAll('.nav-carousel-link');
            
            carouselLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Obtener el slide objetivo desde el atributo data
                    const targetSlide = this.getAttribute('data-slide-target');
                    const slides = carouselEl.querySelectorAll('.carousel-item');
                    
                    // Buscar el índice del slide y navegar a él
                    slides.forEach((slide, index) => {
                        if (slide.getAttribute('data-slide-name') === targetSlide) {
                            carousel.to(index);
                        }
                    });
                    
                    // Si viene de otra página, redirigir a home con hash
                    if (window.location.pathname !== '/') {
                        window.location.href = '/#' + targetSlide;
                    }
                });
            });
            
            // Si hay hash en la URL (#mision, #vision), ir a ese slide al cargar
            if (window.location.hash) {
                const hash = window.location.hash.replace('#', '');
                const slides = carouselEl.querySelectorAll('.carousel-item');
                
                slides.forEach((slide, index) => {
                    if (slide.getAttribute('data-slide-name') === hash) {
                        setTimeout(() => carousel.to(index), 300);
                    }
                });
            }
        }
        
        // Efecto de navbar al hacer scroll
        const nav = document.querySelector('nav');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                nav.classList.add('shadow-xl');
                nav.classList.remove('mt-4');
            } else {
                nav.classList.remove('shadow-xl');
                nav.classList.add('mt-4');
            }
        });
    });
    </script>

    {{-- Stack para scripts específicos de cada vista --}}
    @stack('scripts')

</body>
</html>
<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Femas | Portafolio Profesional</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Vite (Tailwind) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

    <!-- NAV BAR -->
        <!-- NAV BAR -->
<!-- NAV BAR RESPONSIVE -->
<nav class="fixed top-0 left-0 right-0 z-50 w-11/12 mx-auto mt-4 bg-orange-200/35 backdrop-blur-sm rounded-full text-sm py-3 border-2 border-black transition shadow-lg">
    <div class="container mx-auto px-4 flex items-center justify-between">
        
        <!-- Logo (siempre visible) -->
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/fema.png') }}" class="h-10 w-auto">
            </a>
        </div>
        
        <!-- Botón Hamburguesa (SOLO MÓVIL) -->
        <button id="mobile-menu-btn" class="md:hidden p-2 text-dark hover:bg-orange-300 rounded-lg transition">
            <!-- Icono menú (se muestra cuando está cerrado) -->
            <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <!-- Icono X (se muestra cuando está abierto) -->
            <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        
        <!-- Menú Desktop (OCULTO EN MÓVIL) -->
        <div class="hidden md:flex items-center space-x-1">
            <a href="#" class="nav-carousel-link px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition" data-slide-target="home">Inicio</a>
            <a href="#" class="nav-carousel-link px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition" data-slide-target="diferencial">Diferencial</a>
            <a href="#" class="nav-carousel-link px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition" data-slide-target="mision">Misión</a>
            <a href="#" class="nav-carousel-link px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition" data-slide-target="vision">Visión</a>
            <a href="{{ route('home') }}#proyectos" class="px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition">Proyectos</a>
            <a href="{{ route('home') }}#contacto" class="px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition">Contáctame</a>
        </div>
    </div>
    
    <!-- Menú Móvil (OCULTO POR DEFECTO, SE MUESTRA CON JS) -->
    <div id="mobile-menu" class="hidden md:hidden mt-4 mx-4 pb-4 bg-orange-200/50 rounded-2xl border border-black/20">
        <div class="flex flex-col space-y-2 px-4">
            <a href="#" class="nav-carousel-link block px-4 py-3 text-dark hover:bg-orange-300 hover:text-white rounded-xl transition text-center" data-slide-target="home"> Inicio</a>
            <a href="#" class="nav-carousel-link block px-4 py-3 text-dark hover:bg-orange-300 hover:text-white rounded-xl transition text-center" data-slide-target="diferencial"> Diferencial</a>
            <a href="#" class="nav-carousel-link block px-4 py-3 text-dark hover:bg-orange-300 hover:text-white rounded-xl transition text-center" data-slide-target="mision"> Misión</a>
            <a href="#" class="nav-carousel-link block px-4 py-3 text-dark hover:bg-orange-300 hover:text-white rounded-xl transition text-center" data-slide-target="vision">Visión</a>
            <a href="{{ route('home') }}#proyectos" class="block px-4 py-3 text-dark hover:bg-orange-300 hover:text-white rounded-xl transition text-center"> Proyectos</a>
            <a href="{{ route('home') }}#contacto" class="block px-4 py-3 text-dark hover:bg-orange-300 hover:text-white rounded-xl transition text-center">Contáctame</a>
        </div>
    </div>
</nav>
    <!-- FIN NAV BAR -->

    <!-- Contenido Principal -->
    <main class="pt-20 bg-yellow-100">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Portafolio, hecho con Laravel & Tailwind.</p>
        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('nav');
        if (window.scrollY > 50) {
            nav.classList.add('shadow-xl', 'bg-blue-100');
            nav.classList.remove('mt-4');
        } else {
            nav.classList.remove('shadow-xl');
            nav.classList.add('mt-4');
        }
    });
</script>


<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ─────────────────────────────────────────────────────────
    // 📱 TOGGLE MENÚ MÓVIL
    // ─────────────────────────────────────────────────────────
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    
    if (mobileBtn) {
        mobileBtn.addEventListener('click', function() {
            // Toggle del menú
            mobileMenu.classList.toggle('hidden');
            
            // Toggle de iconos
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    }
    
    // Cerrar menú móvil al hacer click en un link
    const mobileLinks = document.querySelectorAll('#mobile-menu a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        });
    });
    
    // ─────────────────────────────────────────────────────────
    // 🎠 CONTROL DEL CAROUSEL DESDE NAVBAR
    // ─────────────────────────────────────────────────────────
    const carouselEl = document.getElementById('carouselFema');
    if (carouselEl) {
        const carousel = bootstrap.Carousel.getOrCreateInstance(carouselEl);
        const carouselLinks = document.querySelectorAll('.nav-carousel-link');
        
        carouselLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetSlide = this.getAttribute('data-slide-target');
                const slides = carouselEl.querySelectorAll('.carousel-item');
                
                slides.forEach((slide, index) => {
                    if (slide.getAttribute('data-slide-name') === targetSlide) {
                        carousel.to(index);
                    }
                });
                
                // Si estamos en otra página, ir a home primero
                if (window.location.pathname !== '/') {
                    window.location.href = '/#' + targetSlide;
                }
            });
        });
        
        // Ir al slide correcto si hay hash en la URL
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
    
    // ─────────────────────────────────────────────────────────
    // 🎨 EFECTO SCROLL EN NAVBAR
    // ─────────────────────────────────────────────────────────
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

<!-- Stack para scripts específicos de cada vista -->
@stack('scripts')
</html>
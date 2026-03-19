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
    <nav class="fixed top-0 left-0 right-0 z-50 w-11/12 mx-auto mt-4 bg-orange-200/50 backdrop-blur-sm rounded-full text-sm py-3 border-2 border-black  transition shadow-lg">
        <div class="container mx-auto flex flex-wrap items-center">

            <!-- NOMBRE Y LOGO -->
    <a href="{{ route('home') }}" >
        <img src="{{ asset('images/fema.jpeg') }}" class="h-12 w-auto">
    </a>
            <!-- NOMBRE Y LOGO -->

            <!-- OPCIONES PRINCIPALES -->
            <div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">


                    <!-- inicio -->
                    <li class="mr-3">
                        <a href="{{ route('home') }}" class="px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition">
                            inicio
                        </a>
                    </li>

                    <!-- Proyectos -->
                    <li class="mr-3">
                        <a href="{{ route('home') }}#proyectos" class="px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition">
                            Proyectos
                        </a>
                    </li>

                    <!-- Contacto -->
                    <li class="mr-3">
                        <a href="{{ route('home') }}#contacto" class="px-4 py-2 text-dark hover:bg-orange-300 hover:text-white rounded-full transition">
                            Contactame
                        </a>
                    </li>

                    <!-- about -->
                    <!-- <li class="mr-3">
                        <a href="{{ route('about') }}" class="px-4 py-2 bg-orange-300 text-dark rounded-full hover:bg-orange-500 transition shadow">  
                            about
                        </a>
                    </li>-->

                </ul>
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
</html>
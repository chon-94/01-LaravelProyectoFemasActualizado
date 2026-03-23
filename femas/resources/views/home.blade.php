{{-- resources/views/home.blade.php --}}
{{-- Vista principal del sitio Femas Ingenieros --}}
{{-- Esta vista extiende el layout principal y muestra: carousel, proyectos y contacto --}}

@extends('layouts.app')

@section('content')


    {{-- CAROUSEL BOOTSTRAP --}}

    {{-- Carousel automático con 4 slides que rotan cada 5 segundos --}}
    {{-- carousel-fade: usa transición de desvanecimiento en vez de deslizamiento --}}
    <div id="carouselFema" class="carousel slide carousel-fade" 
         data-bs-ride="carousel" data-bs-interval="5000">
        
        {{-- Indicadores: puntos en la parte inferior para navegación directa --}}
        {{-- Cada botón representa un slide y permite saltar directamente a él --}}
        {{-- class="active" en el primero: indica cuál slide está visible al cargar --}}
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselFema" 
                    data-bs-slide-to="0" class="active" 
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselFema" 
                    data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselFema" 
                    data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselFema" 
                    data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>

        {{-- Contenedor de todos los slides del carousel --}}
        {{-- Solo un slide tiene class="active" a la vez (el visible) --}}
        <div class="carousel-inner">
            
            {{-- Slide 1: Home / Presentación de la empresa --}}
            {{-- data-slide-name="home": identificador para que JS navegue a este slide --}}
            <div class="carousel-item active" data-slide-name="home">
                {{-- Imagen de fondo a pantalla completa --}}
                {{-- object-fit: cover mantiene proporción sin deformar --}}
                <img src="{{ asset('images/img1.jpg') }}" 
                     class="d-block w-100" 
                     style="height: 100vh; object-fit: cover;" 
                     alt="Fachada de proyecto de infraestructura vial">
                
                {{-- Leyenda con texto sobre la imagen --}}
                {{-- d-none d-md-block: oculto en móvil, visible en desktop (≥768px) --}}
                <div class="carousel-caption d-none d-md-block 
                            bg-black bg-opacity-50 rounded p-4">
                    <h1 class="text-4xl md:text-6xl font-bold mb-2">
                    FEMA<span class="text-yellow-400"> INGENIEROS</span>
                    </h1>
                    <p class="text-xl">
                        es una empresa consultora especializada en el desarrollo
                        integral de proyectos de infraestructura vial, orientada 
                        a brindar soluciones técnicas eficientes, sostenibles y
                        alineadas a la normativa vigente.
                    </p>
                </div>
            </div>

            {{-- Slide 2: Diferencial de la empresa --}}
            <div class="carousel-item" data-slide-name="diferencial">
                <img src="{{ asset('images/img2.jpg') }}" 
                     class="d-block w-100" 
                     style="height: 100vh; object-fit: cover;" 
                     alt="Equipo de ingenieros trabajando en proyecto">
                <div class="carousel-caption d-none d-md-block 
                            bg-black bg-opacity-50 rounded p-4">
                    <h1 class="text-4xl md:text-6xl font-bold mb-2">
                    NUESTRO DIFERENCIAL
                    </h1>
                    <p class="text-xl">
                        Integramos ingeniería multidisciplinaria, gestión técnica 
                        y metodología BIM para garantizar precisión en el diseño, 
                        control de interferencias, optimización de costos y 
                        reducción de riesgos durante la ejecución de obra.
                    </p>
                </div>
            </div>
            
            {{-- Slide 3: Misión de la empresa --}}
            <div class="carousel-item" data-slide-name="mision">
                <img src="{{ asset('images/img3.jpg') }}" 
                     class="d-block w-100" 
                     style="height: 100vh; object-fit: cover;" 
                     alt="Proyecto de infraestructura en ejecución">
                <div class="carousel-caption d-none d-md-block 
                            bg-black bg-opacity-50 rounded p-4">
                    <h1 class="text-4xl md:text-6xl font-bold mb-2">
                    MISIÓN
                    </h1>
                    <p class="text-xl">
                        Ofrecer soluciones de ingeniería con tecnología avanzada, 
                        garantizando eficiencia, precisión y confianza en cada proyecto.
                    </p>
                </div>
            </div>

            {{-- Slide 4: Visión de la empresa --}}
            <div class="carousel-item" data-slide-name="vision">
                <img src="{{ asset('images/img4.jpg') }}" 
                     class="d-block w-100" 
                     style="height: 100vh; object-fit: cover;" 
                     alt="Visión futurista de proyectos sostenibles">
                <div class="carousel-caption d-none d-md-block 
                            bg-black bg-opacity-50 rounded p-4">
                    <h1 class="text-4xl md:text-6xl font-bold mb-2">
                    VISIÓN
                    </h1>
                    <p class="text-xl">
                        Ser una empresa referente en ingeniería e innovación, 
                        impulsando la investigación científica; generando así 
                        un impacto positivo en las metodologías para el estudio 
                        y ejecución de proyectos caracterizándose en el 
                        desarrollo sostenible de recursos.
                    </p>
                </div>
            </div>
            
        </div>
        
        {{-- Botones de navegación: flechas izquierda/derecha --}}
        {{-- data-bs-slide="prev/next": indica dirección del movimiento --}}
        <button class="carousel-control-prev" type="button" 
                data-bs-target="#carouselFema" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" 
                data-bs-target="#carouselFema" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>

    </div>
    {{-- /CAROUSEL BOOTSTRAP --}}



    {{-- SECCIÓN DE PROYECTOS/SERVICIOS --}}

    {{-- Muestra los proyectos activos desde la base de datos --}}
    {{-- Los datos vienen de HomeController@index() en $projects --}}
    <section id="proyectos" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            
            {{-- Título principal de la sección --}}
            <h2 class="py-9 text-3xl font-bold text-center mb-12">
            Nuestros Servicios
            </h2>
            
            {{-- Grid responsive con CSS Grid --}}
            {{-- md:grid-cols-3: 3 columnas en desktop (≥768px), 1 en móvil --}}
            {{-- gap-8: espacio de 2rem entre cada tarjeta --}}
            <div class="grid md:grid-cols-3 gap-8">
                
                {{-- Loop de proyectos desde la base de datos --}}
                {{-- $projects es una colección de modelos Project --}}
                {{-- Se muestran solo los 6 más recientes y activos --}}
                @foreach($projects as $project)
                    
                    <!-- Tarjeta de proyecto: {{ $project->title }} -->
                    <!-- hover:shadow-lg + transition: animación al pasar mouse -->
                    <!-- group: permite aplicar hover en elementos hijos -->
                    <div class="bg-yellow-100 p-6 rounded-xl shadow-sm 
                                hover:shadow-lg transition border border-gray-100 
                                overflow-hidden group">
                        
                        <!-- Contenedor de imagen con fallback -->
                        <!-- h-40: altura fija de 10rem para consistencia -->
                        <!-- bg-gray-200: fondo gris si no hay imagen -->
                        <div class="h-40 bg-gray-200 rounded-lg mb-4 
                                    flex items-center justify-center overflow-hidden">
                            
                            {{-- Si el proyecto tiene imagen, la muestra --}}
                            @if($project->image)
                                <img src="{{ asset('images/projects/' . $project->image) }}" 
                                     alt="{{ $project->title }}" 
                                     class="w-full h-full object-cover 
                                            transition transform hover:scale-110 duration-300">
                            @else
                                <!-- Fallback: muestra las primeras 2 letras del título -->
                                <!-- strtoupper: convierte a mayúsculas -->
                                <!-- substr: toma los primeros 2 caracteres -->
                                <span class="text-4xl font-bold text-gray-400">
                                    {{ strtoupper(substr($project->title, 0, 2)) }}
                                </span>
                            @endif
                        </div>
                        
                        <!-- Título del proyecto -->
                        <h3 class="text-xl font-bold mb-2">{{ $project->title }}</h3>
                        
                        <!-- Año del proyecto (solo si existe en BD) -->
                        @if($project->year)
                            <span class="text-sm text-gray-500 mb-2 block">
                                {{ $project->year }}
                            </span>
                        @endif
                        
                        <!-- Descripción limitada a 100 caracteres --}}
                        <!-- Str::limit(): corta el texto y agrega "..." al final -->
                        <p class="text-gray-600 mb-4">
                            {{ Str::limit($project->description, 100) }}
                        </p>
                        
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- /SECCIÓN DE PROYECTOS/SERVICIOS --}}



    {{-- SECCIÓN DE CONTACTO --}}

    {{-- Formulario para que los visitantes envíen mensajes --}}
    {{-- Los datos se procesan en HomeController@contact() --}}
    <section id="contacto" class="py-20 bg-orange-200-75 text-orange-900">
        <div class="max-w-4xl mx-auto px-4">
            
            {{-- Título y descripción de la sección --}}
            <h2 class="text-3xl font-bold mb-8 text-center">
                ¿Trabajamos juntos?
            </h2>
            <p class="text-gray-400 mb-8 text-center">
                Estoy disponible para nuevos proyectos. Envíame un mensaje y hablemos.
            </p>
            
            {{-- Mensaje de éxito después de enviar el formulario --}}
            {{-- session('success') se establece en el controller tras envío exitoso --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-600 text-white 
                            rounded-lg text-center">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Formulario de contacto --}}
            {{-- route('contact.send'): usa la ruta nombrada en routes/web.php --}}
            {{-- method="POST": envío seguro de datos --}}
            <form action="{{ route('contact.send') }}" method="POST" 
                  class="max-w-lg mx-auto space-y-4">
                
                {{-- Token CSRF: obligatorio en Laravel para prevenir ataques --}}
                {{-- Genera un token único que se valida en el servidor --}}
                @csrf
                
                <!-- Campo: Empresa -->
                <div>
                    <label class="block text-sm font-medium mb-2">
                        Empresa *
                    </label>
                    <!-- old('name', 'Fema'): mantiene valor tras error, con default --}}
                    <input type="text" name="name" 
                           value="{{ old('name', 'Fema') }}" 
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 
                                  rounded-lg focus:outline-none focus:ring-2 
                                  focus:ring-yellow-500 text-white" 
                           required>
                    @error('name')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo: Email -->
                <div>
                    <label class="block text-sm font-medium mb-2">Email *</label>
                    <input type="email" name="email" 
                           value="{{ old('email', 'fema@femaingenieros.com') }}" 
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 
                                  rounded-lg focus:outline-none focus:ring-2 
                                  focus:ring-yellow-500 text-white" 
                           required>
                    @error('email')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo: Asunto -->
                <div>
                    <label class="block text-sm font-medium mb-2">Asunto *</label>
                    <input type="text" name="subject" 
                           value="{{ old('subject','Asunto') }}" 
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 
                                  rounded-lg focus:outline-none focus:ring-2 
                                  focus:ring-yellow-500 text-white" 
                           required>
                    @error('subject')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo: Mensaje (textarea para texto largo) -->
                <!-- rows="5": altura inicial de 5 líneas -->
                <div>
                    <label class="block text-sm font-medium mb-2">Mensaje *</label>
                    <textarea name="message" rows="5" 
                              class="w-full px-4 py-3 bg-gray-800 border border-gray-700 
                                     rounded-lg focus:outline-none focus:ring-2 
                                     focus:ring-yellow-500 text-white" 
                              required>{{ old('message') }}</textarea>
                    @error('message')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botón de envío del formulario -->
                <!-- hover:bg-yellow-700: cambia de color al pasar mouse -->
                <button type="submit" 
                        class="w-full px-8 py-4 bg-yellow-600 text-white 
                               rounded-full font-bold text-lg hover:bg-yellow-700 
                               transition">
                    Enviar Mensaje
                </button>

            </form>

            <!-- Email alternativo para contacto directo -->
            <!-- mailto: abre el cliente de correo predeterminado del usuario -->
            <p class="text-center text-gray-500 mt-6 text-sm">
                O escríbeme directo: 
                <a href="mailto:contacto@femas.dev" 
                   class="text-yellow-400 hover:underline">
                    fema@femaingenieros.com
                </a>
            </p>

        </div>
    </section>
    {{-- /SECCIÓN DE CONTACTO --}}



    {{-- SCRIPTS ESPECÍFICOS DE ESTA VISTA --}}

    {{-- @push('scripts'): envía este código al @stack('scripts') del layout --}}
    {{-- Se coloca al final del body para mejor performance de carga --}}
    @push('scripts')
    <script>
    // Esperar a que el DOM esté completamente cargado antes de ejecutar
    document.addEventListener('DOMContentLoaded', function() {
        
        // ==========================================
        // Inicializar carousel de Bootstrap
        // ==========================================
        // Obtener referencia al elemento carousel por su ID
        const carouselEl = document.getElementById('carouselFema');
        
        // Crear o obtener instancia del carousel (API de Bootstrap 5)
        const carousel = bootstrap.Carousel.getOrCreateInstance(carouselEl);
        
        // ==========================================
        // Links del navbar que controlan el carousel
        // ==========================================
        // Seleccionar todos los enlaces con clase .nav-carousel-link
        const carouselLinks = document.querySelectorAll('.nav-carousel-link');
        
        // Agregar evento click a cada link del navbar
        carouselLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Prevenir comportamiento por defecto (no seguir el href)
                e.preventDefault();
                
                // Obtener el nombre del slide objetivo desde el atributo data
                const targetSlide = this.getAttribute('data-slide-target');
                
                // Buscar todos los slides del carousel
                const slides = carouselEl.querySelectorAll('.carousel-item');
                
                // Iterar para encontrar el slide con matching data-slide-name
                slides.forEach((slide, index) => {
                    if (slide.getAttribute('data-slide-name') === targetSlide) {
                        // carousel.to(index): navega al slide en esa posición
                        carousel.to(index);
                    }
                });
                
                // Si el usuario viene de otra página, redirigir a home con hash
                if (window.location.pathname !== '/') {
                    window.location.href = '/#' + targetSlide;
                }
            });
        });
        
        // ==========================================
        // Navegación directa por hash en la URL
        // ==========================================
        // Si la URL contiene #mision, #vision, etc., ir a ese slide al cargar
        if (window.location.hash) {
            // Remover el # del hash para comparar con data-slide-name
            const hash = window.location.hash.replace('#', '');
            const slides = carouselEl.querySelectorAll('.carousel-item');
            
            slides.forEach((slide, index) => {
                if (slide.getAttribute('data-slide-name') === hash) {
                    // Pequeño delay para asegurar que Bootstrap terminó de inicializar
                    setTimeout(() => carousel.to(index), 300);
                }
            });
        }
    });
    </script>
    @endpush

@endsection
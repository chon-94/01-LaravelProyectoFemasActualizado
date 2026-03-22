@extends('layouts.app')

@section('content')

    <!-- CAROUSEL BOOTSTRAP -->
        <div id="carouselFema" class=" carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            
            <!-- Indicadores -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselFema" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselFema" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselFema" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselFema" data-bs-slide-to="3" aria-label="Slide 4"></button>

            </div>

            <!-- Imágenes -->
            <div class="carousel-inner">
                
                <div class="carousel-item active" data-slide-name="home">>
                    <img src="{{ asset('images/img1.jpg') }}" class="d-block w-100" style="height: 100vh; object-fit: cover;" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block bg-black bg-opacity-50 rounded p-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-2">FEMA<span class="text-yellow-400"> INGENIEROS</span></h1>
                        <p class="text-xl">es una empresa
                                            consultora especializada en el desarrollo
                                            integral de proyectos de infraestructura
                                            vial, orientada a brindar soluciones
                                            técnicas eficientes, sostenibles y
                                            alineadas a la normativa vigente.
                        </p>
                    </div>
                </div>
                
                <div class="carousel-item" data-slide-name="diferencial">
                    <img src="{{ asset('images/img2.jpg') }}" class="d-block w-100" style="height: 100vh; object-fit: cover;" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block bg-black bg-opacity-50 rounded p-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-2">NUESTRO DIFERENCIAL</h1>
                        <p class="text-xl">Integramos ingeniería multidisciplinaria,
                                            gestión técnica y metodología BIM para
                                            garantizar precisión en el diseño, control
                                            de interferencias, optimización de costos
                                            y reducción de riesgos durante la
                                            ejecución de obra.
                        </p>
                    </div>
                </div>
                
                <div class="carousel-item" data-slide-name="mision">>
                    <img src="{{ asset('images/img3.jpg') }}" class="d-block w-100" style="height: 100vh; object-fit: cover;" alt="Slide 3">
                    <div class="carousel-caption d-none d-md-block bg-black bg-opacity-50 rounded p-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-2">MISIÓN</h1>
                        <p class="text-xl">Ofrecer soluciones de ingeniería con
                                            tecnología avanzada, garantizando
                                            eficiencia, precisión y confianza en cada
                                            proyecto.
                        </p>
                    </div>
                </div>

                                
                <div class="carousel-item" data-slide-name="vision">
                    <img src="{{ asset('images/img4.jpg') }}" class="d-block w-100" style="height: 100vh; object-fit: cover;" alt="Slide 4">
                    <div class="carousel-caption d-none d-md-block bg-black bg-opacity-50 rounded p-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-2">VISIÓN</h1>
                        <p class="text-xl">Ser una empresa referente en ingeniería e
                                            innovación, impulsando la investigación
                                            científica; generando así un impacto
                                            positivo en las metodologías para el
                                            estudio y ejecución de proyectos
                                            caracterizándose en el desarrollo
                                            sostenible de recursos.
                        </p>
                    </div>
                </div>
                
            </div>
            

            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselFema" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselFema" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    <!-- FIN CAROUSEL -->


<!-- Sección de Servicios -->


<!-- Sección de Servicios -->
<section id="proyectos" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="py-9 text-3xl font-bold text-center mb-12">Nuestros Servicios</h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <!-- AGREGA: overflow-hidden y hover:shadow-lg -->
                <div class="bg-yellow-100 p-6 rounded-xl shadow-sm hover:shadow-lg transition border border-gray-100 overflow-hidden group">
                    
                    <!-- Imagen del proyecto -->
                    <div class="h-40 bg-gray-200 rounded-lg mb-4 flex items-center justify-center overflow-hidden">
                        @if($project->image)
                            <img src="{{ asset('images/projects/' . $project->image) }}" 
                                 alt="{{ $project->title }}" 
                                 class="w-full h-full object-cover transition transform hover:scale-110 duration-300">
                        @else
                            <span class="text-4xl font-bold text-gray-400">
                                {{ strtoupper(substr($project->title, 0, 2)) }}
                            </span>
                        @endif
                    </div>
                    
                    <!-- Título y año -->
                    <h3 class="text-xl font-bold mb-2">{{ $project->title }}</h3>
                    @if($project->year)
                        <span class="text-sm text-gray-500 mb-2 block">{{ $project->year }}</span>
                    @endif
                    
                    <!-- Descripción -->
                    <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 100) }}</p>
                    
                    </div>
            @endforeach
        </div>
    </div>
</section>



<!-- Sección de Proyectos -->



<!-- Sección de Contacto -->
<section id="contacto" class="py-20 bg-orange-200-75 text-orange-900">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-center">¿Trabajamos juntos?</h2>
        <p class="text-gray-400 mb-8 text-center">Estoy disponible para nuevos proyectos. Envíame un mensaje y hablemos.</p>
        
        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-600 text-white rounded-lg text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('contact.send') }}" method="POST" class="max-w-lg mx-auto space-y-4">
            @csrf
            
            <!-- Nombre -->
            <div>
                <label class="block text-sm font-medium mb-2">Empresa *</label>
                <input type="text" name="name" value="{{ old('name', 'Fema') }}" 
                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white" 
                       required>
                @error('name')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium mb-2">Email *</label>
                <input type="email" name="email" value="{{ old('email', 'fema@femaingenieros.com') }}" 
                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white" 
                       required>
                @error('email')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Asunto -->
            <div>
                <label class="block text-sm font-medium mb-2">Asunto *</label>
                <input type="text" name="subject" value="{{ old('subject','Asunto') }}" 
                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white" 
                       required>
                @error('subject')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Mensaje -->
            <div>
                <label class="block text-sm font-medium mb-2">Mensaje *</label>
                <textarea name="message" rows="5" 
                          class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white" 
                          required>{{ old('message') }}</textarea>
                @error('message')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botón -->
            <button type="submit" class="w-full px-8 py-4 bg-yellow-600 text-white rounded-full font-bold text-lg hover:bg-yellow-700 transition">
                Enviar Mensaje
            </button>

        </form>

        <!-- Opción alternativa: Email directo con el gmail del usuario -->
        <p class="text-center text-gray-500 mt-6 text-sm">
            O escríbeme directo: 
            <a href="mailto:contacto@femas.dev" class="text-yellow-400 hover:underline">fema@femaingenieros.com</a>
        </p>

    </div>
</section>




<!-- Sección de Contacto -->

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inicializar carousel de Bootstrap
    const carouselEl = document.getElementById('carouselFema');
    const carousel = bootstrap.Carousel.getOrCreateInstance(carouselEl);
    
    // Links del navbar que controlan el carousel
    const carouselLinks = document.querySelectorAll('.nav-carousel-link');
    
    carouselLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Obtener el nombre del slide objetivo
            const targetSlide = this.getAttribute('data-slide-target');
            
            // Buscar el índice del slide con ese data-slide-name
            const slides = carouselEl.querySelectorAll('.carousel-item');
            slides.forEach((slide, index) => {
                if (slide.getAttribute('data-slide-name') === targetSlide) {
                    carousel.to(index); // Ir a ese slide
                }
            });
            
            // Si estamos en otra página, primero ir a home y luego cambiar slide
            if (window.location.pathname !== '/') {
                window.location.href = '/#' + targetSlide;
            }
        });
    });
    
    // Si la URL tiene un hash (#mision, #vision, etc.), ir a ese slide al cargar
    if (window.location.hash) {
        const hash = window.location.hash.replace('#', '');
        const slides = carouselEl.querySelectorAll('.carousel-item');
        
        slides.forEach((slide, index) => {
            if (slide.getAttribute('data-slide-name') === hash) {
                // Pequeño delay para asegurar que el carousel está listo
                setTimeout(() => carousel.to(index), 300);
            }
        });
    }
});
</script>
@endpush
@endsection
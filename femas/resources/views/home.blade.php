@extends('layouts.app')

@section('content')

        <!-- CAROUSEL BOOTSTRAP -->
        <div id="carouselFemas" class=" carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            
            <!-- Indicadores -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselFemas" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselFemas" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselFemas" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <!-- Imágenes -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/img1.jpg') }}" class="d-block w-100" style="height: 100vh; object-fit: cover;" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block bg-black bg-opacity-50 rounded p-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-2">Somos<span class="text-yellow-400">Fema</span></h1>
                        <p class="text-xl">Tu mejor</p>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="{{ asset('images/img2.jpg') }}" class="d-block w-100" style="height: 100vh; object-fit: cover;" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block bg-black bg-opacity-50 rounded p-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-2">Proyectos Profesionales</h1>
                        <p class="text-xl">Especialista</p>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="{{ asset('images/img3.jpg') }}" class="d-block w-100" style="height: 100vh; object-fit: cover;" alt="Slide 3">
                    <div class="carousel-caption d-none d-md-block bg-black bg-opacity-50 rounded p-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-2">Transformamos Ideas en Realidad</h1>
                        <p class="text-xl">proyectos</p>
                    </div>
                </div>
            </div>

            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselFemas" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselFemas" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
        <!-- FIN CAROUSEL -->


<!-- Sección de Servicios -->
<section id="proyectos" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="py-9 text-3xl font-bold text-center mb-12">Nuestros Servicios</h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($projects as $project)  <!-- ← $project es un Modelo ahora -->
                <div class="bg-yellow-100 p-6 rounded-xl shadow-sm hover:shadow-md transition border border-gray-100">
                    
                    <!-- Imagen del proyecto -->
                    <div class="h-40 bg-gray-200 rounded-lg mb-4 flex items-center justify-center overflow-hidden">
                        @if($project->image)
                            <img src="{{ asset('images/projects/' . $project->image) }}" 
                                 alt="{{ $project->title }}" 
                                 class="w-full h-full object-cover">
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
                    
                    <!-- Link -->
                    <a href="#" class="text-yellow-600 font-semibold hover:underline">Ver más &rarr;</a>
                </div>
            @endforeach
        </div>
    </div>
</section>        
<!-- Sección de Proyectos -->

<!-- Sección de Contacto -->
<section id="contacto" class="py-65 bg-gray-900 text-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-8">¿Trabajamos juntos?</h2>
        <p class="text-gray-400 mb-8">Estoy disponible para nuevos proyectos. Envíame un correo y hablemos.</p>
        <a href="mailto:contacto@femas.dev" class="inline-block px-8 py-4 bg-yellow-100 rounded-full font-bold text-lg hover:bg-yellow-200 transition">
            Enviar Correo
        </a>
    </div>
</section>

@endsection
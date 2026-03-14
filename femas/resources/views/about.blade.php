@extends('layouts.app')

@section('content')

<section class="py-20 bg-yellow-100 min-h-screen">
    <div class="max-w-6xl mx-auto px-4">

        <!-- Tecnologías Utilizadas -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-900">Tecnologías del Proyecto</h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Laravel -->
                <div class="bg-gradient-to-br from-red-50 to-red-100 p-6 rounded-xl border border-red-200 hover:shadow-lg transition">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M5.5 19.5L2 12.5L5.5 5.5H12.5L16 12.5L12.5 19.5H5.5ZM12.5 19.5L16 12.5L19.5 19.5H12.5ZM19.5 5.5L16 12.5L12.5 5.5H19.5Z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-red-800">Laravel 11</h3>
                    </div>
                    <p class="text-red-700 text-sm">
                        Framework PHP para el backend, manejo de rutas, controladores y vistas Blade.
                    </p>
                </div>

                <!-- Tailwind CSS -->
                <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 p-6 rounded-xl border border-cyan-200 hover:shadow-lg transition">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-cyan-500 rounded-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 6C15.3 6 18 8.7 18 12S15.3 18 12 18 6 15.3 6 12 8.7 6 12 6M12 4C7.6 4 4 7.6 4 12S7.6 20 12 20 20 16.4 20 12 16.4 4 12 4Z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-cyan-800">Tailwind CSS</h3>
                    </div>
                    <p class="text-cyan-700 text-sm">
                        Framework CSS utilitario para un diseño responsive y moderno.
                    </p>
                </div>

                <!-- Bootstrap 5 -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl border border-purple-200 hover:shadow-lg transition">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 16.5C21 16.8 20.8 17.1 20.6 17.3L12.8 21.8C12.5 21.9 12.3 22 12 22C11.7 22 11.5 21.9 11.2 21.8L3.4 17.3C3.2 17.1 3 16.8 3 16.5V7.5C3 7.2 3.2 6.9 3.4 6.7L11.2 2.2C11.5 2.1 11.7 2 12 2C12.3 2 12.5 2.1 12.8 2.2L20.6 6.7C20.8 6.9 21 7.2 21 7.5V16.5ZM12 4.1L5 8.2V15.8L12 19.9L19 15.8V8.2L12 4.1Z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-purple-800">Bootstrap 5</h3>
                    </div>
                    <p class="text-purple-700 text-sm">
                        Componentes interactivos como el carousel y sistema de grid responsive.
                    </p>
                </div>

                <!-- Vite -->
                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 p-6 rounded-xl border border-yellow-200 hover:shadow-lg transition">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7L12 12L22 7L12 2ZM2 17L12 22L22 17V7L12 12L2 7V17Z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-yellow-800">Vite</h3>
                    </div>
                    <p class="text-yellow-700 text-sm">
                        Build tool moderno para compilación rápida de assets y hot module replacement.
                    </p>
                </div>

                <!-- JavaScript -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl border border-green-200 hover:shadow-lg transition">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 3H21V21H3V3M5 5V19H19V5H5M7 7H10V17H7V7M14 7H17V14H14V7Z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-green-800">JavaScript</h3>
                    </div>
                    <p class="text-green-700 text-sm">
                        Interactividad del lado del cliente y funcionalidades dinámicas.
                    </p>
                </div>

                <!-- Blade Templates -->
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-xl border border-orange-200 hover:shadow-lg transition">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 4C16.4 4 20 7.6 20 12S16.4 20 12 20 4 16.4 4 12 7.6 4 12 4M12 6C8.7 6 6 8.7 6 12S8.7 18 12 18 18 15.3 18 12 15.3 6 12 6M12 8C14.2 8 16 9.8 16 12S14.2 16 12 16 8 14.2 8 12 9.8 8 12 8Z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-orange-800">Blade Templates</h3>
                    </div>
                    <p class="text-orange-700 text-sm">
                        Motor de plantillas de Laravel para vistas dinámicas y reutilizables.
                    </p>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
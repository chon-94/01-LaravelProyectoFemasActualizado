<!DOCTYPE html>
<!-- Declara el tipo de documento HTML5 -->
<html lang="es">
<!-- lang="es": declara el idioma para accesibilidad y SEO -->

<head>
    <!-- Metadatos de la página -->
    <meta charset="UTF-8">
    <!-- charset="UTF-8": soporta caracteres especiales y acentos en español -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- viewport: hace la página responsive en móviles -->
    
    <title>Crear Proyecto - Femas Admin</title>
    <!-- Título que aparece en la pestaña del navegador -->
    
    <!-- Vite: carga Tailwind CSS y JS compilados -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @vite(): directiva de Laravel que inyecta assets compilados --}}
</head>

<body class="bg-gray-100">
    <!-- bg-gray-100: fondo gris claro para toda la página -->

    {{-- Navbar Admin: incluye el navbar parcial --}}
    {{-- @include(): inserta el contenido de admin.partials.navbar.blade.php --}}
    @include('admin.partials.navbar')

    {{-- Contenedor principal centrado --}}
    {{-- container mx-auto: centra el contenido con ancho máximo --}}
    {{-- px-4 py-8: padding horizontal y vertical para espaciado --}}
    <div class="container mx-auto px-4 py-8">
        
        {{-- Tarjeta del formulario --}}
        {{-- max-w-3xl: ancho máximo de 32rem (512px) --}}
        {{-- mx-auto: centra la tarjeta horizontalmente --}}
        {{-- rounded-lg shadow p-6: bordes redondeados, sombra y padding --}}
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">
            
            {{-- Título de la página --}}
            <h1 class="text-3xl font-bold mb-6 text-gray-800">
                ➕ Nuevo Proyecto
                <!-- text-3xl: tamaño de fuente grande -->
                <!-- font-bold: texto en negrita -->
                <!-- mb-6: margen inferior de 1.5rem -->
                <!-- text-gray-800: color gris muy oscuro -->
            </h1>
            
            {{-- FORMULARIO DE CREACIÓN --}}
            {{-- action: URL a donde se envían los datos --}}
            {{-- method="POST": envío seguro de datos --}}
            {{-- enctype="multipart/form-data": OBLIGATORIO para subir archivos --}}
            <form action="{{ route('admin.projects.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data">
                
                {{-- Token CSRF: obligatorio en Laravel para formularios POST --}}
                {{-- Previene ataques Cross-Site Request Forgery --}}
                @csrf

                <div class="space-y-4">
                    <!-- space-y-4: agrega espacio vertical entre cada campo -->
                    
                    {{-- CAMPO: TÍTULO --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">
                            Título *
                            <!-- *: indica campo obligatorio -->
                        </label>
                        
                        <input type="text" 
                               name="title" 
                               value="{{ old('title') }}" 
                               {{-- old('title'): mantiene valor si hay error de validación --}}
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                               required>
                        {{-- required: validación HTML5 (no envía si está vacío) --}}
                        
                        {{-- Mensaje de error de validación --}}
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            {{-- $message: mensaje de error generado por Laravel --}}
                        @enderror
                    </div>

                    {{-- CAMPO: DESCRIPCIÓN --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">
                            Descripción *
                        </label>
                        
                        {{-- Textarea para texto largo (múltiples líneas) --}}
                        <textarea name="description" 
                                  rows="4" 
                                  {{-- rows="4": altura inicial de 4 líneas --}}
                                  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                                  required>{{ old('description') }}</textarea>
                        {{-- El contenido del textarea va ENTRE las etiquetas --}}
                        
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- CAMPOS: IMAGEN Y AÑO (Grid 2 columnas) --}}
                    {{-- grid md:grid-cols-2: 2 columnas en desktop, 1 en móvil --}}
                    <div class="grid md:grid-cols-2 gap-4">
                        
                        {{-- Columna 1: Imagen (FILE UPLOAD) --}}
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Imagen *
                            </label>
                            
                            {{-- Input tipo file para subir archivos --}}
                            {{-- accept="image/*": solo permite seleccionar imágenes --}}
                            <input type="file" 
                                   name="image" 
                                   accept="image/*" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            
                            @error('image')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        {{-- Columna 2: Año --}}
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Año
                            </label>
                            <input type="text" 
                                   name="year" 
                                   value="{{ old('year') }}" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                                   placeholder="ej: 2026">
                            {{-- placeholder: texto de ayuda que desaparece al escribir --}}
                        </div>
                    </div>

                    {{-- CAMPO: ESTADO ACTIVO (Checkbox) --}}
                    <div>
                        <label class="flex items-center">
                            <!-- flex items-center: alinea checkbox y texto horizontalmente -->
                            
                            <input type="checkbox" 
                                   name="is_active" 
                                   value="1" 
                                   {{-- value="1": si está marcado, envía "1" al servidor --}}
                                   {{ old('is_active', true) ? 'checked' : '' }} 
                                   {{-- ? 'checked' : '' → si es true, marca el checkbox --}}
                                   {{-- true por defecto: nuevos proyectos nacen activos --}}
                                   class="mr-2">
                            
                            <span class="text-gray-700">Proyecto Activo</span>
                        </label>
                    </div>

                    {{-- BOTONES DE ACCIÓN --}}
                    <div class="flex gap-4 pt-4">
                        <!-- flex gap-4: botones horizontales con espacio entre ellos -->
                        <!-- pt-4: padding superior para separar de los campos -->
                        
                        <!-- Botón: Guardar (envía el formulario) -->
                        <button type="submit" 
                                class="px-6 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-medium">
                            {{-- type="submit": envía los datos al servidor --}}
                            💾 Guardar
                        </button>
                        <!-- Botón: Guardar (envía el formulario) -->
                        
                        <!-- Botón: Limpiar (resetea el formulario) -->
                        <button type="reset" 
                                class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition font-medium">
                            {{-- type="reset": limpia todos los campos --}}
                            🧹 Limpiar
                        </button>
                        <!-- Botón: Limpiar (resetea el formulario) -->
                        
                        <!-- Botón: Cancelar (vuelve al listado) -->
                        <a href="{{ route('admin.projects.index') }}" 
                           class="px-6 py-3 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition font-medium">
                            {{-- route(): genera URL desde nombre de ruta --}}
                            Cancelar
                            {{-- Es un enlace, no envía formulario --}}
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

</body>
</html>
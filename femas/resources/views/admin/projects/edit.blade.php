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
    
    <title>Editar Proyecto - Femas Admin</title>
    <!-- Título que aparece en la pestaña del navegador -->
    
    <!-- Vite: carga Tailwind CSS y JS compilados -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @vite(): directiva de Laravel que inyecta assets compilados --}}
</head>

<body class="bg-gray-100">
    <!-- bg-gray-100: fondo gris claro para toda la página -->

    {{-- Navbar Admin: incluye el navbar parcial --}}
    @include('admin.partials.navbar')

    {{-- Contenedor principal centrado --}}
    <div class="container mx-auto px-4 py-8">
        
        {{-- Tarjeta del formulario --}}
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">
            
            {{-- Título de la página --}}
            <h1 class="text-3xl font-bold mb-6 text-gray-800">
                ✏️ Editar Proyecto
            </h1>
            
            {{-- FORMULARIO DE EDICIÓN --}}
            {{-- action: URL que incluye el ID del proyecto a editar --}}
            {{-- route('admin.projects.update', $project): genera /admin/projects/{id} --}}
            {{-- method="POST": HTML solo soporta GET y POST --}}
            {{-- @method('PUT'): spoofing para simular método PUT en Laravel --}}
            <form action="{{ route('admin.projects.update', $project) }}" 
                  method="POST">
                
                {{-- Token CSRF: obligatorio en Laravel para formularios POST --}}
                @csrf
                
                {{-- Método HTTP PUT: indica que es una actualización, no creación --}}
                {{-- Laravel convierte esto internamente a PUT --}}
                @method('PUT')

                <div class="space-y-4">
                    <!-- space-y-4: espacio vertical entre campos -->
                    
                    {{-- CAMPO: TÍTULO --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">
                            Título *
                        </label>
                        
                        <input type="text" 
                               name="title" 
                               value="{{ old('title', $project->title) }}" 
                               {{-- 
                                   old('title', $project->title):
                                   - Si hay error: usa lo que el usuario escribió (old)
                                   - Si no hay error: carga el valor de la BD ($project->title)
                                   - Diferencia con create: aquí SÍ hay valor por defecto
                               --}}
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                               required>
                        
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- CAMPO: DESCRIPCIÓN --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">
                            Descripción *
                        </label>
                        
                        <textarea name="description" 
                                  rows="4" 
                                  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                                  required>{{ old('description', $project->description) }}</textarea>
                        {{-- El contenido del textarea va ENTRE las etiquetas --}}
                        
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- CAMPOS: IMAGEN Y AÑO (Grid 2 columnas) --}}
                    <div class="grid md:grid-cols-2 gap-4">
                        <!-- grid: CSS Grid Layout -->
                        <!-- md:grid-cols-2: 2 columnas en desktop, 1 en móvil -->
                        
                        {{-- Columna 1: Imagen --}}
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Imagen (nombre de archivo)
                            </label>
                            <input type="text" 
                                   name="image" 
                                   value="{{ old('image', $project->image) }}" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                                   placeholder="ej: proyecto1.jpg">
                            {{-- 
                                NOTA: Esto es un input de texto, NO sube archivo
                                Solo muestra/edita el nombre del archivo existente
                                Para cambiar la imagen, se escribe el nuevo nombre
                            --}}
                        </div>
                        
                        {{-- Columna 2: Año --}}
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Año
                            </label>
                            <input type="text" 
                                   name="year" 
                                   value="{{ old('year', $project->year) }}" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                                   placeholder="ej: 2024">
                        </div>
                    </div>

                    {{-- CAMPO: ESTADO ACTIVO (Checkbox) --}}
                    <div>
                        <label class="flex items-center">
                            <!-- flex items-center: alinea checkbox y texto -->
                            
                            <input type="checkbox" 
                                   name="is_active" 
                                   value="1" 
                                   {{ old('is_active', $project->is_active) ? 'checked' : '' }} 
                                   {{-- 
                                       old('is_active', $project->is_active):
                                       - Si hay error: usa lo que el usuario marcó
                                       - Si no hay error: usa el valor de la BD
                                       - Diferencia con create: aquí NO hay true por defecto
                                   --}}
                                   class="mr-2">
                            
                            <span class="text-gray-700">Proyecto Activo</span>
                        </label>
                    </div>

                    {{-- BOTONES DE ACCIÓN --}}
                    <div class="flex gap-4 pt-4">
                        
                        <!-- Botón: Guardar (envía actualización) -->
                        <button type="submit" 
                                class="px-6 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-medium">
                            💾 Guardar
                        </button>
                        
                        <!-- Botón: Limpiar (resetea a valores originales) -->
                        <button type="reset" 
                                class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition font-medium">
                            🧹 Limpiar
                        </button>
                        
                        <!-- Botón: Cancelar (vuelve al listado) -->
                        <a href="{{ route('admin.projects.index') }}" 
                           class="px-6 py-3 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition font-medium">
                            Cancelar
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

</body>
</html>
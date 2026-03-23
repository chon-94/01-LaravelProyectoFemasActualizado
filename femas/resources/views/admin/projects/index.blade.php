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
    
    <title>Proyectos - Femas Admin</title>
    <!-- Título que aparece en la pestaña del navegador -->
    
    <!-- Vite: carga Tailwind CSS y JS compilados -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <!-- bg-gray-100: fondo gris claro para toda la página -->

    {{-- Navbar Admin: incluye el navbar parcial --}}
    @include('admin.partials.navbar')

    {{-- Contenedor principal --}}
    <div class="container mx-auto px-4 py-8">
        
        {{-- Título de la página --}}
        <h1 class="text-3xl font-bold mb-6 text-gray-800">
            📋 Lista de Proyectos
        </h1>

        {{-- MENSAJE DE ÉXITO (Flash Message) --}}
        {{-- session('success'): mensaje temporal que se muestra después de una acción --}}
        {{-- Se establece en el controller con: ->with('success', 'Mensaje') --}}
        {{-- Después de mostrarse, se elimina automáticamente de la sesión --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- TARJETA DE LA TABLA --}}
        <div class="bg-white rounded-lg shadow overflow-hidden">
            
            <table class="min-w-full divide-y divide-gray-200">
                <!-- min-w-full: ancho mínimo 100% del contenedor -->
                <!-- divide-y divide-gray-200: líneas divisorias grises entre filas -->
                
                {{-- ENCABEZADO DE LA TABLA --}}
                <thead class="bg-gray-50">
                    <!-- bg-gray-50: fondo gris muy claro para el header -->
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            ID
                            <!-- px-6 py-3: padding horizontal y vertical -->
                            <!-- text-left: alineado a la izquierda -->
                            <!-- text-xs: tamaño de fuente pequeño -->
                            <!-- font-medium: peso de fuente medio -->
                            <!-- text-gray-500: color gris -->
                            <!-- uppercase: texto en mayúsculas -->
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            Título
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            Año
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            Estado
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            Acciones
                        </th>
                    </tr>
                </thead>

                {{-- CUERPO DE LA TABLA --}}
                <tbody class="bg-white divide-y divide-gray-200">
                    
                    {{-- LOOP DE PROYECTOS --}}
                    {{-- @forelse: combinación de @foreach + @empty --}}
                    {{-- Si $projects tiene datos → itera normalmente --}}
                    {{-- Si $projects está vacío → muestra el bloque @empty --}}
                    @forelse($projects as $project)
                        
                        <tr>
                            <!-- Fila por cada proyecto -->
                            
                            {{-- Columna 1: ID --}}
                            <td class="px-6 py-4">
                                {{ $project->id }}
                            </td>
                            
                            {{-- Columna 2: Título --}}
                            <td class="px-6 py-4 font-medium">
                                {{ $project->title }}
                                <!-- font-medium: texto en negrita para destacar -->
                            </td>
                            
                            {{-- Columna 3: Año --}}
                            <td class="px-6 py-4">
                                {{ $project->year ?? '-' }}
                                {{-- ?? '-': operador null coalescing --}}
                                {{-- Si year es null, muestra guión '-' --}}
                            </td>
                            
                            {{-- Columna 4: Estado (Activo/Inactivo) --}}
                            <td class="px-6 py-4">
                                {{-- Badge con color condicional --}}
                                {{-- Si is_active = true → verde, si no → rojo --}}
                                <span class="px-2 py-1 text-xs rounded-full 
                                       {{ $project->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $project->is_active ? '✅ Activo' : '❌ Inactivo' }}
                                </span>
                            </td>
                            
                            {{-- Columna 5: Acciones (Editar/Eliminar) --}}
                            <td class="px-6 py-4 space-x-3">
                                <!-- space-x-3: espacio horizontal entre botones -->
                                
                                {{-- Botón: Editar (enlace a formulario de edición) --}}
                                <a href="{{ route('admin.projects.edit', $project) }}" 
                                   class="text-blue-600 hover:text-blue-900 font-medium">
                                    ✏️ Editar
                                </a>
                                
                                {{-- Botón: Eliminar (formulario con método DELETE) --}}
                                {{-- Se usa formulario porque eliminar es una acción destructiva --}}
                                {{-- Requiere método POST + @method('DELETE') por seguridad --}}
                                <form action="{{ route('admin.projects.destroy', $project) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('¿Eliminar este proyecto?')">
                                    <!-- action: URL que incluye el ID del proyecto -->
                                    <!-- method="POST": HTML solo soporta GET/POST -->
                                    <!-- class="inline": el formulario no crea salto de línea -->
                                    <!-- onsubmit: muestra confirmación antes de eliminar -->
                                    
                                    {{-- Token CSRF: obligatorio para formularios POST --}}
                                    @csrf
                                    
                                    {{-- Método DELETE: spoofing para simular DELETE en Laravel --}}
                                    @method('DELETE')
                                    
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 font-medium">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                                
                            </td>
                        </tr>

                    {{-- ESTADO VACÍO (si no hay proyectos) --}}
                    @empty
                        <tr>
                            <!-- colspan="5": la celda ocupa las 5 columnas de la tabla -->
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                No hay proyectos aún. 
                                <a href="{{ route('admin.projects.create') }}" 
                                   class="text-yellow-600 hover:underline">
                                    ¡Crea el primero!
                                </a>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            {{-- PAGINACIÓN --}}
            {{-- $projects->links(): genera enlaces de paginación automáticamente --}}
            {{-- Funciona porque en el controller usaste ->paginate(10) --}}
            {{-- Muestra: « Anterior 1 2 3 Siguiente » --}}
            <div class="p-4">
                {{ $projects->links() }}
            </div>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proyecto - Femas Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navbar Admin -->
    @include('admin.partials.navbar')

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">➕ Nuevo Proyecto</h1>
            
            <!-- ⚠️ IMPORTANTE: enctype="multipart/form-data" para subir archivos -->
            <form action="{{ route('admin.projects.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data">
                @csrf

                <div class="space-y-4">
                    
                    <!-- Título -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Título *</label>
                        <input type="text" name="title" value="{{ old('title') }}" 
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                               required>
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Descripción *</label>
                        <textarea name="description" rows="4" 
                                  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Imagen (FILE UPLOAD) y Año -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Imagen *</label>
                            <!-- ⚠️ type="file" + accept para imágenes -->
                            <input type="file" name="image" accept="image/*" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            @error('image')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Año</label>
                            <input type="text" name="year" value="{{ old('year') }}" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                                   placeholder="ej: 2026">
                        </div>
                    </div>

                    <!-- Activo -->
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" 
                                   {{ old('is_active', true) ? 'checked' : '' }} 
                                   class="mr-2">
                            <span class="text-gray-700">Proyecto Activo</span>
                        </label>
                    </div>

                    <!-- Botones -->
                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="px-6 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-medium">
                            💾 Guardar
                        </button>
                        <button type="reset" class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition font-medium">
                            🧹 Limpiar
                        </button>
                        <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition font-medium">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proyecto - Femas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">
            <h1 class="text-3xl font-bold mb-6">Nuevo Proyecto</h1>
            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Título *</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Descripción *</label>
                        <textarea name="description" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Imagen (nombre de archivo)</label>
                            <input type="text" name="image" value="{{ old('image') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Año</label>
                            <input type="text" name="year" value="{{ old('year') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        </div>
                    </div>
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="mr-2">
                            <span class="text-gray-700">Activo</span>
                        </label>
                    </div>
                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="px-6 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">Guardar</button>
                        <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<!-- Igual que create.blade.php pero con: -->
<form action="{{ route('admin.projects.update', $project) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Y los valores con old('campo', $project->campo) -->
</form>
@csrf

<div class="space-y-4">
    <!-- Título -->
    <div>
        <label class="block text-gray-700 font-medium mb-2">Título *</label>
        <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" 
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
                  required>{{ old('description', $project->description ?? '') }}</textarea>
        @error('description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Imagen y Año -->
    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-700 font-medium mb-2">Imagen (nombre de archivo)</label>
            <input type="text" name="image" value="{{ old('image', $project->image ?? '') }}" 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                   placeholder="ej: proyecto1.jpg">
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-2">Año</label>
            <input type="text" name="year" value="{{ old('year', $project->year ?? '') }}" 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                   placeholder="ej: 2024">
        </div>
    </div>

    <!-- Activo -->
    <div>
        <label class="flex items-center">
            <input type="checkbox" name="is_active" value="1" 
                   {{ old('is_active', $project->is_active ?? true) ? 'checked' : '' }} 
                   class="mr-2">
            <span class="text-gray-700">Proyecto Activo</span>
        </label>
    </div>

    <!-- Botones: Guardar y Limpiar -->
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
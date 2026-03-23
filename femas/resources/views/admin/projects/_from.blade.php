{{-- Token CSRF: obligatorio en Laravel para formularios POST --}}
{{-- Previene ataques Cross-Site Request Forgery --}}
@csrf

{{-- Contenedor principal del formulario --}}
{{-- space-y-4: agrega espacio vertical de 1rem entre cada campo --}}
<div class="space-y-4">

        {{-- CAMPO: TÍTULO --}}
        <div>
        <!-- Label del campo -->
        <label class="block text-gray-700 font-medium mb-2">
            Título *
            <!-- block: ocupa todo el ancho disponible -->
            <!-- text-gray-700: color gris oscuro para el texto -->
            <!-- *: indica que el campo es obligatorio -->
        </label>
        
        <!-- Input de texto para el título -->
        <input type="text" 
               name="title" 
               value="{{ old('title', $project->title ?? '') }}" 
               {{-- 
                   old('title', $project->title ?? ''):
                   - Si hay error de validación: usa lo que el usuario escribió (old)
                   - Si es edición: usa el valor de la BD ($project->title)
                   - Si es nuevo y sin error: campo vacío ('')
                   - ?? es operador null coalescing: si es null, usa ''
               --}}
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
               {{--
                   w-full: ancho 100% del contenedor
                   px-4 py-2: padding horizontal y vertical
                   border: borde gris por defecto
                   rounded-lg: bordes redondeados
                   focus:outline-none: quita el outline por defecto del navegador
                   focus:ring-2 focus:ring-yellow-500: anillo amarillo al enfocar
               --}}
               required>
        {{-- required: validación HTML5 (no envía si está vacío) --}}
        
        {{-- Mensaje de error de validación --}}
        {{-- @error('title'): solo se muestra si hay error en este campo --}}
        @error('title')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            {{-- text-red-500: color rojo para errores --}}
            {{-- text-sm: tamaño de fuente pequeño --}}
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
                  required>{{ old('description', $project->description ?? '') }}</textarea>
        {{-- 
            El contenido del textarea va ENTRE las etiquetas opening y closing
            No usa atributo value="" como los inputs
        --}}
        
        @error('description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>


        {{-- CAMPOS: IMAGEN Y AÑO (Grid 2 columnas) --}}
        {{-- grid: activa CSS Grid Layout --}}
    {{-- md:grid-cols-2: 2 columnas en desktop (≥768px), 1 columna en móvil --}}
    {{-- gap-4: espacio de 1rem entre columnas --}}
    <div class="grid md:grid-cols-2 gap-4">
        
        {{-- Columna 1: Imagen --}}
        <div>
            <label class="block text-gray-700 font-medium mb-2">
                Imagen
            </label>
            <input type="text" 
                   name="image" 
                   value="{{ old('image', $project->image ?? '') }}" 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                   placeholder="ej: proyecto1.jpg">
            {{-- placeholder: texto de ayuda que desaparece al escribir --}}
        </div>
        
        {{-- Columna 2: Año --}}
        <div>
            <label class="block text-gray-700 font-medium mb-2">
                Año
            </label>
            <input type="text" 
                   name="year" 
                   value="{{ old('year', $project->year ?? '') }}" 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                   placeholder="ej: 2024">
        </div>
    </div>


        {{-- CAMPO: ESTADO ACTIVO (Checkbox) --}}
        <div>
        {{-- Label con flexbox para alinear checkbox + texto --}}
        <label class="flex items-center">
            <!-- flex items-center: alinea checkbox y texto horizontalmente centrados -->
            
            <input type="checkbox" 
                   name="is_active" 
                   value="1" 
                   {{-- value="1": si está marcado, envía "1" al servidor --}}
                   {{-- Si NO está marcado, NO envía nada (ni siquiera "0") --}}
                   {{ old('is_active', $project->is_active ?? true) ? 'checked' : '' }} 
                   {{--
                       old('is_active', $project->is_active ?? true):
                       - Si hay error: usa lo que el usuario marcó (old)
                       - Si es edición: usa el valor de la BD ($project->is_active)
                       - Si es nuevo: true (marcado por defecto)
                       - ? 'checked' : '' → si es true, agrega atributo checked
                   --}}
                   class="mr-2">
            {{-- mr-2: margen derecho de 0.5rem para separar del texto --}}
            
            <span class="text-gray-700">Proyecto Activo</span>
        </label>
    </div>


        {{-- BOTONES DE ACCIÓN --}}
        {{-- flex gap-4: alinea botones horizontalmente con espacio entre ellos --}}
    {{-- pt-4: padding superior de 1rem para separar de los campos --}}
    <div class="flex gap-4 pt-4">
        
        <!-- Botón: Guardar (submit del formulario) -->
        <button type="submit" 
                class="px-6 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-medium">
            {{-- type="submit": envía el formulario al servidor --}}
            {{-- bg-yellow-600: color amarillo corporativo (acción principal) --}}
            {{-- hover:bg-yellow-700: tono más oscuro al pasar mouse --}}
            {{-- transition: animación suave en el cambio de color --}}
            💾 Guardar
        </button>
        
        <!-- Botón: Limpiar (reset del formulario) -->
        <button type="reset" 
                class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition font-medium">
            {{-- type="reset": limpia todos los campos del formulario --}}
            {{-- bg-gray-300: color gris para acción secundaria --}}
            🧹 Limpiar
        </button>
        
        <!-- Botón: Cancelar (enlace para volver al listado) -->
        <a href="{{ route('admin.projects.index') }}" 
           class="px-6 py-3 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition font-medium">
            {{-- route('admin.projects.index'): URL del listado de proyectos --}}
            {{-- Es un enlace, no un botón, porque no envía formulario --}}
            Cancelar
        </a>
    </div>

</div>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos - Femas Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    @include('admin.partials.navbar')

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">📋 Lista de Proyectos</h1>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Título</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Año</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($projects as $project)
                        <tr>
                            <td class="px-6 py-4">{{ $project->id }}</td>
                            <td class="px-6 py-4 font-medium">{{ $project->title }}</td>
                            <td class="px-6 py-4">{{ $project->year ?? '-' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full {{ $project->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $project->is_active ? '✅ Activo' : '❌ Inactivo' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 space-x-3">
                                <!-- ✏️ Editar -->
                                <a href="{{ route('admin.projects.edit', $project) }}" 
                                   class="text-blue-600 hover:text-blue-900 font-medium">
                                    ✏️ Editar
                                </a>
                                
                                <!-- 🗑️ Eliminar -->
                                <form action="{{ route('admin.projects.destroy', $project) }}" 
                                      method="POST" class="inline"
                                      onsubmit="return confirm('¿Eliminar este proyecto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-medium">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                No hay proyectos aún. <a href="{{ route('admin.projects.create') }}" class="text-yellow-600 hover:underline">¡Crea el primero!</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-4">{{ $projects->links() }}</div>
        </div>
    </div>

</body>
</html>
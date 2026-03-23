{{-- resources/views/admin/partials/navbar.blade.php --}}
{{-- Barra de navegación del panel de administración --}}

<nav class="bg-gray-800 text-white sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            
            {{-- Logo: enlace al home público --}}
            <a href="{{ route('home') }}" class="text-xl font-bold text-yellow-400 hover:text-yellow-300">
                Femas<span class="text-white">Admin</span>
            </a>
            {{-- Logo: enlace al home público --}}

            {{-- Botones de navegación --}}
            <div class="flex items-center gap-3">
                
                <!-- Listado de proyectos -->
                <a href="{{ route('admin.projects.index') }}" 
                   class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg transition flex items-center gap-2">
                    🏠 Inicio
                </a>
                <!-- Listado de proyectos -->                
                
                <!-- Crear nuevo proyecto (acción principal) -->
                <a href="{{ route('admin.projects.create') }}" 
                   class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 rounded-lg transition flex items-center gap-2">
                    + Crear
                </a>
                <!-- Crear nuevo proyecto (acción principal) -->                
                
                {{-- Logout: form POST por seguridad en Laravel --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg transition">
                        Salir
                    </button>
                </form>
                {{-- Logout: form POST por seguridad en Laravel --}}

            </div>
            {{-- Botones de navegación --}}

        </div>
    </div>
</nav>
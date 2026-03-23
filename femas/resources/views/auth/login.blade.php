<!-- resources/views/auth/login.blade.php -->
<!-- Vista de login para administradores -->

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Metadatos básicos -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Femas</title>
        
        <!-- Carga de assets con Vite (Tailwind CSS + JS) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    
    {{-- Contenedor principal: centra el formulario vertical y horizontalmente --}}
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
        
        {{-- Título del formulario --}}
        <h2 class="text-2xl font-bold text-center mb-6 text-yellow-600">
            Admin Femas
        </h2>
        {{-- Título del formulario --}}

        {{-- Formulario de login --}}
        {{-- method="POST": envía datos de forma segura --}}
        {{-- route('login'): usa la ruta nombrada definida en web.php --}}
        <form method="POST" action="{{ route('login') }}">
            
            @csrf {{-- Token CSRF: obligatorio en Laravel para proteger contra ataques, No lo muevas --}}
            
            {{-- Mostrar errores de validación si existen --}}
            {{-- $errors->first() muestra el primer error encontrado --}}
            @if($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                    {{ $errors->first() }}
                </div>
            @endif
            
            {{-- Campo: Email --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">
                    Email
                </label>
                
                {{-- 
                    input type="email": valida formato de correo en el navegador
                    value="{{ old('email') }}": mantiene el email si hubo error
                    required: no permite enviar el form vacío
                    autofocus: pone el cursor aquí al cargar la página
                --}}
                <input type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                       required 
                       autofocus>
            </div>
            {{-- Campo: Email --}}
            
            {{-- Campo: Contraseña --}}
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">
                    Contraseña
                </label>
                
                {{-- 
                    input type="password": oculta los caracteres
                    required: campo obligatorio
                    (no usamos old() aquí por seguridad)
                --}}
                <input type="password" 
                       name="password" 
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                       required>
            </div>
            
            {{-- Botón de envío --}}
            {{-- hover:bg-yellow-700: cambia de color al pasar el mouse --}}
            <button type="submit" 
                    class="w-full py-3 bg-yellow-600 text-white rounded-lg font-semibold hover:bg-yellow-700">
                Iniciar Sesión
            </button>
            
        </form>
    </div>
    {{-- Contenedor principal: centra el formulario vertical y horizontalmente --}}

</body>

</html>
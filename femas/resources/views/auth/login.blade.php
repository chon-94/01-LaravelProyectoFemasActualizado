<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Femas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold text-center mb-6 text-yellow-600">Admin Femas</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @if($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">{{ $errors->first() }}</div>
            @endif
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required autofocus>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Contraseña</label>
                <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            </div>
            <button type="submit" class="w-full py-3 bg-yellow-600 text-white rounded-lg font-semibold hover:bg-yellow-700">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
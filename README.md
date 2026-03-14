# 01-LaravelProyectoFemasActualizado
 sitio web

# 1. Ir a tu carpeta de proyectos
cd ~/Documentos/GitHub

# 2. Crear proyecto Laravel 12
composer create-project laravel/laravel femas

# 3. Entrar al proyecto
cd femas

# 4. Instalar Node.js (Tailwind incluido)
npm install

# 5. Terminal 1: Compilar assets (Mantener abierto)
npm run dev

# 6. Terminal 2: Iniciar servidor (Mantener abierto)
php artisan serve

# 7. Crear el comando
php artisan make:command CreateAdminUser
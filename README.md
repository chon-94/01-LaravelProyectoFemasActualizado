# 01-LaravelProyectoFemasActualizado
 sitio web

# 1. Crear proyecto
cd ~/Documentos/GitHub
composer create-project laravel/laravel femas
cd femas

# 2. Instalar dependencias
npm install

# 3. Crear comando custom
php artisan make:command CreateAdminUser

# 4. Migrar base de datos
touch database/database.sqlite
php artisan migrate

# 5. Crear usuario admin
php artisan admin:create

# 6. Iniciar servidores
npm run dev      # Terminal 1
php artisan serve # Terminal 2


┌─────────────────────────────────┐
│  🏗️ MVC - NIVELES DE PROFUNDIDAD │
└─────────────────────────────────┘

🔹 MODELO (Datos)
   │
   ├── 🟢 NIVEL 1: Estructura base ✅ 
   │   ├── Tabla `projects` creada (migración)
   │   ├── Modelo `Project.php` con $fillable
   │   ├── CRUD básico (store, update, delete)
   │
   ├── 🟡 NIVEL 2: Lógica de negocio ⏳
   │   ├── Scopes: Project::active(), byCategory()
   │   ├── Accessors/Mutators: formatDate(), getImageUrl()
   │   ├── Relaciones: Project → User (quién lo creó)
   │   └── Validaciones personalizadas
   │
   └── 🔴 NIVEL 3: Complejidad avanzada ⏸️
       ├── Events/Observers: "Cuando se crea un proyecto, enviar email"
       ├── Caching: Redis para proyectos frecuentes
       ├── Search: Filtros por ubicación, año, categoría
       └── API Resources: JSON para app móvil

🔹 VISTA (Frontend)
   │
   ├── 🟢 home.blade.php con carousel ✅
   ├── 🟡 about.blade.php pendiente ⏳
   └── 🔴 Admin layout con sidebar ⏸️

🔹 CONTROLADOR (Lógica)
   │
   ├── 🟢 ProjectController con CRUD básico ✅
   ├── 🟡 AuthController para login ⏳
   └── 🔴 Middleware + Policies de seguridad ⏸️


   # 1. Crear controlador (1 archivo)
php artisan make:controller Auth/LoginController

# 2. Crear carpeta para vista
mkdir -p resources/views/auth

# 3. Listo, el resto es copiar y pegar

para la nav bar

inicio nosotros servicios contacto

numero email
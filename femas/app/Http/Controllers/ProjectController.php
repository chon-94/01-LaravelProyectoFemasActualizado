<?php

// Namespace: organiza el controller en la estructura de Laravel
namespace App\Http\Controllers;

// Importar el Modelo Project para interactuar con la tabla 'projects'
use App\Models\Project;

// Importar Request para manejar datos enviados por formularios
use Illuminate\Http\Request;

/**
 * ProjectController
 * 
 * Maneja todas las operaciones relacionadas con proyectos:
 * 
 * 🟢 PÚBLICO (sin auth):
 *   - show() → Ver detalle de un proyecto
 * 
 * 🔐 ADMIN (con middleware 'auth'):
 *   - index() → Listar proyectos con paginación
 *   - create() → Formulario para crear
 *   - store() → Guardar nuevo proyecto + subir imagen
 *   - edit() → Formulario para editar
 *   - update() → Actualizar proyecto + manejar imagen
 *   - destroy() → Eliminar proyecto + limpiar archivo
 * 
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
{
// 🟢 MÉTODOS PÚBLICOS

    /**
     * Mostrar el detalle de un proyecto (vista pública)
     * 
     * Método: GET
     * Ruta: /projects/{project}
     * Acceso: PÚBLICO
     * 
     * @param  \App\Models\Project  $project  Inyectado por Route Model Binding
     * @return \Illuminate\View\View
     */
    public function show(Project $project)
    {
        // Route Model Binding: Laravel busca automáticamente el proyecto por ID
        // Si no existe → retorna 404 automáticamente
        return view('projects.show', compact('project'));
    }


// 🔐 MÉTODOS ADMIN (protegidos por middleware 'auth')

    /**
     * Listar todos los proyectos con paginación
     * 
     * Método: GET
     * Ruta: /admin/projects
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Consultar proyectos: más recientes primero, 10 por página
        $projects = Project::latest()->paginate(10);
        
        // Pasar datos a la vista admin.projects.index
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Mostrar formulario para crear nuevo proyecto
     * 
     * Método: GET
     * Ruta: /admin/projects/create
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Guardar un nuevo proyecto en la base de datos
     * 
     * Método: POST
     * Ruta: /admin/projects
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // ----------------------------------------------------
        // DEBUG: Registrar datos para troubleshooting
        // ----------------------------------------------------
        // Útil para ver qué está llegando al servidor cuando algo falla
        \Log::info('Request data:', $request->all());
        \Log::info('Has file:', [$request->hasFile('image')]);
        
        if ($request->hasFile('image')) {
            \Log::info('File info:', [
                'name' => $request->file('image')->getClientOriginalName(),
                'size' => $request->file('image')->getSize(),
                'type' => $request->file('image')->getMimeType(),
            ]);
        }

        // ----------------------------------------------------
        // 1. VALIDAR DATOS DEL FORMULARIO
        // ----------------------------------------------------
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Imagen: requerida, debe ser imagen válida, formatos permitidos, máx 2MB
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'year' => 'nullable|string|max:4',
            'is_active' => 'boolean',
        ]);

        // ----------------------------------------------------
        // 2. PROCESAR Y GUARDAR
        // ----------------------------------------------------
        try {
            // Subir imagen si existe
            if ($request->hasFile('image')) {
                // Generar nombre único: timestamp + nombre original
                $imageName = time() . '_' . $request->image->getClientOriginalName();
                
                // Asegurar que la carpeta de destino existe
                $uploadPath = public_path('images/projects');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                
                // Mover archivo a la carpeta pública
                $request->image->move($uploadPath, $imageName);
                
                // Guardar solo el nombre del archivo en la BD
                $validated['image'] = $imageName;
            }

            // Procesar checkbox is_active
            // has() retorna true si el checkbox fue enviado (marcado)
            $validated['is_active'] = $request->has('is_active');

            // Crear proyecto en la base de datos
            // Requiere que el Modelo tenga $fillable configurado
            Project::create($validated);

            // Redirigir al listado con mensaje de éxito
            return redirect()->route('admin.projects.index')
                ->with('success', '✅ Proyecto creado exitosamente.');
                
        } catch (\Exception $e) {
            // ----------------------------------------------------
            // MANEJO DE ERRORES
            // ----------------------------------------------------
            // Si algo falla (permisos, BD, etc.), mostrar error amigable
            return back()
                ->with('error', '❌ Error: ' . $e->getMessage())
                ->withInput();  // Mantiene los datos que el usuario escribió
        }
    }

    /**
     * Mostrar formulario para editar un proyecto existente
     * 
     * Método: GET
     * Ruta: /admin/projects/{project}/edit
     * 
     * @param  \App\Models\Project  $project
     * @return \Illuminate\View\View
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Actualizar un proyecto existente en la base de datos
     * 
     * Método: PUT/PATCH
     * Ruta: /admin/projects/{project}
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Project $project)
    {
        // ----------------------------------------------------
        // 1. VALIDAR DATOS
        // ----------------------------------------------------
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // CORRECCIÓN: Validar como imagen (no como string) para permitir upload
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'year' => 'nullable|string|max:4',
            'is_active' => 'boolean',
        ]);

        // ----------------------------------------------------
        // 2. PROCESAR NUEVA IMAGEN (si el usuario subió una)
        // ----------------------------------------------------
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior para no acumular archivos basura
            if ($project->image && file_exists(public_path('images/projects/' . $project->image))) {
                unlink(public_path('images/projects/' . $project->image));
            }
            
            // Subir nueva imagen con nombre único
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            
            // Asegurar que la carpeta existe
            $uploadPath = public_path('images/projects');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            $request->image->move($uploadPath, $imageName);
            $validated['image'] = $imageName;
        }
        // Si NO hay nueva imagen → no se modifica el campo 'image' en la BD

        // ----------------------------------------------------
        // 3. PROCESAR CHECKBOX is_active
        // ----------------------------------------------------
        $validated['is_active'] = $request->has('is_active');

        // ----------------------------------------------------
        // 4. ACTUALIZAR EN LA BASE DE DATOS
        // ----------------------------------------------------
        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', '✅ Proyecto actualizado exitosamente.');
    }

    /**
     * Eliminar un proyecto de la base de datos
     * 
     * Método: DELETE
     * Ruta: /admin/projects/{project}
     * 
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project)
    {
        // ----------------------------------------------------
        // 1. ELIMINAR ARCHIVO DE IMAGEN ASOCIADO
        // ----------------------------------------------------
        // CORRECCIÓN: Limpiar archivo para no dejar "imágenes zombis"
        if ($project->image && file_exists(public_path('images/projects/' . $project->image))) {
            unlink(public_path('images/projects/' . $project->image));
        }

        // ----------------------------------------------------
        // 2. ELIMINAR REGISTRO DE LA BASE DE DATOS
        // ----------------------------------------------------
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', '✅ Proyecto eliminado exitosamente.');
    }
}
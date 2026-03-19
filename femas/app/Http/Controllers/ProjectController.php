<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // 🟢 PÚBLICO: Detalle del proyecto
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    // 🔐 ADMIN: CRUD completo
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {

        // Debug
        \Log::info('Request data:', $request->all());
        \Log::info('Has file:', [$request->hasFile('image')]);
        
        if ($request->hasFile('image')) {
            \Log::info('File info:', [
                'name' => $request->file('image')->getClientOriginalName(),
                'size' => $request->file('image')->getSize(),
                'type' => $request->file('image')->getMimeType(),
            ]);
        }    




        // Validación
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'year' => 'nullable|string|max:4',
            'is_active' => 'boolean',
        ]);

        try {
            // Subir imagen
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . $request->image->getClientOriginalName();
                $request->image->move(public_path('images/projects'), $imageName);
                $validated['image'] = $imageName;
            }

            $validated['is_active'] = $request->has('is_active');

            Project::create($validated);

            return redirect()->route('admin.projects.index')
                ->with('success', '✅ Proyecto creado exitosamente.');
                
        } catch (\Exception $e) {
            // Si hay error, muestra qué pasó
            return back()->with('error', '❌ Error: ' . $e->getMessage())
                        ->withInput();
        }
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:4',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', '✅ Proyecto actualizado exitosamente.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', '✅ Proyecto eliminado exitosamente.');
    }
}
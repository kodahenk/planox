<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Projeleri listele.
     */
    public function index()
    {
        $projects = Project::withCount('tasks')->get();
        return view('project.index', compact('projects'));
    }

    /**
     * Proje detaylarını görüntüle.
     */
    public function show($id)
    {
        $projectWithTasks = Project::with('tasks.children')->findOrFail($id);
        return view('project.show', compact('projectWithTasks'));
    }

    /**
     * Yeni proje oluşturma formunu göster.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Yeni proje kaydet.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index')->with('success', 'Proje başarıyla oluşturuldu.');
    }

    /**
     * Proje düzenleme formunu göster.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('project.edit', compact('project'));
    }

    /**
     * Proje güncelle.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project = Project::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Proje başarıyla güncellendi.');
    }

    /**
     * Proje sil.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Proje başarıyla silindi.');
    }
}

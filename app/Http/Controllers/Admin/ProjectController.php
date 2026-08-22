<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order_index')->paginate(20);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = uploadImage($request->file('image'));
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'تمت إضافة المشروع بنجاح.');
    }

    public function edit(int $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, int $id)
    {
        $project = Project::findOrFail($id);
        $data    = $this->validated($request);

        if ($request->hasFile('image')) {
            deleteUploadedImage($project->image);
            $data['image'] = uploadImage($request->file('image'));
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'تم تحديث المشروع بنجاح.');
    }

    public function destroy(int $id)
    {
        $project = Project::findOrFail($id);
        deleteUploadedImage($project->image);
        $project->delete();

        return back()->with('success', 'تم حذف المشروع.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'category_ar'  => 'required|string|max:100',
            'category_en'  => 'required|string|max:100',
            'title_ar'     => 'required|string|max:150',
            'title_en'     => 'required|string|max:150',
            'location_ar'  => 'required|string|max:200',
            'location_en'  => 'required|string|max:200',
            'size'         => 'required|in:big,small',
            'image'        => 'nullable|image|max:4096',
            'order_index'  => 'nullable|integer|min:0',
            'is_active'    => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        unset($data['image']);

        return $data;
    }
}

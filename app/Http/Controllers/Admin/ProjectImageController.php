<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectImageController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'images'   => 'required|array',
            'images.*' => 'image|max:4096',
        ]);

        $nextOrder = (int) $project->images()->max('order_index');

        foreach ($request->file('images') as $file) {
            $nextOrder++;
            ProjectImage::create([
                'project_id'  => $project->id,
                'image'       => uploadImage($file),
                'order_index' => $nextOrder,
            ]);
        }

        return redirect()->route('admin.projects.edit', $project->id)->with('success', 'تمت إضافة الصور بنجاح.');
    }

    public function destroy(int $id)
    {
        $image = ProjectImage::findOrFail($id);
        $projectId = $image->project_id;

        deleteUploadedImage($image->image);
        $image->delete();

        return redirect()->route('admin.projects.edit', $projectId)->with('success', 'تم حذف الصورة.');
    }
}

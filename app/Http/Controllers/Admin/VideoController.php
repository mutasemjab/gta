<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('order_index')->paginate(20);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request, true);

        $data['video'] = uploadImage($request->file('video'));

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = uploadImage($request->file('thumbnail'));
        }

        Video::create($data);

        return redirect()->route('admin.videos.index')->with('success', 'تمت إضافة الفيديو بنجاح.');
    }

    public function edit(int $id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, int $id)
    {
        $video = Video::findOrFail($id);
        $data  = $this->validated($request, false);

        if ($request->hasFile('video')) {
            deleteUploadedImage($video->video);
            $data['video'] = uploadImage($request->file('video'));
        }

        if ($request->hasFile('thumbnail')) {
            deleteUploadedImage($video->thumbnail);
            $data['thumbnail'] = uploadImage($request->file('thumbnail'));
        }

        $video->update($data);

        return redirect()->route('admin.videos.index')->with('success', 'تم تحديث الفيديو بنجاح.');
    }

    public function destroy(int $id)
    {
        $video = Video::findOrFail($id);
        deleteUploadedImage($video->video);
        deleteUploadedImage($video->thumbnail);
        $video->delete();

        return back()->with('success', 'تم حذف الفيديو.');
    }

    private function validated(Request $request, bool $videoRequired): array
    {
        $data = $request->validate([
            'title_ar'    => 'nullable|string|max:150',
            'title_en'    => 'nullable|string|max:150',
            'video'       => ($videoRequired ? 'required' : 'nullable') . '|file|mimes:mp4,mov,webm|max:51200',
            'thumbnail'   => 'nullable|image|max:4096',
            'order_index' => 'nullable|integer|min:0',
            'is_active'   => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        unset($data['video'], $data['thumbnail']);

        return $data;
    }
}

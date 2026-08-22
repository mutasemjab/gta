<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order_index')->paginate(20);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('icon')) {
            $data['icon'] = uploadImage($request->file('icon'));
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'تمت إضافة الخدمة بنجاح.');
    }

    public function edit(int $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, int $id)
    {
        $service = Service::findOrFail($id);
        $data    = $this->validated($request);

        if ($request->hasFile('icon')) {
            deleteUploadedImage($service->icon);
            $data['icon'] = uploadImage($request->file('icon'));
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'تم تحديث الخدمة بنجاح.');
    }

    public function destroy(int $id)
    {
        $service = Service::findOrFail($id);
        deleteUploadedImage($service->icon);
        $service->delete();

        return back()->with('success', 'تم حذف الخدمة.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title_ar'       => 'required|string|max:150',
            'title_en'       => 'required|string|max:150',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'order_index'    => 'nullable|integer|min:0',
            'icon'           => 'nullable|image|max:2048',
            'is_active'      => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        unset($data['icon']);

        return $data;
    }
}

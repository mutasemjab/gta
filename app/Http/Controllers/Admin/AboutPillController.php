<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPill;
use Illuminate\Http\Request;

class AboutPillController extends Controller
{
    public function index()
    {
        $aboutPills = AboutPill::orderBy('order_index')->paginate(20);
        return view('admin.about-pills.index', compact('aboutPills'));
    }

    public function create()
    {
        return view('admin.about-pills.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        AboutPill::create($data);

        return redirect()->route('admin.about-pills.index')->with('success', 'تمت إضافة العنصر بنجاح.');
    }

    public function edit(int $id)
    {
        $aboutPill = AboutPill::findOrFail($id);
        return view('admin.about-pills.edit', compact('aboutPill'));
    }

    public function update(Request $request, int $id)
    {
        $data = $this->validated($request);
        AboutPill::findOrFail($id)->update($data);

        return redirect()->route('admin.about-pills.index')->with('success', 'تم تحديث العنصر بنجاح.');
    }

    public function destroy(int $id)
    {
        AboutPill::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف العنصر.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name_ar'     => 'required|string|max:100',
            'name_en'     => 'required|string|max:100',
            'order_index' => 'nullable|integer|min:0',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatalogItem;
use Illuminate\Http\Request;

class CatalogItemController extends Controller
{
    public function index()
    {
        $catalogItems = CatalogItem::orderBy('order_index')->paginate(20);
        return view('admin.catalog-items.index', compact('catalogItems'));
    }

    public function create()
    {
        return view('admin.catalog-items.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('file')) {
            $data['file'] = uploadImage($request->file('file'));
        }

        CatalogItem::create($data);

        return redirect()->route('admin.catalog-items.index')->with('success', 'تمت إضافة عنصر الكتالوج بنجاح.');
    }

    public function edit(int $id)
    {
        $catalogItem = CatalogItem::findOrFail($id);
        return view('admin.catalog-items.edit', compact('catalogItem'));
    }

    public function update(Request $request, int $id)
    {
        $catalogItem = CatalogItem::findOrFail($id);
        $data        = $this->validated($request);

        if ($request->hasFile('file')) {
            deleteUploadedImage($catalogItem->file);
            $data['file'] = uploadImage($request->file('file'));
        }

        $catalogItem->update($data);

        return redirect()->route('admin.catalog-items.index')->with('success', 'تم تحديث عنصر الكتالوج بنجاح.');
    }

    public function destroy(int $id)
    {
        $catalogItem = CatalogItem::findOrFail($id);
        deleteUploadedImage($catalogItem->file);
        $catalogItem->delete();

        return back()->with('success', 'تم حذف عنصر الكتالوج.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'meta_label_ar'  => 'nullable|string|max:100',
            'meta_label_en'  => 'nullable|string|max:100',
            'title_ar'       => 'required|string|max:150',
            'title_en'       => 'required|string|max:150',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'file'           => 'nullable|file|mimes:pdf|max:20480',
            'order_index'    => 'nullable|integer|min:0',
            'is_active'      => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        unset($data['file']);

        return $data;
    }
}

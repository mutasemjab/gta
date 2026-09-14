<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('order_index')->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = uploadImage($request->file('image'));
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'تمت إضافة المنتج بنجاح.');
    }

    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        $data    = $this->validated($request);

        if ($request->hasFile('image')) {
            deleteUploadedImage($product->image);
            $data['image'] = uploadImage($request->file('image'));
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'تم تحديث المنتج بنجاح.');
    }

    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);
        deleteUploadedImage($product->image);
        $product->delete();

        return back()->with('success', 'تم حذف المنتج.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'chip_label'      => 'nullable|string|max:30',
            'code'            => 'nullable|string|max:60',
            'image'           => 'nullable|image|max:4096',
            'name_ar'         => 'required|string|max:150',
            'name_en'         => 'required|string|max:150',
            'description_ar'  => 'required|string',
            'description_en'  => 'required|string',
            'spec_label_ar'   => 'nullable|string|max:60',
            'spec_label_en'   => 'nullable|string|max:60',
            'spec_value'      => 'nullable|string|max:60',
            'order_index'     => 'nullable|integer|min:0',
            'is_active'       => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        unset($data['image']);

        return $data;
    }
}

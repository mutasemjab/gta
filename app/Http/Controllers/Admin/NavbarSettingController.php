<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavbarSetting;
use Illuminate\Http\Request;

class NavbarSettingController extends Controller
{
    public function edit()
    {
        $navbar = NavbarSetting::firstOrCreate([], [
            'brand_name_ar' => 'جي تي إيه للاصقات',
            'brand_name_en' => 'GTA for Adhesive',
        ]);

        return view('admin.navbar.edit', compact('navbar'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'brand_name_ar' => 'required|string|max:150',
            'brand_name_en' => 'required|string|max:150',
            'logo'          => 'nullable|image|max:4096',
        ]);

        $navbar = NavbarSetting::firstOrFail();

        $data = $request->only(['brand_name_ar', 'brand_name_en']);

        if ($request->hasFile('logo')) {
            deleteUploadedImage($navbar->logo);
            $data['logo'] = uploadImage($request->file('logo'));
        }

        $navbar->update($data);

        return redirect()->route('admin.navbar.edit')->with('success', 'تم تحديث شريط التنقل بنجاح.');
    }
}

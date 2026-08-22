<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\Request;

class FooterSettingController extends Controller
{
    public function edit()
    {
        $footer = FooterSetting::firstOrCreate([], [
            'about_ar'     => '',
            'about_en'     => '',
            'copyright_ar' => '',
            'copyright_en' => '',
        ]);

        return view('admin.footer.edit', compact('footer'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'about_ar'      => 'required|string',
            'about_en'      => 'required|string',
            'copyright_ar'  => 'required|string|max:200',
            'copyright_en'  => 'required|string|max:200',
            'tagline_ar'    => 'nullable|string|max:200',
            'tagline_en'    => 'nullable|string|max:200',
            'facebook_url'  => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
            'linkedin_url'  => 'nullable|string|max:255',
            'whatsapp_url'  => 'nullable|string|max:255',
        ]);

        FooterSetting::firstOrFail()->update($data);

        return redirect()->route('admin.footer.edit')->with('success', 'تم تحديث التذييل بنجاح.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function edit()
    {
        $about = AboutSection::firstOrCreate([], [
            'eyebrow_ar' => '', 'eyebrow_en' => '',
            'title_ar' => '', 'title_en' => '',
            'lead_ar' => '', 'lead_en' => '',
            'paragraph1_ar' => '', 'paragraph1_en' => '',
            'paragraph2_ar' => '', 'paragraph2_en' => '',
        ]);

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'eyebrow_ar'    => 'required|string|max:150',
            'eyebrow_en'    => 'required|string|max:150',
            'title_ar'      => 'required|string|max:250',
            'title_en'      => 'required|string|max:250',
            'lead_ar'       => 'required|string',
            'lead_en'       => 'required|string',
            'paragraph1_ar' => 'required|string',
            'paragraph1_en' => 'required|string',
            'paragraph2_ar' => 'required|string',
            'paragraph2_en' => 'required|string',
            'badge_title'   => 'nullable|string|max:10',
            'badge_text_ar' => 'nullable|string|max:250',
            'badge_text_en' => 'nullable|string|max:250',
        ]);

        AboutSection::firstOrFail()->update($data);

        return redirect()->route('admin.about.edit')->with('success', 'تم تحديث قسم "من نحن" بنجاح.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function edit()
    {
        $hero = Hero::firstOrCreate([], [
            'eyebrow_ar' => '', 'eyebrow_en' => '',
            'heading_line1_ar' => '', 'heading_line1_en' => '',
            'heading_highlight_ar' => '', 'heading_highlight_en' => '',
            'heading_line2_ar' => '', 'heading_line2_en' => '',
            'lead_ar' => '', 'lead_en' => '',
        ]);

        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'eyebrow_ar'           => 'required|string|max:150',
            'eyebrow_en'           => 'required|string|max:150',
            'heading_line1_ar'     => 'required|string|max:150',
            'heading_line1_en'     => 'required|string|max:150',
            'heading_highlight_ar' => 'required|string|max:150',
            'heading_highlight_en' => 'required|string|max:150',
            'heading_line2_ar'     => 'required|string|max:150',
            'heading_line2_en'     => 'required|string|max:150',
            'lead_ar'              => 'required|string',
            'lead_en'              => 'required|string',
            'primary_btn_link'     => 'required|string|max:255',
            'secondary_btn_link'   => 'required|string|max:255',
            'strip_text'           => 'nullable|string|max:255',
        ]);

        Hero::firstOrFail()->update($data);

        return redirect()->route('admin.hero.edit')->with('success', 'تم تحديث قسم الهيرو بنجاح.');
    }
}

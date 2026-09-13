<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionHeading;
use Illuminate\Http\Request;

class SectionHeadingController extends Controller
{
    public const SECTIONS = [
        'services' => ['label' => 'الخدمات',            'has_desc' => true],
        'products' => ['label' => 'المنتجات',            'has_desc' => true],
        'catalog'  => ['label' => 'الداتا شيت',          'has_desc' => true],
        'projects' => ['label' => 'المشاريع',            'has_desc' => true],
        'agents'   => ['label' => 'وكلاؤنا',             'has_desc' => false],
        'clients'  => ['label' => 'عملاؤنا',             'has_desc' => false],
        'reels'    => ['label' => 'الفيديوهات (ريلز)',   'has_desc' => true],
    ];

    public function edit()
    {
        foreach (self::SECTIONS as $key => $meta) {
            SectionHeading::firstOrCreate(['key' => $key]);
        }

        $headings = SectionHeading::whereIn('key', array_keys(self::SECTIONS))->get()->keyBy('key');

        return view('admin.section-headings.edit', [
            'headings' => $headings,
            'sections' => self::SECTIONS,
        ]);
    }

    public function update(Request $request)
    {
        $rules = [];
        foreach (self::SECTIONS as $key => $meta) {
            $rules["data.$key.eyebrow_ar"] = 'nullable|string|max:150';
            $rules["data.$key.eyebrow_en"] = 'nullable|string|max:150';
            $rules["data.$key.title_ar"]   = 'nullable|string|max:250';
            $rules["data.$key.title_en"]   = 'nullable|string|max:250';
            if ($meta['has_desc']) {
                $rules["data.$key.description_ar"] = 'nullable|string';
                $rules["data.$key.description_en"] = 'nullable|string';
            }
        }

        $validated = $request->validate($rules);

        foreach ($validated['data'] ?? [] as $key => $fields) {
            SectionHeading::updateOrCreate(['key' => $key], $fields);
        }

        return redirect()->route('admin.section-headings.edit')->with('success', 'تم تحديث عناوين الأقسام بنجاح.');
    }
}

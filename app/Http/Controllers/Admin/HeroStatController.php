<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroStat;
use Illuminate\Http\Request;

class HeroStatController extends Controller
{
    public function index()
    {
        $heroStats = HeroStat::orderBy('order_index')->paginate(20);
        return view('admin.hero-stats.index', compact('heroStats'));
    }

    public function create()
    {
        return view('admin.hero-stats.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        HeroStat::create($data);

        return redirect()->route('admin.hero-stats.index')->with('success', 'تمت إضافة الإحصائية بنجاح.');
    }

    public function edit(int $id)
    {
        $heroStat = HeroStat::findOrFail($id);
        return view('admin.hero-stats.edit', compact('heroStat'));
    }

    public function update(Request $request, int $id)
    {
        $data = $this->validated($request);
        HeroStat::findOrFail($id)->update($data);

        return redirect()->route('admin.hero-stats.index')->with('success', 'تم تحديث الإحصائية بنجاح.');
    }

    public function destroy(int $id)
    {
        HeroStat::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الإحصائية.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'label_ar'    => 'required|string|max:100',
            'label_en'    => 'required|string|max:100',
            'value'       => 'required|integer|min:0',
            'suffix'      => 'nullable|string|max:10',
            'order_index' => 'nullable|integer|min:0',
        ]);
    }
}

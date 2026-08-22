<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutStat;
use Illuminate\Http\Request;

class AboutStatController extends Controller
{
    public function index()
    {
        $aboutStats = AboutStat::orderBy('order_index')->paginate(20);
        return view('admin.about-stats.index', compact('aboutStats'));
    }

    public function create()
    {
        return view('admin.about-stats.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        AboutStat::create($data);

        return redirect()->route('admin.about-stats.index')->with('success', 'تمت إضافة الإحصائية بنجاح.');
    }

    public function edit(int $id)
    {
        $aboutStat = AboutStat::findOrFail($id);
        return view('admin.about-stats.edit', compact('aboutStat'));
    }

    public function update(Request $request, int $id)
    {
        $data = $this->validated($request);
        AboutStat::findOrFail($id)->update($data);

        return redirect()->route('admin.about-stats.index')->with('success', 'تم تحديث الإحصائية بنجاح.');
    }

    public function destroy(int $id)
    {
        AboutStat::findOrFail($id)->delete();
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

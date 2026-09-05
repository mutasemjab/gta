<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::orderBy('order_index')->paginate(20);
        return view('admin.agents.index', compact('agents'));
    }

    public function create()
    {
        return view('admin.agents.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('logo')) {
            $data['logo'] = uploadImage($request->file('logo'));
        }

        Agent::create($data);

        return redirect()->route('admin.agents.index')->with('success', 'تمت إضافة الوكيل بنجاح.');
    }

    public function edit(int $id)
    {
        $agent = Agent::findOrFail($id);
        return view('admin.agents.edit', compact('agent'));
    }

    public function update(Request $request, int $id)
    {
        $agent = Agent::findOrFail($id);
        $data  = $this->validated($request);

        if ($request->hasFile('logo')) {
            deleteUploadedImage($agent->logo);
            $data['logo'] = uploadImage($request->file('logo'));
        }

        $agent->update($data);

        return redirect()->route('admin.agents.index')->with('success', 'تم تحديث الوكيل بنجاح.');
    }

    public function destroy(int $id)
    {
        $agent = Agent::findOrFail($id);
        deleteUploadedImage($agent->logo);
        $agent->delete();

        return back()->with('success', 'تم حذف الوكيل.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name'        => 'required|string|max:150',
            'logo'        => 'nullable|image|max:2048',
            'order_index' => 'nullable|integer|min:0',
            'is_active'   => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        unset($data['logo']);

        return $data;
    }
}

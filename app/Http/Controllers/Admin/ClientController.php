<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('order_index')->paginate(20);
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('logo')) {
            $data['logo'] = uploadImage($request->file('logo'));
        }

        Client::create($data);

        return redirect()->route('admin.clients.index')->with('success', 'تمت إضافة العميل بنجاح.');
    }

    public function edit(int $id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, int $id)
    {
        $client = Client::findOrFail($id);
        $data   = $this->validated($request);

        if ($request->hasFile('logo')) {
            deleteUploadedImage($client->logo);
            $data['logo'] = uploadImage($request->file('logo'));
        }

        $client->update($data);

        return redirect()->route('admin.clients.index')->with('success', 'تم تحديث العميل بنجاح.');
    }

    public function destroy(int $id)
    {
        $client = Client::findOrFail($id);
        deleteUploadedImage($client->logo);
        $client->delete();

        return back()->with('success', 'تم حذف العميل.');
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

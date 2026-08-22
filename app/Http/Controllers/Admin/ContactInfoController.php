<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function edit()
    {
        $contactInfo = ContactInfo::firstOrCreate([], [
            'phone' => '', 'email' => '',
            'address_ar' => '', 'address_en' => '',
            'hours_ar' => '', 'hours_en' => '',
        ]);

        return view('admin.contact-info.edit', compact('contactInfo'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'phone'      => 'required|string|max:50',
            'email'      => 'required|email|max:150',
            'address_ar' => 'required|string|max:250',
            'address_en' => 'required|string|max:250',
            'hours_ar'   => 'required|string|max:150',
            'hours_en'   => 'required|string|max:150',
        ]);

        ContactInfo::firstOrFail()->update($data);

        return redirect()->route('admin.contact-info.edit')->with('success', 'تم تحديث معلومات التواصل بنجاح.');
    }
}

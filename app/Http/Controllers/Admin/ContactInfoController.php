<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactInfos = ContactInfo::ordered()->get();
        return view('admin.contact_infos.index', compact('contactInfos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact_infos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0|unique:contact_infos,sort_order',
            'is_active' => 'sometimes|accepted', // bisa juga 'boolean'
        ]);

        // Ambil input yang dibutuhkan
        $data = $request->only(['type', 'label', 'value', 'icon', 'sort_order']);

        // Checkbox diubah menjadi boolean
        $data['is_active'] = $request->has('is_active');

        // Buat record baru
        ContactInfo::create($data);

        return redirect()->route('admin.contact-infos.index')
            ->with('success', 'Contact Info berhasil ditambahkan!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactInfo $contactInfo)
    {
        return view('admin.contact_infos.edit', compact('contactInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactInfo $contactInfo)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0|unique:contact_infos,sort_order,' . $contactInfo->id,
            'is_active' => 'sometimes|accepted', // bisa juga 'boolean'
        ]);

        $data = $request->only(['type', 'label', 'value', 'icon', 'sort_order']);
        $data['is_active'] = $request->has('is_active');

        $contactInfo->update($data);

        return redirect()->route('admin.contact-infos.index')
            ->with('success', 'Contact Info berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactInfo $contactInfo)
    {
        $contactInfo->delete();

        return redirect()->route('admin.contact-infos.index')
            ->with('success', 'Contact Info berhasil dihapus!');
    }
}

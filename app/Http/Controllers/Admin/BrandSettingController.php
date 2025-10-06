<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brandSetting = BrandSetting::first();
        
        if (!$brandSetting) {
            $brandSetting = BrandSetting::create([
                'company_name' => 'BahariStack',
                'description' => 'Jasa pembuatan website, software, dan aplikasi android profesional dengan kualitas terbaik.',
            ]);
        }

        return view('admin.brand-settings.index', compact('brandSetting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BrandSetting $brandSetting)
    {
        return view('admin.brand-settings.edit', compact('brandSetting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BrandSetting $brandSetting)
    {

        $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'required|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,ico|max:1024',
            'social_facebook' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
        ]);

        $data = $request->only([
            'company_name', 'description', 'email', 'phone', 'address', 'website'
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            if ($brandSetting->logo_path && Storage::disk('public_direct')->exists($brandSetting->logo_path)) {
                Storage::disk('public_direct')->delete($brandSetting->logo_path);
            }
            $logoPath = $request->file('logo')->store('images/logos', 'public_direct');
            $data['logo_path'] = $logoPath;
        } else {
            // Pertahankan logo_path yang sudah ada jika tidak ada file baru
            $data['logo_path'] = $brandSetting->logo_path;
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            if ($brandSetting->favicon_path && Storage::disk('public_direct')->exists($brandSetting->favicon_path)) {
                Storage::disk('public_direct')->delete($brandSetting->favicon_path);
            }
            $faviconPath = $request->file('favicon')->store('images/favicon', 'public_direct');
            $data['favicon_path'] = $faviconPath;
        } else {
            // Pertahankan favicon_path yang sudah ada jika tidak ada file baru
            $data['favicon_path'] = $brandSetting->favicon_path;
        }

        // Handle social media
        $socialMedia = [];
        if ($request->social_facebook) $socialMedia['facebook'] = $request->social_facebook;
        if ($request->social_instagram) $socialMedia['instagram'] = $request->social_instagram;
        if ($request->social_linkedin) $socialMedia['linkedin'] = $request->social_linkedin;
        if ($request->social_twitter) $socialMedia['twitter'] = $request->social_twitter;
        
        if (!empty($socialMedia)) {
            $data['social_media'] = $socialMedia;
        }

        $brandSetting->update($data);

        return redirect()->route('admin.brand-settings.index')
            ->with('success', 'Brand settings berhasil diperbarui!');
    }
}

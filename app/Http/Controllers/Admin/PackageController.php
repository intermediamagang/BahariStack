<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::ordered()->get();
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|max:10',
            'features' => 'nullable|string', // string dipisah koma
            'type' => 'required|in:website,software,mobile_app',
            'sort_order' => 'nullable|integer|min:0|unique:packages,sort_order',
            'is_popular' => 'sometimes|in:on',
            'is_active' => 'sometimes|in:on',
        ]);

        // Ambil data
        $data = $request->only([
            'name',
            'description',
            'price',
            'currency',
            'type',
            'sort_order'
        ]);

        // Parse fitur menjadi array
        $data['features'] = $request->features
            ? array_filter(array_map('trim', explode(',', $request->features)))
            : [];

        // Checkbox
        $data['is_popular'] = $request->has('is_popular');
        $data['is_active'] = $request->has('is_active');

        // Simpan ke database
        Package::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.packages.index')
            ->with('success', 'Package berhasil ditambahkan!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|max:10',
            'features' => 'nullable|string', // string dipisah koma
            'type' => 'required|in:website,software,mobile_app',
            'sort_order' => 'nullable|integer|min:0|unique:packages,sort_order,' . $package->id,
            'is_popular' => 'sometimes|in:on',
            'is_active' => 'sometimes|in:on',
        ]);

        // Ambil data
        $data = $request->only([
            'name',
            'description',
            'price',
            'currency',
            'type',
            'sort_order'
        ]);

        // Parse fitur menjadi array
        $data['features'] = $request->features
            ? array_filter(array_map('trim', explode(',', $request->features)))
            : [];

        // Checkbox
        $data['is_popular'] = $request->has('is_popular');
        $data['is_active'] = $request->has('is_active');

        // Update package
        $package->update($data);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.packages.index')
            ->with('success', 'Package berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index')
            ->with('success', 'Package berhasil dihapus!');
    }
}

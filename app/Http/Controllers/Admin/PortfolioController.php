<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('sort_order')->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string|in:website,software,mobile_app',
            'client_name' => 'nullable|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|string',
            'project_date' => 'nullable|date',
            'sort_order' => 'nullable|integer|min:0',
            'is_featured' => 'sometimes|in:on',
            'is_active' => 'sometimes|in:on',
        ]);

        $data = $request->only([
            'title',
            'description',
            'category',
            'client_name',
            'project_url',
            'project_date',
            'sort_order'
        ]);

        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        if ($request->technologies) {
            $data['technologies'] = array_filter(array_map('trim', explode(',', $request->technologies)));
        }

        // Cek unik sort_order
        if ($request->sort_order !== null) {
            $exists = Portfolio::where('sort_order', $request->sort_order)->exists();
            if ($exists) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['sort_order' => 'Urutan tampil sudah digunakan, silakan pilih angka lain.']);
            }
        }

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('images/portfolios', 'public');
        }

        Portfolio::create($data);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolios.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        // Validasi dasar
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string|in:website,software,mobile_app',
            'client_name' => 'nullable|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|string',
            'project_date' => 'nullable|date',
            'sort_order' => 'nullable|integer|min:0',
            'is_featured' => 'sometimes|in:on',
            'is_active' => 'sometimes|in:on',
        ]);

        // Cek unik sort_order
        if ($request->sort_order !== null) {
            $exists = Portfolio::where('sort_order', $request->sort_order)
                ->where('id', '<>', $portfolio->id)
                ->exists();

            if ($exists) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['sort_order' => 'Urutan tampil sudah digunakan, silakan pilih angka lain.']);
            }
        }

        $data = $request->only([
            'title',
            'description',
            'category',
            'client_name',
            'project_url',
            'project_date',
            'sort_order',
        ]);

        // Checkbox handling sama seperti store
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        // Handle technologies sama seperti store
        if ($request->technologies) {
            $data['technologies'] = array_filter(array_map('trim', explode(',', $request->technologies)));
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($portfolio->image_path && Storage::disk('public')->exists($portfolio->image_path)) {
                Storage::disk('public')->delete($portfolio->image_path);
            }
            $data['image_path'] = $request->file('image')->store('images/portfolios', 'public');
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image_path && Storage::disk('public')->exists($portfolio->image_path)) {
            Storage::disk('public')->delete($portfolio->image_path);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil dihapus!');
    }
}
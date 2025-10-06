<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::ordered()->get();
        return view('admin.team-members.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team-members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'skills' => 'nullable|string',
            'social_links' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0|unique:team_members,sort_order',
            'is_active' => 'sometimes|in:on',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['name', 'position', 'bio', 'sort_order']);
        $data['skills'] = $request->skills ? array_map('trim', explode(',', $request->skills)) : [];
        $data['social_links'] = $request->social_links ? array_map('trim', explode(',', $request->social_links)) : [];
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('images/team', 'public_direct');
        }

        TeamMember::create($data);

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Team member berhasil ditambahkan!');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'skills' => 'nullable|string',
            'social_links' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0|unique:team_members,sort_order,' . $teamMember->id,
            'is_active' => 'sometimes|in:on',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['name', 'position', 'bio', 'sort_order']);
        $data['skills'] = $request->skills ? array_map('trim', explode(',', $request->skills)) : [];
        $data['social_links'] = $request->social_links ? array_map('trim', explode(',', $request->social_links)) : [];
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            // Hapus file lama jika ada
            if ($teamMember->photo_path && Storage::disk('public_direct')->exists($teamMember->photo_path)) {
                Storage::disk('public_direct')->delete($teamMember->photo_path);
            }
            
            // Simpan file baru
            $data['photo_path'] = $request->file('photo')->store('images/team', 'public_direct');
        } else {
            // Pertahankan photo_path yang sudah ada jika tidak ada file baru
            $data['photo_path'] = $teamMember->photo_path;
        }

        $teamMember->update($data);

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Team member berhasil diperbarui!');
    }

    public function destroy(TeamMember $teamMember)
    {
        // Hapus file gambar jika ada
        if ($teamMember->photo_path && Storage::disk('public_direct')->exists($teamMember->photo_path)) {
            Storage::disk('public_direct')->delete($teamMember->photo_path);
        }
        
        $teamMember->delete();
        return redirect()->route('admin.team-members.index')
            ->with('success', 'Team member berhasil dihapus!');
    }
}

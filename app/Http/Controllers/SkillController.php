<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('order')->orderBy('category')->get();
        return view('admin.skill.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skill.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'level'    => 'required|integer|min:0|max:100',
            'icon'     => 'nullable|string|max:100',
            'order'    => 'integer|min:0',
        ]);

        $validated['order'] = $validated['order'] ?? 0;

        Skill::create($validated);

        return redirect()->route('admin.skill.index')
            ->with('success', 'Skill berhasil ditambahkan!');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skill.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'level'    => 'required|integer|min:0|max:100',
            'icon'     => 'nullable|string|max:100',
            'order'    => 'integer|min:0',
        ]);

        $validated['order'] = $validated['order'] ?? 0;

        $skill->update($validated);

        return redirect()->route('admin.skill.index')
            ->with('success', 'Skill berhasil diperbarui!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skill.index')
            ->with('success', 'Skill berhasil dihapus!');
    }
}

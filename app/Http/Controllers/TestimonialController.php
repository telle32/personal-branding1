<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'content'   => 'required|string',
            'is_active' => 'boolean',
            'order'     => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        Testimonial::create($validated);

        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'content'   => 'required|string',
            'is_active' => 'boolean',
            'order'     => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $testimonial->update($validated);

        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Testimoni berhasil diperbarui!');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->avatar) {
            Storage::disk('public')->delete($testimonial->avatar);
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Testimoni berhasil dihapus!');
    }
}

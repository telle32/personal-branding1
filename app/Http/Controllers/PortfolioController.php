<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::orderBy('is_featured', 'desc')->orderBy('order')->get();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'url'         => 'nullable|url',
            'github_url'  => 'nullable|url',
            'is_featured' => 'boolean',
            'order'       => 'integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('portfolios', 'public');
            $validated['image'] = $path;
        }

        $validated['is_featured'] = $request->boolean('is_featured');

        Portfolio::create($validated);

        return redirect()->route('admin.portofolio.index')
            ->with('success', 'Portfolio berhasil ditambahkan!');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'url'         => 'nullable|url',
            'github_url'  => 'nullable|url',
            'is_featured' => 'boolean',
            'order'       => 'integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $path = $request->file('image')->store('portfolios', 'public');
            $validated['image'] = $path;
        } elseif ($request->boolean('delete_image') && $portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
            $validated['image'] = null;
        }

        $validated['is_featured'] = $request->boolean('is_featured');

        $portfolio->update($validated);

        return redirect()->route('admin.portofolio.index')
            ->with('success', 'Portfolio berhasil diperbarui!');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }
        $portfolio->delete();

        return redirect()->route('admin.portofolio.index')
            ->with('success', 'Portfolio berhasil dihapus!');
    }
}

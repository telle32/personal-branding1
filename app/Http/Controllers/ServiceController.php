<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'nullable|string|max:100',
            'price'       => 'nullable|string|max:100',
            'is_active'   => 'boolean',
            'order'       => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order']     = $validated['order'] ?? 0;

        Service::create($validated);

        return redirect()->route('admin.service.index')
            ->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'nullable|string|max:100',
            'price'       => 'nullable|string|max:100',
            'is_active'   => 'boolean',
            'order'       => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order']     = $validated['order'] ?? 0;

        $service->update($validated);

        return redirect()->route('admin.service.index')
            ->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.service.index')
            ->with('success', 'Layanan berhasil dihapus!');
    }
}

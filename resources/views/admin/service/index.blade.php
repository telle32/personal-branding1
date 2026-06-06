@extends('layouts.admin')
@section('title', 'Kelola Layanan')

@section('admin-content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="page-title mb-0">Kelola Layanan</h1>
    <a href="{{ route('admin.service.create') }}" class="btn-primary-adm text-decoration-none">
        <i class="bi bi-plus-lg me-1"></i> Tambah Layanan
    </a>
</div>

<div class="card-dark">
    @if($services->isEmpty())
        <div class="text-center py-5" style="color:var(--muted);">
            <i class="bi bi-tools" style="font-size:2.5rem;"></i>
            <p class="mt-2">Belum ada layanan. <a href="{{ route('admin.service.create') }}" style="color:var(--primary);">Tambah sekarang</a></p>
        </div>
    @else
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul Layanan</th>
                    <th>Icon</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $i => $service)
                <tr>
                    <td style="color:var(--muted);">{{ $i + 1 }}</td>
                    <td>
                        <div style="font-weight:600;color:#fff;">{{ $service->title }}</div>
                        <div style="color:var(--muted);font-size:.78rem;max-width:250px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $service->description }}</div>
                    </td>
                    <td>
                        @if($service->icon)
                            <i class="{{ $service->icon }}" style="font-size:1.3rem;color:var(--primary);"></i>
                        @else
                            <span style="color:var(--muted);">—</span>
                        @endif
                    </td>
                    <td style="color:#fff;">{{ $service->price ?? '—' }}</td>
                    <td>
                        @if($service->is_active)
                            <span style="background:rgba(37,211,102,.15);color:#25d366;font-size:.75rem;padding:.2rem .6rem;border-radius:20px;font-weight:600;">Aktif</span>
                        @else
                            <span style="background:rgba(255,107,107,.1);color:#ff6b6b;font-size:.75rem;padding:.2rem .6rem;border-radius:20px;font-weight:600;">Nonaktif</span>
                        @endif
                    </td>
                    <td style="color:var(--muted);">{{ $service->order }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.service.edit', $service) }}" class="btn-edit-adm text-decoration-none">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('admin.service.destroy', $service) }}" onsubmit="return confirm('Hapus layanan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-danger-adm">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection

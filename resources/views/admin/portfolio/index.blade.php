@extends('layouts.admin')
@section('title', 'Kelola Portfolio')

@section('admin-content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="page-title mb-0">Kelola Portfolio</h1>
    <a href="{{ route('admin.portofolio.create') }}" class="btn-primary-adm text-decoration-none">
        <i class="bi bi-plus-lg me-1"></i> Tambah Portfolio
    </a>
</div>

<div class="card-dark">
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Featured</th>
                    <th>Urutan</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portfolios as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div style="font-weight:600;color:#fff;">{{ $p->title }}</div>
                        <div style="font-size:.78rem;color:var(--muted);">{{ Str::limit($p->description, 60) }}</div>
                    </td>
                    <td><span class="badge-cat">{{ $p->category }}</span></td>
                    <td>
                        @if($p->is_featured)
                            <span style="color:#e8a87c;font-size:.8rem;"><i class="bi bi-star-fill"></i> Featured</span>
                        @else
                            <span style="color:var(--muted);font-size:.8rem;"><i class="bi bi-star"></i> Biasa</span>
                        @endif
                    </td>
                    <td>{{ $p->order }}</td>
                    <td style="font-size:.8rem;color:var(--muted);">{{ $p->created_at->format('d M Y') }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.portofolio.edit', $p) }}" class="btn-edit-adm text-decoration-none">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </a>
                            <form action="{{ route('admin.portofolio.destroy', $p) }}" method="POST"
                                  onsubmit="return confirm('Hapus portfolio ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-danger-adm border-0">
                                    <i class="bi bi-trash me-1"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5" style="color:var(--muted);">
                        <i class="bi bi-folder-x" style="font-size:2rem;display:block;margin-bottom:.5rem;"></i>
                        Belum ada portfolio. <a href="{{ route('admin.portofolio.create') }}" style="color:var(--primary);">Tambah sekarang</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

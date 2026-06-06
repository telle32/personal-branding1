@extends('layouts.admin')
@section('title', 'Kelola Testimoni')

@section('admin-content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="page-title mb-0">Kelola Testimoni</h1>
    <a href="{{ route('admin.testimonial.create') }}" class="btn-primary-adm text-decoration-none">
        <i class="bi bi-plus-lg me-1"></i> Tambah Testimoni
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mb-4" role="alert"
     style="background:rgba(100,220,130,.12);border:1px solid rgba(100,220,130,.3);color:#64dc82;border-radius:12px;">
    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card-dark">
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Isi Testimoni</th>
                    <th>Status</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div style="font-weight:600;color:#fff;">{{ $t->name }}</div>
                    </td>
                    <td style="max-width:320px;">
                        <div style="font-size:.85rem;color:var(--muted);">{{ Str::limit($t->content, 100) }}</div>
                    </td>
                    <td>
                        @if($t->is_active)
                            <span style="background:rgba(100,220,130,.15);color:#64dc82;padding:.2rem .6rem;border-radius:20px;font-size:.75rem;font-weight:600;">
                                <i class="bi bi-eye-fill me-1"></i>Aktif
                            </span>
                        @else
                            <span style="background:rgba(200,200,200,.1);color:var(--muted);padding:.2rem .6rem;border-radius:20px;font-size:.75rem;font-weight:600;">
                                <i class="bi bi-eye-slash-fill me-1"></i>Nonaktif
                            </span>
                        @endif
                    </td>
                    <td>{{ $t->order }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.testimonial.edit', $t) }}" class="btn-edit-adm text-decoration-none">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </a>
                            <form action="{{ route('admin.testimonial.destroy', $t) }}" method="POST"
                                  onsubmit="return confirm('Hapus testimoni ini?')">
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
                    <td colspan="6" class="text-center py-5" style="color:var(--muted);">
                        <i class="bi bi-chat-square-quote" style="font-size:2rem;display:block;margin-bottom:.5rem;"></i>
                        Belum ada testimoni. <a href="{{ route('admin.testimonial.create') }}" style="color:var(--primary);">Tambah sekarang</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

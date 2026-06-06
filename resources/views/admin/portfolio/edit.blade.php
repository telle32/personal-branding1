@extends('layouts.admin')
@section('title', 'Edit Portfolio')

@section('admin-content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.portofolio.index') }}" style="color:var(--muted);text-decoration:none;font-size:1.2rem;"><i class="bi bi-arrow-left"></i></a>
    <h1 class="page-title mb-0">Edit Portfolio</h1>
</div>

<div class="card-dark" style="max-width:700px;">
    <form action="{{ route('admin.portofolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Judul Proyek *</label>
            <input type="text" name="title" class="form-control @error('title') border-danger @enderror"
                   value="{{ old('title', $portfolio->title) }}" required>
            @error('title')<div class="text-danger mt-1" style="font-size:.8rem;">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori *</label>
            <input type="text" name="category" class="form-control"
                   value="{{ old('category', $portfolio->category) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi *</label>
            <textarea name="description" rows="4" class="form-control" required>{{ old('description', $portfolio->description) }}</textarea>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">URL Live Demo</label>
                <input type="url" name="url" class="form-control" value="{{ old('url', $portfolio->url) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">URL GitHub</label>
                <input type="url" name="github_url" class="form-control" value="{{ old('github_url', $portfolio->github_url) }}">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar Project</label>
            @if($portfolio->image)
            <div class="mb-2">
                <img src="{{ asset('storage/'.$portfolio->image) }}" alt="Current" style="height:80px;border-radius:8px;object-fit:cover;">
                <div style="font-size:.75rem;color:var(--muted);margin-top:.3rem;">Gambar saat ini. Upload baru untuk mengganti.</div>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="delete_image" id="delete_image" value="1">
                <label class="form-check-label" for="delete_image" style="color:#ff6b6b;font-size:.85rem;">
                    <i class="bi bi-trash me-1"></i>Hapus gambar ini
                </label>
            </div>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label">Urutan Tampil</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', $portfolio->order) }}" min="0">
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1"
                           {{ old('is_featured', $portfolio->is_featured) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured" style="color:#ccc;">Tandai sebagai Featured</label>
                </div>
            </div>
        </div>
        <div class="d-flex gap-3">
            <button type="submit" class="btn-primary-adm">
                <i class="bi bi-floppy me-1"></i> Update Portfolio
            </button>
            <a href="{{ route('admin.portofolio.index') }}" style="color:var(--muted);text-decoration:none;align-self:center;font-size:.9rem;">Batal</a>
        </div>
    </form>
</div>
@endsection

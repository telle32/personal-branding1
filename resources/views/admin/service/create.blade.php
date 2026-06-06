@extends('layouts.admin')
@section('title', 'Tambah Layanan')

@section('admin-content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.service.index') }}" style="color:var(--muted);text-decoration:none;font-size:.9rem;">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <h1 class="page-title mb-0">Tambah Layanan</h1>
</div>

<div class="card-dark" style="max-width:640px;">
    <form method="POST" action="{{ route('admin.service.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label-adm">Judul Layanan <span style="color:#ff6b6b;">*</span></label>
            <input type="text" name="title" class="form-control-adm" placeholder="Contoh: Web Development, UI/UX Design..." value="{{ old('title') }}" required>
            @error('title')<small style="color:#ff6b6b;">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label-adm">Deskripsi <span style="color:#ff6b6b;">*</span></label>
            <textarea name="description" class="form-control-adm" rows="4" placeholder="Jelaskan layanan yang kamu tawarkan..." required>{{ old('description') }}</textarea>
            @error('description')<small style="color:#ff6b6b;">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label-adm">Icon Class (Bootstrap Icons) <small style="color:var(--muted);">opsional</small></label>
            <input type="text" name="icon" class="form-control-adm" placeholder="Contoh: bi bi-code-slash" value="{{ old('icon') }}">
            <small style="color:var(--muted);">Cek icon di <a href="https://icons.getbootstrap.com" target="_blank" style="color:var(--primary);">icons.getbootstrap.com</a></small>
            @error('icon')<small style="color:#ff6b6b;">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label-adm">Harga / Rentang Harga <small style="color:var(--muted);">opsional</small></label>
            <input type="text" name="price" class="form-control-adm" placeholder="Contoh: Mulai Rp 500.000, Negotiable..." value="{{ old('price') }}">
            @error('price')<small style="color:#ff6b6b;">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label-adm">Urutan Tampil <small style="color:var(--muted);">opsional</small></label>
            <input type="number" name="order" class="form-control-adm" min="0" value="{{ old('order', 0) }}">
            @error('order')<small style="color:#ff6b6b;">{{ $message }}</small>@enderror
        </div>

        <div class="mb-4">
            <div class="form-check" style="display:flex;align-items:center;gap:.6rem;">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                <label for="is_active" class="form-label-adm mb-0" style="cursor:pointer;">Aktifkan Layanan (tampil di website)</label>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn-primary-adm">
                <i class="bi bi-check-lg me-1"></i> Simpan Layanan
            </button>
            <a href="{{ route('admin.service.index') }}" class="btn-edit-adm text-decoration-none">Batal</a>
        </div>
    </form>
</div>
@endsection

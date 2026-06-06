@extends('layouts.admin')
@section('title', 'Edit Testimoni')

@section('admin-content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.testimonial.index') }}" style="color:var(--muted);text-decoration:none;font-size:1.2rem;"><i class="bi bi-arrow-left"></i></a>
    <h1 class="page-title mb-0">Edit Testimoni</h1>
</div>

<div class="card-dark" style="max-width:700px;">
    <form action="{{ route('admin.testimonial.update', $testimonial) }}" method="POST">
        @csrf @method('PUT')

        {{-- Nama --}}
        <div class="mb-4">
            <label class="form-label-adm">Nama Klien <span style="color:var(--primary)">*</span></label>
            <input type="text" name="name" class="form-control-adm @error('name') is-invalid @enderror"
                   value="{{ old('name', $testimonial->name) }}" placeholder="Contoh: Budi Santoso">
            @error('name')<div class="invalid-feedback d-block" style="color:#ff6b6b;font-size:.8rem;">{{ $message }}</div>@enderror
        </div>

        {{-- Isi Testimoni --}}
        <div class="mb-4">
            <label class="form-label-adm">Isi Testimoni <span style="color:var(--primary)">*</span></label>
            <textarea name="content" rows="4" class="form-control-adm @error('content') is-invalid @enderror"
                      placeholder="Tuliskan testimoni dari klien...">{{ old('content', $testimonial->content) }}</textarea>
            @error('content')<div class="invalid-feedback d-block" style="color:#ff6b6b;font-size:.8rem;">{{ $message }}</div>@enderror
        </div>

        {{-- Urutan & Status --}}
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label-adm">Urutan Tampil</label>
                <input type="number" name="order" class="form-control-adm"
                       value="{{ old('order', $testimonial->order) }}" min="0">
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <label class="d-flex align-items-center gap-2" style="cursor:pointer;padding:.6rem 1rem;background:var(--bg-input);border:1px solid var(--border-input);border-radius:10px;width:100%;">
                    <input type="checkbox" name="is_active" value="1"
                           {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}
                           style="width:18px;height:18px;accent-color:var(--primary);">
                    <span>Tampilkan di halaman publik</span>
                </label>
            </div>
        </div>

        <div class="d-flex gap-3">
            <button type="submit" class="btn-primary-adm border-0">
                <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
            </button>
            <a href="{{ route('admin.testimonial.index') }}" class="btn-edit-adm text-decoration-none">Batal</a>
        </div>
    </form>
</div>

@endsection

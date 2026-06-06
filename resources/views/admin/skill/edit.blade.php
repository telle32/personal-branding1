@extends('layouts.admin')
@section('title', 'Edit Skill')

@section('admin-content')
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="{{ route('admin.skill.index') }}" style="color:var(--muted);text-decoration:none;font-size:.9rem;">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <h1 class="page-title mb-0">Edit Skill</h1>
</div>

<div class="card-dark" style="max-width:640px;">
    <form method="POST" action="{{ route('admin.skill.update', $skill) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label-adm">Nama Skill <span style="color:#ff6b6b;">*</span></label>
            <input type="text" name="name" class="form-control-adm" value="{{ old('name', $skill->name) }}" required>
            @error('name')<small style="color:#ff6b6b;">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label-adm">Kategori <span style="color:#ff6b6b;">*</span></label>
            <select name="category" class="form-control-adm form-select" required>
                @foreach(['Frontend', 'Backend', 'Mobile', 'Database', 'DevOps', 'Design', 'Other'] as $cat)
                    <option value="{{ $cat }}" {{ old('category', $skill->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
            @error('category')<small style="color:#ff6b6b;">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label-adm">Icon Class (Bootstrap Icons) <small style="color:var(--muted);">opsional</small></label>
            <input type="text" name="icon" class="form-control-adm" value="{{ old('icon', $skill->icon) }}" placeholder="Contoh: bi bi-filetype-php">
            <small style="color:var(--muted);">Cek icon di <a href="https://icons.getbootstrap.com" target="_blank" style="color:var(--primary);">icons.getbootstrap.com</a></small>
            @error('icon')<small style="color:#ff6b6b;">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label-adm">Level Keahlian: <span id="levelVal" style="color:var(--primary);font-weight:700;">{{ old('level', $skill->level) }}%</span></label>
            <input type="range" name="level" id="levelRange" min="0" max="100" value="{{ old('level', $skill->level) }}"
                   oninput="document.getElementById('levelVal').textContent = this.value + '%'"
                   style="width:100%;accent-color:var(--primary);">
            <div style="display:flex;justify-content:space-between;color:var(--muted);font-size:.75rem;margin-top:4px;">
                <span>Pemula (0%)</span><span>Menengah (50%)</span><span>Ahli (100%)</span>
            </div>
            @error('level')<small style="color:#ff6b6b;">{{ $message }}</small>@enderror
        </div>

        <div class="mb-4">
            <label class="form-label-adm">Urutan Tampil <small style="color:var(--muted);">opsional</small></label>
            <input type="number" name="order" class="form-control-adm" min="0" value="{{ old('order', $skill->order) }}">
            @error('order')<small style="color:#ff6b6b;">{{ $message }}</small>@enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn-primary-adm">
                <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
            </button>
            <a href="{{ route('admin.skill.index') }}" class="btn-edit-adm text-decoration-none">Batal</a>
        </div>
    </form>
</div>
@endsection

@extends('layouts.admin')
@section('title', 'Kelola Skill')

@section('admin-content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="page-title mb-0">Kelola Skill</h1>
    <a href="{{ route('admin.skill.create') }}" class="btn-primary-adm text-decoration-none">
        <i class="bi bi-plus-lg me-1"></i> Tambah Skill
    </a>
</div>

<div class="card-dark">
    @if($skills->isEmpty())
        <div class="text-center py-5" style="color:var(--muted);">
            <i class="bi bi-emoji-frown" style="font-size:2.5rem;"></i>
            <p class="mt-2">Belum ada skill. <a href="{{ route('admin.skill.create') }}" style="color:var(--primary);">Tambah sekarang</a></p>
        </div>
    @else
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Skill</th>
                    <th>Kategori</th>
                    <th>Icon</th>
                    <th>Level</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($skills as $i => $skill)
                <tr>
                    <td style="color:var(--muted);">{{ $i + 1 }}</td>
                    <td style="font-weight:600;color:#fff;">{{ $skill->name }}</td>
                    <td><span class="badge-cat">{{ $skill->category }}</span></td>
                    <td>
                        @if($skill->icon)
                            <i class="{{ $skill->icon }}" style="font-size:1.2rem;color:var(--primary);"></i>
                            <small style="color:var(--muted);margin-left:4px;">{{ $skill->icon }}</small>
                        @else
                            <span style="color:var(--muted);">—</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex;align-items:center;gap:8px;">
                            <div style="flex:1;background:rgba(255,255,255,.08);border-radius:10px;height:6px;max-width:100px;">
                                <div style="width:{{ $skill->level }}%;background:linear-gradient(90deg,#e8a87c,#c9855a);height:100%;border-radius:10px;"></div>
                            </div>
                            <span style="font-size:.8rem;color:var(--muted);">{{ $skill->level }}%</span>
                        </div>
                    </td>
                    <td style="color:var(--muted);">{{ $skill->order }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.skill.edit', $skill) }}" class="btn-edit-adm text-decoration-none">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('admin.skill.destroy', $skill) }}" onsubmit="return confirm('Hapus skill ini?')">
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

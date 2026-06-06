<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') | Feno.dev</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary:#e8a87c; --bg-dark:#0d0d0d; --bg-card:#161616; --bg-card2:#1e1e1e; --border:rgba(255,255,255,0.07); --muted:#888; }
        * { margin:0;padding:0;box-sizing:border-box; }
        body { font-family:'Outfit',sans-serif; background:var(--bg-dark); color:#fff; }
        .admin-nav { background:var(--bg-card); border-bottom:1px solid var(--border); padding:.8rem 1.5rem; display:flex; align-items:center; justify-content:space-between; position:fixed;top:0;width:100%;z-index:100; }
        .admin-nav .brand { font-weight:800; font-size:1.2rem; }
        .admin-nav .brand span { color:var(--primary); }
        .admin-sidebar { background:var(--bg-card); border-right:1px solid var(--border); min-height:100vh; padding:80px 1rem 1rem; width:240px; position:fixed;top:0;left:0; }
        .sidebar-link { display:flex;align-items:center;gap:.6rem; color:var(--muted); padding:.6rem .8rem; border-radius:10px; text-decoration:none; font-weight:500; font-size:.9rem; transition:all .2s; margin-bottom:2px; }
        .sidebar-link:hover,.sidebar-link.active { background:rgba(232,168,124,.12); color:var(--primary); }
        .admin-main { margin-left:240px; padding:90px 2rem 2rem; }
        .page-title { font-size:1.5rem;font-weight:800;margin-bottom:1.5rem; }
        .card-dark { background:var(--bg-card);border:1px solid var(--border);border-radius:16px;padding:1.5rem; }
        .btn-primary-adm { background:linear-gradient(135deg,#e8a87c,#c9855a);color:#fff;border:none;border-radius:10px;padding:.5rem 1.2rem;font-weight:600;font-size:.9rem;transition:all .2s; }
        .btn-primary-adm:hover { transform:translateY(-2px);box-shadow:0 8px 20px rgba(232,168,124,.3);color:#fff; }
        .btn-danger-adm { background:rgba(220,53,69,.15);color:#ff6b6b;border:1px solid rgba(220,53,69,.3);border-radius:8px;padding:.3rem .8rem;font-size:.8rem;font-weight:600;transition:all .2s; }
        .btn-danger-adm:hover { background:rgba(220,53,69,.3); }
        .btn-edit-adm { background:rgba(232,168,124,.1);color:var(--primary);border:1px solid rgba(232,168,124,.3);border-radius:8px;padding:.3rem .8rem;font-size:.8rem;font-weight:600;transition:all .2s; }
        .btn-edit-adm:hover { background:rgba(232,168,124,.2); }
        .table {
            --bs-table-bg: var(--bg-card);
            --bs-table-color: #ccc;
            --bs-table-border-color: var(--border);
            --bs-table-striped-bg: var(--bg-card2);
            --bs-table-hover-bg: rgba(255,255,255,.03);
            --bs-table-hover-color: #fff;
            color: #ccc;
        }
        table { background:var(--bg-card); color:#ccc; }
        table thead tr { background:var(--bg-card2) !important; }
        table thead th { background:var(--bg-card2) !important;color:var(--muted);font-size:.78rem;text-transform:uppercase;letter-spacing:1px;border-color:var(--border) !important;padding:.8rem 1rem; }
        table tbody td { background:var(--bg-card) !important;border-color:var(--border) !important;color:#ccc;vertical-align:middle;padding:.8rem 1rem; }
        table tbody tr:hover td { background:rgba(255,255,255,.04) !important; }
        .badge-cat { background:rgba(232,168,124,.15);color:var(--primary);font-size:.75rem;padding:.25rem .6rem;border-radius:20px; }
        .form-control,.form-select { background:var(--bg-card2);border:1px solid var(--border);color:#fff;border-radius:10px;padding:.7rem 1rem; }
        .form-check-input { background:var(--bg-card2);border:1px solid var(--border);border-radius:4px;width:1.1em;height:1.1em;padding:0;cursor:pointer;transition:all .2s; }
        .form-check-input:checked { background-color:var(--primary);border-color:var(--primary); }
        .form-check-input:focus { box-shadow:0 0 0 3px rgba(232,168,124,.2);border-color:var(--primary); }
        .form-check-input:checked[type=checkbox] { background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m6 10 3 3 6-6'/%3e%3c/svg%3e"); }
        .form-control:focus,.form-select:focus { background:var(--bg-card2);border-color:var(--primary);color:#fff;box-shadow:0 0 0 3px rgba(232,168,124,.15); }
        .form-control::placeholder { color:#777;opacity:1; }
        .form-label { color:#ddd;font-weight:600;font-size:.85rem;margin-bottom:.4rem; }
        small, .text-muted { color:#999 !important; }
        .alert-success-adm { background:rgba(37,211,102,.1);border:1px solid rgba(37,211,102,.3);color:#25d366;border-radius:12px;padding:.8rem 1.2rem;margin-bottom:1.5rem; }
        .form-label-adm { color:#ddd;font-weight:600;font-size:.85rem;margin-bottom:.4rem;display:block; }
        .form-control-adm { display:block;width:100%;background:var(--bg-card2);border:1px solid var(--border);color:#fff;border-radius:10px;padding:.7rem 1rem;font-family:'Outfit',sans-serif;font-size:.9rem;transition:border-color .2s; }
        .form-control-adm:focus { outline:none;border-color:var(--primary);box-shadow:0 0 0 3px rgba(232,168,124,.15); }
        .form-control-adm::placeholder { color:#666;opacity:1; }
        textarea.form-control-adm { resize:vertical; }
        :root { --bg-input:var(--bg-card2); --border-input:var(--border); }
        @media(max-width:768px){ .admin-sidebar{display:none;} .admin-main{margin-left:0;} }
    </style>
</head>
<body>

<div class="admin-nav">
    <a href="{{ route('home') }}" class="brand text-decoration-none">Feno<span>.</span>dev <small style="color:var(--muted);font-size:.7rem;font-weight:400;">Admin</small></a>
    <a href="{{ route('home') }}" class="text-decoration-none" style="color:var(--muted);font-size:.85rem;">
        <i class="bi bi-box-arrow-left me-1"></i> Kembali ke Website
    </a>
</div>

<div class="admin-sidebar">
    <a href="{{ route('admin.portofolio.index') }}" class="sidebar-link {{ request()->routeIs('admin.portofolio*') ? 'active' : '' }}">
        <i class="bi bi-grid-3x3-gap-fill"></i> Portfolio
    </a>
    <a href="{{ route('admin.testimonial.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonial*') ? 'active' : '' }}">
        <i class="bi bi-chat-quote-fill"></i> Testimoni
    </a>
    <a href="{{ route('admin.skill.index') }}" class="sidebar-link {{ request()->routeIs('admin.skill*') ? 'active' : '' }}">
        <i class="bi bi-lightning-fill"></i> Skill
    </a>
    <a href="{{ route('admin.service.index') }}" class="sidebar-link {{ request()->routeIs('admin.service*') ? 'active' : '' }}">
        <i class="bi bi-tools"></i> Layanan
    </a>
    <hr style="border-color:var(--border);margin:.5rem 0;">
    <a href="{{ route('home') }}" class="sidebar-link">
        <i class="bi bi-house-fill"></i> Beranda Website
    </a>
</div>

<div class="admin-main">
    @if(session('success'))
    <div class="alert-success-adm">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    </div>
    @endif

    @yield('admin-content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>

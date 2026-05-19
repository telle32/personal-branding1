<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Feno Zikrillah - Full Stack Web Developer & UI/UX Designer. Spesialis Laravel, Bootstrap, dan MySQL.">
    <meta name="keywords" content="web developer, laravel, bootstrap, personal branding, indonesia">
    <title>@yield('title', 'Feno Zikrillah | Full Stack Developer')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #e8a87c;
            --primary-dark: #c9855a;
            --bg-dark: #0d0d0d;
            --bg-card: #161616;
            --bg-card2: #1e1e1e;
            --border: rgba(255,255,255,0.07);
            --text-muted-custom: #a8a8a8;
            --text-light: #ccc;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-dark);
            color: #fff;
            overflow-x: hidden;
        }
        
        .text-muted { color: var(--text-muted-custom) !important; }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: var(--bg-dark); }
        ::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 2px; }

        /* ── NAVBAR ── */
        .navbar {
            background: rgba(13,13,13,0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 1rem 0;
            position: fixed; top:0; width:100%; z-index:1000;
            transition: all .3s;
        }
        .navbar.scrolled { padding: .6rem 0; box-shadow: 0 4px 30px rgba(0,0,0,.5); }
        .navbar-brand { font-weight: 800; font-size: 1.4rem; color: var(--text-light);}
        .navbar-brand span { color: var(--primary); }
        .navbar-brand:hover { color: var(--primary) }
        .nav-link {
            color: var(--text-light) !important;
            font-weight: 500;
            font-size: .9rem;
            letter-spacing: .5px;
            padding: .4rem 1rem !important;
            position: relative;
            transition: color .3s;
        }
        .nav-link::after {
            content: '';
            position: absolute; bottom: -2px; left: 50%; right: 50%;
            height: 2px; background: var(--primary);
            transition: all .3s;
        }
        .nav-link:hover { color: var(--primary) !important; }
        .nav-link:hover::after { left: 1rem; right: 1rem; }
        .btn-wa {
            background: linear-gradient(135deg, #25d366, #128c7e);
            color: #fff !important;
            border-radius: 50px;
            padding: .4rem 1.2rem !important;
            font-size: .85rem;
            font-weight: 600;
            border: none;
            transition: transform .2s, box-shadow .2s;
        }
        .btn-wa:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37,211,102,.3); }

        /* ── HERO ── */
        #hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d0d0d 0%, #1a1208 50%, #0d0d0d 100%);
            position: relative;
            display: flex; align-items: center;
            padding-top: 80px;
            overflow: hidden;
        }
        #hero::before {
            content: '';
            position: absolute; inset: 0;
            background: radial-gradient(ellipse 60% 70% at 70% 50%, rgba(232,168,124,.12) 0%, transparent 70%);
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: .5rem;
            background: rgba(232,168,124,.1);
            border: 1px solid rgba(232,168,124,.3);
            color: var(--primary);
            padding: .4rem 1rem;
            border-radius: 50px;
            font-size: .85rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        .hero-badge span { width: 8px; height: 8px; background: var(--primary); border-radius: 50%; animation: pulse-dot 1.5s infinite; }
        @keyframes pulse-dot { 0%,100%{opacity:1} 50%{opacity:.3} }
        .hero-title { font-size: clamp(2.5rem, 6vw, 4.5rem); font-weight: 900; line-height: 1.1; }
        .hero-title .accent { color: var(--primary); }
        .hero-subtitle { color: var(--text-light); font-size: 1.1rem; max-width: 500px; margin: 1.5rem 0 2rem; line-height: 1.7; }
        .hero-img-wrap {
            position: relative;
            width: 420px; max-width: 100%;
        }
        .hero-img-wrap img {
            width: 100%; border-radius: 20px;
            box-shadow: 0 30px 80px rgba(0,0,0,.6);
        }
        .hero-img-wrap::before {
            content: '';
            position: absolute; inset: -2px;
            border-radius: 22px;
            background: linear-gradient(135deg, var(--primary), transparent);
            z-index: -1;
        }
        .hero-stat {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1rem 1.5rem;
            text-align: center;
        }
        .hero-stat .num { font-size: 2rem; font-weight: 800; color: var(--primary); }
        .hero-stat .label { color: var(--text-muted-custom); font-size: .8rem; }

        /* ── BUTTONS ── */
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff; border: none; border-radius: 50px;
            padding: .8rem 2rem; font-weight: 700; font-size: .95rem;
            transition: transform .2s, box-shadow .2s;
            text-decoration: none; display: inline-flex; align-items: center; gap: .5rem;
        }
        .btn-primary-custom:hover { transform: translateY(-3px); box-shadow: 0 12px 30px rgba(232,168,124,.4); color: #fff; }
        .btn-outline-custom {
            background: transparent;
            color: #fff; border: 1px solid var(--border); border-radius: 50px;
            padding: .8rem 2rem; font-weight: 600; font-size: .95rem;
            transition: all .3s;
            text-decoration: none; display: inline-flex; align-items: center; gap: .5rem;
        }
        .btn-outline-custom:hover { border-color: var(--primary); color: var(--primary); background: rgba(232,168,124,.07); }

        /* ── SECTION ── */
        section { padding: 100px 0; }
        .section-tag {
            display: inline-flex; align-items: center; gap: .5rem;
            color: var(--primary); font-weight: 600; font-size: .85rem;
            letter-spacing: 2px; text-transform: uppercase;
            margin-bottom: .8rem;
        }
        .section-tag::before { content: ''; width: 30px; height: 2px; background: var(--primary); }
        .section-title { font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; }

        /* ── SERVICES ── */
        #services { background: #111; }
        .service-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2rem;
            height: 100%;
            transition: all .3s;
            position: relative; overflow: hidden;
        }
        .service-card::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0; height: 2px;
            background: linear-gradient(90deg, var(--primary), transparent);
            transform: scaleX(0); transition: transform .3s;
        }
        .service-card:hover { transform: translateY(-8px); border-color: rgba(232,168,124,.3); box-shadow: 0 20px 60px rgba(0,0,0,.4); }
        .service-card:hover::before { transform: scaleX(1); }
        .service-icon {
            width: 60px; height: 60px;
            background: rgba(232,168,124,.1);
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.6rem; color: var(--primary);
            margin-bottom: 1.5rem;
        }
        .service-card h5 { font-weight: 700; margin-bottom: .7rem; }
        .service-card p { color: #bbb; font-size: .9rem; line-height: 1.7; margin-bottom: 1rem; }
        .service-price { color: var(--primary); font-weight: 600; font-size: .85rem; }

        /* ── SKILLS ── */
        .skill-item { margin-bottom: 1.5rem; }
        .skill-header { display: flex; justify-content: space-between; margin-bottom: .5rem; }
        .skill-header span { font-weight: 500; font-size: .9rem; }
        .skill-header .pct { color: var(--primary); }
        .skill-bar { height: 6px; background: rgba(255,255,255,.08); border-radius: 3px; overflow: hidden; }
        .skill-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-dark), var(--primary));
            border-radius: 3px;
            width: 0; transition: width 1.5s ease;
        }

        /* ── PORTFOLIO ── */
        #portfolio { background: #111; }
        .portfolio-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
            transition: all .3s;
            height: 100%;
        }
        .portfolio-card:hover { transform: translateY(-8px); box-shadow: 0 25px 60px rgba(0,0,0,.5); border-color: rgba(232,168,124,.3); }
        .portfolio-img {
            height: 200px;
            background: linear-gradient(135deg, #1e1e1e, #2a2a2a);
            display: flex; align-items: center; justify-content: center;
            position: relative; overflow: hidden;
        }
        .portfolio-img img { width:100%; height:100%; object-fit:cover; }
        .portfolio-img .overlay {
            position: absolute; inset: 0;
            background: rgba(232,168,124,.85);
            display: flex; align-items: center; justify-content: center;
            gap: 1rem;
            opacity: 0; transition: opacity .3s;
        }
        .portfolio-card:hover .overlay { opacity: 1; }
        .overlay a {
            width: 44px; height: 44px;
            background: #fff;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: #0d0d0d; font-size: 1.1rem;
            transition: transform .2s;
        }
        .overlay a:hover { transform: scale(1.15); }
        .portfolio-placeholder-icon { font-size: 3rem; color: rgba(232,168,124,.3); }
        .portfolio-body { padding: 1.5rem; }
        .portfolio-cat {
            font-size: .75rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase;
            color: var(--primary); margin-bottom: .5rem;
        }
        .portfolio-body h5 { font-weight: 700; margin-bottom: .5rem; }
        .portfolio-body p { color: var(--text-muted-custom); font-size: .85rem; line-height: 1.6; }

        /* ── ABOUT / PROFILE ── */
        .about-img-wrap {
            position: relative;
        }
        .about-img-wrap img {
            border-radius: 20px;
            width: 100%;
            box-shadow: 0 30px 80px rgba(0,0,0,.5);
        }
        .exp-badge {
            position: absolute; bottom: -20px; right: -20px;
            background: var(--primary);
            color: #0d0d0d;
            border-radius: 16px;
            padding: 1rem 1.5rem;
            text-align: center;
            font-weight: 800;
        }
        .exp-badge .num { font-size: 2rem; line-height: 1; }

        /* ── CONTACT / WHATSAPP ── */
        #contact { background: #111; }
        .contact-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 3rem;
        }
        .social-links a {
            width: 44px; height: 44px;
            background: var(--bg-card2);
            border: 1px solid var(--border);
            border-radius: 12px;
            display: inline-flex; align-items: center; justify-content: center;
            color: var(--text-light); font-size: 1.1rem;
            transition: all .3s; text-decoration: none;
        }
        .social-links a:hover { background: var(--primary); border-color: var(--primary); color: #0d0d0d; transform: translateY(-3px); }
        .btn-whatsapp {
            background: linear-gradient(135deg, #25d366, #128c7e);
            color: #fff; border: none; border-radius: 50px;
            padding: 1rem 2.5rem;
            font-size: 1.05rem; font-weight: 700;
            display: inline-flex; align-items: center; gap: .6rem;
            transition: all .3s; text-decoration: none;
        }
        .btn-whatsapp:hover { transform: translateY(-3px); box-shadow: 0 12px 30px rgba(37,211,102,.4); color: #fff; }
        .btn-whatsapp-float {
            position: fixed; bottom: 30px; right: 30px; z-index: 999;
            width: 60px; height: 60px;
            background: linear-gradient(135deg, #25d366, #128c7e);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 1.6rem;
            text-decoration: none;
            box-shadow: 0 8px 25px rgba(37,211,102,.5);
            transition: transform .3s;
            animation: float-btn 3s ease-in-out infinite;
        }
        .btn-whatsapp-float:hover { transform: scale(1.15); color: #fff; }
        @keyframes float-btn {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        /* ── FOOTER ── */
        footer {
            background: #080808;
            border-top: 1px solid var(--border);
            padding: 2rem 0;
            text-align: center;
            color: var(--text-muted-custom);
            font-size: .85rem;
        }

        /* ── ADMIN PANEL ── */
        .admin-sidebar {
            background: var(--bg-card);
            border-right: 1px solid var(--border);
            min-height: 100vh;
            padding-top: 80px;
        }
        .admin-sidebar .nav-link { color: var(--text-light) !important; border-radius: 10px; margin: 2px 0; }
        .admin-sidebar .nav-link:hover, .admin-sidebar .nav-link.active { background: rgba(232,168,124,.12); color: var(--primary) !important; }
        .admin-content { padding: 100px 2rem 2rem; }
        .table-dark-custom { background: var(--bg-card); border-radius: 16px; overflow: hidden; border: 1px solid var(--border); }
        .table-dark-custom table { margin-bottom: 0; }
        .table-dark-custom thead th { background: var(--bg-card2); color: var(--text-muted-custom); font-size: .8rem; text-transform: uppercase; letter-spacing: 1px; border-color: var(--border); }
        .table-dark-custom tbody td { border-color: var(--border); color: var(--text-light); vertical-align: middle; }
        .form-control-dark, .form-select-dark {
            background: var(--bg-card2); border: 1px solid var(--border);
            color: #fff; border-radius: 10px; padding: .7rem 1rem;
        }
        .form-control-dark:focus, .form-select-dark:focus { background: var(--bg-card2); border-color: var(--primary); color: #fff; box-shadow: 0 0 0 3px rgba(232,168,124,.15); }
        .card-dark { background: var(--bg-card); border: 1px solid var(--border); border-radius: 20px; }
        .badge-cat { background: rgba(232,168,124,.15); color: var(--primary); font-size: .75rem; padding: .3rem .7rem; border-radius: 20px; }

        /* ── FILTER TABS ── */
        .filter-tabs { display: flex; gap: .5rem; flex-wrap: wrap; margin-bottom: 2rem; }
        .filter-btn {
            background: var(--bg-card); border: 1px solid var(--border);
            color: var(--text-light); border-radius: 50px;
            padding: .4rem 1.2rem; font-size: .85rem; font-weight: 600; cursor: pointer;
            transition: all .3s;
        }
        .filter-btn.active, .filter-btn:hover { background: var(--primary); border-color: var(--primary); color: #0d0d0d; }

        /* ── MISC ── */
        .divider { height: 1px; background: var(--border); margin: 0; }
        @media(max-width:768px) {
            .hero-img-wrap { width: 100%; max-width: 320px; margin: 2rem auto 0; }
            section { padding: 70px 0; }
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            Feno<span>.</span>dev
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <i class="bi bi-list text-white fs-4"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item"><a class="nav-link" href="#hero">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="#skills">Keahlian</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
            </ul>
            <a href="https://wa.me/6281261820624?text=Halo%20Feno%2C%20saya%20ingin%20konsultasi"
               target="_blank" class="btn-wa nav-link">
                <i class="bi bi-whatsapp me-1"></i> Chat WhatsApp
            </a>
        </div>
    </div>
</nav>

@yield('content')

<!-- Floating WA Button -->
<a href="https://wa.me/6281261820624?text=Halo%20Feno%2C%20saya%20tertarik%20dengan%20layanan%20Anda"
   target="_blank" class="btn-whatsapp-float" title="Chat WhatsApp">
    <i class="bi bi-whatsapp"></i>
</a>

<!-- Footer -->
<footer>
    <div class="container">
        <p class="mb-1">
            <span class="text-white fw-bold">Feno<span>.</span>dev</span>
        </p>
        <p>© {{ date('Y') }} Feno Zikrillah. All rights reserved. Made with AI & Laravel</p>
        <div class="social-links mt-3 d-flex justify-content-center gap-2">
            <a href="https://github.com" target="_blank"><i class="bi bi-github"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="bi bi-twitter-x"></i></a>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true, offset: 80 });

    // Navbar scroll effect
    window.addEventListener('scroll', () => {
        document.getElementById('mainNav').classList.toggle('scrolled', window.scrollY > 50);
    });

    // Skill bar animation on scroll
    const skillFills = document.querySelectorAll('.skill-fill');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.style.width = e.target.dataset.width + '%';
            }
        });
    }, { threshold: 0.3 });
    skillFills.forEach(el => observer.observe(el));

    // Portfolio filter
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const cat = this.dataset.filter;
            document.querySelectorAll('.portfolio-item').forEach(item => {
                if (cat === 'all' || item.dataset.cat === cat) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
@stack('scripts')
</body>
</html>

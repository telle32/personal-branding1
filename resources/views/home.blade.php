@extends('layouts.app')

@section('title', 'Feno Zikrillah | Full Stack Developer & UI/UX Designer')

@section('content')

<!-- ═══ HERO ═══ -->
<section id="hero">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="hero-badge">
                    <span></span> Available for Work
                </div>
                <h1 class="hero-title">
                    Full Stack<br>
                    <span class="accent">Developer</span><br>
                </h1>
                <p class="hero-subtitle">
                    Saya membangun website modern yang memukau — dari backend yang kokoh hingga tampilan yang memesona. Spesialis Laravel, Bootstrap & MySQL.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#portfolio" class="btn-primary-custom">
                        <i class="bi bi-grid-3x3-gap-fill"></i> Lihat Portfolio
                    </a>
                    <a href="https://wa.me/6281261820624?text=Halo%20Feno%2C%20saya%20ingin%20berdiskusi%20tentang%20proyek"
                       target="_blank" class="btn-outline-custom">
                        <i class="bi bi-whatsapp"></i> Hubungi Saya
                    </a>
                </div>
                <div class="row g-3 mt-4">
                    <div class="col-4">
                        <div class="hero-stat">
                            <div class="num">50+</div>
                            <div class="label">Project Selesai</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="hero-stat">
                            <div class="num">6+</div>
                            <div class="label">Bulan Pengalaman</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="hero-stat">
                            <div class="num">0+</div>
                            <div class="label">Klien Puas</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-img-wrap mx-auto">
                    <img src="{{ asset('src/ruri.jpg') }}" alt="Feno Zikrillah - Full Stack Developer" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ SERVICES ═══ -->
<section id="services">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-tag mx-auto justify-content-center">Layanan</div>
            <h2 class="section-title">Apa yang Saya Tawarkan</h2>
            <p class="text-muted mt-2" style="max-width:500px;margin:auto;">Solusi digital lengkap dari desain hingga deployment yang siap mendorong bisnis Anda.</p>
        </div>
        <div class="row g-4">
            @forelse($services as $service)
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi {{ $service->icon }}"></i>
                    </div>
                    <h5>{{ $service->title }}</h5>
                    <p>{{ $service->description }}</p>
                    @if($service->price)
                    <div class="service-price"><i class="bi bi-tag-fill me-1"></i>{{ $service->price }}</div>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">Belum ada layanan tersedia.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- ═══ SKILLS ═══ -->
<section id="skills">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="section-tag">Keahlian</div>
                <h2 class="section-title mb-3">Teknologi yang Saya Kuasai</h2>
                <p style="color:var(--text-muted-custom);line-height:1.8;">
                    Saya terus mengembangkan diri dalam ekosistem web modern, dengan fokus pada performa, keamanan, dan pengalaman pengguna yang luar biasa.
                </p>
                <a href="https://wa.me/6281261820624?text=Halo%20Feno%2C%20saya%20butuh%20developer%20handal"
                   target="_blank" class="btn-primary-custom mt-4 d-inline-flex">
                    <i class="bi bi-whatsapp"></i> Diskusi Proyek
                </a>
            </div>
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="100">
                @forelse($skills as $skill)
                <div class="skill-item">
                    <div class="skill-header">
                        <span><i class="bi {{ $skill->icon }} me-2" style="color:var(--primary)"></i>{{ $skill->name }}</span>
                        <span class="pct">{{ $skill->level }}%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-fill" data-width="{{ $skill->level }}"></div>
                    </div>
                </div>
                @empty
                <p class="text-muted">Belum ada skill tersedia.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section id="portfolio">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-tag mx-auto justify-content-center">Portfolio</div>
            <h2 class="section-title">Proyek Terbaik Saya</h2>
            <p class="text-muted mt-2" style="max-width:500px;margin:auto;">Koleksi project pilihan yang mencerminkan keahlian dan dedikasi saya.</p>
        </div>

        <!-- Filter -->
        <div class="filter-tabs justify-content-center" data-aos="fade-up">
            <button class="filter-btn active" data-filter="all">Semua</button>
            <button class="filter-btn" data-filter="Web App">Web App</button>
            <button class="filter-btn" data-filter="Website">Website</button>
            <button class="filter-btn" data-filter="Dashboard">Dashboard</button>
        </div>

        <div class="row g-4">
            @forelse($portfolios as $portfolio)
            <div class="col-md-6 col-lg-4 portfolio-item" data-cat="{{ $portfolio->category }}"
                 data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                <div class="portfolio-card">
                    <div class="portfolio-img">
                        @if($portfolio->image)
                            <img src="{{ asset('storage/'.$portfolio->image) }}" alt="{{ $portfolio->title }}">
                        @else
                            <i class="bi bi-code-square portfolio-placeholder-icon"></i>
                        @endif
                        <div class="overlay">
                            @if($portfolio->url)
                            <a href="{{ $portfolio->url }}" target="_blank" title="Live Demo">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                            @endif
                            @if($portfolio->github_url)
                            <a href="{{ $portfolio->github_url }}" target="_blank" title="GitHub">
                                <i class="bi bi-github"></i>
                            </a>
                            @endif
                        </div>
                        @if($portfolio->is_featured)
                        <span style="position:absolute;top:12px;left:12px;background:var(--primary);color:#0d0d0d;font-size:.7rem;font-weight:700;padding:.25rem .6rem;border-radius:20px;">
                            Featured
                        </span>
                        @endif
                    </div>
                    <div class="portfolio-body">
                        <div class="portfolio-cat">{{ $portfolio->category }}</div>
                        <h5>{{ $portfolio->title }}</h5>
                        <p>{{ Str::limit($portfolio->description, 100) }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">Belum ada portfolio tersedia.</div>
            @endforelse
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="https://wa.me/6281261820624?text=Halo%20Feno%2C%20saya%20tertarik%20dengan%20portofolio%20Anda"
               target="_blank" class="btn-whatsapp">
                <i class="bi bi-whatsapp"></i> Diskusikan Proyek Anda
            </a>
        </div>
    </div>
</section>

<!-- ═══ ABOUT ═══ -->
<section id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="section-tag">Tentang Saya</div>
                <h2 class="section-title mb-3">Passionate Developer yang Berdedikasi</h2>
                <p style="color:var(--text-muted-custom);line-height:1.9;margin-bottom:1.5rem;">
                    Halo! Saya <strong style="color:#fff;">Feno Zikrillah</strong>, seorang Full Stack Web Developer berbasis di Indonesia. Saya berspesialisasi dalam membangun aplikasi web yang scalable, modern, dan berfokus pada pengalaman pengguna.
                </p>
                <p style="color:var(--text-muted-custom);line-height:1.9;margin-bottom:2rem;">
                    Dengan pengalaman lebih dari 6 bulan, saya telah menyelesaikan 50+ proyek mulai dari e-commerce, sistem manajemen, hingga platform SaaS untuk klien dari berbagai industri.
                </p>
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div style="background:var(--bg-card);border:1px solid var(--border);border-radius:14px;padding:1rem;">
                            <div style="font-size:.8rem;color:var(--text-muted-custom);">Lokasi</div>
                            <div style="font-weight:600;"><i class="bi bi-geo-alt-fill me-1" style="color:var(--primary)"></i>Indonesia</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="background:var(--bg-card);border:1px solid var(--border);border-radius:14px;padding:1rem;">
                            <div style="font-size:.8rem;color:var(--text-muted-custom);">Status</div>
                            <div style="font-weight:600;color:#25d366;"><i class="bi bi-circle-fill me-1" style="font-size:.5rem"></i>Available</div>
                        </div>
                    </div>
                </div>
                <!-- Social Media Integration -->
                <div class="social-links d-flex gap-2 mb-4">
                    <a href="https://github.com/telle32" target="_blank" title="GitHub"><i class="bi bi-github"></i></a>
                    <a href="https://instagram.com" target="_blank" title="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="https://twitter.com" target="_blank" title="Twitter/X"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://youtube.com" target="_blank" title="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
                <a href="https://wa.me/6281261820624?text=Halo%20Feno%2C%20saya%20ingin%20bekerja%20sama"
                   target="_blank" class="btn-whatsapp">
                    <i class="bi bi-whatsapp"></i> Let's Work Together!
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ═══ CONTACT ═══ -->
<section id="contact">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-tag mx-auto justify-content-center">Kontak</div>
            <h2 class="section-title">Punya Proyek? Yuk Ngobrol!</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-card text-center">
                    <i class="bi bi-chat-heart-fill" style="font-size:3rem;color:var(--primary);"></i>
                    <h3 class="mt-3 mb-2">Saya siap membantu!</h3>
                    <p style="color:var(--text-muted-custom);max-width:450px;margin:0 auto 2rem;">
                        Hubungi saya langsung via WhatsApp untuk konsultasi gratis. Saya akan merespons dalam hitungan menit!
                    </p>
                    <a href="https://wa.me/6281261820624?text=Halo%20Feno%2C%20saya%20ingin%20konsultasi%20gratis%20mengenai%20proyek%20saya"
                       target="_blank" class="btn-whatsapp d-inline-flex mb-4">
                        <i class="bi bi-whatsapp"></i> Chat WhatsApp Sekarang
                    </a>
                    <div class="divider mb-4"></div>
                    <p style="color:var(--text-muted-custom);font-size:.85rem;margin-bottom:1rem;">Atau temukan saya di:</p>
                    <div class="social-links d-flex gap-3 justify-content-center">
                        <a href="mailto:feno@example.com" title="Email"><i class="bi bi-envelope-fill"></i></a>
                        <a href="https://github.com/telle32" target="_blank" title="GitHub"><i class="bi bi-github"></i></a>
                        <a href="https://instagram.com" target="_blank" title="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="https://twitter.com" target="_blank" title="Twitter/X"><i class="bi bi-twitter-x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

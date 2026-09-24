<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website resmi Desa Jegreg. Informasi, layanan publik, dan kabar terbaru desa dalam satu pintu.">
    <title>Desa Jegreg | Tumbuh Bersama</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hero-section {
            background-image: linear-gradient(90deg, rgba(19, 63, 50, .96) 0%, rgba(27, 82, 64, .86) 46%, rgba(27, 82, 64, .35) 100%), url('https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1800&q=90');
            background-position: center;
            background-size: cover;
        }

        .hero-grid {
            grid-template-columns: minmax(0, 1fr);
        }

        .hero-copy {
            max-width: 650px;
        }

        .hero-visual {
            display: none;
        }

        @media (max-width: 850px) {
            .hero-section {
                background-position: 62% center;
            }
        }
    </style>
</head>
<body>
    <header class="site-header" id="beranda">
        <div class="container nav-wrap">
            <a class="brand" href="#beranda" aria-label="Beranda Desa Jegreg"><span class="brand-mark"><svg viewBox="0 0 40 40" fill="none"><path d="M20 3 35 9v10c0 9.6-6.5 15.3-15 18C11.5 34.3 5 28.6 5 19V9l15-6Z" fill="currentColor"/><path d="m11 20 5.1 5L29.5 12" stroke="#F7F3E9" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg></span><span><strong>Desa</strong><small>Jegreg</small></span></a>
            <button class="menu-toggle" type="button" aria-label="Buka menu" aria-expanded="false" data-menu-toggle><span></span><span></span><span></span></button>
            <nav class="main-nav" data-menu>
                <a class="active" href="#beranda">Beranda</a><a href="#profil">Profil Desa</a><a href="#layanan">Layanan</a><a href="#berita">Berita</a><a href="#kontak">Kontak</a>
                <a class="login-link" href="{{ url('/login') }}"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>Login</a>
            </nav>
        </div>
    </header>
    <main>
        <section class="hero-section"><div class="container hero-grid"><div class="hero-copy"><p class="eyebrow"><span></span> Website resmi Pemerintah Desa</p><h1>Desa maju,<br><em>warga bersatu.</em></h1><p class="hero-text">Ruang digital Desa Jegreg untuk berbagi informasi, menghadirkan pelayanan yang mudah, dan merawat cerita baik dari desa kita.</p><div class="hero-actions"><a class="button button-primary" href="#layanan">Jelajahi layanan <span>↗</span></a><a class="text-link" href="#profil">Kenali desa kami <span>→</span></a></div><div class="hero-note"><span class="live-dot"></span> Melayani dengan hati, setiap hari</div></div><div class="hero-visual"><div class="hero-image-wrap"><img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1200&q=85" alt="Pemandangan sawah hijau dan perbukitan"><div class="image-label"><span class="label-icon">⌖</span><span><b>Dusun Jegreg</b><small>Kecamatan Modo</small></span></div></div><div class="floating-card"><span class="sun-icon">☼</span><span><b>Hari ini di desa</b><small>Cuaca cerah, 28°C</small></span></div><div class="hero-scribble">✳</div></div></div><div class="hero-bottom-line"></div></section>
        <section class="intro-section" id="profil"><div class="container intro-grid"><div class="section-kicker">01 <span></span> Tentang Jegreg</div><div class="intro-content"><h2>Tempat kecil dengan <span>mimpi besar.</span></h2><p>Di antara hamparan sawah dan keramahan warganya, Jegreg terus bertumbuh. Kami percaya kemajuan desa lahir dari keterbukaan, gotong royong, dan kesempatan yang hadir untuk semua.</p><a class="arrow-link" href="#kontak">Lebih dekat dengan kami <span>↗</span></a></div><div class="intro-number"><strong>12</strong><span>Dusun yang<br>saling terhubung</span></div></div></section>
        <section class="services-section" id="layanan"><div class="container"><div class="section-heading"><div><p class="section-kicker">02 <span></span> Untuk warga</p><h2>Layanan yang <em>lebih dekat.</em></h2></div><p class="heading-description">Temukan informasi dan layanan publik yang Anda butuhkan, tanpa harus jauh dari rumah.</p></div><div class="service-grid"><a class="service-card featured" href="#kontak"><span class="service-icon">▣</span><span class="service-arrow">↗</span><h3>Administrasi<br>kependudukan</h3><p>Surat pengantar, domisili, dan kebutuhan administrasi lainnya.</p><span class="service-label">Layanan utama</span></a><a class="service-card" href="#berita"><span class="service-icon">◌</span><span class="service-arrow">↗</span><h3>Informasi<br>pembangunan</h3><p>Pantau program dan progres pembangunan desa.</p></a><a class="service-card" href="#kontak"><span class="service-icon">♧</span><span class="service-arrow">↗</span><h3>Potensi<br>ekonomi lokal</h3><p>Kenali produk unggulan dan UMKM warga Jegreg.</p></a></div></div></section>
        <section class="stats-section"><div class="container stats-grid"><div class="stats-intro"><span class="stats-mark">+</span><h2>Data desa,<br><em>untuk semua.</em></h2><p>Transparansi adalah cara kami menjaga kepercayaan.</p></div><div class="stat"><strong>8.421</strong><span>Jiwa penduduk</span></div><div class="stat"><strong>2.106</strong><span>Kepala keluarga</span></div><div class="stat"><strong>17</strong><span>UMKM aktif</span></div></div></section>
        <section class="news-section" id="berita"><div class="container"><div class="section-heading news-heading"><div><p class="section-kicker">03 <span></span> Kabar terbaru</p><h2>Cerita dari <em>desa.</em></h2></div><a class="arrow-link" href="#berita">Lihat semua berita <span>↗</span></a></div><div class="news-grid"><article class="news-card large"><div class="news-image image-one"></div><div class="news-meta">12 JUNI 2025 <span>•</span> PEMBANGUNAN</div><h3>Ruang terbuka hijau baru hadir di pusat desa</h3><a href="#berita">Baca selengkapnya <span>→</span></a></article><article class="news-card"><div class="news-image image-two"></div><div class="news-meta">08 JUNI 2025 <span>•</span> EKONOMI</div><h3>Produk UMKM Jegreg menembus pasar kota</h3><a href="#berita">Baca selengkapnya <span>→</span></a></article><article class="news-card"><div class="news-image image-three"></div><div class="news-meta">02 JUNI 2025 <span>•</span> KEGIATAN</div><h3>Gotong royong bersihkan aliran sungai</h3><a href="#berita">Baca selengkapnya <span>→</span></a></article></div></div></section>
        <section class="contact-section" id="kontak">
            <div class="container contact-box">
                <div class="contact-intro">
                    <p class="section-kicker light">Mari terhubung</p>
                    <h2>Ada yang ingin<br>disampaikan?</h2>
                    <p>Sampaikan keluhan atau masukan Anda. Pemerintah Desa Jegreg siap mendengar dan membantu.</p>
                </div>
                <form class="complaint-form" action="#" method="post">
                    <div class="form-field">
                        <label for="nama">Nama</label>
                        <input id="nama" name="nama" type="text" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="form-field">
                        <label for="dusun">Dusun</label>
                        <input id="dusun" name="dusun" type="text" placeholder="Masukkan nama dusun" required>
                    </div>
                    <div class="form-field form-field-full">
                        <label for="keluhan">Keluhan</label>
                        <textarea id="keluhan" name="keluhan" rows="4" placeholder="Tuliskan keluhan atau masukan Anda" required></textarea>
                    </div>
                    <button class="button button-light" type="submit">Kirim keluhan <span>↗</span></button>
                </form>
            </div>
        </section>
    </main>
    <footer class="site-footer"><div class="container footer-grid"><div><a class="brand footer-brand" href="#beranda"><span class="brand-mark"><svg viewBox="0 0 40 40" fill="none"><path d="M20 3 35 9v10c0 9.6-6.5 15.3-15 18C11.5 34.3 5 28.6 5 19V9l15-6Z" fill="currentColor"/><path d="m11 20 5.1 5L29.5 12" stroke="#F7F3E9" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg></span><span><strong>Desa</strong><small>Jegreg</small></span></a><p class="footer-tagline">Bersama membangun desa<br>yang berdaya dan bermartabat.</p></div><div class="footer-column"><b>Jelajahi</b><a href="#profil">Profil Desa</a><a href="#layanan">Layanan Publik</a><a href="#berita">Berita Desa</a></div><div class="footer-column"><b>Hubungi kami</b><span>Jl. Raya Jegreg No. 01<br>Kecamatan Modo, 40123</span><a href="mailto:halo@desajegreg.id">halo@desajegreg.id</a></div><div class="footer-column"><b>Ikuti kabar desa</b><div class="socials"><a href="#kontak" aria-label="Instagram">ig</a><a href="#kontak" aria-label="Facebook">f</a><a href="#kontak" aria-label="Youtube">yt</a></div></div></div><div class="container footer-bottom"><span>© {{ date('Y') }} Pemerintah Desa Jegreg</span><span>Made for the community <i>♥</i></span></div></footer>
    <script>const toggle=document.querySelector('[data-menu-toggle]');const menu=document.querySelector('[data-menu]');toggle?.addEventListener('click',()=>{const isOpen=menu.classList.toggle('is-open');toggle.setAttribute('aria-expanded',isOpen)});menu?.querySelectorAll('a').forEach(link=>link.addEventListener('click',()=>{menu.classList.remove('is-open');toggle?.setAttribute('aria-expanded','false')}));</script>
</body>
</html>

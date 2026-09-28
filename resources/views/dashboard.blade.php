<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard {{ $role['label'] }} | Desa Jegreg</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .dashboard-page {
            background: #f4f6f0;
            color: var(--ink);
            min-height: 100vh;
        }

        .dashboard-shell {
            display: grid;
            grid-template-columns: 250px minmax(0, 1fr);
            min-height: 100vh;
        }

        .dashboard-sidebar {
            align-self: start;
            background: #163b32;
            color: #fff;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow-y: auto;
            padding: 28px 18px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .dashboard-sidebar .brand {
            padding: 0 10px;
        }

        .dashboard-sidebar .brand-mark {
            background: var(--lime);
        }

        .dashboard-nav {
            display: grid;
            gap: 6px;
            margin-top: 65px;
        }

        .dashboard-nav a {
            align-items: center;
            color: #a7c4b3;
            display: flex;
            font-size: 12px;
            gap: 12px;
            padding: 12px 13px;
        }

        .dashboard-nav a:hover,
        .dashboard-nav a.active {
            background: #28594b;
            color: #fff;
        }

        .dashboard-nav a.active {
            box-shadow: inset 3px 0 var(--lime);
        }

        .nav-symbol {
            align-items: center;
            color: var(--lime);
            display: flex;
            font-size: 17px;
            justify-content: center;
            width: 18px;
        }

        .sidebar-bottom {
            border-top: 1px solid #47705f;
            margin-top: auto;
            padding: 20px 10px 0;
        }

        .sidebar-bottom p {
            color: #91b2a0;
            font-size: 10px;
            line-height: 1.5;
            margin: 0;
        }

        .dashboard-main {
            min-width: 0;
        }

        .dashboard-topbar {
            align-items: center;
            background: #fff;
            border-bottom: 1px solid #e1e7de;
            display: flex;
            justify-content: space-between;
            padding: 18px clamp(22px, 4vw, 58px);
        }

        .dashboard-breadcrumb {
            color: var(--muted);
            font-size: 11px;
        }

        .dashboard-breadcrumb strong {
            color: var(--ink);
        }

        .user-menu {
            align-items: center;
            display: flex;
            gap: 10px;
        }

        .user-avatar {
            align-items: center;
            background: var(--lime);
            border-radius: 50%;
            color: var(--ink);
            display: flex;
            font-size: 10px;
            font-weight: 700;
            height: 34px;
            justify-content: center;
            width: 34px;
        }

        .user-menu b,
        .user-menu small {
            display: block;
            line-height: 1.2;
        }

        .user-menu b {
            font-size: 11px;
        }

        .user-menu small {
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px;
        }

        .dashboard-content {
            padding: 45px clamp(22px, 4vw, 58px) 70px;
        }

        .dashboard-heading {
            align-items: end;
            display: flex;
            justify-content: space-between;
            margin-bottom: 34px;
        }

        .dashboard-heading h1 {
            color: var(--ink);
            font-family: var(--serif);
            font-size: clamp(35px, 4vw, 52px);
            letter-spacing: -.05em;
            line-height: 1;
            margin: 8px 0 12px;
        }

        .dashboard-heading p:not(.section-kicker) {
            color: var(--muted);
            font-size: 13px;
            margin: 0;
        }

        .section-kicker.dashboard-kicker {
            margin: 0;
        }

        .role-badge,
        .readonly-badge {
            background: #e7efd7;
            color: var(--green);
            font-size: 10px;
            font-weight: 700;
            padding: 8px 11px;
        }

        .readonly-badge {
            background: #e9ece7;
            color: var(--muted);
        }

        .dashboard-button {
            background: var(--green);
            color: #fff;
            display: inline-flex;
            font-size: 11px;
            font-weight: 700;
            gap: 12px;
            padding: 13px 16px;
        }

        .dashboard-button:hover {
            background: var(--ink);
        }

        .stats-row {
            display: grid;
            gap: 14px;
            grid-template-columns: repeat(4, 1fr);
            margin-bottom: 34px;
        }

        .dashboard-stat {
            background: #fff;
            border: 1px solid #e3e9df;
            padding: 20px;
        }

        .dashboard-stat-top {
            align-items: center;
            display: flex;
            justify-content: space-between;
        }

        .dashboard-stat small {
            color: var(--muted);
            font-size: 10px;
        }

        .stat-trend {
            color: #4d8b64;
            font-size: 10px;
        }

        .dashboard-stat strong {
            display: block;
            font-family: var(--serif);
            font-size: 34px;
            font-weight: 500;
            line-height: 1;
            margin-top: 20px;
        }

        .dashboard-stat span {
            color: var(--muted);
            display: block;
            font-size: 10px;
            margin-top: 8px;
        }

        .dashboard-grid {
            display: grid;
            gap: 18px;
            grid-template-columns: minmax(0, 1.4fr) minmax(280px, .6fr);
        }

        .dashboard-panel {
            background: #fff;
            border: 1px solid #e3e9df;
        }

        .panel-heading {
            align-items: center;
            border-bottom: 1px solid #e6ebe4;
            display: flex;
            justify-content: space-between;
            padding: 20px 22px;
        }

        .panel-heading h2 {
            font-size: 15px;
            margin: 0;
        }

        .panel-heading a {
            color: var(--green);
            font-size: 10px;
            font-weight: 700;
        }

        .content-list {
            display: grid;
        }

        .content-item {
            align-items: center;
            border-bottom: 1px solid #edf0eb;
            display: flex;
            gap: 15px;
            padding: 17px 22px;
        }

        .content-item:last-child {
            border-bottom: 0;
        }

        .content-thumb {
            background: var(--cream);
            height: 54px;
            object-fit: cover;
            width: 72px;
        }

        .content-item-main {
            min-width: 0;
        }

        .content-item-main b {
            display: block;
            font-family: var(--serif);
            font-size: 15px;
            font-weight: 500;
            line-height: 1.2;
        }

        .content-item-main span {
            color: var(--muted);
            display: block;
            font-size: 10px;
            margin-top: 6px;
        }

        .content-action {
            color: var(--green);
            font-size: 10px;
            font-weight: 700;
            margin-left: auto;
            white-space: nowrap;
        }

        .content-action.disabled {
            color: #aeb9b0;
        }

        .activity-list {
            padding: 5px 22px 15px;
        }

        .activity-item {
            align-items: start;
            display: flex;
            gap: 11px;
            padding: 14px 0;
        }

        .activity-dot {
            background: var(--lime);
            border-radius: 50%;
            flex: 0 0 auto;
            height: 8px;
            margin-top: 5px;
            width: 8px;
        }

        .activity-item p {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.5;
            margin: 0;
        }

        .activity-item b {
            color: var(--ink);
        }

        .activity-item small {
            color: #a5b1a8;
            display: block;
            font-size: 9px;
            margin-top: 4px;
        }

        .role-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 28px;
        }

        .role-preview a {
            border: 1px solid #d4ded2;
            color: var(--muted);
            font-size: 10px;
            padding: 8px 10px;
        }

        .role-preview a:hover,
        .role-preview a.current,
        .role-current {
            background: var(--green);
            border-color: var(--green);
            color: #fff;
        }

        .role-current {
            display: inline-block;
            font-size: 10px;
            padding: 8px 10px;
        }

        .logout-form {
            margin-top: 18px;
        }

        .topbar-logout {
            margin: 0 0 0 18px;
        }

        .logout-form button {
            background: transparent;
            border: 0;
            color: #a7c4b3;
            cursor: pointer;
            font: inherit;
            font-size: 11px;
            padding: 0;
        }

        .logout-form button:hover {
            color: var(--lime);
        }

        .logout-form button span {
            margin-left: 6px;
        }

        .dashboard-dialog {
            background: #fff;
            border: 0;
            box-shadow: 0 24px 80px #102c2740;
            color: var(--ink);
            max-width: 560px;
            padding: 0;
            width: calc(100% - 32px);
        }

        .dashboard-dialog::backdrop {
            background: #102c2780;
        }

        .dialog-header {
            align-items: start;
            border-bottom: 1px solid #e4eae1;
            display: flex;
            justify-content: space-between;
            padding: 22px 24px;
        }

        .dialog-header h2 {
            font-family: var(--serif);
            font-size: 27px;
            font-weight: 500;
            margin: 0;
        }

        .dialog-close {
            background: transparent;
            border: 0;
            color: var(--muted);
            cursor: pointer;
            font-size: 20px;
        }

        .dialog-form {
            display: grid;
            gap: 16px;
            padding: 24px;
        }

        .dialog-field {
            display: grid;
            gap: 7px;
        }

        .dialog-field label {
            font-size: 11px;
            font-weight: 700;
        }

        .dialog-field input,
        .dialog-field textarea,
        .dialog-field select {
            background: #fbfcf9;
            border: 1px solid #d7e0d5;
            color: var(--ink);
            font: inherit;
            font-size: 12px;
            outline: 0;
            padding: 12px;
            width: 100%;
        }

        .dialog-field textarea {
            min-height: 110px;
            resize: vertical;
        }

        .dialog-field input:focus,
        .dialog-field textarea:focus,
        .dialog-field select:focus {
            border-color: var(--green);
        }

        .dialog-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 4px;
        }

        .dialog-secondary {
            background: #e8eee5;
            border: 0;
            color: var(--ink);
            cursor: pointer;
            font: inherit;
            font-size: 11px;
            padding: 12px 16px;
        }

        .dialog-primary {
            background: var(--green);
            border: 0;
            color: #fff;
            cursor: pointer;
            font: inherit;
            font-size: 11px;
            font-weight: 700;
            padding: 12px 16px;
        }

        .dashboard-toast {
            background: var(--green);
            bottom: 24px;
            color: #fff;
            font-size: 11px;
            opacity: 0;
            padding: 12px 16px;
            pointer-events: none;
            position: fixed;
            right: 24px;
            transform: translateY(10px);
            transition: opacity .2s, transform .2s;
            z-index: 20;
        }

        .dashboard-toast.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 950px) {
            .dashboard-shell {
                grid-template-columns: 205px minmax(0, 1fr);
            }

            .stats-row {
                grid-template-columns: 1fr 1fr;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 680px) {
            .dashboard-shell {
                display: block;
            }

            .dashboard-sidebar {
                height: auto;
                min-height: auto;
                padding: 18px 16px;
            }

            .dashboard-nav {
                display: flex;
                gap: 4px;
                margin-top: 22px;
                overflow-x: auto;
            }

            .dashboard-nav a {
                flex: 0 0 auto;
                padding: 10px;
            }

            .sidebar-bottom {
                display: none;
            }

            .dashboard-topbar {
                padding: 15px 16px;
            }

            .dashboard-content {
                padding: 32px 16px 48px;
            }

            .dashboard-heading {
                align-items: start;
                display: block;
            }

            .dashboard-heading .dashboard-button,
            .dashboard-heading .readonly-badge {
                margin-top: 18px;
            }

            .stats-row {
                gap: 10px;
            }

            .dashboard-stat {
                padding: 15px;
            }

            .dashboard-stat strong {
                font-size: 27px;
            }

            .content-item {
                padding: 15px;
            }

            .content-thumb {
                height: 46px;
                width: 58px;
            }
        }
    </style>
</head>

<body class="dashboard-page">
    <div class="dashboard-shell">
        <aside class="dashboard-sidebar">
            <a class="brand" href="{{ url('/') }}" aria-label="Kembali ke website Desa Jegreg">
                <span class="brand-mark"><svg viewBox="0 0 40 40" fill="none" aria-hidden="true">
                        <path d="M20 3 35 9v10c0 9.6-6.5 15.3-15 18C11.5 34.3 5 28.6 5 19V9l15-6Z"
                            fill="currentColor" />
                        <path d="m11 20 5.1 5L29.5 12" stroke="#F7F3E9" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg></span>
                <span><strong>Desa</strong><small>Jegreg</small></span>
            </a>
            <nav class="dashboard-nav" aria-label="Navigasi dashboard">
                <a class="active" href="{{ route('dashboard') }}"><span class="nav-symbol">⌂</span> Ringkasan</a>
                <a href="#konten"><span class="nav-symbol">▤</span> Kelola konten</a>
                <a href="#pengaduan"><span class="nav-symbol">◌</span> Pengaduan warga</a>
                <a href="#pengaturan" data-open-dialog="settings-dialog"><span class="nav-symbol">⚙</span>
                    Pengaturan</a>
            </nav>
        </aside>
        <div class="dashboard-main">
            <header class="dashboard-topbar"><span class="dashboard-breadcrumb">Dashboard /
                    <strong>{{ $role['label'] }}</strong></span>
                <div class="user-menu">
                    <div><b>{{ $role['label'] }}</b><small>Desa Jegreg</small></div><span
                        class="user-avatar">{{ $role['initials'] }}</span>
                    <form class="logout-form topbar-logout" action="{{ route('logout') }}" method="post">@csrf<button
                            type="submit">Keluar <span>↗</span></button></form>
                </div>
            </header>
            <main class="dashboard-content">
                <div class="dashboard-heading">
                    <div>
                        <p class="section-kicker dashboard-kicker">Ruang kerja desa</p>
                        <h1>Selamat datang,<br>{{ $role['label'] }}.</h1>
                        <p>Kelola dan pantau informasi Desa Jegreg dari satu tempat.</p>
                    </div>
                    @if ($role['canEdit'])
                        <a class="dashboard-button" href="#content-editor" data-content-action="create">Tambah konten
                        <span>↗</span></a>@else<span class="readonly-badge">Mode baca saja</span>
                    @endif
                </div>
                <div class="stats-row">
                    <article class="dashboard-stat">
                        <div class="dashboard-stat-top"><small>Total konten</small><span class="stat-trend">+3 bulan
                                ini</span></div><strong>24</strong><span>Berita dan informasi</span>
                    </article>
                    <article class="dashboard-stat">
                        <div class="dashboard-stat-top"><small>Pengaduan baru</small><span class="stat-trend">Perlu
                                ditinjau</span></div><strong>08</strong><span>Masukan dari warga</span>
                    </article>
                    <article class="dashboard-stat">
                        <div class="dashboard-stat-top"><small>Pengunjung</small><span class="stat-trend">+12%</span>
                        </div><strong>1.284</strong><span>Bulan ini</span>
                    </article>
                    <article class="dashboard-stat">
                        <div class="dashboard-stat-top"><small>Status desa</small><span class="stat-trend">Aktif</span>
                        </div><strong>Baik</strong><span>Semua layanan berjalan</span>
                    </article>
                </div>
                <div class="dashboard-grid">
                    <section class="dashboard-panel" id="konten">
                        <div class="panel-heading">
                            <h2>Konten terbaru</h2>
                            @if ($role['canEdit'])
                            <a href="#konten">Kelola semua ↗</a>@else<span class="readonly-badge">Baca saja</span>
                            @endif
                        </div>
                        <div class="content-list">
                            <article class="content-item">
                                <div class="content-thumb image-one"></div>
                                <div class="content-item-main"><b>Ruang terbuka hijau baru hadir di pusat
                                        desa</b><span>Diperbarui 12 Juni 2025 · Pembangunan</span></div>
                                @if ($role['canEdit'])
                                    <a class="content-action" href="#content-editor"
                                    data-content-action="edit">Edit</a>@else<a class="content-action disabled"
                                        href="#content-editor" data-content-action="view">Lihat</a>
                                @endif
                            </article>
                            <article class="content-item">
                                <div class="content-thumb image-two"></div>
                                <div class="content-item-main"><b>Produk UMKM Jegreg menembus pasar
                                        kota</b><span>Diperbarui 08 Juni 2025 · Ekonomi</span></div>
                                @if ($role['canEdit'])
                                    <a class="content-action" href="#content-editor"
                                    data-content-action="edit">Edit</a>@else<a class="content-action disabled"
                                        href="#content-editor" data-content-action="view">Lihat</a>
                                @endif
                            </article>
                            <article class="content-item">
                                <div class="content-thumb image-three"></div>
                                <div class="content-item-main"><b>Gotong royong bersihkan aliran
                                        sungai</b><span>Diperbarui 02 Juni 2025 · Kegiatan</span></div>
                                @if ($role['canEdit'])
                                    <a class="content-action" href="#content-editor"
                                    data-content-action="edit">Edit</a>@else<a class="content-action disabled"
                                        href="#content-editor" data-content-action="view">Lihat</a>
                                @endif
                            </article>
                        </div>
                    </section>
                    <aside class="dashboard-panel" id="pengaduan">
                        <div class="panel-heading">
                            <h2>Aktivitas terbaru</h2><a href="#pengaduan">Lihat semua</a>
                        </div>
                        <div class="activity-list">
                            <div class="activity-item"><span class="activity-dot"></span>
                                <p><b>Pengaduan baru</b> dari Dusun Jegreg<small>12 menit yang lalu</small></p>
                            </div>
                            <div class="activity-item"><span class="activity-dot"></span>
                                <p><b>Data desa diperbarui</b> oleh Admin<small>2 jam yang lalu</small></p>
                            </div>
                            <div class="activity-item"><span class="activity-dot"></span>
                                <p><b>Berita diterbitkan</b> ke halaman utama<small>Kemarin, 15:40</small></p>
                            </div>
                        </div>
                    </aside>
                </div>
            </main>
        </div>
    </div>
</body>

</html>

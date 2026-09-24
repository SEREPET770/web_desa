<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Desa Jegreg</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="login-page">
    <main class="login-layout">
        <section class="login-showcase">
            <a class="brand" href="{{ url('/') }}" aria-label="Kembali ke beranda Desa Jegreg">
                <span class="brand-mark"><svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M20 3 35 9v10c0 9.6-6.5 15.3-15 18C11.5 34.3 5 28.6 5 19V9l15-6Z" fill="currentColor"/><path d="m11 20 5.1 5L29.5 12" stroke="#F7F3E9" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                <span><strong>Desa</strong><small>Jegreg</small></span>
            </a>
            <div class="login-showcase-copy">
                <p class="section-kicker light">Ruang kerja desa</p>
                <h1>Kelola desa,<br><em>layani warga.</em></h1>
                <p>Akses ruang kerja digital Desa Jegreg untuk mengelola informasi dan pelayanan masyarakat.</p>
            </div>
            <span class="login-showcase-footer">Pemerintah Desa Jegreg &copy; {{ date('Y') }}</span>
        </section>

        <section class="login-panel">
            <div class="login-card">
                <a class="login-back" href="{{ url('/') }}"><span>←</span> Kembali ke beranda</a>
                <h2>Selamat datang.</h2>
                <p class="login-subtitle">Masuk ke akun pengelola Desa Jegreg.</p>

                <form class="login-form" action="{{ url('/login') }}" method="get">
                    <div class="login-field">
                        <label for="email">Email atau username</label>
                        <input id="email" name="email" type="text" autocomplete="username" placeholder="Masukkan email atau username" required>
                    </div>
                    <div class="login-field">
                        <label for="password">Kata sandi</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Masukkan kata sandi" required>
                    </div>
                    <div class="login-options">
                        <label class="remember-me"><input type="checkbox" name="remember"> Ingat saya</label>
                        <a class="forgot-link" href="#">Lupa kata sandi?</a>
                    </div>
                    <button class="button button-primary login-submit" type="submit">Login <span>↗</span></button>
                </form>
                <p class="login-note">Akses ini khusus untuk pengelola pemerintahan Desa Jegreg.</p>
            </div>
        </section>
    </main>
</body>
</html>

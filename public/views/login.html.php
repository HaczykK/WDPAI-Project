<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars((string) ($pageTitle ?? 'DoGrywka - Zaloguj się')) ?></title>
    <!-- Skrypt anty-FOUC zapobiegający mignięciu motywu -->
    <script>
        (function() {
            var saved = localStorage.getItem('theme');
            var theme = saved || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="auth-body">
    <!-- Pasek nawigacyjny na ekranie logowania -->
    <header class="auth-top-bar">
        <a href="/" class="auth-nav-btn" aria-label="Wróć na stronę główną" title="Wróć do bazy">
            <span class="auth-nav-icon" aria-hidden="true">←</span>
            <span class="auth-nav-text">Wróć do bazy</span>
        </a>
        <div class="auth-brand">
            <span class="auth-brand-logo">DoGrywka</span>
        </div>
        <a href="/faq" class="auth-help-btn" aria-label="Pomoc i FAQ" title="Pomoc i FAQ">
            <span aria-hidden="true">?</span>
        </a>
    </header>

    <main class="auth-main-layout">
        <div class="auth-container">
            <!-- Kolumna lewa (Hero / Slogan - prezentowana na większych ekranach desktopowych) -->
            <section class="auth-hero-showcase">
                <span class="auth-season-tag">● Sezon #04 // Rezerwacje i Rozgrywki</span>
                <h1 class="auth-hero-title">
                    Zbierz skład.<br>
                    <span class="text-primary">Rezerwuj boiska.</span><br>
                    Graj o punkty.
                </h1>
                <p class="auth-hero-desc">
                    Szybkie rezerwacje orlików, zrzutki na oświetlenie i osiedlowe mecze w jednym miejscu.
                </p>

                <div class="auth-promo-card">
                    <div class="promo-icon-badge" aria-hidden="true">★</div>
                    <div class="promo-content">
                        <div class="promo-header">
                            <span class="promo-badge-tag">Vlepka #01</span>
                            <strong class="promo-title">Stały Bywalec</strong>
                        </div>
                        <p class="promo-desc">Unikalna odznaka startowa przyznawana automatycznie do Twojego profilu po dołączeniu.</p>
                    </div>
                    <span class="promo-pill">Free Drop</span>
                </div>
            </section>

            <!-- Kolumna prawa (Karta formularza logowania) -->
            <section class="auth-card-wrapper">
                <!-- Nagłówek powitalny (widok mobilny) -->
                <div class="auth-mobile-header">
                    <div class="auth-avatar-badge" aria-hidden="true">🏀</div>
                    <h2 class="auth-welcome-title">Witaj</h2>
                    <p class="auth-welcome-subtitle">Zaloguj się do swojego profilu sportowego</p>
                </div>

                <!-- Przełącznik trybu logowanie / rejestracja -->
                <div class="auth-tabs" role="tablist">
                    <a href="/login" class="auth-tab active" role="tab" aria-selected="true">Zaloguj się</a>
                    <a href="/register" class="auth-tab" role="tab" aria-selected="false">Zarejestruj się</a>
                </div>

                <!-- Karta formularza -->
                <div class="auth-card">
                    <!-- Miejsce na komunikaty błędów z backendu (np. błędne hasło) -->
                    <!--
                    <div class="auth-alert auth-alert-error" role="alert">
                        <span class="alert-icon" aria-hidden="true">⚠️</span>
                        <span class="alert-message">Błędny adres e-mail lub hasło. Spróbuj ponownie.</span>
                    </div>
                    -->
                    <div class="auth-alert auth-alert-error" role="alert" style="display: none;">
                        <span class="alert-icon" aria-hidden="true">⚠️</span>
                        <span class="alert-message">Błędny e-mail lub hasło</span>
                    </div>

                    <form method="POST" action="/login" class="auth-form" novalidate>
                        <!-- Pole: E-mail lub login -->
                        <div class="form-group">
                            <label for="login-field" class="form-label">Adres e-mail lub login</label>
                            <div class="input-wrapper">
                                <span class="input-icon" aria-hidden="true">✉</span>
                                <input
                                    type="text"
                                    id="login-field"
                                    name="login"
                                    class="form-input"
                                    placeholder="np. twoj_nick lub email@blok.pl"
                                    required
                                    autocomplete="username"
                                >
                            </div>
                        </div>

                        <!-- Pole: Hasło -->
                        <div class="form-group">
                            <div class="form-label-row">
                                <label for="password-field" class="form-label">Hasło</label>
                            </div>
                            <div class="input-wrapper">
                                <span class="input-icon" aria-hidden="true">🔒</span>
                                <input
                                    type="password"
                                    id="password-field"
                                    name="password"
                                    class="form-input"
                                    placeholder="••••••••"
                                    required
                                    autocomplete="current-password"
                                >
                                <button
                                    type="button"
                                    class="input-action-btn"
                                    aria-label="Pokaż lub ukryj hasło"
                                    title="Pokaż / ukryj hasło"
                                    onclick="const p = document.getElementById('password-field'); p.type = p.type === 'password' ? 'text' : 'password';"
                                >
                                    <span aria-hidden="true">👁</span>
                                </button>
                            </div>
                        </div>

                        <!-- Opcje: Zapamiętaj mnie i Nie pamiętasz hasła? -->
                        <div class="form-options-row">
                            <label class="form-checkbox-label">
                                <input type="checkbox" name="remember_me" value="1" class="form-checkbox">
                                <span>Zapamiętaj mnie</span>
                            </label>
                            <a href="/forgot-password" class="auth-forgot-link">Nie pamiętasz hasła?</a>
                        </div>

                        <!-- Przycisk zatwierdzenia formularza -->
                        <button type="submit" class="btn-auth-submit">
                            <span class="btn-submit-icon" aria-hidden="true">→]</span>
                            <span>Zaloguj się</span>
                        </button>
                    </form>

                    <!-- Rozdzielacz metod logowania -->
                    <div class="auth-divider">
                        <span>lub kontynuuj przez</span>
                    </div>

                    <!-- Logowanie przez serwisy zewnętrzne -->
                    <div class="auth-social-actions">
                        <button type="button" class="btn-social">
                            <span class="social-icon" aria-hidden="true">🌐</span>
                            <span>Google</span>
                        </button>
                        <button type="button" class="btn-social">
                            <span class="social-icon" aria-hidden="true">🍎</span>
                            <span>Apple</span>
                        </button>
                    </div>
                </div>

                <!-- Karta promocyjna dla nowych graczy (mobilna) -->
                <div class="auth-mobile-promo">
                    <div class="promo-icon-badge" aria-hidden="true">★</div>
                    <div class="promo-text-wrap">
                        <div class="promo-header-row">
                            <strong>Nowy gracz?</strong>
                            <span class="promo-tag-pill">Vlepka #01</span>
                        </div>
                        <p>Odbierz powitalną vlepkę gracza po założeniu konta.</p>
                    </div>
                </div>

                <!-- Informacja o rejestracji na dole -->
                <footer class="auth-card-footer">
                    <p>Nie masz konta? <a href="/register" class="auth-register-link">Zarejestruj się i dołącz do gry</a></p>
                </footer>
            </section>
        </div>
    </main>

    <!-- Skrypt obsługujący motyw (Light / Dark mode) -->
    <script src="/js/theme.js" defer></script>
</body>
</html>

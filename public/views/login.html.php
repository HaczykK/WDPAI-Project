<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars((string) ($pageTitle ?? 'DoGrywka - Zaloguj się')) ?></title>
    <!-- Czcionki miejskie / markerowe dla nagłówków -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
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
        <!-- Lewa strona (mobile: przycisk powrotu w kółku; desktop: ukryty) -->
        <a href="/home" class="auth-back-mobile" aria-label="Wróć na stronę główną" title="Wróć do bazy">
            <span aria-hidden="true">←</span>
        </a>

        <!-- Logo aplikacji (mobile: wyśrodkowane; desktop: po lewej) -->
        <div class="auth-brand">
            <a href="/" class="auth-brand-logo">DOGRYWKA</a>
        </div>

        <!-- Prawa strona nawigacji -->
        <div class="auth-top-actions">
            <a href="/faq" class="auth-faq-link">POMOC / FAQ</a>
            <a href="/home" class="auth-btn-back">
                <span aria-hidden="true">←</span>
                <span>WRÓĆ DO BAZY</span>
            </a>
            <a href="/faq" class="auth-help-mobile" aria-label="Pomoc i FAQ" title="Pomoc i FAQ">
                <span aria-hidden="true">?</span>
            </a>
        </div>
    </header>

    <main class="auth-main-layout">
        <div class="auth-container">
            <!-- Kolumna lewa (Hero / Slogan - prezentowana na większych ekranach desktopowych) -->
            <section class="auth-hero-showcase">
                <div class="auth-season-tag">
                    <span class="season-dot" aria-hidden="true">•</span>
                    <span>SEZON #04 // REZERWACJE I ROZGRYWKI</span>
                </div>
                <h1 class="auth-hero-title">
                    ZBIERZ SKŁAD.<br>
                    <span class="text-primary">REZERWUJ BOISKA.</span><br>
                    GRAJ O PUNKTY.
                </h1>
                <p class="auth-hero-desc">
                    Szybkie rezerwacje orlików, zrzutki na oświetlenie i osiedlowe mecze w jednym miejscu.
                </p>

                <div class="auth-promo-card">
                    <div class="promo-icon-badge" aria-hidden="true">✪</div>
                    <div class="promo-content">
                        <div class="promo-header">
                            <span class="promo-badge-tag">VLEPKA #01</span>
                            <strong class="promo-title">STAŁY BYWALEC</strong>
                        </div>
                        <p class="promo-desc">Unikalna odznaka startowa przyznawana automatycznie do Twojego profilu po dołączeniu.</p>
                    </div>
                    <span class="promo-pill"><span aria-hidden="true">✔</span> FREE DROP</span>
                </div>
            </section>

            <!-- Kolumna prawa (Karta formularza logowania) -->
            <section class="auth-card-wrapper">
                <!-- Nagłówek powitalny (widok mobilny) -->
                <div class="auth-mobile-header">
                    <div class="auth-avatar-badge" aria-hidden="true">🏀</div>
                    <h2 class="auth-welcome-title">WITAJ</h2>
                    <p class="auth-welcome-subtitle">Zaloguj się do swojego profilu sportowego</p>
                </div>

                <!-- Karta formularza -->
                <div class="auth-card">
                    <!-- Przełącznik trybu logowanie / rejestracja na górze karty -->
                    <div class="auth-tabs" role="tablist">
                        <a href="/login" class="auth-tab active" role="tab" aria-selected="true">[ ZALOGUJ SIĘ ]</a>
                        <a href="/register" class="auth-tab" role="tab" aria-selected="false">[ ZAREJESTRUJ SIĘ ]</a>
                    </div>

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
                            <label for="login-field" class="form-label">E-MAIL LUB LOGIN</label>
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
                                <label for="password-field" class="form-label">HASŁO</label>
                                <a href="/forgot-password" class="auth-forgot-link">Nie pamiętasz hasła?</a>
                            </div>
                            <div class="input-wrapper">
                                <span class="input-icon" aria-hidden="true">🔒</span>
                                <input
                                    type="password"
                                    id="password-field"
                                    name="password"
                                    class="form-input"
                                    placeholder="••••••••••••"
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

                        <!-- Opcje: Zapamiętaj mnie -->
                        <div class="form-options-row">
                            <label class="form-checkbox-label">
                                <input type="checkbox" name="remember_me" value="1" class="form-checkbox">
                                <span>Zapamiętaj mnie <span class="hide-mobile">na tym urządzeniu</span></span>
                            </label>
                        </div>

                        <!-- Przycisk zatwierdzenia formularza -->
                        <button type="submit" class="btn-auth-submit">
                            <span>ZALOGUJ SIĘ</span>
                            <span class="btn-submit-icon" aria-hidden="true">→</span>
                        </button>
                    </form>

                    <!-- Rozdzielacz metod logowania -->
                    <div class="auth-divider">
                        <span>LUB ZALOGUJ SIĘ PRZEZ</span>
                    </div>

                    <!-- Logowanie przez serwisy zewnętrzne -->
                    <div class="auth-social-actions">
                        <button type="button" class="btn-social">
                            <span class="social-icon" aria-hidden="true">G</span>
                            <span>GOOGLE</span>
                        </button>
                        <button type="button" class="btn-social">
                            <span class="social-icon" aria-hidden="true"></span>
                            <span>APPLE</span>
                        </button>
                    </div>

                    <!-- Informacja o rejestracji pod formularzem -->
                    <footer class="auth-card-footer">
                        <p>Nie masz konta? <a href="/register" class="auth-register-link">Zarejestruj się</a> i dołącz do gry.</p>
                    </footer>
                </div>

                <!-- Karta promocyjna dla nowych graczy (mobilna) -->
                <div class="auth-mobile-promo">
                    <div class="promo-icon-badge" aria-hidden="true">✔</div>
                    <div class="promo-text-wrap">
                        <div class="promo-header-row">
                            <strong>Nowy gracz?</strong>
                            <span class="promo-tag-pill">Vlepka #01</span>
                        </div>
                        <p>Odbierz powitalną vlepkę gracza po założeniu konta.</p>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Skrypt obsługujący motyw (Light / Dark mode) -->
    <script src="/js/theme.js" defer></script>
</body>
</html>

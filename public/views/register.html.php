<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars((string) ($pageTitle ?? 'DoGrywka - Zarejestruj się'), ENT_QUOTES, 'UTF-8') ?></title>
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
    <!-- Pasek nawigacyjny na ekranie rejestracji -->
    <header class="auth-top-bar">
        <a href="/home" class="auth-back-mobile" aria-label="Wróć na stronę główną" title="Wróć do bazy">
            <span aria-hidden="true">←</span>
        </a>

        <div class="auth-brand">
            <a href="/" class="auth-brand-logo">DOGRYWKA</a>
        </div>

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
            <!-- Kolumna lewa (Hero / Slogan - desktop) -->
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

            <!-- Kolumna prawa (Karta formularza rejestracji) -->
            <section class="auth-card-wrapper">
                <!-- Nagłówek powitalny (widok mobilny) -->
                <div class="auth-mobile-header">
                    <div class="auth-avatar-badge" aria-hidden="true">🏀</div>
                    <h2 class="auth-welcome-title">DOŁĄCZ DO GRY</h2>
                    <p class="auth-welcome-subtitle">Załóż konto i zgarnij powitalną vlepkę</p>
                </div>

                <!-- Karta formularza -->
                <div class="auth-card">
                    <!-- Przełącznik trybu logowanie / rejestracja -->
                    <div class="auth-tabs" role="tablist">
                        <a href="/login" class="auth-tab" role="tab" aria-selected="false">[ ZALOGUJ SIĘ ]</a>
                        <a href="/register" class="auth-tab active" role="tab" aria-selected="true">[ ZAREJESTRUJ SIĘ ]</a>
                    </div>

                    <!-- Miejsce na komunikaty błędów z backendu (np. zajęty e-mail, różne hasła) -->
                    <!--
                    <div class="auth-alert auth-alert-error" role="alert">
                        <span class="alert-icon" aria-hidden="true">⚠️</span>
                        <span class="alert-message">Konto z takim adresem e-mail już istnieje.</span>
                    </div>
                    -->
                    <div class="auth-alert auth-alert-error" role="alert" style="display: none;">
                        <span class="alert-icon" aria-hidden="true">⚠️</span>
                        <span class="alert-message">Sprawdź poprawność danych w formularzu</span>
                    </div>

                    <form method="POST" action="/register" class="auth-form" novalidate>
                        <!-- Pole: Nick / Login -->
                        <div class="form-group">
                            <label for="register-nickname" class="form-label">NICK / LOGIN</label>
                            <div class="input-wrapper">
                                <span class="input-icon" aria-hidden="true">👤</span>
                                <input
                                    type="text"
                                    id="register-nickname"
                                    name="nickname"
                                    class="form-input"
                                    placeholder="np. kamil_orlik"
                                    required
                                    autocomplete="username"
                                >
                            </div>
                        </div>

                        <!-- Pole: Adres e-mail -->
                        <div class="form-group">
                            <label for="register-email" class="form-label">ADRES E-MAIL</label>
                            <div class="input-wrapper">
                                <span class="input-icon" aria-hidden="true">✉</span>
                                <input
                                    type="email"
                                    id="register-email"
                                    name="email"
                                    class="form-input"
                                    placeholder="np. kamil@blok.pl"
                                    required
                                    autocomplete="email"
                                >
                            </div>
                        </div>

                        <!-- Pole: Hasło -->
                        <div class="form-group">
                            <label for="register-password" class="form-label">HASŁO</label>
                            <div class="input-wrapper">
                                <span class="input-icon" aria-hidden="true">🔒</span>
                                <input
                                    type="password"
                                    id="register-password"
                                    name="password"
                                    class="form-input"
                                    placeholder="Minimum 8 znaków"
                                    required
                                    autocomplete="new-password"
                                >
                                <button
                                    type="button"
                                    class="input-action-btn"
                                    aria-label="Pokaż lub ukryj hasło"
                                    title="Pokaż / ukryj hasło"
                                    onclick="const p = document.getElementById('register-password'); p.type = p.type === 'password' ? 'text' : 'password';"
                                >
                                    <span aria-hidden="true">👁</span>
                                </button>
                            </div>
                        </div>

                        <!-- Pole: Powtórz hasło -->
                        <div class="form-group">
                            <label for="register-password-confirm" class="form-label">POWTÓRZ HASŁO</label>
                            <div class="input-wrapper">
                                <span class="input-icon" aria-hidden="true">🔒</span>
                                <input
                                    type="password"
                                    id="register-password-confirm"
                                    name="password_confirm"
                                    class="form-input"
                                    placeholder="Powtórz hasło"
                                    required
                                    autocomplete="new-password"
                                >
                                <button
                                    type="button"
                                    class="input-action-btn"
                                    aria-label="Pokaż lub ukryj powtórzone hasło"
                                    title="Pokaż / ukryj hasło"
                                    onclick="const p = document.getElementById('register-password-confirm'); p.type = p.type === 'password' ? 'text' : 'password';"
                                >
                                    <span aria-hidden="true">👁</span>
                                </button>
                            </div>
                        </div>

                        <!-- Opcje: Akceptacja zasad -->
                        <div class="form-options-row">
                            <label class="form-checkbox-label">
                                <input type="checkbox" name="accept_terms" value="1" class="form-checkbox" required>
                                <span>Akceptuję zasady rejonu i regulamin</span>
                            </label>
                        </div>

                        <!-- Przycisk zatwierdzenia formularza -->
                        <button type="submit" class="btn-auth-submit">
                            <span>ZAŁÓŻ KONTO</span>
                            <span class="btn-submit-icon" aria-hidden="true">→</span>
                        </button>
                    </form>

                    <!-- Rozdzielacz metod rejestracji -->
                    <div class="auth-divider">
                        <span>LUB ZAREJESTRUJ SIĘ PRZEZ</span>
                    </div>

                    <!-- Rejestracja przez serwisy zewnętrzne -->
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

                    <!-- Informacja o logowaniu pod formularzem -->
                    <footer class="auth-card-footer">
                        <p>Masz już konto? <a href="/login" class="auth-register-link">Zaloguj się</a> i wróć na boisko.</p>
                    </footer>
                </div>

                <!-- Karta promocyjna dla nowych graczy (mobilna) -->
                <div class="auth-mobile-promo">
                    <div class="promo-icon-badge" aria-hidden="true">✔</div>
                    <div class="promo-text-wrap">
                        <div class="promo-header-row">
                            <strong>Startujesz w DoGrywce?</strong>
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

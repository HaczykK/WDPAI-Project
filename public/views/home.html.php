<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars((string) ($pageTitle ?? 'DoGrywka - Baza')) ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="app-header">
        <div class="header-top">
            <div class="header-brand">
                <h1>DoGrywka</h1>
                <span class="header-subtitle">Bloki / Rejon 04</span>
            </div>
            <div class="header-actions">
                <button type="button" class="header-btn" aria-label="Powiadomienia">
                    <span class="dot-badge"></span>
                    <span>🔔</span>
                </button>
                <button type="button" class="header-btn" aria-label="Ustawienia">
                    <span>⚙️</span>
                </button>
            </div>
        </div>

        <section class="user-status-card">
            <div class="user-status-header">
                <div class="user-badge-level">
                    <div class="user-avatar-mini">🔥</div>
                    <div class="user-title-group">
                        <span class="user-level-tag">Poziom 8</span>
                        <h2><?= htmlspecialchars((string) ($nickname ?? 'Kamil_10')) ?></h2>
                    </div>
                </div>
                <span class="user-xp">840 / 1000 XP</span>
            </div>

            <div class="xp-progress" role="progressbar" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100">
                <div class="xp-progress-bar"></div>
            </div>

            <div class="user-status-footer">
                <span>Ranga: <strong><?= htmlspecialchars((string) ($playerLevel ?? 'Weteran Orlika (Poziom 8)')) ?></strong></span>
                <span class="user-xp-bonus">+160 XP do "Szef Betonu"</span>
            </div>
        </section>
    </header>

    <main class="home-layout">
        <!-- Sekcja 1: Zdobyte vlepki -->
        <section class="stickers-section">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="section-bullet bullet-accent">●</span>
                    Świeże vlepki
                </h2>
                <a href="#" class="section-tag">Klaser (4)</a>
            </div>

            <ul class="stickers-list">
                <li class="sticker-card">
                    <div class="sticker-badge">⚽</div>
                    <strong class="sticker-name">Król Strzelców</strong>
                    <span class="sticker-desc">10+ goli w sezonie</span>
                </li>
                <li class="sticker-card">
                    <div class="sticker-badge">🛡️</div>
                    <strong class="sticker-name">Niezawodny Skład</strong>
                    <span class="sticker-desc">5 meczów z rzędu</span>
                </li>
                <li class="sticker-card">
                    <div class="sticker-badge">✨</div>
                    <strong class="sticker-name">Czysta Gra</strong>
                    <span class="sticker-desc">15 meczów bez faulu</span>
                </li>
                <li class="sticker-card">
                    <div class="sticker-badge">⚡</div>
                    <strong class="sticker-name">Animator Rejonu</strong>
                    <span class="sticker-desc">3 udane zbiórki</span>
                </li>
            </ul>
        </section>

        <!-- Sekcja 2: Ustawki na rejonie -->
        <section class="matches-section">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="section-bullet bullet-primary">●</span>
                    Ustawki na rejonie
                </h2>
                <span class="section-tag section-tag-muted">3 otwarte</span>
            </div>

            <div class="matches-list">
                <article class="match-card">
                    <header class="match-header">
                        <div class="match-meta-left">
                            <span class="match-discipline-badge">Piłka nożna 6v6</span>
                            <time class="match-time" datetime="2026-11-10T18:00">10.11, 18:00 Dziś</time>
                        </div>
                        <div class="match-slots">
                            <span class="slots-ratio">10/12</span>
                            <span class="slots-status">Brak 2</span>
                        </div>
                    </header>

                    <h3 class="match-title">Piłka nożna 6v6 // Orlik Reymonta</h3>

                    <footer class="match-footer">
                        <p class="match-location">
                            <span>📍</span>
                            <address style="display:inline; font-style:normal;">ul. Reymonta 22, Kraków</address>
                        </p>
                        <a href="/game/1" class="btn-join">Dołącz do gry</a>
                    </footer>
                </article>

                <article class="match-card">
                    <header class="match-header">
                        <div class="match-meta-left">
                            <span class="match-discipline-badge">Streetball 3x3</span>
                            <time class="match-time" datetime="2026-11-11T17:30">11.11, 17:30 Jutro</time>
                        </div>
                        <div class="match-slots">
                            <span class="slots-ratio">5/6</span>
                            <span class="slots-status">Start zaraz</span>
                        </div>
                    </header>

                    <h3 class="match-title">Kosz 3v3 // Park Jordana</h3>

                    <footer class="match-footer">
                        <p class="match-location">
                            <span>📍</span>
                            <address style="display:inline; font-style:normal;">Park Jordana, Boisko B, Kraków</address>
                        </p>
                        <a href="/game/2" class="btn-join">Dołącz do gry</a>
                    </footer>
                </article>

                <article class="match-card">
                    <header class="match-header">
                        <div class="match-meta-left">
                            <span class="match-discipline-badge">Siatkówka</span>
                            <time class="match-time" datetime="2026-11-12T19:00">12.11, 19:00</time>
                        </div>
                        <div class="match-slots">
                            <span class="slots-ratio">9/12</span>
                            <span class="slots-status">Brak 3</span>
                        </div>
                    </header>

                    <h3 class="match-title">Siatkówka rekreacyjna // Hala Błonia</h3>

                    <footer class="match-footer">
                        <p class="match-location">
                            <span>📍</span>
                            <address style="display:inline; font-style:normal;">al. 3 Maja 5, Kraków</address>
                        </p>
                        <a href="/game/3" class="btn-join">Dołącz do gry</a>
                    </footer>
                </article>
            </div>
        </section>
    </main>

    <footer class="app-footer">
        <p class="footer-slogan">- Do gry albo do domu -</p>
        <p class="footer-copyright">&copy; <?= date('Y') ?> DoGrywka</p>
    </footer>

    <!-- Dolna nawigacja mobilna / Pasek boczny na desktopie -->
    <nav class="mobile-nav" aria-label="Główna nawigacja">
        <h2 class="visually-hidden">Nawigacja główna</h2>
        <ul class="mobile-nav-list">
            <li class="mobile-nav-item">
                <a href="/" class="mobile-nav-link active">
                    <span class="nav-icon">🏠</span>
                    <span>Baza</span>
                </a>
            </li>
            <li class="mobile-nav-item">
                <a href="/rejon" class="mobile-nav-link">
                    <span class="nav-icon">🎯</span>
                    <span>Rejon</span>
                </a>
            </li>
            <li class="mobile-nav-item nav-item-action">
                <a href="/game-create" class="mobile-nav-link mobile-nav-link-add" aria-label="Dodaj ustawkę">
                    <span class="nav-icon-add">+</span>
                    <span class="nav-label-add">Dodaj ustawkę</span>
                </a>
            </li>
            <li class="mobile-nav-item">
                <a href="/szatnia" class="mobile-nav-link">
                    <span class="nav-icon">👕</span>
                    <span>Szatnia</span>
                </a>
            </li>
            <li class="mobile-nav-item">
                <a href="/profile" class="mobile-nav-link">
                    <span class="nav-icon">👤</span>
                    <span>Profil</span>
                </a>
            </li>
        </ul>
    </nav>
</body>
</html>

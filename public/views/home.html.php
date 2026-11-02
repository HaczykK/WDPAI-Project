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
        <h1>DoGrywka</h1>
        <section class="user-status-card">
            <h2>Witaj, <?= htmlspecialchars((string) ($nickname ?? 'Kamil_10')) ?>!</h2>
            <p>Poziom gracza: <strong><?= htmlspecialchars((string) ($playerLevel ?? 'Weteran Orlika (Poziom 8)')) ?></strong></p>
        </section>
    </header>

    <main class="home-layout">
        <section class="stickers-section">
            <h2>Zdobyte vlepki</h2>
            <p>Oto odznaki i trofea zdobyte za aktywność na boisku:</p>
            <ul>
                <li>Vlepka: <strong>Król Strzelców Orlika</strong> - Zdobyto 10+ goli w jednym sezonie</li>
                <li>Vlepka: <strong>Niezawodny Skład</strong> - 5 meczów z rzędu bez nieobecności</li>
                <li>Vlepka: <strong>Czysta Gra</strong> - Ponad 15 meczów bez żółtej kartki</li>
                <li>Vlepka: <strong>Animator Rejonu</strong> - Zorganizowano 3 udane ustawki</li>
            </ul>
        </section>

        <section class="matches-section">
            <h2>Ustawki na rejonie</h2>
            <p>Najbliższe mecze szukające zawodników w Twojej okolicy:</p>

            <article>
                <header>
                    <h3>Piłka nożna 6v6 - Orlik Reymonta</h3>
                    <p>Dyscyplina: Piłka nożna</p>
                </header>
                <p>Lokalizacja: <address>ul. Reymonta 22, Kraków</address></p>
                <p>Termin: <time datetime="2026-11-10T18:00">10.11.2026, godz. 18:00</time></p>
                <p>Brakujący gracze: <strong>2</strong> / 12</p>
                <p><a href="/game/1">Zobacz szczegóły ustawki</a></p>
            </article>

            <article>
                <header>
                    <h3>Streetball 3x3 - Park Jordana</h3>
                    <p>Dyscyplina: Koszykówka</p>
                </header>
                <p>Lokalizacja: <address>Park Jordana, Boisko B, Kraków</address></p>
                <p>Termin: <time datetime="2026-11-11T17:30">11.11.2026, godz. 17:30</time></p>
                <p>Brakujący gracze: <strong>1</strong> / 6</p>
                <p><a href="/game/2">Zobacz szczegóły ustawki</a></p>
            </article>

            <article>
                <header>
                    <h3>Siatkówka rekreacyjna - Hala Błonia</h3>
                    <p>Dyscyplina: Siatkówka</p>
                </header>
                <p>Lokalizacja: <address>al. 3 Maja 5, Kraków</address></p>
                <p>Termin: <time datetime="2026-11-12T19:00">12.11.2026, godz. 19:00</time></p>
                <p>Brakujący gracze: <strong>3</strong> / 12</p>
                <p><a href="/game/3">Zobacz szczegóły ustawki</a></p>
            </article>
        </section>
    </main>

    <nav class="app-nav">
        <h2>Nawigacja główna</h2>
        <ul>
            <li><a href="/">Baza</a></li>
            <li><a href="/rejon">Rejon</a></li>
            <li><a href="/game-create">Plus / Dodaj</a></li>
            <li><a href="/szatnia">Szatnia</a></li>
            <li><a href="/profile">Profil</a></li>
        </ul>
    </nav>

    <footer class="app-footer">
        <p>&copy; <?= date('Y') ?> DoGrywka</p>
    </footer>
</body>
</html>

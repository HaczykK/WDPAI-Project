<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars((string) ($pageTitle ?? 'DoGrywka - Profil i Ściana Sław')) ?></title>
</head>
<body>
    <header>
        <h1>DoGrywka</h1>
        <section>
            <h2>Profil gracza: <?= htmlspecialchars((string) ($nickname ?? 'Kamil_10')) ?></h2>
            <figure>
                <img src="/public/img/avatar.png" alt="Zdjęcie profilowe gracza <?= htmlspecialchars((string) ($nickname ?? 'Kamil_10')) ?>" width="96" height="96">
                <figcaption>Status: Gotowy do gry w ten weekend</figcaption>
            </figure>
            <p>Preferowane pozycje: Pomocnik, Napastnik</p>

            <h3>Statystyki zawodnika</h3>
            <ul>
                <li>Ranga: <strong>Weteran Orlika (Poziom 8)</strong></li>
                <li>Rozegrane mecze: <strong>42</strong></li>
                <li>Zorganizowane ustawki: <strong>9</strong></li>
                <li>Wskaźnik obecności: <strong>98%</strong></li>
                <li>Wskaźnik Fair Play: <strong>100%</strong></li>
            </ul>
            <p>
                <a href="/settings">Przejdź do ustawień konta</a>
            </p>
        </section>
    </header>

    <main>
        <section>
            <h2>Ściana Sław</h2>
            <p>Spis wszystkich osiągnięć i wyróżnień przyznanych przez społeczność DoGrywka:</p>

            <article>
                <h3>Wyróżnienia aktywne</h3>
                <ul>
                    <li>Puchar: <strong>Król Strzelców Edycji Letniej</strong></li>
                    <li>Tytuł: <strong>Niezawodny Partner Zespołu</strong></li>
                </ul>
            </article>

            <details>
                <summary>Rozwiń pełną listę odznak ze Ściany Sław</summary>
                <ul>
                    <li>
                        <strong>Król Strzelców Orlika</strong>
                        <p>Zdobądź co najmniej 10 bramek w jednym sezonie ustawek. Odznaka zdobyta: 14.07.2026.</p>
                    </li>
                    <li>
                        <strong>Niezawodny Skład</strong>
                        <p>Rozegraj 5 meczów z rzędu bez żadnego spóźnienia i bez odwoływania obecności. Odznaka zdobyta: 02.08.2026.</p>
                    </li>
                    <li>
                        <strong>Czysta Gra (Fair Play)</strong>
                        <p>Rozegraj minimum 15 spotkań z oceną 5.0 od przeciwników. Odznaka zdobyta: 21.08.2026.</p>
                    </li>
                    <li>
                        <strong>Animator Rejonu</strong>
                        <p>Stwórz 3 ustawki, na które przyjdzie komplet graczy. Odznaka zdobyta: 15.09.2026.</p>
                    </li>
                    <li>
                        <strong>W każdą pogodę</strong>
                        <p>Dokończ mecz w deszczu lub przy temperaturze poniżej 5 stopni Celsjusza. Odznaka zdobyta: 18.10.2026.</p>
                    </li>
                    <li>
                        <strong>Nocny Marek</strong>
                        <p>Rozegraj mecz rozpoczynający się po godzinie 21:00. Odznaka zdobyta: 29.10.2026.</p>
                    </li>
                </ul>
            </details>
        </section>
    </main>

    <nav>
        <h2>Nawigacja główna</h2>
        <ul>
            <li><a href="/">Baza</a></li>
            <li><a href="/rejon">Rejon</a></li>
            <li><a href="/game-create">Plus / Dodaj</a></li>
            <li><a href="/szatnia">Szatnia</a></li>
            <li><a href="/profile">Profil</a></li>
        </ul>
    </nav>

    <footer>
        <p>&copy; <?= date('Y') ?> DoGrywka</p>
    </footer>
</body>
</html>


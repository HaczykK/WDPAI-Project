<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars((string) ($pageTitle ?? 'DoGrywka - Rejon')) ?></title>
</head>
<body>
    <header>
        <h1>DoGrywka</h1>
        <p>Rejon: Wyszukiwarka boisk i radar ustawek</p>
    </header>

    <main>
        <section>
            <h2>Wyszukiwarka</h2>
            <form method="GET" action="/rejon">
                <fieldset>
                    <legend>Szukaj boiska lub meczu</legend>
                    <p>
                        <label for="search-query">Nazwa obiektu, ulica lub dzielnica:</label>
                        <input type="search" id="search-query" name="q" placeholder="np. Orlik, Krowodrza, Błonia">
                    </p>
                </fieldset>

                <fieldset>
                    <legend>Dyscyplina sportowa</legend>
                    <p>
                        <label>
                            <input type="radio" name="sport" value="all" checked>
                            Wszystkie
                        </label>
                        <label>
                            <input type="radio" name="sport" value="football">
                            Piłka nożna
                        </label>
                        <label>
                            <input type="radio" name="sport" value="basketball">
                            Koszykówka
                        </label>
                        <label>
                            <input type="radio" name="sport" value="volleyball">
                            Siatkówka
                        </label>
                        <label>
                            <input type="radio" name="sport" value="tennis">
                            Tenis
                        </label>
                    </p>
                </fieldset>

                <p>
                    <button type="submit">Filtruj rejon</button>
                </p>
            </form>
        </section>

        <section>
            <h2>Radar rejonu</h2>
            <figure>
                <p>[Radar GPS / Mapa rejonu - podgląd obiektów sportowych i aktywnych ustawek w promieniu 5 km]</p>
                <figcaption>Twoja aktualna pozycja: Kraków Śródmieście (szer. 50.0647, dł. 19.9450)</figcaption>
            </figure>
        </section>

        <section>
            <h2>Dostępne boiska w okolicy</h2>

            <article>
                <header>
                    <h3>Kompleks Boisk Orlik 2012</h3>
                    <p>Typ: Boisko piłkarskie ze sztuczną trawą oraz wielofunkcyjne</p>
                </header>
                <p>Lokalizacja: <address>ul. Juliusza Lea 5, 30-046 Kraków</address></p>
                <p>Oświetlenie: Tak (włączane po zmroku)</p>
                <p>Dostępność: Otwarte bezpłatnie do godziny 22:00</p>
                <p><a href="/game-create?pitch=1">Stwórz ustawkę na tym obiekcie</a></p>
            </article>

            <article>
                <header>
                    <h3>Boisko Wielofunkcyjne Park Krakowski</h3>
                    <p>Typ: Koszykówka (tartan) i strefa street workout</p>
                </header>
                <p>Lokalizacja: <address>Park Krakowski im. Marka Grechuty, Kraków</address></p>
                <p>Oświetlenie: Oświetlenie parkowe</p>
                <p>Dostępność: Dostęp otwarty całodobowo</p>
                <p><a href="/game-create?pitch=2">Stwórz ustawkę na tym obiekcie</a></p>
            </article>

            <article>
                <header>
                    <h3>Korty Tenisowe i Hala Sportowa Błonia</h3>
                    <p>Typ: Korty ceglane oraz parkiet halowy</p>
                </header>
                <p>Lokalizacja: <address>al. Marszałka Ferdinanda Focha 40, 30-119 Kraków</address></p>
                <p>Oświetlenie: Pełne oświetlenie kryte</p>
                <p>Dostępność: Wymagana wcześniejsza rezerwacja obiektu</p>
                <p><a href="/game-create?pitch=3">Stwórz ustawkę na tym obiekcie</a></p>
            </article>
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


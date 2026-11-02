<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars((string) ($pageTitle ?? 'DoGrywka - Ustawienia')) ?></title>
</head>
<body>
    <header>
        <h1>DoGrywka</h1>
        <p>Ustawienia preferencji i konfiguracja konta</p>
    </header>

    <main>
        <section>
            <h2>Preferencje użytkownika</h2>
            <form method="POST" action="/settings">
                <fieldset>
                    <legend>Powiadomienia</legend>

                    <p>
                        <label>
                            <input type="checkbox" name="notify_assistant" value="1" checked>
                            Asystent w rejonie (powiadomienia o nowych ustawkach w pobliżu)
                        </label>
                    </p>

                    <p>
                        <label>
                            <input type="checkbox" name="notify_match_alarm" value="1" checked>
                            Alarm meczowy (ostrzeżenie przed rozpoczęciem meczu, na który jesteś zapisany)
                        </label>
                    </p>
                </fieldset>

                <fieldset>
                    <legend>Rejon i zasięg</legend>

                    <p>
                        <label for="search-radius">Zasięg powiadomień i radaru (w kilometrach):</label>
                        <input type="range" id="search-radius" name="search_radius" min="1" max="30" value="5" step="1">
                    </p>

                    <p>
                        <label for="home-district">Twoja domyślna okolica / dzielnica:</label>
                        <input type="text" id="home-district" name="district" value="Kraków - Krowodrza">
                    </p>
                </fieldset>

                <fieldset>
                    <legend>Konto</legend>

                    <p>
                        <label for="blik-number">Numer telefonu do rozliczeń BLIK (zrzutki na obiekty):</label>
                        <input type="text" id="blik-number" name="blik_number" placeholder="np. 500 123 456" value="501 234 567" required>
                    </p>

                    <p>
                        <button type="submit" name="action" value="save">Zapisz ustawienia</button>
                    </p>

                    <p>
                        <button type="submit" name="action" value="logout" formaction="/logout">Wyloguj się</button>
                    </p>
                </fieldset>
            </form>
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


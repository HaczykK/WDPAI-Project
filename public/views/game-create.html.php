<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars((string) ($pageTitle ?? 'DoGrywka - Stwórz ustawkę')) ?></title>
</head>
<body>
    <header>
        <h1>DoGrywka</h1>
        <p>Stwórz nową ustawkę i zbierz brakujący skład</p>
    </header>

    <main>
        <section>
            <h2>Formularz nowej ustawki</h2>
            <form method="POST" action="/game-create">
                <fieldset>
                    <legend>Dyscyplina i nazwa meczu</legend>

                    <p>
                        <label for="game-title">Tytuł spotkania:</label>
                        <input type="text" id="game-title" name="title" placeholder="np. Szybka piłka nożna 6v6 na Orliku" required>
                    </p>

                    <p>
                        <label for="sport-select">Wybierz dyscyplinę:</label>
                        <select id="sport-select" name="sport" required>
                            <option value="">-- Wybierz z listy --</option>
                            <option value="football">Piłka nożna</option>
                            <option value="basketball">Koszykówka</option>
                            <option value="volleyball">Siatkówka</option>
                            <option value="tennis">Tenis ziemny</option>
                            <option value="handball">Piłka ręczna</option>
                            <option value="running">Bieganie / Lekkoatletyka</option>
                        </select>
                    </p>
                </fieldset>

                <fieldset>
                    <legend>Miejscówka i czas</legend>

                    <p>
                        <label for="pitch-location">Miejscówka (obiekt lub adres):</label>
                        <input type="text" id="pitch-location" name="location" placeholder="np. Orlik przy ul. Reymonta 22" required>
                    </p>

                    <p>
                        <label for="game-time">Termin i godzina rozpoczęcia:</label>
                        <input type="datetime-local" id="game-time" name="datetime" required>
                    </p>
                </fieldset>

                <fieldset>
                    <legend>Limit składu i zrzutka na obiekt</legend>

                    <p>
                        <label for="players-limit">Limit składu (łączna liczba graczy):</label>
                        <input type="number" id="players-limit" name="players_limit" min="2" max="40" value="12" required>
                    </p>

                    <p>
                        <label for="missing-players">Ilu graczy obecnie brakuje:</label>
                        <input type="number" id="missing-players" name="missing_players" min="1" max="40" value="2" required>
                    </p>

                    <p>
                        <label for="fee-amount">Zrzutka na obiekt (kwota w PLN od osoby, 0 jeśli darmowe):</label>
                        <input type="number" id="fee-amount" name="cost_per_person" min="0" step="0.5" value="0" required>
                    </p>

                    <p>
                        <label>
                            <input type="checkbox" name="requires_deposit" value="1">
                            Ustawka płatna (wymagana zrzutka BLIK na wynajem boiska/hali)
                        </label>
                    </p>
                </fieldset>

                <fieldset>
                    <legend>Informacje uzupełniające</legend>

                    <p>
                        <label for="game-description">Opis, wymagania sprzętowe i poziom gry:</label>
                        <textarea id="game-description" name="description" rows="5" cols="40" placeholder="np. Poziom średniozaawansowany, mamy piłkę i znaczniki, szukamy 2 osób do obrony..."></textarea>
                    </p>
                </fieldset>

                <p>
                    <button type="submit">Utwórz i opublikuj ustawkę</button>
                    <button type="reset">Wyczyść formularz</button>
                </p>
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


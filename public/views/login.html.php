<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars((string) ($pageTitle ?? 'DoGrywka - Zaloguj się')) ?></title>
</head>
<body>
    <header>
        <h1>DoGrywka</h1>
        <p>Aplikacja do ustawek sportowych na Twoim rejonie</p>
    </header>

    <main>
        <section>
            <h2>Logowanie do serwisu</h2>
            <form method="POST" action="/login">
                <fieldset>
                    <legend>Dane logowania</legend>

                    <p>
                        <label for="login-field">Adres e-mail lub login:</label>
                        <input type="text" id="login-field" name="login" required autocomplete="username">
                    </p>

                    <p>
                        <label for="password-field">Hasło:</label>
                        <input type="password" id="password-field" name="password" required autocomplete="current-password">
                    </p>

                    <p>
                        <label>
                            <input type="checkbox" name="remember_me" value="1">
                            Zapamiętaj mnie
                        </label>
                    </p>

                    <p>
                        <button type="submit">Zaloguj się</button>
                    </p>
                </fieldset>
            </form>
        </section>

        <section>
            <h2>Nie masz jeszcze konta?</h2>
            <p>Dołącz do lokalnej społeczności sportowej i twórz własne mecze.</p>
            <p>
                <a href="/register">Zarejestruj się w DoGrywce</a>
            </p>
        </section>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> DoGrywka - Wszystkie prawa zastrzeżone.</p>
    </footer>
</body>
</html>


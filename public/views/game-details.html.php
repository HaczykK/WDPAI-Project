<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars((string) ($pageTitle ?? 'DoGrywka - Szczegóły gry')) ?></title>
</head>
<body>
    <header>
        <h1>DoGrywka</h1>
        <nav>
            <a href="/">Strona główna</a>
        </nav>
    </header>

    <main>
        <article>
            <header>
                <h2><?= htmlspecialchars((string) $gameTitle) ?></h2>
                <p>ID ustawki: <?= htmlspecialchars((string) ($id ?? $gameId)) ?></p>
            </header>

            <section>
                <h3>Szczegóły wydarzenia</h3>
                <dl>
                    <dt>Dyscyplina:</dt>
                    <dd><?= htmlspecialchars((string) ($sport ?? 'Piłka nożna')) ?></dd>

                    <dt>Lokalizacja:</dt>
                    <dd><?= htmlspecialchars((string) ($location ?? 'Orlik')) ?></dd>

                    <dt>Data i godzina:</dt>
                    <dd>
                        <time datetime="<?= htmlspecialchars((string) (($date ?? '2026-11-15') . ' ' . ($time ?? '18:00'))) ?>">
                            <?= htmlspecialchars((string) ($date ?? '2026-11-15')) ?>, godz. <?= htmlspecialchars((string) ($time ?? '18:00')) ?>
                        </time>
                    </dd>

                    <dt>Brakujący gracze:</dt>
                    <dd><?= htmlspecialchars((string) $missingPlayers) ?></dd>
                </dl>
            </section>

            <section>
                <h3>Opis</h3>
                <p><?= htmlspecialchars((string) ($description ?? 'Brak opisu.')) ?></p>
            </section>
        </article>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> DoGrywka</p>
    </footer>
</body>
</html>

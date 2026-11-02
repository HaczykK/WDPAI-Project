<?php

declare(strict_types=1);

namespace App\Controller;

final class GameController extends AppController
{
    public function show(int $id): void
    {
        $this->render('game-details', [
            'pageTitle' => 'DoGrywka - Szczegóły gry',
            'id' => $id,
            'gameId' => $id,
            'gameTitle' => 'Piłka nożna - Orlik',
            'missingPlayers' => 2,
            'sport' => 'Piłka nożna',
            'location' => 'Orlik przy ul. Reymonta',
            'date' => '2026-11-15',
            'time' => '18:00',
            'description' => 'Szukamy 2 graczy do gry w piłkę nożną. Poziom rekreacyjny.',
        ]);
    }
}

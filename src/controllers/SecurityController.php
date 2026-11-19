<?php

declare(strict_types=1);

namespace App\Controller;

final class SecurityController extends AppController
{
    public function login(): void
    {
        $this->render('login', [
            'pageTitle' => 'DoGrywka - Zaloguj się',
        ]);
    }

    public function register(): void
    {
        $this->render('register', [
            'pageTitle' => 'DoGrywka - Zarejestruj się',
        ]);
    }
}

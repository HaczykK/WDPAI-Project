<?php

declare(strict_types=1);

namespace App\Controller;

final class SecurityController extends AppController
{
    public function login(): void
    {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->render('login', [
                'pageTitle' => 'DoGrywka - Zaloguj się',
            ]);
            return;
        }

        $login = trim((string) ($_POST['login'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');

        $oldInput = [
            'login' => $login,
        ];

        $errorMessage = $this->validateLogin($login, $password);

        if ($errorMessage !== null) {
            $this->render('login', [
                'pageTitle' => 'DoGrywka - Zaloguj się',
                'errorMessage' => $errorMessage,
                'oldInput' => $oldInput,
            ]);
            return;
        }

        // TODO: weryfikacja użytkownika w PostgreSQL, sesja i przekierowanie na /home w kolejnych commitach
        $this->render('login', [
            'pageTitle' => 'DoGrywka - Zaloguj się',
            'successMessage' => 'Dane są poprawne! Logowanie z bazą i sesją podepniemy w kolejnym etapie.',
            'oldInput' => $oldInput,
        ]);
    }

    private function validateLogin(string $login, string $password): ?string
    {
        if ($login === '') {
            return 'Podaj adres e-mail lub login.';
        }

        if ($password === '') {
            return 'Podaj hasło.';
        }

        return null;
    }

    public function register(): void
    {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->render('register', [
                'pageTitle' => 'DoGrywka - Zarejestruj się',
            ]);
            return;
        }

        $nickname = trim((string) ($_POST['nickname'] ?? ''));
        $email = trim((string) ($_POST['email'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');
        $passwordConfirm = (string) ($_POST['password_confirm'] ?? '');
        $acceptTerms = (string) ($_POST['accept_terms'] ?? '') === '1';

        $oldInput = [
            'nickname' => $nickname,
            'email' => $email,
        ];

        $errorMessage = $this->validateRegistration(
            $nickname,
            $email,
            $password,
            $passwordConfirm,
            $acceptTerms,
        );

        if ($errorMessage !== null) {
            $this->render('register', [
                'pageTitle' => 'DoGrywka - Zarejestruj się',
                'errorMessage' => $errorMessage,
                'oldInput' => $oldInput,
            ]);
            return;
        }

        // TODO: zapis użytkownika do PostgreSQL i przekierowanie na /login w kolejnych commitach
        $this->render('register', [
            'pageTitle' => 'DoGrywka - Zarejestruj się',
            'successMessage' => 'Dane są poprawne! Zapis konta w bazie podepniemy w kolejnym kroku.',
        ]);
    }

    private function validateRegistration(
        string $nickname,
        string $email,
        string $password,
        string $passwordConfirm,
        bool $acceptTerms,
    ): ?string {
        if ($nickname === '' || mb_strlen($nickname) < 3 || mb_strlen($nickname) > 30) {
            return 'Nick musi mieć od 3 do 30 znaków.';
        }

        if (!preg_match('/^[a-zA-Z0-9_]+$/', $nickname)) {
            return 'Nick może zawierać tylko litery, cyfry i podkreślnik (_).';
        }

        if ($email === '' || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            return 'Podaj poprawny adres e-mail.';
        }

        if (mb_strlen($password) < 8) {
            return 'Hasło musi mieć co najmniej 8 znaków.';
        }

        if ($password !== $passwordConfirm) {
            return 'Podane hasła nie są takie same.';
        }

        if (!$acceptTerms) {
            return 'Musisz zaakceptować zasady rejonu i regulamin.';
        }

        return null;
    }
}

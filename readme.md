# DoGrywka ⚽🏀

> **Osiedlowa platforma do organizacji lokalnych ustawek sportowych i rekreacyjnych na orlikach i boiskach.**  
> Projekt realizowany w ramach przedmiotu *Wstęp do aplikacji internetowych* (Semestr V).

---

## 📌 O projekcie

**DoGrywka** to aplikacja webowa ułatwiająca zwoływanie składów na mecze piłki nożnej, koszykówki ulicznej (streetball 3x3), siatkówki oraz lokalnych gier planszowych. Aplikacja łączy klimat miejski/streetwearowy z elementami grywalizacji:

- **Baza gracza:** profil z rangami (np. *Kierownik Orlika*, *Weteran*), poziomem i paskiem postępu punktów XP.
- **Świeże Vlepki:** system zdobywania odznak za frekwencję, punktualność i organizację ustawek (np. *Stały Bywalec*, *Niezawodny Skład*, *Nocna Mara*, *Animator Rejonu*). Aplikacja skupia się na obecności i zbiórkach, bez śledzenia statystyk z samego meczu (bramki, strzały itp.).
- **Ustawki na rejonie:** przeglądanie lokalnych gier, liczby brakujących graczy oraz szybkie dołączanie do meczów.
- **Dark / Light Mode:** pełne wsparcie dla ciemnego i jasnego motywu z zapamiętywaniem preferencji w `localStorage`, obsługą preferencji systemowych (`prefers-color-scheme`) oraz mechanizmem anty-FOUC.
- **Mobile-First Responsive Design:** dolny pasek nawigacji na telefonach, przekształcający się w wygodny pasek boczny (sidebar) na ekranach desktopowych.

---

## 🛠️ Stack technologiczny

- **Backend:** Czysty **PHP 8.3** z `declare(strict_types=1)`
  - Autorska, lekka architektura MVC (bez frameworków typu Laravel/Symfony).
  - Silnik routingu z obsługą parametrów dynamicznych (`App\Routing`).
  - Autoloading klas zgodny z PSR-4 (`composer.json`).
- **Frontend:**
  - Semantyczny **HTML5** i czysty **CSS3** (brak Tailwind/Bootstrap).
  - Układy oparte o Flexbox i CSS Grid.
  - Zmienne CSS (`:root` / `html[data-theme="dark"]`).
  - Dostępność WCAG (obowiązkowy stan `:focus-visible` dla nawigacji klawiaturą).
  - Skrypty w czystym JavaScript (ES6+).
- **Baza danych:** **PostgreSQL 16** (Alpine) obsługiwana przez PDO (`pdo_pgsql`).
- **Infrastruktura (Docker Compose):**
  - `server` – Nginx 1.25 jako HTTP reverse proxy.
  - `php` – PHP 8.3-FPM.
  - `db` – PostgreSQL 16.
  - `pgadmin-wdpai` – webowy interfejs do bazy danych.
  - `mailpit` – testowy serwer pocztowy SMTP z podglądem wiadomości.
  - `ollama` – kontener pod lokalne modele AI.

---

## 🚀 Szybki start (Docker)

### 1. Wymagania
- Zainstalowany [Docker Desktop](https://www.docker.com/) i Docker Compose.

### 2. Uruchomienie aplikacji
W katalogu głównym projektu wykonaj:

```bash
docker compose up --build -d
```

### 3. Dostępne usługi i porty

| Usługa | Adres URL / Port | Opis |
|---|---|---|
| **Aplikacja WWW** | [http://localhost:8080](http://localhost:8080) | Główny adres aplikacji |
| **Ekran logowania** | [http://localhost:8080/login](http://localhost:8080/login) | Formularz logowania i rejestracji |
| **Baza (Dashboard)** | [http://localhost:8080/home](http://localhost:8080/home) | Strona główna z vlepkami i meczami |
| **pgAdmin** | [http://localhost:5050](http://localhost:5050) | Zarządzanie bazą PostgreSQL |
| **Mailpit** | [http://localhost:8025](http://localhost:8025) | Podgląd wysyłanych wiadomości e-mail |
| **PostgreSQL** | `localhost:5433` | Port bazy danych (`wdpai_db` / `wdpai_user`) |

---

## 🗺️ Aktualnie zarejestrowane trasy

- **`/`** oraz **`/login`** – ekran logowania do serwisu (`SecurityController::login`).
- **`/home`** – strona główna / panel gracza z vlepkami i listą ustawek (`DefaultController::index`).
- **`/game/{id}`** – widok szczegółów konkretnej ustawki sportowej (`GameController::show`).
- **Obsługa 404** – dla każdej niezdefiniowanej trasy (`DefaultController::notFound`).

---

## 📁 Struktura katalogów

```text
.
├── docker/                    # Konfiguracja środowiska kontenerowego (Nginx, PHP, Postgres)
├── public/                    # Document root serwera WWW
│   ├── css/style.css          # Style CSS, zmienne motywów, Mobile-First
│   ├── js/theme.js            # Obsługa przełączania motywu (Dark/Light)
│   ├── views/                 # Szablony widoków (*.html.php)
│   │   └── components/        # Współdzielone komponenty (np. nav.html.php)
│   └── index.php              # Front Controller i rejestracja tras
├── src/
│   ├── controllers/           # Kontrolery aplikacji (AppController, Security, Game, Default)
│   └── Routing.php            # Silnik routingu dopasowujący adresy URL
├── .env                       # Zmienne środowiskowe (hasła, porty)
├── composer.json              # Konfiguracja autoloadera PSR-4
├── docker-compose.yaml        # Definicja kontenerów i usług
└── AGENTS.md                  # Wytyczne architektoniczne i konwencje dla agentów AI
```

---

## 💻 Przydatne polecenia deweloperskie

```bash
# Sprawdzenie statusu kontenerów
docker compose ps

# Podgląd logów w czasie rzeczywistym
docker compose logs -f

# Przebudowanie autoloadera Composera po dodaniu nowej klasy
docker compose exec php composer dump-autoload

# Zatrzymanie środowiska
docker compose down
```

# AGENTS.md

Ten plik jest przewodnikiem dla agentow AI pracujacych w tym repozytorium. Przed wprowadzeniem zmian przeczytaj go razem z `README.md` i sprawdz aktualny stan kodu. Nie zakladaj, ze opisana funkcja istnieje, dopoki nie potwierdzisz tego w plikach projektu.

## Cel projektu

To edukacyjna aplikacja webowa „DoGrywka” (organizacja lokalnych ustawek sportowych i rekreacyjnych na osiedlach/orlikach) napisana w czystym PHP 8.3. Korzysta z lekkiej, samodzielnie zaimplementowanej architektury MVC, bez frameworka PHP. Aplikacja dziala w kontenerach Nginx, PHP-FPM i PostgreSQL uruchamianych przez Docker Compose.

Aktualnie aplikacja obsluguje:

- strone glowna (dashboard, vlepki, lista ustawek) pod `/`,
- szczegoly ustawki pod `/game/{id}`,
- odpowiedz 404 dla nieznanych tras.

W katalogu `public/views/` przygotowane sa rowniez szablony kolejnych widokow (`game-create`, `login`, `profile`, `rejon`, `settings`), ktore oczekuja na podpiecie tras i logiki.

## Stack technologiczny

- PHP 8.3 z `declare(strict_types=1)`
- Composer i autoloading PSR-4 (`App\` -> `src/`, `App\Controller\` -> `src/controllers/`)
- Nginx jako serwer HTTP (reverse proxy i serwowanie plikow statycznych)
- PHP-FPM (Alpine) do wykonywania kodu PHP
- PostgreSQL 16 jako relacyjna baza danych (dostep przez PDO `pdo_pgsql`)
- Docker oraz Docker Compose (uslugi: `server`, `php`, `db`, `mailpit`, `pgadmin-wdpai`, `ollama`)
- HTML5 i CSS3 bez frameworka frontendowego (wlasny design system, dark mode, mobile-first, zmienne CSS w `:root`, Flexbox, CSS Grid)

## Struktura katalogow

```text
.
├── docker/
│   ├── db/                    # obraz i inicjalizacja PostgreSQL
│   ├── nginx/                 # obraz i konfiguracja Nginx (nginx.conf)
│   └── php/                   # obraz PHP-FPM (rozszerzenia: pdo_pgsql, gd itp.)
├── public/                    # jedyny publicznie dostepny katalog (document root)
│   ├── css/style.css          # globalne style i zmienne CSS
│   ├── js/                    # skrypty frontendowe (czysty JS)
│   ├── index.php              # front controller i definicje tras
│   └── views/                 # szablony widokow (*.html.php) renderowane przez kontrolery
├── src/
│   ├── controllers/           # kontrolery aplikacji (AppController, DefaultController, GameController)
│   └── Routing.php            # rejestracja i obsluga tras
├── .env                       # konfiguracja zmiennych srodowiskowych i portow
├── composer.json              # konfiguracja autoloadingu PSR-4
├── docker-compose.yaml        # definicje kontenerow i uslug
└── README.md                  # dokumentacja projektu
```

Nie umieszczaj logiki aplikacji ani danych wrazliwych w `public/`. Ten katalog jest document rootem Nginx i sluzy tylko jako punkt wejscia oraz miejsce na widoki i zasoby publiczne (CSS, JS, grafiki).

## Architektura MVC

Projekt stosuje uproszczony przeplyw MVC:

```text
przegladarka
    -> Nginx (:8080)
    -> public/index.php
    -> Routing
    -> Controller
    -> Model / Repozytorium (gdy zostanie dodany dostep do bazy)
    -> View
    -> odpowiedz HTML
```

### Front Controller

`public/index.php` jest jedynym punktem wejscia aplikacji. Laduje autoloader Composera, rejestruje trasy, przekazuje metode HTTP i URI do routera oraz uruchamia widok 404, gdy zadna trasa nie pasuje.

Nowe trasy dodawaj w tym pliku w postaci:

```php
$routing->get('/game/create', GameController::class, 'create');
$routing->post('/login', SecurityController::class, 'login');
```

### Router

`src/Routing.php` laczy metode HTTP i sciezke URL z publiczna metoda kontrolera. Parametry zapisane w klamrach jako `{param}` sa zamieniane na wyrazenie regularne dopasowujace cyfry (`\d+`), konwertowane na `int` i przekazywane do akcji kontrolera przez argumenty.

Przyklad: `/game/{id}` wywoluje `GameController::show(int $id)`.

Router obsluguje obecnie metody GET i POST. Nie dodawaj logiki biznesowej do routera.

### Controller

Kontrolery znajduja sie w `src/controllers/`, uzywaja przestrzeni nazw `App\Controller` i dziedzicza po `AppController`. Ich zadaniem jest:

- odebranie i walidacja danych wejsciowych,
- wywolanie modelu lub serwisu / repozytorium,
- przygotowanie danych dla widoku,
- wybranie szablonu przez `$this->render('nazwa-widoku', $dane)`.

Kontroler powinien byc cienki. Nie umieszczaj w nim zapytan SQL, HTML ani stylow CSS.

### Model

Warstwa Modelu i repozytoriow bazodanowych nie jest jeszcze zaimplementowana w `src/` (dane w kontrolerach sa obecnie mockowane/statyczne). Nie udawaj, ze dane widoczne w widokach pochodza z bazy danych. Gdy funkcja wymaga trwalego przechowywania danych:

- korzystaj z bazy PostgreSQL przez PDO (`pdo_pgsql`),
- wydziel dedykowane klasy modelu i repozytorium zamiast dodawac zapytania SQL do kontrolera.

Dla nowych klas zgodnych z mapowaniem `App\` w Composerze preferuj katalogi i nazwy klas o zgodnej wielkosci liter, np.:

```text
src/Model/Game.php                 -> App\Model\Game
src/Repository/GameRepository.php   -> App\Repository\GameRepository
```

Po dodaniu lub przeniesieniu klas odswiez autoloader poleceniem `composer dump-autoload`.

### View

Widoki znajduja sie w `public/views/` i maja nazwy `*.html.php`. `AppController::render()` przekazuje do nich dane jako zmienne przy uzyciu `extract(..., EXTR_SKIP)`.

Widoki odpowiadaja za prezentacje. Dozwolone sa w nich proste instrukcje warunkowe i petle, ale nie logika biznesowa, dostep do bazy ani obsluga routingu.

Kazda wartosc pochodzaca od uzytkownika lub z bazy musi byc escapowana w kontekscie HTML:

```php
<?= htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8') ?>
```

## Konwencje implementacji

- Zachowuj `declare(strict_types=1)` we wszystkich nowych plikach PHP.
- Uzywaj deklaracji typow parametrow, zwracanych wartosci i wlasciwosci.
- Nazwy klas zapisuj w `PascalCase`, metod i zmiennych w `camelCase`, a plikow widokow w `kebab-case` (`nazwa-widoku.html.php`).
- Nazwy techniczne w kodzie zapisuj po angielsku; tekst interfejsu i domeny (vlepki, ustawki, rejon) po polsku.
- Jeden kontroler powinien obslugiwac jeden spojny obszar aplikacji (np. `GameController`, `SecurityController`).
- Dane przekazuj do widoku jawnie w tablicy drugiego argumentu `render()`.
- Nie tworz globalnego stanu i nie uzywaj `$_GET`, `$_POST`, `$_SESSION` ani `$_SERVER` poza warstwa wejscia/kontrolerem, jezeli dane mozna przekazac jako argument.
- Nie dodawaj frameworka PHP (Laravel, Symfony) ani bibliotek frontendowych (Bootstrap, Tailwind, React, Vue) bez wyraznej potrzeby i zgody uzytkownika.
- Style CSS organizuj w `public/css/style.css` z uzyciem zmiennych z `:root`, zasad Mobile-First oraz obowiazkowego stanu `:focus-visible`.
- Sekrety umieszczaj w `.env`; nigdy nie commituj hasel, tokenow ani danych dostepowych.
- Nie edytuj `vendor/` recznie.
- Zachowuj zakres zadania i nie zmieniaj niezwiązanych plikow.

## Dodawanie nowej funkcji

Typowy porzadek prac:

1. Dodaj trase w `public/index.php`.
2. Dodaj albo rozszerz kontroler w `src/controllers/`.
3. Dodaj model, repozytorium lub serwis w `src/`, jesli funkcja zawiera logike biznesowa albo dostep do danych PostgreSQL.
4. Dodaj lub dostosuj widok w `public/views/` i przekaz do niego tylko potrzebne dane.
5. Dodaj lub zmien style w `public/css/style.css`.
6. Sprawdz poprawna trase, dane wejsciowe, HTML oraz zachowanie dla bledow i 404.

## Uruchamianie projektu

```bash
docker compose up --build -d
```

Aplikacja jest domyslnie dostepna pod `http://localhost:8080`. Port mozna zmienic przez zmienna `APP_PORT` w `.env`.

Uslugi towarzyszace w srodowisku:
- **pgAdmin**: `http://localhost:5050`
- **Mailpit**: `http://localhost:8025`
- **PostgreSQL**: port `5433` (domyslna baza `wdpai_db`, uzytkownik `wdpai_user`)

Przydatne polecenia:

```bash
docker compose ps
docker compose logs -f
docker compose exec php php -l src/Routing.php
docker compose exec php composer dump-autoload
docker compose down
```

Jesli katalog `vendor/` nie istnieje lub zaktualizowano `composer.json`, zainstaluj zaleznosci:

```bash
docker compose exec php composer install
```

## Weryfikacja zmian

W projekcie nie ma obecnie skonfigurowanego zestawu testow automatycznych ani narzedzia do formatowania. Po zmianie:

- uruchom `php -l` dla kazdego zmienionego pliku PHP,
- sprawdz `composer dump-autoload`, jezeli zmieniales klasy lub namespace,
- uruchom kontenery i sprawdz zmienione endpointy w przegladarce,
- sprawdz przypadek poprawny, bledne dane oraz nieistniejaca trase (404),
- upewnij sie, ze logi `docker compose logs` nie zawieraja nowych bledow (PHP Fatal, PDOException, Nginx 502),
- nie twierdz, ze testy przeszly, jezeli ich faktycznie nie uruchomiono.

## Zasady dla agentow AI

- Najpierw przeczytaj pliki bezposrednio zwiazane z zadaniem i potwierdz aktualna implementacje.
- Przed edycja sprawdz `git status`; zachowaj zmiany uzytkownika i nie cofaj ich.
- Wprowadzaj najmniejsza spojna zmiane realizujaca wymaganie.
- Utrzymuj rozdzial odpowiedzialnosci MVC.
- Nie rozszerzaj zakresu zadania o refaktoryzacje, migracje lub nowe zaleznosci bez uzasadnienia.
- Jesli wymaganie jest niejednoznaczne, wybierz rozwiazanie zgodne z istniejacymi wzorcami; pytaj tylko wtedy, gdy wybor istotnie zmieni zachowanie aplikacji.
- Po zakonczeniu opisz zmienione pliki oraz wykonana weryfikacje.

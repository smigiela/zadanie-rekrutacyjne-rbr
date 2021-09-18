# Zadanie Grupa RBR <img src="https://www.gruparbr.pl/wp-content/uploads/2020/11/cropped-logo_gruparbr_logo.png" alt="grupa rbr" width="120">

Proszę napisać aplikację webową w języku **PHP** (z użyciem frameworka Laravel) za pomocą cyklicznego skryptu (raz dziennie),
który będzie pobierać dane z API (linki są podane poniżej) użytkowników oraz ich postów i końcowo aktualizować je w bazie danych **MySQL**.

API do użycia w zadaniu rekrutacyjnym:
- Users: https://jsonplaceholder.typicode.com/users
- Posts: https://jsonplaceholder.typicode.com/posts

Listę treści postów wraz z przypisanym do niego autorem wyświetl w widoku w postaci tabeli.
Dodatkowo proszę przedstawić na wykresie najbardziej aktywnych użytkowników z ostatnich 7 dni.

Rozwiązane zadanie proszę wrzucić na zdalne repozytorium **git** i podać do niego link.
Rozwiązanie proszę odesłać na następujący adres e-mail rekrutacja@gruparbr.pl

Prosze wykonać zadanie w ciągu 4 dni od momentu dostarczenia wiadomości.

W razie pytań, proszę się zgłaszać do nas poprzez adres email:
[rekrutacja@gruparbr.pl](mailto:rekrutacja@gruparbr.pl).

----

# Rozwiązanie by Daniel Śmigiela

Aplikacja zgodnie z wymaganiami pobiera raz dziennie (o północy) listę użytkowników oraz listę postów ze wskazanych endpointów a następnie sprawdza czy w bazie danych są zapisane te rekordy - 
sprawdzanie odbywa się na podstawie ID obiektu w pobranym JSONie - jeśli obiekt istnieje lokalnie to zostanie zaktualizowany, jeśli nie, to zostanie utworzony.

Chciałem odwzorować strukturę danych z JSON'a dlatego użytkownik jest w relacji z adresem, firmą i postami, adres w relacji ze współrzędnymi.

Dla pobrania danych z API i zapisywania w bazie danych utworzyłem osobną warstwę - **service** - aby odseparować logikę od kontrolerów.

Rozszerzyłem delikatnie zakres widoków - poza listą postów wyświetlam również listę użytkowników (gdzie m.in. znajduje się wymagany wykres aktywności użytkowników) oraz widok szczegółów jednego użytkownika, gdzie na widok wyciągam relacje (adres, firma).

Aby odpalić projekt lokalnie należy:

1. Klonujemy repo ```git clone https://github.com/smigiela/zadanie-rekrutacyjne-rbr.git```
2. Przechodzimy do katalogu z aplikacją```cd zadanie-rekrutacyjne-rbr```
3. Instalujemy zależności```composer install```
4. Dodajemy joby do kolejki ```php artisan schedule:run```
5. Uruchamiamy kolejkę ```php artisan queue:work```


Doinstalowane paczki:

- "laraveldaily/laravel-charts": "^0.1.25"
- "doctrine/dbal": "^3.1",

Na froncie użyłem Bootstrap 4 (ładowany z CDN razem z jQuery i popper.js), natomiast paczka laravel-charts używa chart.js pod spodem.


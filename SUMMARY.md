# Podsumowanie moich prac nad zadaniem:

## poprawki
    ✅ Poprawa docker-compose.yaml - dodałem port na którym kontener wystawia aplikcję - bez tego aplikacja nie byłaby dostępna spoza kontenera
    ✅ Podpiąłem skrypt contact.php do submit formularza - dzięki temu wysyła się poprawnie formularz.
    ✅ Security:
        - pobieram tylko określone pola
        - usuwam niebezpieczne znaki
        - sprawdzam długość pól
        - sprawdzam poprawność przesłanych danych także na serwerze - nie tylko w formularzu
    ✅ Poprawiłem responsywność
        - dostosowałem skalowanie interfejsu w sekcji head
        - dostosowałem wielkość czcionek
        - dostosowałem wielkość przycisku nadając mu minimalną szerokość
        - poprawiłem specyficzność styli mobile - tak by nadpisywały te globalne

## ⚠️ Znalezione kolejne naprawione problemy 
    ✅ A11y & SEO: Strona nie ma tytułu (title) 
    ✅ A11y: Brak wskazania do którego inputa jest dany label (brak for).
    ✅ A11y: Za małe przestrzenie pomiędzy kontrolkami co pogarsza dostępność.
    ✅ A11y: Za niski kontrast na przycisku. Zmieniłem kolor tekstu.
    ✅ Performence: Duży obraz tła który długo się ładuje. Poprawiłem to zastępując obrazek gradientem.
    ✅ A11y: Za mały input na wiadomość - zmieniłem na 5 wierszy.

## ⚠️ Uwagi do zadania
    - Nie znalazłm mechanizmu który kompilowałby kod SCSS do CSS więc operowałem na CSS. Prawdopodobnie nie trudno byłoby dodać jakiś kompilator.
    - Piękna czcionka ❤️

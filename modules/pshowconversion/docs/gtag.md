# Google Tag - gtag.js

Moduł wysyła zdarzenia do zdefiniowanych wg konfiguracji modułu usług Google.

## Zdarzenia wysyłane do usług Google

Zdarzenia są wysyłane zgodnie z dokumentacją: https://developers.google.com/tag-platform/gtagjs/reference/events

### Lista wysłanych zdarzeń
- view_item_list - użytkownik widzi listę przedmiotów/ofert
- select_item - użytkownik wybiera pozycję z listy
- view_item - użytkownik wyświetla pozycję
- add_to_cart - użytkownik dodaje produkty do koszyka
- remove_from_cart - użytkownik usuwa produkty z koszyka
- view_cart - użytkownik przegląda swój koszyk
- begin_checkout - użytkownik rozpoczyna realizację zakupu
- add_payment_info - użytkownik wybiera informacje dotyczące płatności
- add_shipping_info - użytkownik wybiera informacje o wysyłce
- purchase - użytkownik finalizuje zakup

## Duplikacja danych

Duplikaty danych (np. transakcji) powstają gdy do jednej usługi Google są wysyłane dane z wielu miejsc.
Mogą to być różne moduły zainstalowane w Twoim sklepie lub nieprawidłowa konfiguracja modułu lub usług.
W przypadku tego pierwszego, należy przejrzeć sklep i odinstalować inne moduły wysyłające dane do Google.
Gdy to już zostanie zweryfikowane, należy przyjrzeć się konfiguracji modułu i usług Google.
Najczęstszą przyczyną duplikacji transakcji w GA4 jest wysyłanie zamówień z modułu poprzez Measurement Protocol
i dodatkowo wysyłanie ich z GTM - w takim przypadku zalecane jest wyłączenie lub modyfikacja tagu w GTM.
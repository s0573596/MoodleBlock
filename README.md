# Custom Moodle Block: Wing Block

## Funktion

- google search API als moodle block
- zeigt sucht Ergebnisse für 'Moodle Blocks' an

## Doku

- Ubuntu VM auf DigitalOcean erstellt(Connection mit SSH)
 Fail2ban auf dem VM installieren um SSH conection zu verwalten

- SSL Zertifikat mit python3-certbot-nginx für domain 

- Moodle installieren mit Hilfe von Nginx, Postgresql 13, PHP8.0(und erweiterungen von PHP8.0)
 Nginx ist Host auf IP addresse von DigitalOcean 
 Moodle Daten werden in Datenbank gespeichert
 PHP ist Skriptsprache für Nginx und Moodle

- hier ein neuen Moodle Block erstellt für eigene Funktion
 mit Google Search API ergebnisse vom Internet abholen(raw Json)
 mit json_decode kann man content besser lesen
 block kann man mit css style verschönen

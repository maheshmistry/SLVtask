# SLVtask

## Anforderungen
  - docker
  - docker-compose

## Zu laufender Prozess
  - ``` sudo docker-compose up --build ```
  - http://localhost:8080/ im Browser öffnen.
  - Aktivieren Sie das Kontrollkästchen und laden Sie die Datendatei hoch. Sie erhalten eine Meldung zur Bestätigung.
  - Deaktivieren Sie das Kontrollkästchen und laden Sie die Datendatei hoch, um die vorhandenen Daten zu aktualisieren. Sie erhalten eine Warnung zur Bestätigung.

## Daten in MySQL prüfen

  Führen Sie die folgenden Befehle aus, um die in der Datenbank gespeicherten Daten zu sehen.

  - ``` docker exec -it mysql8-container bash ```
  - ``` mysql -u root -p ``` 
  - Geben Sie das Passwort ein: 'geheim'
  - ``` use slv-table; ```
  - ``` select * from dataitems; ```

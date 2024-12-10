<?php
use Dotenv\Dotenv;

// Stelle sicher, dass die .env-Datei korrekt geladen wird
$dotenv = Dotenv::createImmutable(__DIR__ . '/../'); // Pfad zur .env-Datei
$dotenv->load(); // Lädt die .env-Variablen

// Überprüfen, ob die Umgebungsvariablen geladen wurden
echo "DB_HOST: " . getenv('DB_HOST') . "<br>";
echo "DB_NAME: " . getenv('DB_NAME') . "<br>";
echo "DB_USER: " . getenv('DB_USER') . "<br>";
echo "DB_PASS: " . getenv('DB_PASS') . "<br>";

// Rückgabe der Umgebungsvariablen
return [
    'DB_HOST' => getenv('DB_HOST'),
    'DB_NAME' => getenv('DB_NAME'),
    'DB_USER' => getenv('DB_USER'),
    'DB_PASS' => getenv('DB_PASS'),
];

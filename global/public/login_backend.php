<?php
session_start();
include_once('../shared/config.php'); // Konfiguration einbinden

// Überprüfen, ob die Umgebungsvariablen korrekt geladen wurden
echo "DB_HOST: " . getenv('DB_HOST') . "<br>";
echo "DB_NAME: " . getenv('DB_NAME') . "<br>";
echo "DB_USER: " . getenv('DB_USER') . "<br>";
echo "DB_PASS: " . getenv('DB_PASS') . "<br>";

// Hole die Datenbank-Konfiguration
$config = include('../../shared/config.php');

// PDO-Datenbankverbindung herstellen
try {
    $pdo = new PDO(
        "pgsql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_NAME'),
        getenv('DB_USER'),
        getenv('DB_PASS')
    );
    // Setze den PDO-Fehlermodus auf Ausnahme
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
}

// Hier geht es weiter mit deinem Login-Prozess
if (isset($_POST['email']) && isset($_POST['passwort'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];

    // Überprüfe den Benutzer in der Datenbank
    $stmt = $pdo->prepare("SELECT * FROM benutzer WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $benutzer = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($benutzer && password_verify($passwort, $benutzer['passwort'])) {
        // Benutzer gefunden und Passwort stimmt überein
        $_SESSION['user_id'] = $benutzer['id'];
        $_SESSION['name'] = $benutzer['name'];
        // Weiterleitung zur richtigen Kunden-Datenbank und Bereich
        header('Location: /kunden/' . $benutzer['weiterleitung']);
        exit();
    } else {
        // Fehler: Benutzer nicht gefunden oder Passwort falsch
        echo "Ungültige Anmeldedaten.";
    }
}
?>

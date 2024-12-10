<?php

error_reporting(E_ALL);    // Alle Fehler anzeigen
ini_set('display_errors', 1);  // Fehler direkt im Browser anzeigen
// Die verfügbaren Sprachen
$languages = ['de' => 'Deutsch', 'en' => 'Englisch', 'fr' => 'Französisch', 'it' => 'Italienisch'];

// Sprachcode aus der URL oder Session erhalten
$lang = $_GET['lang'] ?? 'de';  // Standard ist Deutsch

// Funktion für KI-Übersetzungen (externes API für Übersetzungen)
function translate($text, $targetLang) {
    // Hier könnte eine API wie Google Translate verwendet werden
    // Wir simulieren eine KI-Übersetzungsfunktion
    $translations = [
        'Login' => ['de' => 'Login', 'en' => 'Login', 'fr' => 'Connexion', 'it' => 'Accesso'],
        'E-Mail' => ['de' => 'E-Mail', 'en' => 'E-Mail', 'fr' => 'E-mail', 'it' => 'E-mail'],
        'Passwort' => ['de' => 'Passwort', 'en' => 'Password', 'fr' => 'Mot de passe', 'it' => 'Password'],
        'Sprache' => ['de' => 'Sprache', 'en' => 'Language', 'fr' => 'Langue', 'it' => 'Lingua'],
        'Einloggen' => ['de' => 'Einloggen', 'en' => 'Login', 'fr' => 'Se connecter', 'it' => 'Accedi']
    ];

    return $translations[$text][$targetLang] ?? $text;
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo translate('Login', $lang); ?></title>
</head>
<body>
    <h1><?php echo translate('Login', $lang); ?></h1>

    <form method="POST" action="login_backend.php">
        <label for="email"><?php echo translate('E-Mail', $lang); ?>:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password"><?php echo translate('Passwort', $lang); ?>:</label>
        <input type="password" name="password" id="password" required><br><br>

        <label for="language"><?php echo translate('Sprache', $lang); ?>:</label>
        <select name="language" id="language">
            <?php foreach ($languages as $code => $name): ?>
                <option value="<?php echo $code; ?>" <?php echo ($code == $lang) ? 'selected' : ''; ?>><?php echo $name; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit"><?php echo translate('Einloggen', $lang); ?></button>
    </form>

    <br>
    <!-- Weiterleitung zur Sprachwahl -->
    <a href="?lang=de">Deutsch</a> | <a href="?lang=en">English</a> | <a href="?lang=fr">Français</a> | <a href="?lang=it">Italiano</a>
</body>
</html>

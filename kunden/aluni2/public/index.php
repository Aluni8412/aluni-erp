<?php
// Start der Session, um Benutzerdaten oder Sprachwahl zu speichern (optional)
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Willkommen auf Aluni2</title>
</head>
<body>
    <h1>Willkommen auf Aluni2</h1>
    <p>Herzlich willkommen auf der Aluni Plattform. Du bist erfolgreich eingeloggt.</p>

    <?php
    // Optional: Benutzername anzeigen, wenn er aus der Session geladen wurde
    if (isset($_SESSION['name'])) {
        echo "<p>Hallo, " . htmlspecialchars($_SESSION['name']) . "!</p>";
    }
    ?>

</body>
</html>


<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Inscription - Erreur</title>
</head>
<body>
    <h1>Erreur d'inscription</h1>
    <?php
    if (isset($_SESSION['registration_errors'])) {
        foreach ($_SESSION['registration_errors'] as $error) {
            echo "<p>Erreur : $error</p>";
        }
    }
    unset($_SESSION['registration_errors']); // Clear the errors after displaying
    ?>
    <a href="register.php">Retour au formulaire d'inscription</a>
</body>
</html>

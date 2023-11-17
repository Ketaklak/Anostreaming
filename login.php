<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - AnoStream</title>
<link rel="stylesheet" type="text/css" href="css/login_style.css" />
</head>
<body>

    <!-- Logo and Styled Form Container -->
    <div class="login-container">
<div class="logo"></div>
        <div class="form-box">
 <form action="login_submit.php" method="post">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <label>
            <input type="checkbox" name="remember_me"> Rester connecté
        </label>
        <button type="submit">Se connecter</button>
    </form>
        </div>
    </div>
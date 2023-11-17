<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - AnoStream</title>
<link rel="stylesheet" type="text/css" href="css/register_style.css" />
</head>
<body>

    <!-- Logo and Styled Form Container -->
    <div class="login-container">
<div class="logo"></div>
        <div class="form-box">
 <form action="register_submit.php" method="post">
        
        <input type="text" name="new_username" placeholder="Créer un nom d'utilisateur" required>
        <input type="email" name="email" class="form-control" placeholder="Adresse e-mail" required>
        <input type="text" name="password" placeholder="Mot de passe" required>
        <label>
             
        </label>
        
        <input type="password" name="new_password" placeholder="Mot de passe" required>
        <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
        <button type="submit">S'inscrire</button>
</button>
    </form>
        </div>
    </div>
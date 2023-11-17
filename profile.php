<?php
session_start(); 
if (!isset($_SESSION["id"])) {
    exit;
}



    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
}?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil Utilisateur - AnoStream</title>
</head>
<body>
    <h1>Profil de l'utilisateur</h1>
    <!-- Ici, affichez et permettez la modification des informations de l'utilisateur -->

    <a href="logout.php">Déconnexion</a>

    <h2>Votre Profil</h2>
    <p>Nom de profil : [Nom_Profil]</p>
    <p>Date de création du compte : [Date_Creation]</p>
    <div>
        <h3>Photo de profil</h3>
        <img src="[Chemin_Photo_Profil]" alt="Photo de profil">
        <form action="upload_profile_picture.php" method="post" enctype="multipart/form-data">
            Changer la photo de profil :
            <input type="file" name="profile_picture" required>
            <button type="submit">Télécharger</button>
        </form>
    </div>
    <div>
        <h3>Changer de mot de passe</h3>
        <form action="change_password.php" method="post">
            Nouveau mot de passe :
            <input type="password" name="new_password" required>
            Confirmer le nouveau mot de passe :
            <input type="password" name="confirm_new_password" required>
            <button type="submit">Changer</button>
        </form>
    </div>
    <div>
        <h3>Changer d'adresse e-mail</h3>
        <form action="change_email.php" method="post">
            Nouvelle adresse e-mail :
            <input type="email" name="new_email" required>
            <button type="submit">Changer</button>
        </form>
    </div>
</body>
</html>
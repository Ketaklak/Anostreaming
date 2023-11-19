
<?php
session_start();

// Inclure le fichier de configuration pour la connexion à la base de données
require_once 'includes/config.php';

// Début du code de débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Récupération et affichage des informations de l'utilisateur
try {
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
        throw new Exception('ID utilisateur non défini dans la session.');
    }
    
    $user_id = $_SESSION['id'];
    $stmt = $pdo->prepare("SELECT username, created_at FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user) {
        throw new Exception('Aucun utilisateur trouvé avec l"ID: ' . $user_id);
    }
    
    // Mise à jour de la date de dernière connexion
    $update_stmt = $pdo->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
    $update_stmt->execute([$user_id]);
} catch (Exception $e) {
    error_log('Erreur lors de la récupération des informations utilisateur: ' . $e->getMessage());
    echo 'Erreur lors de la récupération des informations utilisateur: ' . $e->getMessage();
    exit;
}
?>
<?php
require_once 'includes/config.php'; // Assuming the database connection is handled here
try {
    $user_id = $_SESSION['id']; // Utilisation de l'ID de l'utilisateur stocké dans la session
    $stmt = $pdo->prepare("SELECT username, created_at FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Mise à jour de la date de dernière connexion
    $update_stmt = $pdo->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
    $update_stmt->execute([$user_id]);
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
    exit;
}

if (!isset($_SESSION["id"])) {
    exit;
}



    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
}?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="UTF-8">
    <title>Profil Utilisateur - AnoStream</title>
</head>
<body>
    <!-- Menu déroulant centré -->
    <div style="text-align: center;">
        <div class="dropdown" style="display: inline-block;">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
                <a href="dashboard.php">Retour</a>
                <a href="logout.php">Se déconnecter</a>
                <a href="dmca.php">DMCA</a>
            </div>
        </div>
    </div>

<div class="profile-container">
    <div class="profile-header"><h1>Profil de l'utilisateur</h1></div>
<div class="profile-content">
    <!-- Ici, affichez et permettez la modification des informations de l'utilisateur -->

    <a href="logout.php">Déconnexion</a>

    <h2>Votre Profil</h2>



    <p>Nom de profil : <?php echo htmlspecialchars($user['username']); ?></p>
    <p>Date de création du compte : <?php echo htmlspecialchars($user['created_at']); ?></p>
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
</div>
</div>

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



if (isset($_SESSION['user_id'])):
    
    $navigation_links = '<a href="profile.php">Profil</a><a href="logout.php">Déconnexion</a>';
else:
    
    $navigation_links = '<a href="register.php">Inscription</a><a href="login.php">Connexion</a>';
endif;
?>
<nav>
    <?php echo $navigation_links; ?>
</nav>

<nav>
            <a href="register.php">Inscription</a>
            <a href="login.php" >Connexion</a>
        </nav>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AnoStream</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="dashboard-nav">
    <!-- Display different links based on whether the user is logged in -->
    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]): ?>
        <a href="profile.php" class="nav-link">Profil</a>
        <a href="logout.php" class="nav-link">Déconnexion</a>
    <?php else: ?>
        <a href="login.php" class="nav-link">Connexion</a>
        <a href="register.php" class="nav-link">Inscription</a>
    <?php endif; ?>
</nav>

    <header>
        <!-- Contenu de l'en-tête (navigation, logo, etc.) -->
    </header>
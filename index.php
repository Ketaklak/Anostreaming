<?php session_start(); ?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AnoStream - Accueil</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="window-effect"></div>
    <header>
        
    </header>

    <section class="hero-section">
        <h1><img src="media/img/logo.png" alt="AnoStream Logo">
<div class="welcome">Bienvenue sur AnoStream</div></h1>
        <p>Découvrez des films et des séries passionnants.</p>

    <!-- Corrected Styled Login and Register Buttons -->
    <div style='text-align: center; margin: 20px;'>
        <a href='login.php' style='text-decoration: none;'>
            <button style='padding: 10px 20px; border: none; border-radius: 20px;
                           background-image: linear-gradient(to right, #0f2027, #203a43, #2c5364);
                           color: white; font-size: 16px; cursor: pointer; margin: 10px;
                           transition: all 0.3s ease;'>Login</button>
        </a>
        <a href='register.php' style='text-decoration: none;'>
            <button style='padding: 10px 20px; border: none; border-radius: 20px;
                           background-image: linear-gradient(to right, #0f2027, #203a43, #2c5364);
                           color: white; font-size: 16px; cursor: pointer; margin: 10px;
                           transition: all 0.3s ease;'>Register</button>
        </a>
    </div>
            <!-- Vous pouvez ajouter ici un carrousel d'images ou une grande image de couverture -->
    </section>

        <!-- Styled Login and Register Buttons -->
        </div>
        
    <section class="content-section">

    <script>
        document.getElementById('loginButton').addEventListener('click', function() {
            document.getElementById('loginPopup').style.display = 'block';
        });

        document.getElementById('closePopup').addEventListener('click', function() {
            document.getElementById('loginPopup').style.display = 'none';
        });
    </script>

    <?php include 'footer.php'; ?>
</body>
</html>
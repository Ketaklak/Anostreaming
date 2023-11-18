
<?php
include_once 'includes/config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['new_username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $hashed_password]);

    header("Location: login.php?success=registration_complete");
    exit;
}
?>

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
            <form action="register.php" method="post">
                <input type="text" name="new_username" placeholder="Créer un nom d'utilisateur" required>
                <input type="email" name="email" placeholder="Adresse email" required>
                <input type="password" name="password" placeholder="Créer un mot de passe" required>
                <button type="submit">S'inscrire</button>
            </form>
        </div>
    </div>
</body>
</html>

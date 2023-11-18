
<?php
include_once 'includes/config.php'; 

session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);

    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($password, $user['password'])) {
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $user['id'];
            $_SESSION["username"] = $user['username'];

            if ($remember_me) {
                setcookie("loggedin", true, time() + (86400 * 30), "/"); // 30 days expiration
            }

            header("Location: dashboard.php");
            exit;
        }
    }
    $error = 'Identifiants incorrects';
}
?>

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
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <div class="remember-me">
                    <input type="checkbox" name="remember_me" id="remember_me">
                    <label for="remember_me">Rester connecté</label>
                </div>
                <button type="submit">Connexion</button>
            </form>
            <?php if (!empty($error)): ?>
                <p class="error"><?= $error ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

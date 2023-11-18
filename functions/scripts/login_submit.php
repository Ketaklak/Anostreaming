<?php
include_once 'includes/config.php'; 

session_start(); 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);

    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
        if (password_verify($password, $user['password'])) {
            
            session_start();
            
            
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $user['id'];
            $_SESSION["username"] = $user['username'];
            
            
            header("Location: dashboard.php");
            exit;
        }
    }
    
    header("Location: login.php?error=invalid_credentials");
    exit;
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        
        header('Location: index.php');
        exit;
    } else {
        
        $error = 'Identifiants incorrects';
        
        header('Location: login.php?error=' . urlencode($error));
        exit;
    }
}
?>

<!-- Le reste du fichier login_submit.php... -->
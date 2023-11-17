
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require_once 'config.php'; // Include the database configuration file

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_email'])) {
    $new_email = trim($_POST['new_email']);
    
    // Validate the new email
    if (!filter_var($new_email, FILTER_VALIDATE_EMAIL) || strlen($new_email) > 100) {
        $_SESSION['email_update_error'] = 'Invalid email format.';
        header('Location: profile.php');
        exit;
    }
    
    // Check if the new email is already taken
    $sql = "SELECT id FROM users WHERE email = ?";
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->execute([$new_email]);
        if ($stmt->rowCount() > 0) {
            $_SESSION['email_update_error'] = 'This email is already taken.';
            header('Location: profile.php');
            exit;
        }
    }
    
    // Update the email in the database
    $userid = $_SESSION['id']; // Assuming session contains user ID
    $update_sql = "UPDATE users SET email = ? WHERE id = ?";
    if ($update_stmt = $pdo->prepare($update_sql)) {
        if ($update_stmt->execute([$new_email, $userid])) {
            $_SESSION['email_update_success'] = 'Email updated successfully.';
        } else {
            $_SESSION['email_update_error'] = 'There was an error updating your email.';
        }
    } else {
        $_SESSION['email_update_error'] = 'There was an error preparing the update statement.';
    }
    
    header('Location: profile.php');
    exit;
}
?>

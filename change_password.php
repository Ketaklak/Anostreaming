
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require_once 'config.php'; // Include the database configuration file

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['old_password'], $_POST['new_password'], $_POST['confirm_password'])) {
    $old_password = trim($_POST['old_password']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    // Validate the old password, check if the new passwords match
    // Fetch the current password from the database
    $userid = $_SESSION['id']; // Assuming session contains user ID
    $sql = "SELECT password FROM users WHERE id = ?";
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->execute([$userid]);
        $current_password = $stmt->fetchColumn();
        if (password_verify($old_password, $current_password)) {
            if ($new_password == $confirm_password) {
                // Hash the new password and update it in the database
                $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $update_sql = "UPDATE users SET password = ? WHERE id = ?";
                if ($update_stmt = $pdo->prepare($update_sql)) {
                    if ($update_stmt->execute([$new_password_hash, $userid])) {
                        // Redirect to profile page with success message
                        $_SESSION['password_update_success'] = 'Password updated successfully.';
                    } else {
                        // Handle error during password update
                        $_SESSION['password_update_error'] = 'There was an error updating your password.';
                    }
                }
            } else {
                // New passwords do not match
                $_SESSION['password_update_error'] = 'New passwords do not match.';
            }
        } else {
            // Old password does not match
            $_SESSION['password_update_error'] = 'Your current password is incorrect.';
        }
    } else {
        // Handle error during password fetch
        $_SESSION['password_update_error'] = 'There was an error fetching your current password.';
    }
    // Redirect back to profile page with error message
    header('Location: profile.php');
    exit;
}
?>

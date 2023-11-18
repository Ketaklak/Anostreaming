
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require_once 'config.php'; // Include the database configuration file

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture'])) {
    $profile_picture = $_FILES['profile_picture'];
    
    // Validate and process the uploaded image file
    $fileType = pathinfo($profile_picture['name'], PATHINFO_EXTENSION);
    $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
    
    if (in_array(strtolower($fileType), $allowedTypes)) {
        if ($profile_picture['error'] === 0) {
            if ($profile_picture['size'] <= 1000000) { // Allow only files smaller than 1MB
                $new_filename = uniqid('', true) . '.' . $fileType;
                $file_destination = '{$profile_picture_upload_dir}' . $new_filename;
                
                if (move_uploaded_file($profile_picture['tmp_name'], $file_destination)) {
                    // Update the profile picture path in the database
                    $userid = $_SESSION['id']; // Assuming session contains user ID
                    $sql = "UPDATE users SET profile_picture = ? WHERE id = ?";
                    
                    if ($stmt = $pdo->prepare($sql)) {
                        $stmt->execute([$new_filename, $userid]);
                        
                        // Redirect to profile page with success message
                        $_SESSION['profile_update_success'] = 'Profile picture updated successfully.';
                        header('Location: profile.php');
                        exit;
                    }
                } else {
                    // Handle error during file upload
                    $_SESSION['profile_update_error'] = 'There was an error uploading your file.';
                }
            } else {
                // File too large
                $_SESSION['profile_update_error'] = 'Your file is too large.';
            }
        } else {
            // Error in the uploaded file
            $_SESSION['profile_update_error'] = 'There was an error with your file.';
        }
    } else {
        // Invalid file type
        $_SESSION['profile_update_error'] = 'Invalid file type.';
    }
    
    // Redirect back to profile page with error message
    header('Location: profile.php');
    exit;
}
?>

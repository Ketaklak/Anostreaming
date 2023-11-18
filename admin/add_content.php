
<?php
// Include database configuration
include_once '../includes/config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $type = $_POST['type'];
    $title = $_POST['title'];
    // ... Additional form data ...

    // Check for file upload
    if (isset($_FILES['cover_image_file']) && $_FILES['cover_image_file']['error'] == UPLOAD_ERR_OK) {
        // Handle file upload
        // ... File upload logic ...
    } elseif (!empty($_POST['cover_image_url'])) {
        // Use the cover image URL provided
        $cover_image = $_POST['cover_image_url'];
    } else {
        // No cover image provided
        $cover_image = '';
    }

    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO movies (type, title, cover_image) VALUES (?, ?, ?)");
    // Execute SQL statement
    if ($stmt->execute([$type, $title, $cover_image])) {
        echo 'Content has been added successfully.';
    } else {
        echo 'There was an error adding the content.';
    }
}
?>

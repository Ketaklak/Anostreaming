
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/config.php');

function displayContent($pdo, $table) {
    $query = "SELECT * FROM $table";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    echo "<div class='content-bandeau'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='content-item'>";
        echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
        
    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
    if (!empty($row['cover_image'])) {
        echo "<img src='" . htmlspecialchars($row['cover_image']) . "' alt='Cover Image' style='max-width: 200px; height: auto;'>";
    }

        echo "</div>";
    }
    echo "</div>";
}

?>

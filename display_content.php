
<?php
include('includes/config.php');

function displayContent($conn, $table) {
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);

    echo "<div class='content-bandeau'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='content-item'>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";
        echo "</div>";
    }
    echo "</div>";
}

echo "<div class='content-wrapper'>";
echo "<h1>Films</h1>";
displayContent($conn, 'movies');
echo "<h1>Séries</h1>";
displayContent($conn, 'series');
echo "</div>";
?>

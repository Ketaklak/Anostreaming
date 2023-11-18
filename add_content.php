
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('includes/config.php');

    $title = $_POST['title'];
    $description = $_POST['description'];
    $release_year = $_POST['release_year'];
    $table = $_POST['type'] == 'movie' ? 'movies' : 'series';

    $query = "INSERT INTO $table (title, description, release_year) VALUES ('$title', '$description', '$release_year')";
    mysqli_query($conn, $query);
}
?>

<form method="post" action="">
    Type: <select name="type"><option value="movie">Film</option><option value="series">Série</option></select><br>
    Titre: <input type="text" name="title"><br>
    Description: <textarea name="description"></textarea><br>
    Année: <input type="text" name="release_year"><br>
    <input type="submit" value="Ajouter">
</form>

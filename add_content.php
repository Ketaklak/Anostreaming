
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

// Vérifier si un fichier a été uploadé
if (isset($_FILES['cover_image_file']['error']) && $_FILES['cover_image_file']['error'] === UPLOAD_ERR_OK) {
    // Le fichier a été uploadé correctement
    $file_tmp_path = $_FILES['cover_image_file']['tmp_name'];
    $file_name = $_FILES['cover_image_file']['name'];
    $file_size = $_FILES['cover_image_file']['size'];
    $file_type = $_FILES['cover_image_file']['type'];
    $target_file_path = 'uploads/media/' . basename($file_name);
    
    move_uploaded_file($file_tmp_path, $target_file_path);
    $cover_image = $target_file_path;
} elseif (!empty($_POST['cover_image'])) {
    // Utiliser l'image de couverture fournie par URL
    $cover_image = $_POST['cover_image'];
} else {
    // Aucune image de couverture fournie
    $cover_image = '';
}

// Ajouter la colonne cover_image à la requête d'insertion
$query .= ", cover_image";
$values .= ", ?";
$array_params[] = $cover_image;

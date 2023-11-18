
<?php
include('includes/config.php'); // Assurez-vous que ce fichier pointe vers votre configuration réelle de base de données

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des valeurs du formulaire
    $title = $_POST['title'];
    $description = $_POST['description'];
    $release_year = $_POST['release_year'];
    $type = $_POST['type'];

    // Préparation de la requête SQL en fonction du type de contenu
    $table = $type == 'movie' ? 'movies' : 'series';
    $query = "INSERT INTO $table (title, description, release_year, type) VALUES (?, ?, ?, ?)";

    // Préparation et exécution de la requête
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title, $description, $release_year, $type]);

    // Redirection ou affichage d'un message de succès
    echo "Contenu ajouté avec succès !";
}

// Formulaire d'ajout de contenu
echo '<h2>Ajouter un Film/Série</h2>
      <form method="post" action="">
          <label for="type">Type:</label>
          <select name="type" id="type">
              <option value="movie">Film</option>
              <option value="series">Série</option>
          </select><br>
          <label for="title">Titre:</label>
          <input type="text" name="title" id="title"><br>
          <label for="description">Description:</label>
          <textarea name="description" id="description"></textarea><br>
          <label for="release_year">Année de sortie:</label>
          <input type="text" name="release_year" id="release_year"><br>
          <input type="submit" value="Ajouter">
      
    <label for="external_link">Lien externe :</label>
    <input type="text" id="external_link" name="external_link" placeholder="http://..."><br>
    <input type="submit" value="Ajouter">

    <label for="cover_image_url">Lien de l'image de couverture :</label>
    <input type="text" name="cover_image_url" id="cover_image_url"><br>
    <label for="cover_image_file">Ou téléchargez une image de couverture :</label>
    <input type="file" name="cover_image_file" id="cover_image_file"><br>
    <input type="submit" value="Ajouter">
</form>

';
?>


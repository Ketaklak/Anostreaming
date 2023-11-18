
<form method="post" enctype="multipart/form-data" action="">
    <h2>Ajouter un Film/Série</h2>
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
    <label for="external_link">Lien externe :</label>
    <input type="text" name="external_link" id="external_link"><br>
    <label for="cover_image_url">URL de l'image de couverture :</label>
    <input type="text" name="cover_image_url" id="cover_image_url"><br>
    <label for="cover_image_file">Télécharger une image de couverture :</label>
    <input type="file" name="cover_image_file" id="cover_image_file"><br>
    <input type="submit" value="Ajouter le film/série">
</form>


<?php
include('header.php');
include('includes/config.php');

function displayAdminContentForm() {
    return '
        <h2>Ajouter un Film/Série</h2>
        <form method="post" action="add_content.php">
            Type: <select name="type"><option value="movie">Film</option><option value="series">Série</option></select><br>
            Titre: <input type="text" name="title"><br>
            Description: <textarea name="description"></textarea><br>
            Année: <input type="text" name="release_year"><br>
            <input type="submit" value="Ajouter">
        </form>
    ';
}

echo displayAdminContentForm();
include('footer.php');
?>

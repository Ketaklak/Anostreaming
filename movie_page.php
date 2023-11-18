
<?php
// Affichage des erreurs pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('includes/config.php'); // Inclure le fichier de configuration de la base de données

// Récupérer l'identifiant du film depuis la requête
$movie_id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($movie_id) {
    $stmt = $pdo->prepare("SELECT * FROM movies WHERE id = ?");
    $stmt->execute([$movie_id]);
    $movie = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($movie) {
        echo "<h1>" . htmlspecialchars($movie['title']) . "</h1>";
        echo "<p>" . htmlspecialchars($movie['description']) . "</p>";
        if ($movie['external_link']) {
            // Incorporer le lecteur vidéo uniquement si un lien externe est fourni
            echo "<video controls width='100%'>
                    <source src='" . htmlspecialchars($movie['external_link']) . "' type='video/mp4'>
                    Votre navigateur ne prend pas en charge les balises vidéo.
                  </video>";
        }
    } else {
        echo "Film introuvable.";
    }
} else {
    echo "Aucun identifiant de film fourni.";
}
include('footer.php'); // Inclure le pied de page du site
?>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('header.php');
include('includes/config.php'); // Assurez-vous que ce fichier pointe vers votre configuration réelle de base de données
include('functions/scripts/display_content.php'); // Inclure le fichier qui affiche le contenu


if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

echo "<h1>Welcome to the Dashboard</h1>";
echo "<a href='logout.php'>Logout</a> | <a href='profile.php'>Profile</a>";
// Appeler la fonction displayContent pour afficher les films et les séries
displayContent($pdo, 'movies');
displayContent($pdo, 'series');
include('footer.php');
?>

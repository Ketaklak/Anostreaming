<title>AnoStream - Dashboard</title>
<?php include 'header.php'; ?>
<link rel="stylesheet" href="css/dashboard_style.css">

<?php
session_start();


if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}


echo "<h1>Welcome to the Dashboard</h1>";
echo "<a href='logout.php'>Logout</a> | <a href='profile.php'>Profile</a>";
echo "<div class='movies'>Movies list...</div>";
echo "<div class='series'>Series list...</div>";
?>
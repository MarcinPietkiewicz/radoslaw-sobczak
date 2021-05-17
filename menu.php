<?php session_start(); 
if(!isset($_SESSION['Username'])){
header("location:login.php");
exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel edycji</title>
  <link rel="stylesheet" href="assets/edit.css">

</head>
<body>
  <div class="menu">
    <div id="title">Menu edycji</div>
        <nav id="navigation">
            <a href="change-concerts.php">Program koncertów</a>
            <a href="change-contact.php">Dane kontaktowe</a>
            <a href="change-bio.php">Biografia</a>
        </nav>
    <div id="exit-buttons">
        <a class="button" href="index.php">Strona główna</a>
        <a id="exit" href="logout.php">Wyloguj...</a>
    </div>
</div>
</body>
</html>
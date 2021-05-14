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
  <div class="kontener">
    <div id="title">Wybierz element do edycji:</div>
    <br><br>
    <nav>
    <ul>
    <li><a href="change-concerts.php">Program koncertów</a></li>
    <li><a href="change-contact.php">Dane kontaktowe</a></li>
    <li><a href="change-bio.php">Biografia</a></li>
    </ul>
</nav>
</div>
<a class="button" href="logout.php">Wyloguj...</a></div>
<a class="button" href="index.php">Strona główna</a></div>

</body>
</html>
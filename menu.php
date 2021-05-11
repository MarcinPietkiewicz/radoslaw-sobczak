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
  <link rel="stylesheet" href="assets/all.min.css" />
  <link rel="stylesheet" href="assets/mystyle.css" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <div class="kontener">
    <div id="title">Wybierz element do edycji:</div>
    <br><br>
    <nav>
    <ul>
    <li><a href="change-concerts.php">Program koncertów</a></li>
    <li><a href="change-contact.php">Dane kontaktowe</a></li>
    <li><a href="change-bio.php">Bio</a></li>
    </ul>
</nav>
</div>
<div class="under"><a class="button" href="logout.php">Wyloguj...</a></div>

  <?php
    include 'protected/functions.php'; 
    if (array_key_exists('read_dir', $_POST)) {
    } else if (array_key_exists('change', $_POST)) {
      write_file();
      send_confirmation_email();
    } else if (array_key_exists('read_selected_file', $_POST)) {
      read_selected_file();
    } 
    ?>
</body>
</html>
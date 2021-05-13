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
  <title>Edytuj program koncertów</title>
  <link rel="stylesheet" href="assets/mystyle.css" type="text/css" />
  <link rel="stylesheet" href="assets/all.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <div class="kontener">
    <div id="title">Edytuj kontakty:</div>
    <br>
    <?php include 'protected/functions.php' ?>
    <?php include 'protected/password.php' ?>

    <!-- change contents form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="contacts" style="color:white;">Wersja - <?php read_file_name('contact'); ?></label><br><br>
    <textarea style="width:100%" id="contacts" name="contacts" rows="12" cols="60"><?php
      read_file('contact');
      ?></textarea><br>
     
      <label style="color:white;" for="email">Email zapisu zmian:</label>
      <input id="email" name="email" type="text" value="<?php echo $second_email ?>" readonly />
      <label style="color:white;" for="changeEmail">Zmień email: </label>
      <input type="checkbox" id="changeEmail" />

      <input style="width:100%;" type="submit" name="change" class="button" value="Zapisz zmiany i wyślij potwierdzenie mejlem" /><br>
    </form>
    <form method="post">
      <br><input type="submit" name="read_dir" class="button" value="Odśwież listę plików i wczytaj najnowszą wersję" /> <br>
      <select id="filenames" name="filenames">
        <option value="">Wybierz z listy...</option>
        <?php
        read_directory_to_option_list('contact');
        ?>
      </select>
      <input type="submit" name="read_selected_file" class="button" value="Wczytaj" /><br><br>
    </form>
    <a class="button" href="logout.php">Wyloguj...</a>
    <a class="button" href="menu.php">Powrót do menu</a>
    <br><br>
    <?php
    if (array_key_exists('read_dir', $_POST)) {
    } else if (array_key_exists('change', $_POST)) {
      write_file('contact','contacts');
      change_secondary_email_in_pass_file('email');
      send_confirmation_email('contacts');
    } else if (array_key_exists('read_selected_file', $_POST)) {
      read_selected_file();
    } 
    ?>
  </div>
  <script src="assets/myscript.js"></script>
</body>
</html>
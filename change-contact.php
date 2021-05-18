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
  <title>Edycja kontaktów</title>
  <link rel="stylesheet" href="assets/edit.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <div class="menu edit">
    <div id="edit-title">Edycja kontaktów</div>
    <?php include 'protected/functions.php' ?>
    <?php include 'protected/password.php' ?>
    <div id="version">Wersja - <?php read_file_name('contact'); ?></div>
    <form id="refresh-form" method="post">
         <div id="loading-options">
            <input id="submit-list" type="submit" name="read_dir" class="button" value="Odśwież i wczytaj najnowszą wersję" /> 
            <div id="lub"> lub </div>
            <select id="filenames" name="filenames">
            <option value="">wybierz plik z listy</option>
            <?php
            read_directory_to_option_list('contact');
            ?>
            </select>
            <input type="submit" name="read_selected_file" class="button" id="read-file" value="i wczytaj go" /><br><br>
        </div>
    </form>
    
    <div id="info-text">
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
    <form id="edit-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <textarea id="change-area" id="contacts" name="contacts" rows="12" cols="60"><?php
      read_file('contact');
      ?></textarea>

      <div id="conf">
        <div id="button-cover">
          <input type="checkbox" id="changeEmail" />
          <label for="changeEmail">Zmień email potwierdzeń</label>
        </div>
        <input id="email" name="email" type="text" value="<?php echo $second_email ?>" readonly />
      </div>
        <input id="email-change-confirm" type="submit" name="change" class="button" value="Zapisz i wyślij emaila" />
    </form>
  <div id="edit-exit-buttons">
    <a target=_blank href="index.php">Sprawdź wygląd strony</a>
    <a href="logout.php">Wyloguj...</a>
    <a href="menu.php">Powrót do menu</a>
  </div>
    
  </div>
  <script src="assets/myscript.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biography - show biography</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<h3>before</h3>
<?php include 'protected/functions.php' ?>

<!-- change contents form -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<label for="concerts">Concerts:</label><br>
  <textarea id="concerts" name="concerts" rows="30" cols="60"><?php
    read_file();
    ?></textarea><br>
  <input type="submit" name="change" class="button" value="Zapisz zmiany" />
</form>

<form method="post">
  <br><input type="submit" name="read_dir"
   class="button" value="Odśwież listę plików" /> <br>
   <select id="filenames" name="filenames">
   <option value="">Wybierz z listy...</option>
   <?php
    read_directory_to_option_list();
   ?>
   </select>
   <input type="submit" name="read_selected_file" class="button" value="Wczytaj" />
</form>

<?php
  if(array_key_exists('read_dir', $_POST)){ 
      read_directory(); 
  }
  else if(array_key_exists('change', $_POST)){
    write_file();
  }
  else if(array_key_exists('read_selected_file', $_POST)){
    read_selected_file($file);
  } 
?> 
<h4>after</h4>

</body>
</html>
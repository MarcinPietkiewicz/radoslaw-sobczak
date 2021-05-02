<?php session_start(); 
if(!isset($_SESSION['Username'])){
header("location:login.php");
exit;
}
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  echo 'php mailer is used';
  if (isset($_POST['submit'])){
    echo 'if is set php mailer is used';

    require 'protected/PHPMailer/PHPMailer.php';
    require 'protected/PHPMailer/SMTP.php';
    require 'protected/PHPMailer/Exception.php';
    // try {
        date_default_timezone_set("Europe/Warsaw");
        $mail = new PHPMailer;
        $mail->Host = "s30.ehost.pl";
        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";
        $mail->CharSet = 'UTF-8';
        $mail->Username = "update@radoslawsobczak.com";
        $mail->Password = "Radzio1";
        $mail->isHTML(true);
        $mail->setFrom('update@radoslawsobczak.com');
        $mail->addAddress('pietkiewiczm@o2.pl');
        $mail->addReplyTo('update@radoslawsobczak.com');
        $mail->Subject = 'Strona radoslawsobczak.com pomyślnie zaktualizowana!';
        $mail->Body = '<p>testing '.$_POST['fName'].' '.$_POST['lName'].',</p>';
        $mail->send();
        sleep(1);
        header('Location: http://www.radoslawsobczak.com/test2');
    // }
    // catch (Exception $e) {
    //     header('Location: http://www.radoslawsobczak.com/test2/error.php');
    // }
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
    <div id="title">Edytuj program koncertów:</div>
    <br>
    <?php include 'protected/functions.php' ?>

    <!-- change contents form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <label for="concerts" style="color:white;">Wersja - <?php read_file_name(); ?></label><br><br>
      <textarea id="concerts" name="concerts" rows="30" cols="60"><?php
                                                                  read_file();
                                                                  ?></textarea><br>
      <input type="submit" name="change" class="button" value="Zapisz zmiany" />
    </form>

    <form method="post">
      <br><input type="submit" name="read_dir" class="button" value="Odśwież listę plików i wczytaj najnowszą wersję" /> <br>
      <select id="filenames" name="filenames">
        <option value="">Wybierz z listy...</option>
        <?php
        read_directory_to_option_list();
        ?>
      </select>
      <input type="submit" name="read_selected_file" class="button" value="Wczytaj" /><br><br>
    </form>
    <a class="button" href="logout.php">Wyloguj...</a>
    <br><br>
    <?php
    if (array_key_exists('read_dir', $_POST)) {
    } else if (array_key_exists('change', $_POST)) {
      write_file();
    } else if (array_key_exists('read_selected_file', $_POST)) {
      read_selected_file();
    } 
    ?>
  </div>
</body>

</html>
<?php 
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
// read files from catalog to option list
function read_directory_to_option_list($catalog = 'concerts') {
  // $files = scandir('protected/concerts');
  $files = scandir('protected/'.$catalog);
  // ommit . and .. from catalog items and display only 8 most recent files
  $arr_length = count($files);
  if ($arr_length>10){
  $files = array_slice($files, -9, $arr_length);
  }
  else {
    $files = array_slice($files, 2, $arr_length);
  }
  $files = array_reverse($files);
  $file_name_filter = "/\d{14}\.txt/";
  foreach($files as $value)
  {
  if (preg_match($file_name_filter, $value))
  {
    $value_shown = change_file_datename_to_date($value);
    echo "<option value='$value'>", $value_shown, "</option>", PHP_EOL; 
  }
  } 
}
// read file contents
function read_file($catalog = 'concerts') {
$selected_value = $_POST['filenames'];
if ($selected_value == ''){
  // read newest file per timestamp name
  $files = scandir('protected/'.$catalog, 1);
  $contents = file_get_contents('protected/'.$catalog.'/'.$files[0]);
  $contents = mb_convert_encoding($contents, 'HTML-ENTITIES', "UTF-8");
  echo $contents;
  }
  else {
  $path = 'protected/'.$catalog.'/'.$selected_value;
  $contents = file_get_contents($path);
  echo $contents;
  }
}
// read loaded file name
function read_file_name($catalog = 'concerts') {
  $selected_value = $_POST['filenames'];
  if ($selected_value == ''){
    // read newest file per timestamp name
    $files = scandir('protected/'.$catalog, 1);
    $file_date_time = change_file_datename_to_date($files[0]).' <b>(najnowsza wersja)</b>';
    echo $file_date_time;
    }
    else {
    $file_date_time = change_file_datename_to_date($selected_value);
    echo $file_date_time;
    }
  }
// helper function to convert datehour txt file name to date and hour for display
function change_file_datename_to_date($file_name) {
    $value_shown = substr($file_name, 0, 4)."-".substr($file_name, 4, 2)."-".substr($file_name, 6, 2)." ".substr($file_name, 8, 2).":".substr($file_name, 10, 2).":".substr($file_name, 12, 2);
    return $value_shown;
}
// write form contents in a txt file with date/hour as a filename
function write_file($catalog, $input) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $current_date_hour_filename = date("YmdHis").".txt";
  $new_file = fopen('protected/'.$catalog.'/'.$current_date_hour_filename, "w");
  $data = $_POST[$input];
  fwrite($new_file, $data);
  fclose($new_file);
  echo "<br><br>Nowa wersja została zapisana do pliku - ".($current_date_hour_filename)." i dodana do strony głównej!";
}}
// read file contents from selected option menu
function read_selected_file(){
  $selected_value = $_POST['filenames'];
  if (empty($selected_value))
  {
    echo 'Error... file not found, loaded newest version to the text area...<br>Please choose a file from the list.';
  }
  else {
    echo 'Found and loaded the file: '.$selected_value.' - everything is ok!:<br>';
  }
}
//secure login to edit website
function move_to_edit() {
  if (array_key_exists('move_me', $_POST)) {
    header('Location: http://www.example.com/');
  }
}
// read most current file contents to modal
function read_file_to_concert_modal($catalog = 'concerts') {
    // read newest file per timestamp name
    $files = scandir('protected/'.$catalog, 1);
    $contents = file_get_contents('protected/'.$catalog.'/'.$files[0]);
    $contents = mb_convert_encoding($contents, 'HTML-ENTITIES', "UTF-8");
    $sections = preg_split('/\R{2}/', $contents);
    foreach ($sections as $section)
    {
      $lines = preg_split('/\R/', $section); 
      $counter = 0;
      foreach ($lines as $line)
      {
        if ($counter == 0)
        {
          echo '<p><b>'.$line.'</b></p>';
          $counter++;
          continue;
        }
        echo $line.'<br>';
      }
      echo '<br>';

    }
  }
// convert events file text to html
function convert_events_text_to_html($obj) {
  $html = '';
  $text = preg_split('/\R{2}/', $obj);
  foreach ($text as $event)
  {
    $lines = preg_split('/\R/', $event); 
    $counter = 0;
    foreach ($lines as $line)
    {
      if ($counter == 0)
      {
        $html .= '<p><b>'.$line.'</b></p>';
        $counter++;
        continue;
      }
      $html .= $line.'<br>';
    }
  }
  return $html;
}
// send confirmation email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function send_confirmation_email($catalog = '') {
  require 'password.php';
  $html = convert_events_text_to_html($_POST[$catalog]);
  try {
      date_default_timezone_set("Europe/Warsaw");
      $mail = new PHPMailer;
      $mail->Host = $email_host;
      $mail->SMTPAuth = "true";
      $mail->SMTPSecure = "tls";
      $mail->Port = "587";
      $mail->CharSet = 'UTF-8';
      $mail->Username = $email_username;
      $mail->Password = $email_password;
      $mail->isHTML(true);
      $mail->setFrom($email_username);
      $mail->addAddress($email_to);
      $mail->addReplyTo($email_username);
      $mail->Subject = 'Strona radoslawsobczak.com pomyślnie zaktualizowana!';
      $mail->Body = '<p>Potwierdzenie dokonanych zmian na stronie:</p>'.$html.'<br><br><p>---------------------<br>Zmiany pomyślnie zapisane na serwerze.</p>';
      $mail->send();
      sleep(1);
    }
        catch (Exception $e) {
        header('Location: http://www.radoslawsobczak.com/test2/error.php');
    }
  }


function html_bio_from_txt_file($language = '', $catalog = 'bio'){
  // read newest file per timestamp name
  $files = scandir('protected/'.$catalog, 1);
  $contents = file_get_contents('protected/'.$catalog.'/'.$files[0]);
  $contents = mb_convert_encoding($contents, 'HTML-ENTITIES', "UTF-8");
  
  $sections = preg_split('/\R{2}/', $contents);
  echo '<br>';
  foreach ($sections as $section)
  {
    $lines = preg_split('/\R/', $section); 
    $languagetxt = '#'.$language."#";
    if ($lines[0] == $languagetxt){
      $counter = 0;
      foreach ($lines as $line)
      {
        if ($counter == 0){
        $counter++;
        continue;
        }
        if ($counter == 1)
        {
          echo '<h1>'.$line.'</h1>';
          $counter++;
          continue;
        }
        echo '<p>'.$line.'</p>';
      }
    }
  }
  echo '<br>';
}











?>
<?php 
// read files from catalog to option list
function read_directory_to_option_list() {
  $files = scandir('protected/concerts');
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
function read_file() {
$selected_value = $_POST['filenames'];
if ($selected_value == ''){
  // read newest file per timestamp name
  $files = scandir('protected/concerts', 1);
  $contents = file_get_contents('protected/concerts/'.$files[0]);
  echo $contents;
  }
  else {
  $path = 'protected/concerts/'.$selected_value;
  $contents = file_get_contents($path);
  echo $contents;
  }
}

// read loaded file name
function read_file_name() {
  $selected_value = $_POST['filenames'];
  if ($selected_value == ''){
    // read newest file per timestamp name
    $files = scandir('protected/concerts', 1);
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
function write_file() {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $current_date_hour_filename = date("YmdHis").".txt";
  $new_file = fopen('protected/concerts/'.$current_date_hour_filename, "w");
  $data = $_POST["concerts"];
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
    // echo "<script>location.replace('protected/change.php')</script>";
    header('Location: http://www.example.com/');
  }
}
// read most current file contents to modal
function read_newest_file_to_modal() {
    // read newest file per timestamp name
    $files = scandir('protected/concerts', 1);
    $contents = file_get_contents('protected/concerts/'.$files[0]);
    $concerts = preg_split('/\R{2}/', $contents);
    foreach ($concerts as $concert)
    {
      $lines = preg_split('/\R/', $concert); 
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
?>
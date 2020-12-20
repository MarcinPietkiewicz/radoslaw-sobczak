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
    $value_shown = substr($value, 0, 4)."-".substr($value, 4, 2)."-".substr($value, 6, 2)." ".substr($value, 8, 2).":".substr($value, 10, 2).":".substr($value, 12, 2);
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
// write form contents in a txt file with date/hour as a name
function write_file() {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $current_date_hour_filename = date("YmdHis").".txt";
  $new_file = fopen('protected/concerts/'.$current_date_hour_filename, "w");
  $data .= $_POST["concerts"];
  fwrite($new_file, $data);
  fclose($new_file);
  echo "<br><br>Nowa wersja została zapisana do pliku - ".($current_date_hour_filename)." i dodana do strony głównej!";
}}
// read file contents from select option menu
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
}
?>


<?php 
include 'protected/password.php';
session_start();
if(isset($_POST['Submit'])){
$logins = array($login_name => $login_pass);

$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

if (isset($logins[$Username]) && $logins[$Username] == $Password){
$_SESSION['Username']=$logins[$Username];
header("location:menu.php");
exit;
} else {
$msg="<span>Nieprawidłowy login lub hasło</span>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/edit.css">
    <title>Login</title>
</head>
<body>
<form action="" method="post" name="Login_Form">
  <div class="menu login">
    <div id="login-title" >Login</div>
    <div class="log-item">
        <label for="Username">Nazwa </label>
    <input name="Username" id="Username" type="text" class="Input">
    </div>
<div class="log-item">
    <label for="Password">Hasło </label>
<input name="Password" id="Password" type="password" class="Input">
</div>
<div id="optional-text"><?php echo $msg;?></div>
<input id="login-btn" name="Submit" type="submit" value="Login">
</form>
    <div id="exit-buttons">
        <a class="button" href="index.php">Powrót do strony głównej</a>
    </div>
</div>
</body>
</html>
<?php session_start();
if(isset($_POST['Submit'])){
$logins = array('Alex' => '123456');

$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

if (isset($logins[$Username]) && $logins[$Username] == $Password){
$_SESSION['Username']=$logins[$Username];
header("location:edit.php");
exit;
} else {
$msg="<span style='color:red'>Nieprawidłowe hasło</span>";
}
}
?>

<form action="" method="post" name="Login_Form">
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="2" align="center" valign="top"><h3>Login</h3></td>
    </tr>
    <tr>
      <td align="right" valign="top">Nazwa użytkownika</td>
      <td><input name="Username" type="text" class="Input"></td>
    </tr>
    <tr>
      <td align="right">Hasło</td>
      <td><input name="Password" type="password" class="Input"></td>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" value="Login"></td>
      </form>
      </tr>
      <tr>
      <td> </td>
      <td><form action="index.php" method="post"><input type="submit" value="Powrót do strony głównej"></form></td>
    </tr>
  </table>

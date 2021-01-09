<?php session_start(); 
if(!isset($_SESSION['Username'])){
header("location:login.php");
exit;
}
?>
Hello <?php echo $_SESSION['Userdata']['Username'];?> <br>
Congratulations! You have logged into password protected page. <a href="logout.php">Click here</a> to Logout.
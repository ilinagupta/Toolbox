
<?php
session_start();
session_destroy(); // Is Used To Destroy All Sessions
//Or
if(isset($_SESSION['login_user']))
unset($_SESSION['login_user']);  //Is Used To Destroy Specified Session
header("location: index.php"); 

?>
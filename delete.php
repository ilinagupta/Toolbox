<?php
session_start();
$connection = mysql_connect("127.0.0.1", "root", "");
if (!$connection){
  die("Connection failed: ". mysql_error());
}
$fname = $_SESSION['login_fname'];

mysql_select_db("company",$connection);
if(isset($_POST['delete_id'])) {
  $delete_id = mysql_real_escape_string($_POST['delete_id']);
  $sql = "DELETE FROM `" . $fname . "`". "WHERE `id` = $delete_id";
  $retval4 = mysql_query($sql, $connection);
     if(! $retval4 )
   {
      die('Could not delete data: ' . mysql_error());
   }
   
   echo "Deleted data successfully\n";
   $_SESSION['cart_delete'] = 1;

  //mysql_query("DELETE FROM `" . $fname . "`". "WHERE `id` = $delete_id");
  //$_SESSION['abc'] = NULL;
  header('Location: cart.php');
}
?>
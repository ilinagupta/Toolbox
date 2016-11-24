<?php
//session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Email or Password is invalid";
echo $error;
}
else
{
// Define $username and $password
$email=$_POST['email'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("127.0.0.1", "root", "");
// To protect MySQL injection for Security purpose
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("company",$connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from register where password='$password' AND email='$email'", $connection);
$rows = mysql_num_rows($query);





while($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
  $fname = $row['fname'];
  
 
}

if ($rows == 1) {
	
	

$_SESSION['login_user']=$email; // Initializing Session

$_SESSION['login_fname']=$fname;

$_SESSION['show_modal']=NULL;

//header("location: profile.php"); // Redirecting To Other Page

//echo "Hello $fname";
} else {
	$_SESSION['show_modal']=true;
$error = "Email or Password is invalid";

echo $error;
}
mysql_close($connection); // Closing Connection

}
}
?>





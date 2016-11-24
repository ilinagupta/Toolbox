<?php
session_start();
if(isset($_SESSION['registered'])){
	$_SESSION['login_user']=$_SESSION['registered'];
}

include('login.php'); // Includes Login Script

//if(isset($_SESSION['login_user'])){
//header("location: profile.php");
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
    hr {
    border: 0;
    padding: 0;
    height: 2px;
    background: #333;
    background-image: linear-gradient(to right, #ccc, #333, #ccc);
}
  .carousel-caption{
    color:black;
}
.carousel-indicators li {
  background-color: gray;
}
.carousel-indicators .active {
  background-color: black;
}
   .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
     
      display: block;
      max-width: 30%;
      height: 400px;
      margin: auto;
  }
  </style>
</head>
<body>

<?php
include("header.php");
?>



<br><br><br>
<center><strong><h3>POPULAR PRODUCTS</h3></strong></center>




<?php
include("demo.php");
?>

<?php
include("modal.html");
?>



</body>
</html>
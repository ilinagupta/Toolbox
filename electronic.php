<?php
session_start();
include('login.php'); // Includes Login Script
//session_start();
//if(isset($_SESSION['login_user'])){
//header("location: profile.php");
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Electronic Components</title>
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
    .panel{
width: 80%;
         
  }
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
     
     display: block;
      max-width: 20%;
      height: 250px;
      margin: auto;

  }
 
  </style>
</head>
<body>

<?php
include("header.php");
?>



<br><br><br>

<h3 class="container">Electronic Components</h3>
<hr>
<div class="container well">

<div class="row">
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=7"><img src="images/electronic/e1.jpg" alt="Black" width="250" height="250"></a><br>IN4007 Diode<br><b>Rs 2000</b></div></center></div>
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=8"><img src="images/electronic/e2.jpg" alt="Blue" width="250" height="250"></a><br>LED Display Module For Arduino <br><b>Rs 1500</b></div></center></div>
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=9"><img src="images/electronic/e3.jpg" alt="Red" width="250" height="250"></a><br>555 Timer IC <br><b>Rs 3000</b></div></center></div>
  </div>
</div>



<h3 class="container"></h3>
<div class="container well">

<div class="row">
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=10"><img src="images/electronic/e4.jpg" alt="Blue" width="250" height="250"></a><br>Digital Power Amplifier Board <br><b>Rs 1500</b></div></center></div>
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=11"><img src="images/electronic/e5.jpg" alt="Red" width="250" height="250"></a><br>NPN - Transistor<br><b>Rs 3000</b></div></center></div>
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=12"><img src="images/electronic/e6.jpg" alt="Black" width="250" height="250"></a><br>20MHz Crystal Oscillators<br><b>Rs 2000</b></div></center></div>
  </div>
</div>



<?php
include("modal.html");
?>


</body>
</html>

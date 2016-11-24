<?php


session_start();
include('login.php'); // Includes Login Script
//if(isset($_SESSION['login_user'])){
//header("location: profile.php");
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Machines and Measuring Devices</title>
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

<h3 class="container">Machines</h3>
<hr>
<div class="container well">

<div class="row">
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=25"><img src="images/md/mac1.jpg" alt="Black" width="250" height="250"></a><br>Lathe Machine<br><b>Rs 2000</b></div></center></div>
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=26"><img src="images/md/mac2.jpg" alt="Blue" width="250" height="250"></a><br>Alpha 13 mm Electric Drill<br><b>Rs 1500</b></div></center></div>
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=27"><img src="images/md/mac3.jpg" alt="Red" width="250" height="250"></a><br>Delta AC Motor Drive<br><b>Rs 3000</b></div></center></div>
  </div>
</div>



<h3 class="container">Measuring Devices</h3>
<hr>
<div class="container well">

<div class="row">
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=28"><img src="images/md/md1.jpg" alt="Blue" width="250" height="250"></a><br>Aerospace Digimatic Vernier Caliper<br><b>Rs 1500</b></div></center></div>
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=29"><img src="images/md/md2.jpg" alt="Red" width="250" height="250"></a><br>YX360TR Analogue Multimeter<br><b>Rs 3000</b></div></center></div>
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=30"><img src="images/md/md3.jpg" alt="Black" width="250" height="250"></a><br>Temperature Humidity Meter <br><b>Rs 2000</b></div></center></div>
  </div>
</div>





<?php
include("modal.html");
?>

</body>
</html>

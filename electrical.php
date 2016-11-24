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
  <title>Electrical Components</title>
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

<h3 class="container">Electrical Components</h3>
<hr>
<div class="container well">

<div class="row">
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=1"><img src="images/electrical/ee1.jpg" alt="Black" width="250" height="250"></a><br>Assorted Color Wheel Inductor Kit<br><b>Rs 2000</b></div></center></div>
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=2"><img src="images/electrical/ee2.jpg" alt="Blue" width="250" height="250"></a><br>High Power Wirewound Rheostat<br><b>Rs 1500</b></div></center></div>
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=3"><img src="images/electrical/ee3.jpg" alt="Red" width="250" height="250"></a><br>Master Control Switch <br><b>Rs 3000</b></div></center></div>
  </div>
</div>


<h3 class="container"></h3>
<div class="container well">

<div class="row">
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=4"><img src="images/electrical/ee4.jpg" alt="Blue" width="250" height="250"></a><br>Instrument Transformer<br><b>Rs 1500</b></div></center></div>
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=5"><img src="images/electrical/ee5.jpg" alt="Red" width="250" height="250"></a><br>Jumper Wire Ribbon Cable<br><b>Rs 3000</b></div></center></div>
    <div class="col-sm-4"><center><div class="panel panel-default"><a href="prodesc.php?abc=6"><img src="images/electrical/ee6.jpg" alt="Black" width="250" height="250"></a><br>Surface Mounting Socket<br><b>Rs 2000</b></div></center></div>
  </div>
</div>


<?php
include("modal.html");
?>


</body>
</html>

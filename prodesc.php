<?php


session_start();

//if(!isset($_SESSION['login_user'])){
  //$_SESSION['show_modal']=true;
//}

include('login.php'); // Includes Login Script
if (isset($_GET['abc'])) {
$_SESSION['abc'] = $_GET['abc'];
}
//$_GET['abc'] = NULL;
//if(isset($_SESSION['login_user'])){
//header("location: profile.php");
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product Specifications</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
  hr {
    border: 0;
    height: 1px;
    background: #333;
    background-image: linear-gradient(to right, #ccc, #333, #ccc);
}

h6{
  padding:0;
  margin-top: 0;
}

h5{
  color:green;
}
  </style>
</head>
<body>


<script>
document.cookie = "qty=" + 1;
function f1(qty) {
    
    document.cookie = "qty=" + qty;

}
function cart(){

  window.location.href = "index.php"

}

</script>



<?php
include("header.php");
?>

<br><br><br>

<?php
$xyz = $_SESSION['abc'];
?>

<?php

$connection = mysql_connect("127.0.0.1", "root", "");
if (!$connection){
  die("Connection failed: ". mysql_error());
}

mysql_select_db("company",$connection);
$sql = "SELECT * FROM data WHERE id = '$xyz'";

$retval = mysql_query($sql, $connection);

if(! $retval)
{
  die('Could not get data:' . mysql_error());
}



while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
  $id = $row['id'];
  $price = $row['price'];
  $descr = $row['descr'];
  $picture = $row['picture'];
  $name = $row['name'];
}
  


mysql_close($connection);


?>

<div class="container well">  
<div class="row">
  <div class="col-md-6"><center><img src="<?php echo $picture ?>" alt="Black" width="500" height="500"></center></div>
  <div class="col-md-6">

<h3><?php echo $name ?></h3>
<hr>
<br>
<h2 style="margin-bottom:0;"><small>MRP Rs </small><?php echo $price ?></h2>
<?php //<h6 style="margin-left:4em"><small>Inclusive of all taxes</small></h6> ?>

<h5>In Stock</h5>
<br>
<label  class="col-xs-2" >Quantity</label>
<input class="col-xs-1" type="text" id="qty" name="qty" placeholder=" " required   onchange="f1(this.value)">
<br><br>
<p>
<?php echo $descr ?>
</p>
<br>

<div>
  <div class="row">
  <div class="col-sm-4"><a href="buy.php" class="btn btn-success btn-lg btn-block" role="button">Buy Now</a></div>
  <div class="col-sm-4"><a href="cart.php?lmn=1" class="btn btn-primary btn-lg btn-block">Add To Cart</a></div>

  </div>
</div>

  </div>
</div>
</div>

<script>
document.getElementById("qty").defaultValue = "1";
</script>



<?php
include("modal.html");
?>

</body>
</html>

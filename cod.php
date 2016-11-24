<?php
session_start();
if(isset($_SESSION['registered'])){
	$_SESSION['login_user']=$_SESSION['registered'];
}
if(!isset($_SESSION['login_user'])){
  $_SESSION['show_modal']=true;
}



include('login.php'); // Includes Login Script



//if(isset($_SESSION['login_user'])){
//header("location: profile.php");
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cash On Delivery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>

<!-- If you're using Stripe for payments -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<link rel="stylesheet" type="text/css" href="paycss.css">
<script src="payjs.js"></script>

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
      max-width: 20%;
      height: 300px;
      margin: auto;
  }
   

col{
	padding:0;
	margin-left:0;
}
  </style>

</head>
<body>

<?php
include("header.php");
?>


<?php



if(isset($_SESSION['login_user'])){
  echo "<br><br><br><br>";
$_SESSION['qty'] = $_COOKIE['qty'];
unset($_COOKIE['qty']);

$email = $_SESSION['login_user'];
$productid = $_SESSION['abc'];
$connection = mysql_connect("127.0.0.1", "root", "");
if (!$connection){
  die("Connection failed: ". mysql_error());
}

mysql_select_db("company",$connection);
$sql = "SELECT * FROM register WHERE email = '$email'";

$retval1 = mysql_query($sql, $connection);

if(! $retval1)
{
  die('Could not get data:' . mysql_error());
}



while($row = mysql_fetch_array($retval1, MYSQL_ASSOC))
{
  $email = $row['email'];
  $fname = $row['fname'];
  $lname = $row['lname'];
  $ph = $row['ph'];
  $address = $row['address'];
  $postcode = $row['postcode'];
  $city = $row['city'];
}






$sql = "SELECT * FROM data WHERE id = '$productid'";

$retval = mysql_query($sql, $connection);

if(! $retval)
{
  die('Could not get data:' . mysql_error());
}



while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
  //$id = $row['id'];
  $price = $row['price'];
  $descr = $row['descr'];
  $picture = $row['picture'];
  $proname = $row['name'];
}
$qty = $_SESSION['qty'];

$subtotal = $qty * $price;

/*  
echo $email;
echo $fname;
echo $lname;
echo $ph;
echo $address;
echo $postcode;
echo $city;
echo $productid;
echo $price;
//echo $descr;
echo "<img src='$picture'>";
echo $proname;
*/






mysql_close($connection);
}

?>



<?php if(isset($_SESSION['login_user'])) : ?>
<div class="container well">  
<div class="row">
		<div class="col-md-2"><strong>Login ID</strong></div>
		<div class="col-md-10"><?php echo "$fname $lname <br> $email <br> $ph"; ?></div>
		<div class="col-md-12"><hr></div>
</div>
<div class="row">
		<div class="col-md-2"><strong>Address</strong></div>
		<div class="col-md-10"><?php echo "$address, $city - $postcode <br> $ph"; ?></div>
		<div class="col-md-12"><hr></div>
</div>
<div class="row">
		<div class="col-md-2"><strong>Product Specifications</strong></div>
		<div class="col-md-10">
		<div class="col-md-2"><?php echo "<img src='$picture' height=100>"; ?></div>
		<div class="col-md-2"><strong><?php echo "$proname"; ?></strong></div>	
    <div class="col-md-2"><center><strong>Price</strong><br><br>Rs <?php echo "$price"; ?></center></div>
    <div class="col-md-2"><center><strong>Quantity</strong><br><br><?php echo "$qty"; ?></center></div>
		<div class="col-md-2"><strong>Delivery</strong><br><br><?php echo "Within 4-5 Working Days"; ?></div>	
		<div class="col-md-2"><center><strong>Subtotal</strong><br><br>Rs <?php echo "$subtotal"; ?></center></div>
        </div>
        <div class="col-md-12"><hr></div>
</div>
<div class="row">
	<div class="col-md-2">

    <strong>Payment</strong>

<br><br>

<ul class="nav nav-pills nav-stacked">
        <li><a href="buy.php" class="well">Buy Now</a></li>
        <li class="active"><a href="cod.php"  class="well">Cash On Delivery</a></li>
        
      </ul>






	</div>
	<div class="col-md-10">
    <br>
<center><strong><h4>Your Order Will Be Delivered Within 4-5 Working Days </h4></strong></center>
<br><br>
<div class="col-md-3"></div>
<div class="col-md-6">
 <a href="confirm.php" class="btn btn-success btn-lg btn-block" role="button">Confirm Your Order to Proceed</a>
</div>
<div class="col-md-3"></div>

   </div>
</div>
</div>
<?php endif; ?>




<?php
if(!isset($_SESSION['login_user'])){
  echo "<br><br>";
  echo "<div class='alert alert-danger'>
  <strong>Error! </strong>Cannot Buy Product Without Logging In 
  &nbsp&nbsp<a href='home.php'>Continue surfing</a>
</div>";
  
 
echo "<center><strong><h3>POPULAR PRODUCTS</h3></strong></center>";
include("demo.php");
 
}
?>




<?php
include("modal.html");
?>



</body>
</html>
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
  <title>Order Confirmation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  

<!-- Vendor libraries -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>

<!-- If you're using Stripe for payments -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<link rel="stylesheet" type="text/css" href="paycss.css">


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
<br><br>
<?php
  echo "<div class='alert alert-success'>
  <strong>Success! </strong>Your Order Has Been Confirmed And Will Be Delivered To You Within 4-5 Working Days 

</div>";
 echo "<center><strong><h3>ORDER SUMMARY</h3></strong></center>";
?>
<?php



if(isset($_SESSION['login_user'])){
  echo "<br>";
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


$sql = "INSERT INTO `order`".
       "(`proname`, `email`, `address`, `qty`, `subtotal`) ".
       "VALUES ".
       "('$proname','$email','$address','$qty','$subtotal')";
//echo "<img src='$picture'>";
  
//unset($_SESSION['qty']);




$retval2 = mysql_query( $sql, $connection );
   
   if(! $retval2 )
   {
      die('Could not enter data: ' . mysql_error());
   }



mysql_close($connection);
}

?>



<?php if(isset($_SESSION['login_user'])) : ?>
<div class="container well">  
<div class="row">
		<div class="col-md-2"><strong>Delivery Address</strong></div>
		<div class="col-md-10"><?php echo "$fname $lname $ph"; ?><br><?php echo "$address, $city - $postcode <br> $ph"; ?></div>
		<div class="col-md-12"><hr></div>
</div>
<div class="row">
		<div class="col-md-2"><strong>Product Specifications</strong></div>
		<div class="col-md-10">
		<div class="col-md-2"><?php echo "<img src='$picture' height=100>"; ?></div>
		<div class="col-md-4"><strong><?php echo "$proname"; ?></strong></div>	
    <div class="col-md-2"><center><strong>Price</strong><br><br>Rs <?php echo "$price"; ?></center></div>
    <div class="col-md-2"><center><strong>Quantity</strong><br><br><?php echo "$qty"; ?></center></div>
		
		<div class="col-md-2"><center><strong>Subtotal</strong><br><br>Rs <?php echo "$subtotal"; ?></center></div>
        </div>
        
</div>

  </div>

<?php endif; ?>


<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4"><a href="index.php" class="btn btn-success btn-lg btn-block" role="button">Continue Shopping</a></div>
<div class="col-md-4"></div>


</div>


<?php
include("modal.html");
?>



</body>
</html>
<?php

 // Includes Login Script

session_start();
if(isset($_SESSION['registered'])){
  $_SESSION['login_user']=$_SESSION['registered'];
}
if(!isset($_SESSION['login_user'])){
  $_SESSION['show_modal']=true;
}

include('login.php');



if (isset($_GET['lmn'])) {
$_SESSION['lmn'] = $_GET['lmn'];
}
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
  <title>Cart</title>
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
      max-width: 20%;
      height: 300px;
      margin: auto;
  }

td{
  padding:5px;

}
tr{
  border: 1px solid black;
}
</style>

</head>
<body>

<?php
include("header.php");
?>


  



<?php

if(isset($_SESSION['login_user'])){




  echo "<br><br><br>";
  echo "<center><strong><h3>CART</h3></strong></center>";

if(isset($_COOKIE['qty'])){
$_SESSION['qty'] = $_COOKIE['qty'];

unset($_COOKIE['qty']);
}
$email = $_SESSION['login_user'];
//$productid = $_SESSION['abc'];
$connection = mysql_connect("127.0.0.1", "root", "");
if (!$connection){
  die("Connection failed: ". mysql_error());
}
$fname = $_SESSION['login_fname'];

$sql = "CREATE TABLE IF NOT EXISTS `" . $fname . "`( ".
       "id INT NOT NULL AUTO_INCREMENT, ".
       "name VARCHAR(1000) NOT NULL, ".
       "picture VARCHAR(1000) NOT NULL, ".
       "qty INT NOT NULL, ".
       "price INT NOT NULL, ".
       "PRIMARY KEY (id)); ";

mysql_select_db("company",$connection);
$retval = mysql_query( $sql, $connection );
if(! $retval )
{

  die('Could not create table: ' . mysql_error());
}
//echo "Table created successfully\n";




if(isset($_SESSION['cart_delete'])){
  echo "<br>";
  echo "<div class='alert alert-info'>
  <a href='cart.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Information! </strong>Item Has Been Deleted
</div>";
unset($_SESSION['cart_delete']);
}





if (isset($_SESSION['lmn'])) {

$productid = $_SESSION['abc'];

$sql = "SELECT * FROM data WHERE id = '$productid'";

$retval1 = mysql_query($sql, $connection);

if(! $retval1)
{
  die('Could not get data:' . mysql_error());
}



while($row = mysql_fetch_array($retval1, MYSQL_ASSOC))
{
  $id = $row['id'];
  $price = $row['price'];
  $descr = $row['descr'];
  $picture = $row['picture'];
  $name = $row['name'];
}

$qty = $_SESSION['qty'];
//echo $price;

//echo $proname;
//if (isset($_SESSION['lmn'])) {

$sql1 = "SELECT * FROM `" . $fname . "` WHERE id='$id'";
$retval5 = mysql_query( $sql1, $connection );
$rows = mysql_num_rows($retval5);

while($row = mysql_fetch_array($retval5, MYSQL_ASSOC))
{
  $fid = $row['id'];
 
}
if ($rows == 1){
 echo "<div class='alert alert-info'>
 <a href='cart.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Information! </strong>Product Has Already Been Added To Your Cart 
  
</div>";
  
} 

else{




$sql = "INSERT INTO `" . $fname . "`".
       "(id, name, picture, qty, price) ".
       "VALUES ".
       "('$id','$name','$picture','$qty','$price')";
//echo "<img src='$picture'>";
  
//unset($_SESSION['qty']);




$retval2 = mysql_query( $sql, $connection );
   
   if(! $retval2 )
   {
      die('Could not enter data: ' . mysql_error());
   }
   
   
    echo "<div class='alert alert-success'>
 <a href='cart.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Success! </strong>Product Has Been Added To Your Cart 
  
</div>";

}
unset($_SESSION['lmn']);
unset($_GET['lmn']);
//unset($_SESSION['abc']);
//unset($_GET['abc']);
//unset($_SESSION['qty']);
//unset($_COOKIE['qty']);
}







   
$sql = "SELECT * FROM `" . $fname . "`";

$retval3 = mysql_query( $sql, $connection );

$row = mysql_num_rows($retval3);
if ($row == 0) {
 echo "<div class='alert alert-warning'>
 <a href='cart.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Information! </strong>No Entries In Your Cart
  &nbsp&nbsp<a href='home.php'>Continue Shopping</a>
</div>";

//echo "<center><strong><h3>POPULAR PRODUCTS</h3></strong></center>";
include("demo.php");
echo "<div class='col-md-4'></div>";
echo "<div class='col-md-4'><a href='home.php' class='btn btn-success btn-md btn-block' role='button'>Continue Shopping</a></div>";
}



}
?>
<?php if(isset($_SESSION['login_user'])) : ?>
  <?php if($row != 0) : ?>
<table class="container well">
 	<?php while($row = mysql_fetch_array($retval3,  MYSQL_ASSOC)) : ?>



  	<tr>
<td>        <?php 
  $id = $row['id']; 


  ?></td>

  	  	<td class="col-md-2"><?php echo "<img src = ".$row['picture']." height=100 width=150>"; ?></td>
    	<td class="col-md-3"><strong><?php echo $row['name']; ?></strong></td>
    	<td class="col-md-1"><center><strong>Price</strong><br><br><?php echo $row['price']; ?></center></td>
    	<td class="col-md-1"><center><strong>Quantity</strong><br><br><?php echo $row['qty']; ?></center></td>
   	    <td class="col-md-2"><strong>Delivery</strong><br><br><?php echo "Within 4-5 Working Days"; ?></td>
    	<?php $subtotal = $row['price'] * $row['qty']; ?>
    	<td class="col-md-1"><center><strong>Subtotal</strong><br><br><?php echo $subtotal; ?></center></td>



    	<td class="col-md-2">
    		
      		<form action="delete.php" method="post">
       	    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>" />
        	<input type="submit" value="Delete"  class="btn btn-primary btn-sm btn-block" />

        	<a href="buy.php?abc=<?php echo $id; ?>" class="btn btn-primary btn-sm btn-block" role="button">Buy Now</a>
      		</form>
      
      	</td>

	</tr>




	<?php endwhile; ?>
</table>
<br>
<div class="col-md-4"></div>
<div class="col-md-4"><a href="home.php" class="btn btn-success btn-md btn-block" role="button">Continue Shopping</a></div>


<?php endif; ?>
<?php endif; ?>




<?php
if(isset($_SESSION['login_user'])){
mysql_close($connection);
}

?>








<?php
if(!isset($_SESSION['login_user'])){
  echo "<br><br><br>";
  echo "<div class='alert alert-danger'>
  <strong>Error! </strong>Cannot Access Cart Without Logging In 
  &nbsp&nbsp<a href='home.php'>Continue Shopping</a>
</div>";
  
 
echo "<center><strong><h3>POPULAR PRODUCTS</h3></strong></center>";
include("demo.php");
echo "<div class='col-md-4'></div>";
echo "<div class='col-md-4'><a href='home.php' class='btn btn-success btn-md btn-block' role='button'>Continue Shopping</a></div>";
 
}
?>







<?php
include("modal.html");
?>

</body>
</html>

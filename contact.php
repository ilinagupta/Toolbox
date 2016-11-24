<?php

 // Includes Login Script
session_start();
include('login.php');
//if(isset($_SESSION['login_user'])){
//header("location: profile.php");
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>About Us</title>
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
  </style>
</head>
<body>

<?php
include("header.php");
?>


<br><br><br>
<div class="col-md-12">
<h1 style="margin-left:1em;">About Us</h1>
</div>
<br><br><br>
<hr>
<div class="col-md-12">
<p style="margin-left:2em; margin-right:2em;">
<strong>The focus of TOOLBOX is to tap into this unexplored area and provide access of these 
utilities to the consumers in the market, not only to increase sales but also to back scientific 
development and innovation of our country.</strong>
<p style="margin-left:2em; margin-right:4em;">

The website provides a range of products pertaining to the STEM[Science and Technology, 
Engineering and Medical] fields. These include a variety of measuring instruments, machines and 
components from the branches of Mechanical, Computer, Electrical, and Electronic Engineering. 
</p>
<p style="margin-left:2em; margin-right:3em;">

These fields are specifically selected with the following points in mind<br>
</p>
<p style="margin-left:5em; margin-right:5em;">
- Avaiility of the products in and near Mumbai<br>
- General usefulness and frequency of usage<br>
- Products pertaining to B2B and B2C audience only since heavy machinery are bought only by industries<br>
- Increasing variety of products<br>
- Providing complete choice of product across major fields<br>
</p>
<p style="margin-left:2em;">

By systematic classification of every product this website has made it possible for even amateur 
leveled innovators to choice the right product with much ease.
</p>
<br><br><br>
</div>



<h2 style="margin-left:2em;">Our Team</h2>




<hr>
<h4 style="margin-left:2em;">ILINA GUPTA<h4>
	
<div class="row" style="margin-left:0.5em;">
	<div class="col-md-2" style="margin-left:1em;">
<h5>Email Id</h5>
</div>
<div class="class-md-4">
<h5>ilinagupta118@gmail.com</h5>
</div>
</div>
<div class="row" style="margin-left:0.5em;">
	<div class="col-md-2" style="margin-left:1em;">
<h5>Mobile Number</h5>
</div>
<div class="class-md-4">
<h5>9930897773</h5>
</div>
</div>










<?php
include("modal.html");
?>

</body>
</html>

<?php


session_start();
include('login.php'); // Includes Login Script
if(isset($_SESSION['fail'])){
$x = $_SESSION['fail'];
echo "<script type='text/javascript'>alert('An account with the email address $x already exixts')</script>";
$_SESSION['fail']=NULL;
}
/*
$connection = mysql_connect("127.0.0.1", "root", "");
$db = mysql_select_db("company", $connection);

$sql="SELECT * FROM 'lock1'";
$set=0;
if($result=mysqli_query($connection,$sql))
{
  while($row=mysqli_fetch_row($result))
  {
    $set=$row[0];
  }
  mysqli_free_result($result);
}
echo $set;
if(isset($_SESSION['login_user'])){
  $sql = "UPDATE 'lock1' SET 'id' = 1";
  //$result=mysql_query($connection,$sql);
  echo '<br><br><br>Locked';

}
*/




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
  hr{
    border: 0;
    height: 1px;
    background: #333;
    background-image: linear-gradient(to right, #ccc, #333, #ccc);
}
h2{
  margin-left: 40px; 
}
#errmsg
{
color: red;
font-size:12px;
}
#errmsgpost
{
color: red;
font-size:12px;
}
#errmsgpass
{
color: red;
font-size:12px;
}

#red{
  color:red;
}

  </style>
</head>

<body>
<script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#ph").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Please enter a valid Phone Number").show().fadeOut("slow");
               return false;
    }
   });
});
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#postcode").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsgpost").html("Please enter a valid Post Code").show().fadeOut("slow");
               return false;
    }
   });
});
</script>
<script language="javascript" type="text/javascript">

  
function checkpassword(){
  if(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/.test(document.getElementById("password").value))
  {
$("#errmsgpass").html(" ").show();
    return true;
  }
  else{
    $("#errmsgpass").html("Enter Valid Password").show();
    document.getElementById("password").value="";

  }
}


</script>  


<?php
include("header.php");
?>


<br><br>

<h2>Registration Form</h2>
<hr size="2">



<div class="container">
  <form id="formid" class="form-horizontal" role="form" action="index.php" method="get">


    <div class="form-group">
      <label class="col-sm-2" for="email">Title</label>
      <div class="col-sm-6">
    <label class="radio-inline">
      <input type="radio" name="optradio">Mr
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio">Mrs
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio">Ms
    </label>
    </div>
  </div>

  <div class="form-group">
      <label class="col-sm-2" for="fname">First Name<span id="red">*</span></label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2" for="lname">Last Name<span id="red">*</span></label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name" required>
      </div>
    </div>

<div class="form-group">
  <label class="col-sm-2" for="address">Address<span id="red">*</span></label>
  <div class="col-sm-6">
  <textarea class="form-control"rows="3" id="address" name="address" required></textarea></div>
</div>

<div class="form-group">
      <label class="col-sm-2" for="postcode">Postcode<span id="red">*</span></label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Enter postcode" required maxlength="6">
      </div>
      <span class="col-sm-2" id="errmsgpost"></span>
    </div>

<div class="form-group">
      <label class="col-sm-2" for="city">Town/City<span id="red">*</span></label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" required>
      </div>
    </div>


<div class="form-group">

      <label class="col-sm-2" for="country">Country<span id="red">*</span></label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" required>
      </div>
    </div>

      <div class="form-group">
      <label class="col-sm-2" for="bday">Birthday</label>
      <div class="col-sm-6">
        <input type="date" class="form-control" id="bday" name="bday" placeholder="Enter birthday">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2" for="ph">Mobile</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="ph" name="ph" placeholder="Enter mobile number" maxlength="10">

      </div>
           <span class="col-sm-2" id="errmsg"></span>
    </div>




    <div class="form-group">
      <label class="col-sm-2" for="email">Email<span id="red">*</span></label>
      <div class="col-sm-6">
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2" for="password">Password<span id="red">*</span></label>
      <div class="col-sm-6">          
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required onchange="return checkpassword()">
      </div>
      <span class="col-sm-2" id="errmsgpass"></span>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox">Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group"> 

      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" required>I have read and agreed to the terms and conditions.<span id="red">*</span></label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button id="submit" type="submit" class="btn btn-default" formmethod="post" formaction="store.php">Submit</button>
      </div>
    </div>
  </form>
</div>












<?php
include("modal.html");
?>







</body>
</html>

<script>
$(function() {
   $("li").click(function() {
      // remove classes from all
      $("li").removeClass("active");
      // add class to the one we clicked
      $(this).addClass("active");
   });
});
</script>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      
      <a class="navbar-brand" href="index.php">TOOLBOX</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Products<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="electrical.php">Electrical Components</a></li>
            <li><a href="electronic.php">Electronic Components</a></li>
            <li><a href="mechanical.php">Mechanical Components</a></li>
            <li><a href="programmable.php">Programmable and Computing Devices</a></li>
            <li><a href="md.php">Machines and Measuring Devices</a></li>
          </ul>
        </li>
        <li><a href="contact.php">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

       

<?php


if(isset($_SESSION['login_user']) && $_SESSION['login_user']!="")
{
  $email = $_SESSION['login_user'];
  $fname = $_SESSION['login_fname'];
  print "<li><a style=\"text-decoration:none; color:white\";><small>Welcome $fname !</small></a></li>";
      print "<li><a name='submit' type='submit' value='Logout' href='logout.php'>Logout</a></li>";
      // displays username
}
else
{
      print "<li><a href='login.html' data-toggle='modal' data-target='#login-modal'>Login</a></li>";
}


?>
<li><a href="cart.php"><span class="glyphicon glyphicon-cart"></span>Cart</a></li>
        
      </ul>
    </div>
  </div>
</nav>

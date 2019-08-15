<?php
@session_start();
include("includes/db.php");
include("function/functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset=utf-8">
<title>Online Shop</title>
<link rel="stylesheet" href="styles/style1.css" media="all" />
<link rel="stylesheet" href="styles/style2.css" media="all" />

</head>
<body>
<div class="main_wrapper">
<div class="header_wrapper">
<img src="../images/logo.jpg" style="float:left">
<img src="../images/banner.jpg" style="float:right">
<img src="../images/facebook.jpg" style="float:center"></div>
<div id="navbar">
<ul class="menu">
<li><a href="../index1.php">Home </a></li>
<li><a href="../all_product.php">All Product</a></li>
<li><a href="my_account.php">My Account</a></li>
<?php if(!isset($_SESSION['customer_email']))
{?>
<li><a href="../user_registation.php">Sign UP</a></li>
<?php } ?>
<li><a href="../cart.php">Shopping Cart</a></li>
<li><a href="../contect.php">Contect Us</a></li>
</ul>
<div id="form">
<form method="get" action="result.php" enctype="multipart/form-data">
<input type="text" name="user_query" placeholder="Search a Product" />
<input type="submit" name="search" value="Search"/>
</form>
</div>
</div>
<div class="content_wrapper">
<div id="left_sidebar">
<div id="side_bar"> Manage Account</div>

<ul id="cats">
<?php

$email=$_SESSION['customer_email'];
$q="select * from customers where customer_email='$email' ";
$run=mysqli_query($con,$q);
$get=mysqli_fetch_array($run);
$photo=$get['customer_image'];
echo "<img src='customer_photos/$photo'  width='150' height='150'/>";







?>
<li><a href="my_account.php?my_orders">My Order</a></li>
<li><a href="my_account.php?edit_account">Edit Account</a></li>
<li><a href="my_account.php?change_pass">Change Password</a></li>
<li><a href="my_account.php?delete_account">Delete Account</a></li>
<li><a href="logout.php">Log Out</a></li>

	
</ul>

</div>
<div id="right_content">
<div id="headline">
<div id="headline_content">
<?php
if(!isset($_SESSION['customer_email']))
{
	echo"<b style='color:yellow;'>Welcome </b>";
	
}
else
{
	
	echo "<b style='color:yellow;'>Welcome </b>";
	echo "<span style='color:skyblue'>".$_SESSION['customer_email']."</span>";
}


?>













<span>&nbsp;
<?php
if(!isset($_SESSION['customer_email']))
{
	echo"<a href='checkout.php' style='color:blue'>Log in</a>";
	
}
else
{
	
	echo"<a href='logout.php' style='color:blue'>Log Out </a>";
}


?>


</span>
</div>
</div>
<div>
<h2 style="align:center;padding:20px">Manage Your Account</h2>
<?php
getdefalt();
?>
<?php

if(isset($_GET['my_orders']))
{
	include("my_order.php");
	
}
if(isset($_GET['edit_account']))
{
	include("edit_account.php");
	
}
if(isset($_GET['change_pass']))
{
	include("change_pass.php");
	
}
if(isset($_GET['delete_account']))
{
	include("delete_account.php");
	
}

?>

</div>

</div>

<div class="footer">
<h1 style="color:#FFF; padding-top:10px ;text-align:center">&copy;  2014 by onlineustad.com </h1>

</div>

</div>
</body>
</html>
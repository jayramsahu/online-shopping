<?php
@session_start();
include("includes/db.php");
include("function/functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8">
<title>Online Shop</title>
<link rel="stylesheet" href="styles/style1.css" media="all" />
<link rel="stylesheet" href="styles/style2.css" media="all" />
</head>
<body>
<div class="main_wrapper">
<div class="header_wrapper">
<img src="images/logo.jpg" style="float:left">
<img src="images/banner.jpg" style="float:right">
<img src="images/facebook.jpg" style="float:center"></div>
<div id="navbar">
<ul class="menu">
<li><a href="index1.php">Home </a></li>
<li><a href="all_product.php">All Product</a></li>
<li><a href="my_account.php">My Account</a></li>
<li><a href="user_registation.php">Sign UP</a></li>
<li><a href="cart.php">Shopping Cart</a></li>
<li><a href="contect.php">Contect Us</a></li>
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
<div id="side_bar"> categories</div>

<ul id="cats">
<?php
categoies();
?>

</ul>
<div id="side_bar"> brands</div>
<ul id="cats">
<?php
brands();
?>

</ul>

</div>
<div id="right_content">
<div id="headline">
<div id="headline_content">
<b>Welcome Guest!  </b>
<b style="color:yellow;">Shopping Cart </b>
<span>-Item:-<?php items()?> Price: <?php total_price();?> <a href="cart.php">Go To Cart </a>
</span>
</div>
</div>
<div  id="product_b">






<form action="#" name="StudentRegistration" method="post"  enctype="multipart/form-data"onsubmit="return(validate());"/>

<table width="750" align="center" >

<tr>
<td >
<h2>Customer Registration Form</h2>
</td>
</tr>

<tr>
<td align="right">Customer Name:</td>
<td><input type="text" name="c_name" required></td>
</tr>

<tr>
<td align="right">Customer EmailId:</td>
<td><input type="text" name="c_emailid" required></td>
</tr>

<tr>

<td align="right">Password:</td>
<td><input type="text" name="c_pass" required></td>
</tr>



<tr>


<td align="right">Customer Country:</td>
<td><select  name="c_contry">
<option>India</option>
<option>China</option>
<option>Us</option>
<option>Pak</option>
<option>UK</option></td></select>
</tr>

<tr>
<td align="right">Customer City:</td>
<td><input type="text" name="c_city" required></td>
</tr>
<tr>
<td align="right">Customer MobileNo</td>
<td><input type="text" name="c_mobilno" required></td>
</tr>
<tr>
<td align="right">Customer Address:</td>
<td><input type="text" name="c_add" required></td>
</tr>



<tr align="right">
<td>Customer image:</td>
<td><input type="file" name="c_img" required></td>
</tr>








<tr>

<td><input type="submit" name="register" value="submit"></td>
</tr>





</table>
</form>

<?php

if(isset($_POST['register']))
{
	$c_name=$_POST['c_name'];
	$c_emailid=$_POST['c_emailid'];
	$c_pass=$_POST['c_pass'];
	$c_contry=$_POST['c_contry'];
	$c_mobilno=$_POST['c_mobilno'];
	$c_city=$_POST['c_city'];
	$c_add=$_POST['c_add'];
	$c_image=$_FILES['c_img']['name'];
	$c_image_temp=$_FILES['c_img']['tmp_name'];
	
	$ipp=getRealIpAdd();
	$q="INSERT INTO `customers` (`customer_name`, `customer_email`, `customer_pass`, `customer_contry`, `customer_city`, `customer_contect`, `customer_address`, `customer_image`, `customer_ip`)
	VALUES ('$c_name', '$c_emailid', '$c_pass', '$c_contry', '$c_city', '$c_mobilno', '$c_add', '$c_image', '$ipp')";
	
	$run=mysqli_query($db,$q);
	move_uploaded_file($c_image_temp,"customer/customer_photos/$c_image");
	$qr="select * from cart where ip_add='$ipp'";
	$rrun=mysqli_query($db,$qr);
	$count=mysqli_num_rows($rrun);
	if($count>0)
	{	
		$_SESSION['customer_email']=$c_emailid;
		echo "<script>alert('Account Created')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}

	else
	{
		$_SESSION['customer_email']=$c_emailid;
		echo "<script>alert('Account Created successfully thank you')</script>";
		
			echo "<script>window.open('index1.php','_self')</script>";
	
	}
	
}








?>



















<?php   

cart();
 
?>
</div>

</div>

<div class="footer">
<h1 style="color:#FFF; padding-top:10px ;text-align:center">&copy;  2014 by onlineustad.com </h1>

</div>

</div>
</body>
</html>
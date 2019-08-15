<?php
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
<li><a href="all_products.php">All Product</a></li>
<li><a href="my_account.php">My Account</a></li>
<li><a href="user_registation.php">Sign UP</a></li>
<li><a href="cart.php">Shopping Cart</a></li>
<li><a href="contect.php">Contect Us</a></li>
</ul>
<div id="form">
<form method="get" action="results.php" enctype="multipart/form-data">
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
<span>-Item:- Price:  </span>
</div>
</div>
<div  id="product_b">
<?php    
$get_products="select * from products";
$run_products = mysqli_query($con,$get_products);
while($row_products=mysqli_fetch_array($run_products))
{
	$products_id=$row_products['product_id'];
	$product_desc=$row_products['product_desc'];
	$product_price=$row_products['product_price'];
	$product_title=$row_products['product_title'];
	$product_img1=$row_products['product_img1'];
	$product_img2=$row_products['product_img2'];
	$product_img3=$row_products['product_img3'];
	$brand_id=$row_products['brand_id'];
	$cat_id=$row_products['cat_id'];
	

echo"<div id='single_product' >

<h2>$product_title</h2></br>
<img src='admin_area/product_images/$product_img1'  width='180px' height='180px'></br>
<p><b>price    :     $product_price</b></p>
<a href='details.php?pro_id=$products_id' style='float:left' >Details</a>
<a href='index1.php?add_cart=$products_id' style='float:right' ><button>Add cart</button></a>
</div>";
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
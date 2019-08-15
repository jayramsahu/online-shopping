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
<?php
if(!isset($_SESSION['customer_email']))
{
	echo"<b >Welcome Guest!</b><b style='color:yellow;'>Shopping Cart - </b>";
	
}
else
{
	
	echo"<b >Welcome  "."<span style='color:skyblue'>".$_SESSION['customer_email']."</span>"."</b>"."<b style='color:yellow;'>Your Shopping Cart - </b>";
}


?>
<span>-Item:-<?php items()?> Price: <?php total_price();?> <a href="index1.php">Back to Shopping </a>&nbsp;
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

<div  id="product_b">
<br>
<br>
<br>
<form action="cart.php" method="post" type="multipart/form-data">
<table width="740" align="center" bgcolor="#009CC">
<tr>  <td><b>Remove</b></td> <td><b>Product</b></td> <td><b>Quantity</b></td> <td><b>Total Price</b><br></td></tr>

<?php
$total=0;
	$ipp=getRealIpAdd();
	$q="select * from cart where ip_add='$ipp'";
	$run=mysqli_query($db,$q);
	
	while($row=mysqli_fetch_array($run))
	{
		$p_id=$row['p_id'];
		
		$c="select * from products where product_id='$p_id'";
	$rp=mysqli_query($db,$c);
	
	
	
	while($pro_price=mysqli_fetch_array($rp))
	{
		
		$product_title=$pro_price['product_title'];
		$product_img1=$pro_price['product_img1'];
		$onlyp=$pro_price['product_price'];
		
		$price=array($pro_price['product_price']);
		$pp=array_sum($price);
		$total+=$pp;?>
		<tr> 		<td>
		<input type='checkbox' name =" remove[]" value="<?php echo $p_id ?>"></td> 
		<td><?php echo $product_title ?><br><img src="admin_area\product_images\<?php echo $product_img1 ?>" height="80px" width="80px"></td> 
		<td><input type='text' name ="quantity" value="" size="3px"</td> 
		<?php 
		
		if(isset($_POST['update']))
		{
			$qty=$_POST['quantity'];
			$i="update cart set qty='$qty' where ip_add='$ipp' ";
			$r=mysqli_query($con,$i);
			$total=$qty*$total;
			
			
			
			
		}
		
		
		?>
		<td><?php echo $onlyp ?></td></tr>
		
		
		
	<?php		
	}
		
	}?>
	
<tr>
<td align="right" colspan="3"><b> Total price</b></td>
<td ><b> <?php echo $total ?></b></td>
</tr>

<tr><tr></tr></tr>
<tr>
<td colspan="2"> <input type="submit" name="update" value="update cart"/></td>
<td> <input type="submit" name="continue" value="continue shoping"/></td>
<td><button><a href="checkout.php">Checkout</a></button></td>
</tr>
</br>
<tr></tr><tr></tr><tr></tr>
</table>
</br>

</form>
<?php

$upcart=@updatecart();

?>

</div>

</div>

<div class="footer">
<h1 style="color:#FFF; padding-top:10px ;text-align:center">&copy;  2014 by onlineustad.com </h1>

</div>

</div>
</body>
</html>
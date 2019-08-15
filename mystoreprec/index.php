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
<li><a href="#">Home </a></li>
<li><a href="#">All Product</a></li>
<li><a href="#">My Account</a></li>
<li><a href="#">Sign UP</a></li>
<li><a href="#">Shopping Cart</a></li>
<li><a href="#">Contect Us</a></li>
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
getpro();
getcatpro();
?>
</div>

</div>

<div class="footer">
<h1 style="color:#FFF; padding-top:10px ;text-align:center">&copy;  2014 by onlineustad.com </h1>

</div>

</div>
</body>
</html>
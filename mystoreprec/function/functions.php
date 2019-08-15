<?php
$db=mysqli_connect("localhost","root","","myshop");
function getRealIpAdd()
{
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
return $ip_address;

}


function cart()
{
	global $db;
	if(isset($_GET['add_cart']))
	{
	$ipp=getRealIpAdd();
	$p_id=$_GET['add_cart'];
	$q="select * from cart where p_id='$p_id' and ip_add='$ipp'";
	$run=mysqli_query($db,$q);
	$count=mysqli_num_rows($run);
	if($count>0)
	{
		
		echo "";
	}
	else
	{
	$c="insert into cart (p_id,ip_add) values ('$p_id','$ipp')";	
		$run=mysqli_query($db,$c);
		echo "<script>window.open('index1.php','_self')</script>";
		
	}
	
	}
	
	
}

function items()
{
	global $db;
	if(isset($_GET['add_cart']))
	{
	$ipp=getRealIpAdd();

	$p_id=$_GET['add_cart'];
	$q="select * from cart where ip_add='$ipp'";
	$run=mysqli_query($db,$q);
	$count=mysqli_num_rows($run);
	echo $count;
	}
	else
	{
	$ipp=getRealIpAdd();
		$q="select * from cart where ip_add='$ipp'";
	$run=mysqli_query($db,$q);
	$count=mysqli_num_rows($run);
	echo $count;
		
		
	}
	
	
	
	
}


function total_price()
{
	global $db;
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
		
		$price=array($pro_price['product_price']);
		$pp=array_sum($price);
		$total+=$pp;
			
	}
		
	}
	
	
	echo $total;
	
}

function updatecart()
{
	global $db;
if(isset($_POST['update']))
{
	foreach($_POST['remove'] as $removeid)
	{
		$d="delete  from cart where p_id='$removeid'";
		$run=mysqli_query($db,$d);
		if($run)
		{
			echo "<script>window.open('cart.php','_self')</script>";
			
			
		}
		
		
		
	}

	
}
if(isset($_POST['continue']))
{
	
	echo "<script>window.open('index1.php','_self')</script>";
	
}
}





































function getpro()
{
global $db;

//whether ip is from share internet
if(!isset($_GET['cat']))
{
	if(!isset($_GET['brand']))
	{

$get_products="select * from products order by rand() limit 0,3 ";
$run_products = mysqli_query($db,$get_products);
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
}
}
}
function getcatpro()
{
global $db;
if(isset($_GET['cat']))
{
$cat=$_GET['cat'];
$get_products="select * from products where cat_id='$cat' ";
$run_products = mysqli_query($db,$get_products);
$count=mysqli_num_rows($run_products);
if($count==0)
{
	
	echo "<h1>NO any item found</h1>";
	
}
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


}}}
function getbrandpro()
{
global $db;
if(isset($_GET['brand']))
{
$brand=$_GET['brand'];
$get_products="select * from products where brand_id='$brand' ";
$run_products = mysqli_query($db,$get_products);
$count=mysqli_num_rows($run_products);
if($count==0)
{
	
	echo "<h1>NO any item found</h1>";
	
}
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


}}}




























function brands()
{
	
	global $db;
	
	$get_brands="select * from brand";
$run_brands = mysqli_query($db,$get_brands);
while($row_brands=mysqli_fetch_array($run_brands))
{
	$brand_id=$row_brands['brand_id'];
	$brand_desc=$row_brands['brand_desc'];
echo"<li><a href='index1.php?brand=$brand_id'>$brand_desc</a></li>";

}
	
}





















function categoies()
{
	
	global $db;
	$get_cats="select * from categeries";
$run_cats = mysqli_query($db,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats))
{
	$cat_id=$row_cats['cat_id'];
	$cat_title=$row_cats['cat_title'];
echo"<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";

}
	
	
	
}



?>
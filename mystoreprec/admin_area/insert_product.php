<?php
include("includes/db.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body bgcolor="#CCFFFF">
<form method="post" action="insert_product.php" enctype="multipart/form-data">
<table width="700" align="center" border="1" bgcolor="#CC0033">
<tr align="center">
<td colspan="2"><h2>insert new product</h2></td>
</tr>
<tr>
<td align="right" ><b>Product Title</b></td>
<td >
<input type="text" name="product_title" size="50"/>
</td>
</tr>
<tr>
<td align="right"><b>Product Category</b></td>
<td>
<select name="product_cat">
<option>Select a Category</option>
<?php
$get_cats="select * from categeries";
$run_cats = mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats))
{
	$cat_id=$row_cats['cat_id'];
	$cat_title=$row_cats['cat_title'];
echo"<option value='$cat_id'>$cat_title</option>";

}
?>
</select>
</td>
</tr>
<tr>
<td align="right"><b>Product Brand</b></td>
<td>
<select name="product_brand">
<option>Select Brand</option>
<?php
$get_brands="select * from brand";
$run_brands = mysqli_query($con,$get_brands);
while($row_brands=mysqli_fetch_array($run_brands))
{
	$brand_id=$row_brands['brand_id'];
	$brand_desc=$row_brands['brand_desc'];
echo"<option value='$brand_id'>$brand_desc</option>";

}
?>
</td>
</tr>
<tr>
<td align="right"><b>Product Img1</b></td>
<td>
<input type="file" name="product_img1" />
</td>
</tr>
<tr>
<td align="right"><b>Product Img2</b></td>
<td>
<input type="file" name="product_img2" />
</td>
</tr>
<tr>
<td align="right"><b>Product Img3</b></td>
<td>
<input type="file" name="product_img3" />
</td>
</tr>
<tr>
<td align="right"><b>Product Price</b></td>
<td>
<input type="text" name="product_price" />
</td>
</tr>
<tr>
<td align="right"><b>Product Description</b></td>
<td>
<textarea name="product_desc" cols="40" rows="10"></textarea>
</td>
</tr>
<tr>
<td align="right"><b>Product Keyword</b></td>
<td>
<input type="text" name="product_keyword" size="50" />
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="Insert_product" value="Insert product"/>
</td>
</tr>
</form>
</body>
</html>
<?php
if(isset($_POST['Insert_product'])){
	$product_title =$_POST['product_title'];	
$product_cat =$_POST['product_cat'];
$product_brand =$_POST['product_brand'];	
$product_price =$_POST['product_price'];	
$product_desc =$_POST['product_desc'];	
$status ='on';	
	$product_keyword =$_POST['product_keyword'];	
	$product_img1 =$_FILES['product_img1']['name'];
	$product_img2 =$_FILES['product_img2']['name'];
	$product_img3 =$_FILES['product_img3']['name'];
	$temp_name1 =$_FILES['product_img1']['tmp_name'];
	$temp_name2 =$_FILES['product_img2']['tmp_name'];
	$temp_name3 =$_FILES['product_img3']['tmp_name'];
	if($product_cat =='' OR $product_title ==''  OR $product_keyword =='' OR $product_price =='' OR $product_img1 =='' OR $product_desc ==''OR $product_img3 =='' OR $product_img2 =='' )
	{
		
		echo "<script>alert('please fill all the table')</script>";
		exit();
		}
		else{
			move_uploaded_file($temp_name1,"product_images/$product_img1");
			move_uploaded_file($temp_name2,"product_images/$product_img2");
			move_uploaded_file($temp_name3,"product_images/$product_img3");
			$insert_product="insert into products(cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,status)  values ('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status')";
			$run_product=mysqli_query($con,$insert_product);
			if($run_product)
			{
			echo "<script>alert('the product is insrted successfully')</script>";
			}
			else
			{
				
			echo "<script>alert('this is not insert')</script>";}
				
			}}

?>
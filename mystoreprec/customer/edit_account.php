<?php
@session_start();
include("includes/db.php");
if(isset($_GET['edit_account']))
{
	$customer_email=$_SESSION['customer_email'];
	
$q="select * from customers where customer_email='$customer_email' ";
$run=mysqli_query($con,$q);
$get=mysqli_fetch_array($run);
$customer_id=$get['customer_id'];
$customer_name=$get['customer_name'];
$customer_email=$get['customer_email'];
$customer_pass=$get['customer_pass'];
$customer_contry=$get['customer_contry'];
$customer_city=$get['customer_city'];
$customer_contect=$get['customer_contect'];
$customer_address=$get['customer_address'];
$customer_image=$get['customer_image'];

}


?>
<form action=" " method="post"  enctype="multipart/form-data">

<table width="750" align="center" >

<tr>
<td align="center" colspan="8" >
<center><h2>Update your account</h2></center>
</td>
</tr>

<tr>
<td align="right">Customer Name:</td>
<td><input type="text" name="c_name" value="<?php echo $customer_name   ;  ?>"></td>
</tr>

<tr>
<td align="right">Customer EmailId:</td>
<td><input type="text" name="c_emailid" value="<?php echo $customer_email;?>"></td>
</tr>

<tr>

<td align="right">Password:</td>
<td><input type="text" name="c_pass" value="<?php echo $customer_pass;?>"></td>
</tr>



<tr>


<td align="right">Customer Country:</td>
<td><select  name="c_contry" disabled>
<option value="<?php echo $customer_contry;?>"> <?php echo $customer_contry;?></option>
<option>India</option>
<option>China</option>
<option>Us</option>
<option>Pak</option>
<option>UK</option></td></select>
</tr>

<tr>
<td align="right">Customer City:</td>
<td><input type="text" name="c_city" value="<?php echo $customer_city;?>"></td>
</tr>
<tr>
<td align="right">Customer MobileNo</td>
<td><input type="text" name="c_mobilno" value="<?php echo $customer_contect;?>"></td>
</tr>
<tr>
<td align="right">Customer Address:</td>
<td><input type="text" name="c_add" value="<?php echo $customer_address;?>"></td>
</tr>

<tr align="right">
<td>Customer image:</td>
<td><input type="file" name="c_img" value="<?php echo $customer_image;?>"></td>
</tr>

<tr>

<td align="center" colspan="8"><input type="submit" name="update_account" value="Update Now"></td>
</tr>

</table>
</form>


<?php

if(isset($_POST['update_account']))
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
	
	
	$q="INSERT INTO `customers` (`customer_name`, `customer_email`, `customer_pass`, `customer_contry`, `customer_city`, `customer_contect`, `customer_address`, `customer_image`, `customer_ip`)
	VALUES ('$c_name', '$c_emailid', '$c_pass', '$c_contry', '$c_city', '$c_mobilno', '$c_add', '$c_image', '$ipp')";
	
	$run=mysqli_query($con,$q);
	move_uploaded_file($c_image_temp,"customer/customer_photos/$c_image");
	
	

	if($run)
	{	
		
		echo "<script>alert('Account has been updated')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
	}

	
	
}


?>
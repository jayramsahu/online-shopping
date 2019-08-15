<form action="" method="post">

<table width="700" align="center" >

<tr align="center">
<td colspan="2" >
<h2>Do you really want to delete your  account</h2>
</td>
</tr>

<tr align="center">
<td align="right"><input type="submit" name="yes" value="yes,I want to delete" /></td>
<td><input type="submit" name="no" value="No,I do not want to delete" /></td>
</tr>
</table>
</form>
<?php
@session_start();
include("includes/db.php");
if(isset($_POST['yes']))
{
	
	

$email=$_SESSION['customer_email'];
$q="delete from customers where customer_email='$email' ";
$run=mysqli_query($con,$q);
if($run)
{
	
	echo "<script>alert('Your account has been deleted')</script>";
	echo " <script>window.open('../index1.php','_self')</script>";
	exit();
}}
if(isset($_POST['no']))
{
	echo " <script>window.open('my_account.php','_self')</script>";
	exit();
}


?>
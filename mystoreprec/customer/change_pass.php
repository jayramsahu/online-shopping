
<form action="" method="post">

<table width="500" align="center" >

<tr>
<td >
<h2>Change your password</h2>
</td>
</tr>

<tr>
<td align="right">Enter current password</td>
<td><input type="password" name="old_pass" required /></td>
</tr>
<tr>
<td align="right">Enter new password</td>
<td><input type="password" name="new_pass" required /></td>
</tr>
<tr>
<td align="right">Enter new password again</td>
<td><input type="password" name="new_passagain" required /></td>
</tr>
<tr align="center">

<td colspan="4"><input type="submit" name="change_pass" value="Change Password"></td>
</tr>
</table>
</form>
<?php
@session_start();
include("includes/db.php");
$email=$_SESSION['customer_email'];
if(isset($_POST['change_pass']))
{
	$old_pass=$_POST['old_pass'];
	$new_pass=$_POST['new_pass'];
	$new_passagain=$_POST['new_passagain'];
	$q="select * from customers where customer_pass='$old_pass' ";
$run=mysqli_query($con,$q);
if(mysqli_num_rows($run)==0)
{
	
	echo "<script>alert('Your password is not valid,Try again')</script>";
	exit();
}
if($new_pass!=$new_passagain)
{
	echo "<script>alert('New password didnot match ,Try again')</script>";
	exit();
}
else
{
	$update_pass="update customers set customer_pass='$new_pass' where customer_email='$email'";
	$q=mysqli_query($con,$update_pass);
	echo "<script>alert('Your password has been successfully updated')</script>";
	echo " <script>window.open('my_account.php','_self')</script>";
	
	
}
	
}






?>
<?php
@session_start();
include("includes/db.php");

?>
<div>
<form action="checkout.php" method="post">
</br>
<table width="600px" bgcolor="#66CCCC" align="center">
<tr align="center"><h2>LogIN and password</h2></tr>
<tr>
<td align="right"><b>Email:</b></td>
<td><input type="text" name="email"/></td>
</tr>

<tr>
<td align="right"><b>Password:</b></td>
<td><input type="password" name="c_pass" /></td></tr>
<tr><td><a  href="forgotpass.php" align="center"> Forgot Password</a></td></tr>
<tr align="center" ><td colspan="4"><input type="submit" name="c_login" value="login"/></td></tr>

</table>
</form>
<h2><a  href="customer_register.php" align="right"> New Registation</a></h2>
</div>
<?php
if(isset($_POST['email']))
{
	$ipp=getRealIpAdd();
	
	$cemail=$_POST['email'];	
	$cpass=$_POST['c_pass'];
	$q="select * from customers where customer_email='$cemail' and customer_pass='$cpass'";
	
	$run=mysqli_query($db,$q);
	$count1=mysqli_num_rows($run);
	$qr="select * from cart where ip_add='$ipp'";
	$rrun=mysqli_query($db,$qr);
	$count=mysqli_num_rows($rrun);
	if($count1==0)
	{
		echo "<script>alert('log in password is wrong')</script>";
		exit();
	}
	
	if($count1==1 AND $count==0 )
	{	
		$_SESSION['customer_email']=$cemail;
		echo "<script>window.open('my_account.php','_self')</script>";
	}

	else
	{
		
		$_SESSION['customer_email']=$cemail;
		echo "<script>alert('you can order now')</script>";
		include("payment_option.php");
	}
	
	
}




?>
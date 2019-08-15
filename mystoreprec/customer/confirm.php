<?php
@session_start();
include("includes/db.php");
global $order_id;
if(isset($_GET['order_id']))
{
	
	$order_id=$_GET['order_id'];
	
}


?>
<html>
<body bgcolor="white">
<form action="confirm.php?update_id=<?php echo $order_id ;?>" method="post">
<table align="center" width="500" bgcolor="#CCCCC" border="2">
<tr align="center">
<td colspan="5"><h2>please confirm your payment</h2></td>
</tr>
<tr>
<td align="right">Invoice no:</td>
<td><input type="text" name="invoic_no"/></td>

</tr>
<tr>
<td align="right">Amount sent</td>
<td><input type="text" name="amount"/></td>

</tr>
<tr>
<td align="right">select payment method</td>
<td><select name="payment_method">
<option>select payment</option>
<option>bank transfer</option>
<option>upi</option>
<option>paytam</option>
<option>paypal</option>
</select>
</td>

</tr>



<tr>
<td align="right">Transaction/Refrence id</td>
<td><input type="text" name="tr"/></td>

</tr>
<tr>
<td align="right">Easypaisa/UBI Code</td>
<td><input type="text" name="code"/></td>

</tr>
<tr>
<td align="right">Payment date</td>
<td><input type="text" name="date"/></td>

</tr>
</tr>
<tr align="center">

<td colspan="5"><input type="submit" name="confirm" value="confirm_payment"/></td>

</tr>

</table>
</form>
</body>
<html>
<?php
if(isset($_POST['confirm']))
{
		$order_id=$_GET['update_id']; 
	$invoic_no=$_POST['invoic_no'];
	$amount=$_POST['amount'];
	$payment_method=$_POST['payment_method'];
	$Refrence_id=$_POST['tr'];
	$code=$_POST['code'];
	$completed="completed";
	$Payment_date=$_POST['date'];
	$insert_payment="INSERT INTO `payments` (`invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES ('$invoic_no', '$amount',
	'$payment_method', '$Refrence_id', '$code', '$Payment_date')";
	$run=mysqli_query($con,$insert_payment);
	if($run)
	{
		
		echo "<h2 style='text-align:center; color:black;'>Your order will be completed within 24 hour</h2>";
	
		
	}
	else
	{
		
		echo "<h2 style='text-align:center; color:black;'>Your order will be completed within 14 hour</h2>";
	}
	$update_order="update customer_orders set order_status='$completed' where order_id='$order_id'";
	$run_order=mysqli_query($con,$update_order);
}
?>

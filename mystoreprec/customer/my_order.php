<?php
@session_start();
include("includes/db.php");

global $db;
	$email=$_SESSION['customer_email'];
$q="select * from customers where customer_email='$email' ";
$run=mysqli_query($db,$q);
$get=mysqli_fetch_array($run);
$c_id=$get['customer_id'];
?>
<center><h3>All Order Details</h3><center>
<table align="center" width="700" bgcolor="#6699FF">
<tr>

<th>Order no</th>
<th>Due amount</th>
<th>Invoice no</th>
<th>Total products</th>
<th>Order date</th>
<th>Paid/Unpaid</th>
<th>Status</th></tr>
<?php
$get_order="select * from customer_orders where customer_id='$c_id'";
$run_order=mysqli_query($con,$get_order);
$i=0;
while($run=mysqli_fetch_array($run_order))
{
	$order_id=$run['order_id'];
	$deuamunt=$run['due_amount'];
	$invoice_no=$run['invoice_no'];
	$products=$run['total_prodduct'];
	$data=$run['order_date'];
	$status=$run['order_status'];
	if($status=='pending')
	{
		$status='Unpaid';
		
		
	}
	else
	{
		$status='Paid';
		
	}
	++$i;
	echo "<tr align='center'> <td>$i</td><td>$deuamunt</td><td>$invoice_no</td><td>$products</td><td>$data</td><td>$status</td>
	<td><a href='confirm.php?order_id=$order_id'>Confirm if paid</td></tr>";
}
?>
</table>
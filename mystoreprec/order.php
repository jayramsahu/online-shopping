<?php
include("includes/db.php");
include("function/functions.php");

$ipp=getRealIpAdd();
if(isset($_GET['c_id']))
{
	$customor_id=$_GET['c_id'];
	

/* to find total price*/

$total=0;
	$ipp=getRealIpAdd();
	$q="select * from cart where ip_add='$ipp'";
	$run=mysqli_query($db,$q);

	$status="pending";
	$invoice_no=mt_rand();
	$count_pro=mysqli_num_rows($run);
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
	/*getting the quntity*/
		//$q="select * from cart where ip_add='$ipp'";
		$q="select * from cart where ip_add='$ipp'";
	$run=mysqli_query($db,$q);
		
	$qtt=mysqli_fetch_array($run);
	$qt=$qtt['qty'];
	
	
	if($qt==0)
	{
		
		$qt=1;
		
	
	}
	$sub_total=$qt*$total;
	
	
	$insert_order="INSERT INTO customer_orders (customer_id, due_amount, invoice_no, total_prodduct, order_date,
	order_status) VALUES ('$customor_id', '$sub_total',' $invoice_no', '$count_pro', NOW(), '$status')";
	$runn=mysqli_query($db,$insert_order);
	if($runn)
	{
		
		echo "<script>alert('order successfully submite Thank you')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		$e="delete * from cart where ip_add='$ipp'";
		$rrun=mysqli_query($db,$e);
		$pe="INSERT INTO `pending_orders` (`customer_id`, `invoice_no`, `prodduct_id`, `quntity`, `order_status`) 
		VALUES ('$customor_id','$invoice_no', '$p_id','$qt', '$status')";	
		$rrunn=mysqli_query($db,$pe);
		
	}
	
	
}

?>
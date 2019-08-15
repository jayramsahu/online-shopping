<html>
<head>
<title>Payment Option</title>
</head>
<body>
<?php
include("includes/db.php");
function getRealIpAd()
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
?>
<div>
<?php
$ipp=getRealIpAd();
$q="select * from customers where customer_ip='$ipp'";

$run=mysqli_query($con,$q);
$customer=mysqli_fetch_array($run);
$c_id=$customer['customer_id'];

?>



<b>Pay with</b>
<img src="images/paypal.png"><b>Or</b><a href="order.php?c_id=<?php echo $c_id;?>" > Pay Offline</a></b>




</div>
</body>
</html>
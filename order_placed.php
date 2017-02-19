<?php session_start();
$order_no=$_SESSION['order_no'];?>
<!DOCTYPE html>
<html>
<body>
<head>
		<title>Order</title>
		
	</head>
	<body >
	

	<?php require 'top_bar.html'?>
	<form action="transactions.php" method="post" align="right">
<button type ="submit" name="transactions" value="transactions"  class="btn btn-submit tiffin">Transactions</button>

</form>

	</body>
	</html>
	
	<?php
require 'dbconnection_code.php';

if (isset($_POST['confirm']))
{
	
   $total_price=trim($_POST['confirm']);

$mob=$_SESSION['user_mob_no'];
$wallet=$conn->query("SELECT wallet from registration where customer_mobile_number=$mob");

if($wallet->num_rows>0)
{
	$money=$wallet->fetch_object()->wallet;
	if ($money>$total_price){
		
	$money_left=$money-$total_price;
	$update="UPDATE registration SET wallet=$money_left where customer_mobile_number=$mob";
	$conn->query($update);
}
echo "<h4><center>Thank you ".$_SESSION['username']." for placing order <BR> ";

$or_no=$conn->query("SELECT order_no from order_table where order_no=$order_no AND customer_id=$mob");
if($or_no->num_rows>0)
{$order_no=$or_no->fetch_object()->order_no;

$_SESSION['order_no']=$order_no;
}

echo "Your Order Number is ".$order_no;
echo "<br>You have Ordered</h4>";

require 'temp_order_tracker.php';
$_SESSION['money_in_wallet']=$money_left;

?>
</center>
<h2 align="right">You are charged= <?php echo $total_price;?> <br>

Amount left in your Wallet= <?php echo $money_left;?></h2>
<?php 

}

}
else
{
	echo "<center> <h1>You are out of Balance <BR>Please contact us @9336345576 to continue this Service.</h1></center>";
}
require 'footer.html';
?>

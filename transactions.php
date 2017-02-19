
<?php

require 'dbconnection_code.php';
require 'security_1.php';
session_start();
$ite='item_';
$quantit='quantity_';
$pric='price_';
 $tquery = "SELECT MAX(num) as max FROM order_table";
   $tresult = $conn->query($tquery);
   $row = mysqli_fetch_array($tresult);
   $max = $row['max'] ;
   $mob=$_SESSION['user_mob_no'];
   $order_no=$_SESSION['order_no'];
  
?>
<!DOCTYPE html>
<html>
<body><?php require 'top_bar.html';?>
<h4 align="right">
<h3 align="Right"> 
<?php echo $_SESSION['username'];?>

<a href="sign_out.php">Sign out</a></h3>
			  <table class="table table-bordered  table-striped table-condensed" style="text-align:Center;font-variant:small-caps;background-color:white;font-size:18px;">
					<thead>
						<tr> <th>Order Number</th>
						<th>Order Date and Time</th>
						<th>Total Price</th>
  <?php
  for($i=1;$i<=$max;$i++){?>
							 <th>Name </th>
							
							<th>Quantity</th>
							
  <?php } ?>
						 </tr>
					</thead>
				<tbody>
<?php

    $or=$conn->query("SELECT order_no,order_date_time, total_price,num FROM order_table where customer_id=$mob  Order By order_no DESC");
	if ($or->num_rows>0)
	{
		
		while ($ord=$or->fetch_object())
		{
			$orde[]=$ord;
		
		}
	}
	foreach($orde as $con)
	{
		?><tr>
						    <td><?php echo escape($con->order_no);?></td>
							<td><?php echo escape($con->order_date_time);?></td>
							<td><?php echo escape($con->total_price);?></td><?php
		for($a=1;$a<=$con->num;$a++)
{
	$quantity=$quantit.$a;
	$item=$ite.$a;
	$price=$pric.$a;

	$pr=$conn->query("SELECT menu_list.t_item_name,order_table.$quantity FROM menu_list LEFT JOIN order_table ON menu_list.t_item_id=order_table.$item where order_table.customer_id=$mob");
	$records=array();
	if($pr->num_rows>0)
		{
			while($row=$pr->fetch_object())
				{
				$records[]=$row;
         			}
			foreach($records as $rec)
				{
					
					if (($rec->$quantity!=NULL))
						{ ?>
						
							<td><?php echo escape($rec->t_item_name);?></td>
							
							<td><?php echo escape($rec->$quantity);?></td>
						
			
						
				<?php break;} 
         		
				}  
		} 
} 

?></tr>
	<?php }
?>
</tbody>
</table>

<h2 align="right">

Amount left in your Wallet= <?php echo $_SESSION['money_in_wallet'];?></h2>

</body>
</html>

<?php 
session_unset();

session_destroy();
require 'footer.html';
$conn->close();
?>

<?php 
require 'dbconnection_code.php';
require 'security_1.php';
$custo_details=$conn->query("SELECT registration.wallet,registration.customer_mobile_number,registration.customer_name,registration.customer_email_id,registration.customer_address

FROM registration");?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="style.css">
<h2> Wallet Tracker </h2>
<table>
					<thead>
						<tr><th>SNo</th> 
						<th>Name</th>
						      <th>Mobile Number</th>
							  <th>Wallet</th>
							  <th>CREDIT/DEBIT</th>
							  <th>Email id</th>
							  <th>Address</th>
							  
							  
						</tr>
					</thead>
					<tbody>
  <?php
if($custo_details->num_rows>0)
		{ $sno=0;
			while($row=$custo_details->fetch_object())
				{
				$records[]=$row;
         			}
			foreach($records as $rec)
				{   $sno++;?><tr>
					<td><?php echo $sno;?></td>
					<td><?php echo escape($rec->customer_name);?></td>
					<td><?php echo escape($rec->customer_mobile_number);?></td>
					<td><?php echo escape($rec->wallet);?></td>
		            <td>
						 <form action="credit_debit.php" method="post">
							<button name="edit" type="submit" value="<?php echo $rec->customer_mobile_number?>">Edit</button>
						 </form>
					 </td>
					<td><?php echo escape($rec->customer_email_id);?></td>
					<td><?php echo escape($rec->customer_address);?></td>
					
					</tr>
				<?php }
		}
		?>
		</tbody>
</table>
<BR><BR>
<form action="order_tracker.html" method="post">
						<button type="submit" name="back" value="back" >
							Order Tracker</</button>
							</form>
</body>
</html>

<?php 
$conn->close();
?>

		
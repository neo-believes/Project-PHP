<?php 
require 'dbconnection_code.php';
require 'security_1.php';
$custo_details=$conn->query("SELECT order_table.order_date_time,order_table.order_no,registration.customer_mobile_number,registration.customer_name,registration.customer_email_id,registration.customer_address

FROM order_table LEFT JOIN registration
ON 
order_table.customer_id=registration.customer_mobile_number");?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="style.css">
<table>
					<thead>
						<tr><th>SNo</th> 
						<th>Name</th>
						      <th>Mobile Number</th>
							  <th>Email id</th>
							  <th>Address</th>
							  <th>Order Number</th>
							  <th>Order Date and Time</th>
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
					<td><?php echo escape($rec->customer_email_id);?></td>
					<td><?php echo escape($rec->customer_address);?></td>
					<td><?php echo escape($rec->order_no);?></td>
					<td><?php echo escape($rec->order_date_time);?></td>
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

		
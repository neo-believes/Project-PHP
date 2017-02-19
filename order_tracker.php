
<?php

require 'dbconnection_code.php';
require 'security_1.php';
$ite='item_';
$quantit='quantity_';
$pric='price_';

?>
<!DOCTYPE html>
<html>
<body>
<table>
					<thead>
						<tr> <th>customer_name</th>
                             <th>customer contact_number</th>
                              <th>delivery_address</th>
							 <th>item_Name </th>
							<th>Price Per Item</th>
							<th>Quantity</th>
							<th>Price</th>
						 </tr>
					</thead>
				<tbody>
<?php
$t_p=$conn->query("SELECT order_table.total_price FROM order_table ");

for($a=1;$a<=3;$a++)
{
	$quantity=$quantit.$a;
	$item=$ite.$a;
	$price=$pric.$a;

	
	$pr=$conn->query("SELECT menu_list.t_item_name,menu_list.t_item_price,order_table.$quantity,order_table.$price FROM menu_list FULL JOIN order_table ON menu_list.t_item_id=order_table.$item ");
	$records=array();
	if($pr->num_rows>0)
		{
			while($row=$pr->fetch_object())
				{
				$records[]=$row;
         			}
			foreach($records as $rec)
				{
					if (($rec->$quantity!=NULL) && ($rec->$quantity!=NULL))
						{ ?>
						<tr>
							<td><?php echo escape($rec->t_item_name);?></td>
							<td><?php echo escape($rec->t_item_price);?></td>
							<td><?php echo escape($rec->$quantity);?></td>
							<td><?php echo escape($rec->$price);?></td>
						</tr>
				<?php } 
         		
				}  
		} 
} 
if ($t_p->num_rows>0)
{
$tot_pr=$t_p->fetch_object()->total_price; ?>
<tr>
<td><?php echo "Total ="?></td>
<td> <?php echo escape($tot_pr);?></td>
</tr>
<?php 
}
?>
</tbody>
</table>



</body>
</html>

<?php 
$conn->close();
?>

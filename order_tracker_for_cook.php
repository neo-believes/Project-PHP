
<?php

require 'dbconnection_code.php';
require 'security_1.php';

$ite='item_';
$quantit='quantity_';
$pric='price_';
 $tquery = "SELECT MAX(num) as max FROM order_table";
   $tresult = $conn->query($tquery);
   $row = mysqli_fetch_array($tresult);
   $max = $row['max'] ;
  
?>
<!DOCTYPE html>
<html>
<body><link rel="stylesheet" type="text/css" href="style.css">
<table>
					<thead>
						<tr> <th>Order Number</th>
  <?php
  for($i=1;$i<=$max;$i++){?>
							 <th>item_Name </th>
							
							<th>Quantity</th>
  <?php } ?>
						 </tr>
					</thead>
				<tbody>
<?php

    $or=$conn->query("SELECT order_no, num FROM order_table Order By order_no ASC");
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
						    <td><?php echo escape($con->order_no);?></td><?php
		for($a=1;$a<=$con->num;$a++)
{
	$quantity=$quantit.$a;
	$item=$ite.$a;
	$price=$pric.$a;

	$pr=$conn->query("SELECT menu_list.t_item_name,order_table.$quantity FROM menu_list LEFT JOIN order_table ON menu_list.t_item_id=order_table.$item ");
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


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
   $mob=$_SESSION['user_mob_no'];
    $order_no=$_SESSION['order_no'];
  
?>
<!DOCTYPE html>
<html>
<body><link rel="stylesheet" type="text/css" href="style.css">

			  <table class="table table-bordered  table-striped table-condensed" style="text-align:Center;font-variant:small-caps;background-color:white;font-size:18px;width:450px;">
					<thead>
						<tr>
						<th style="text-align:center;" ><h4><B>SNo.</B></h4></th>
						<th style="text-align:center;" ><h4><B>Item</B></h4></th>
							<th style="text-align:center;" ><h4><B>Quantity</B></h4></th>
							
 
						 </tr>
					</thead>
				<tbody>
<?php

    $or=$conn->query("SELECT num FROM order_table where order_no=$order_no");
	if ($or->num_rows>0)
	{
		
		while ($ord=$or->fetch_object())
		{
			$orde[]=$ord;
		
		}
	}
	
	foreach($orde as $con)
	{
		?>
						    <?php
		for($a=1;$a<=$con->num;$a++)
{
	$quantity=$quantit.$a;
	$item=$ite.$a;
	$price=$pric.$a;

	$pr=$conn->query("SELECT menu_list.t_item_name,order_table.$quantity FROM menu_list LEFT JOIN order_table ON menu_list.t_item_id=order_table.$item where order_no=$order_no");
	$records=array();
	$i=0;
	if($pr->num_rows>0)
		{
			while($row=$pr->fetch_object())
				{
				$records[]=$row;
         			}
			foreach($records as $rec)
				{ 	
					
					if (($rec->$quantity!=NULL))
						{ 
					 ?><tr>
						     <td><?php echo $a;?></td>
							<td><?php echo escape($rec->t_item_name);?></td>
							
							<td><?php echo escape($rec->$quantity);?></td>
						    
			
						</tr>
				<?php break;} 
         		
				}  
		} 
} 

?>
	<?php }
?>
</tbody>
</table>
</body>
</html>

<?php 
$conn->close();
?>


<?php
session_start();
require 'dbconnection_code.php';
require 'security_1.php';
$ite='item_';
$quantit='quantity_';
$pric='price_';
$mob=$_SESSION['user_mob_no'];
$order_no=$_SESSION['order_no'];

?>
<!DOCTYPE html>
<html>
<body>

	<head>
		<title>MENU</title>
	
	</head>
	<body background="img/b3.jpg" style="background-repeat: no-repeat;opacity:1.0;height:0.3% ;width=0.5%">

	<?php require 'top_bar.html';?>
	


			  <table class="table table-bordered  table-striped table-condensed" style="text-align:Center;font-variant:small-caps;background-color:white;font-size:18px;width:450px;">
					<thead>
						<tr>
						
							<th style="text-align:center;" ><h4><B>Name</B></h4></th>
							<th style="text-align:center;" ><h4><B>Price Per Item</B> </h4></th>
							<th style="text-align:center;" ><h4><B>Quantity </B></h4></th>
						<th style="text-align:center;" ><h4><B>Price</B></h4></th>
						
							 
						 </tr>
					</thead>
				<tbody>
<?php
$t_p=$conn->query("SELECT order_table.total_price FROM order_table WHERE order_table.order_no=$order_no");

for($a=1;$a<=$_SESSION['quantity'];$a++)
{
	$quantity=$quantit.$a;
	$item=$ite.$a;
	$price=$pric.$a;

	
	$pr=$conn->query("SELECT menu_list.t_item_name,menu_list.t_item_price,order_table.$quantity,order_table.$price FROM menu_list LEFT JOIN order_table ON menu_list.t_item_id=order_table.$item AND order_table.order_no=$order_no");
	$records=array();
	if($pr->num_rows>0)
		{
			while($row=$pr->fetch_object())
				{
				$records[]=$row;
         			}
			foreach($records as $rec)
				{
					if (($rec->$quantity!=NULL) && ($rec->$price!=NULL))
						{ ?>
						<tr>
							<td><?php echo escape($rec->t_item_name);?></td>
							<td><?php echo escape($rec->t_item_price);?></td>
							<td><?php echo escape($rec->$quantity);?></td>
							<td><?php echo escape($rec->$price);?></td>
						</tr>
				<?php break;} 
         		
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


<form action="order_placed.php" method="post">
<center>
				<button type="submit" name="confirm" value="<?php echo $tot_pr;?>" class="btn btn-submit tiffin" style="margin: 75px 00px 00px 00px ;">YES,proceed</button></center>

</form>
<form action="cancel.php" method="post">

<center>
				<button type="submit" name="cancel" value="cancel" class="btn btn-submit tiffin"style="margin: 05px ;">Cancel</button></center>
</form>

	</div>
	<?php require 'footer.html'?>
</body>
</html>

<?php 
$conn->close();
?>


<?php
session_start();
require 'dbconnection_code.php';
require 'security_1.php'; ?>

<!DOCTYPE html>
<?php

$records=array();
if(isset($_SESSION['user_mob_no'],$_SESSION['username']))
{ 
$mob=$_SESSION['user_mob_no'];
$order_no=$_SESSION['order_no'];
 if($results=$conn->query("SELECT * FROM order_table WHERE  order_no=$order_no AND customer_id=$mob"))
 { 
    if($results->num_rows)
	{
	   while($row=$results->fetch_object()){
			$records[]=$row; 
			}
	   $results->free();
	   ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Order</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body background="img/b2.jpg" style="background-repeat: no-repeat;opacity:1.0">

	

<?php require 'top_bar.html'?>
	<div class="content">

			  <table class="table table-bordered  table-striped table-condensed" style="text-align:Center;font-variant:small-caps;background-color:white;font-size:18px;width:450px;">
					<thead>
						<tr>
						    <th style="text-align:center;" ><h4><B>Name</B></h4></th>
							<th style="text-align:center;" ><h4><B>Price</B> </h4></th>
							<th style="text-align:center;" ><h4><B>Quantity </B></h4></th>
							
							
						</tr>
					</thead>
				<tbody>
				<form action="billing_page.php" method="post">
				<?php $b='item_';$c='quantity_';
					foreach($records as $rec)
					{
						for($a=1;$a<= $_SESSION['quantity'];$a++)
						{
                            
							$var=$b.$a; 
                            $var2=$c.$a;
								$t_nam=$conn->query("SELECT menu_list.t_item_name FROM menu_list LEFT JOIN order_table ON menu_list.t_item_id=order_table.$var where order_table.order_no=$order_no");
								$t_pri=$conn->query("SELECT menu_list.t_item_price FROM menu_list LEFT JOIN order_table ON menu_list.t_item_id=order_table.$var where order_table.order_no=$order_no");				
if ($t_nam->num_rows>0)
		{
		$nam=$t_nam->fetch_object()->t_item_name;}
		if($t_pri->num_rows>0)
		{
			$pri=$t_pri->fetch_object()->t_item_price;
		}
		 ?>
					<tr>
							<td><?php echo escape($nam);?></td>
							<td><?php echo escape($pri);?></td>
                            <td>
								<div class="field">
								<label for="item_id">
								</label><input type="number" name="<?php echo $var2;?>" min="1" max="5">
								</div>
								</td>
							</tr>
				<?php	}
					}
				?>
					
			    </tbody>
</table>
<center>
				<button type="submit" name="order" value="order" class="btn btn-submit tiffin"style="margin: 75px ;">Order</button></center>
			</form>

				</div>
	<?php require 'footer.html';?>
	
</body>
</html>
<?php
	}
else
    {
echo "No row founded";
	}
}
else
{

	session_unset();

session_destroy(); 
header("Location: front_end_error_page.php");
}
}
else 
{
	header("Location:login.php");
}


$conn->close();
?>
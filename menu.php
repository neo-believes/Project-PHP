<?php
session_start();
require 'dbconnection_code.php';
require 'top_bar.html';
require 'security_1.php'; 

$records=array();
 if($results=$conn->query("SELECT * FROM menu_list")) {
    if($results->num_rows){
	   while($row=$results->fetch_object()){
			$records[]=$row;
			}
	   $results->free();
	   ?>
	   
<!DOCTYPE html>
<html>
	<head>
		<title>MENU</title>
		
	</head>
	<body background="img/b.jpg" style="background-repeat: no-repeat;">
	

<div class="container">
            
  <table class="table table-bordered  table-striped table-condensed" style="text-align:Center;font-variant:small-caps;font-size:18px;width:450px;">
	<div class="content">
					<thead >
						<tr >
						    <th style="text-align:center;" ><h4><B>Tick-Tock</B></h4></th>
							<th style="text-align:center;" ><h4><B>Item Name</B> </h4></th>
							<th style="text-align:center;" ><h4><B>Item Price </B></h4></th>
						</tr>
					</thead>
				<tbody>
				<form action="order_list.php" method="post">
				<?php 
				foreach($records as $rec){
				?>
					<tr>
					<td><input type="checkbox" name="check[]" value="<?php echo $rec->t_item_id;?>"></td>
					    <td><?php echo escape($rec->t_item_name);?></td>
						<td><?php echo escape($rec->t_item_price);?></td>
				     
						
				    </tr>
					
					<?php
					}
					
					?>
					
			    </tbody>
				</div>
				</table>
				</div><center>
				<button type="submit" name="order" value="order" class="btn btn-submit tiffin"style="margin: 75px ;">Add to your Tiffin</button></center>
				</form>


<?php require 'footer.html';?>
	
</body>
</html>
<?php
	}
else
    {
echo "No Rows founded";
 }}
$conn->close();
?>
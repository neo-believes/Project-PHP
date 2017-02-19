<?php 
 require 'dbconnection_code.php'; 
 require 'security_1.php'; 

$records=array();
 if($results=$conn->query("SELECT * FROM Menu")) {
    if($results->num_rows){
	   while($row=$results->fetch_object()){
			$records[]=$row;
			}
	   $results->free();
	   }
	
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Menu</title>
	</head>
	<body>
		<h1> Menu </h1>
		<?php 
		if(!count($records)){
			echo'No Records';
			}else {
			?> 
				<table>
					<thead>
						<tr>
							<th>Item ID </th>
							<th>Item Name </th>
							<th>Item Price </th>
							<th>Item Description </th>
							<th> EDIT </th>
						</tr>
					</thread>
				<tbody>
				<?php
				foreach($records as $rec){
				?>
					<tr>
						<td><?php echo escape($rec->item_id);?></td>
						<td><?php echo escape($rec->item_name);?></td>
						<td><?php echo escape($rec->item_price);?></td>
				        <td><?php echo escape($rec->item_description);?></td>
				        <td>
						     <form action="edit_menu.php" method="post">
                             <button name="edit" type="submit" value="<?php echo $rec->item_no;?>">Edit</button>
							 </form>
					    </td>  
 
					</tr>
					<?php
					}
					?>
			    </tbody>
				</table>
			<?php
			}
		?>
		<iframe src="demo.php" align="right" height="50%" Width="50%"><?php include 'demo.php'?></iframe>
</body>
</html>			
			
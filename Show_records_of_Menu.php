<?php 
 require 'dbconnection_code.php'; 
 require 'security_1.php'; 
 $records=array();
 if($results=$conn->query("SELECT * FROM Menu")) 
 {
    if($results->num_rows){
	   while($row=$results->fetch_object())
	   {
			$records[]=$row;
			}
	   $results->free();
	   }
	
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>MENU</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<div id="header-wrapper">
		<div id="header" >
			<div id="logo">
				<h1>DAILY MEALS</h1>
				<p>Much needed freedom</p>
			</div>
		</div>
	</div>
	<div class="content">
		<h1 class="menu"> Menu </h1> 
		<div class="addlist">
			<h4 align="Right"> 
				<a href="add_item.php">Add Records</a>
				<a href="menu_list.php">Menu List</a>
				<a href="wallet_tracker.php">Wallet Tracker</a>
			</h4>
		</div>
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
							<th> DELETE </th>
						</tr>
					</thead>
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
						<td>
						     <form action="delete_records.php" method="post">
								<button name="delete" type="submit" value="<?php echo $rec->item_id;?>">DELETE</button>
							 </form>
					    </td> 
 
					</tr>
					
					<?php
					}
					?>
				
			    </tbody>
			</table>
	</div>
	
			<?php
			}
		//header("Refresh:0.5");
		?>
		<BR><BR>
<form action="order_tracker.html" method="post">
						<button type="submit" name="back" value="back" >
							Order Tracker</button>
							</form>
</body>
</html>			
			
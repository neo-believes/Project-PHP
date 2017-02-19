<?php
require 'dbconnection_code.php';
require 'security_1.php'; ?>

<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="style.css">
<h4 align="Right"> 
<a href="add_items_to_menu_list.php">Add Items</a>
<a href="empty_menu_list.php">Delete All</a>
</h4>
<h1><u> Menu List</u></h1>
</body>
</html>
<?php

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
<body>
<table>
					<thead>
						<tr>
						    <th>Item ID </th>
							<th>Item Name </th>
							<th>Item Price </th>
							<th>Item Description </th>
							<th>Delete</th>
							
						</tr>
					</thead>
				<tbody>
				<?php
				foreach($records as $rec){
				?>
					<tr>
					    <td><?php echo escape($rec->t_item_id);?></td>
						<td><?php echo escape($rec->t_item_name);?></td>
						<td><?php echo escape($rec->t_item_price);?></td>
				        <td><?php echo escape($rec->t_item_description);?></td>
						<td><form action="delete_item_from_menu_list.php" method="post">
                             <button name="delete" type="submit" value="<?php echo $rec->t_item_id;?>">DELETE</button>
							 </form>
							 </td>
				    </tr>
					
					<?php
					}
					?>
				
			    </tbody>
				</table>
				<form action="Show_records_of_Menu.php" method="post">
				<br>
				<br>
<button type="submit"  align="right" name="back" value="back">
Go Back</button>
</form>
</body>
</html>
<?php
	}
else
    {
echo "No row founded";
 }}
$conn->close();
?>
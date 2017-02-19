<?php 
require 'dbconnection_code.php'; 
 if(isset($_POST['delete']))
	 {
		$delete_item_id = trim($_POST['delete']);
		$sql = "DELETE FROM `backend`.`menu` WHERE `menu`.`item_id` = $delete_item_id";


if ($conn->query($sql) === TRUE) 
{
    echo "Record with ".$delete_item_id." ID deleted successfully";

} else 
{
    echo "Error deleting record: " . $conn->error;
}
	 }

     
 ?>
 <!DOCTYPE HTML>
				<html>
					<body>
						<h4 align="center">
						<a href ="Show_records_of_Menu.php" > Show Records</a>
						</h4>
					</body>		 
				</html>
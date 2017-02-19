
<!DOCTYPE HTML>
<html>
<body>
<center>

<form action="" method="post">
<button name="Truncate" type="submit" method="post">Yes</button>
</form>
<form action="menu_list.php" method="post">
<button  name="back" type="submit" method="post">No</button>
</form>
</center>
</body>
</html> 

<?php 
$conts=0;
require 'dbconnection_code.php';

if (isset($_POST['Truncate']))
	{
		$update="UPDATE `backend`.`menu` SET `item_counter` = '0'";											
		$delete = "TRUNCATE backend.menu_list";
		if (($conn->query($update) === TRUE) &&($conn->query($delete) === TRUE) ) 
			{
				$conts=1;

			}
		else 
			{
				echo "Query not Exceuted";
				include "error_script.php";
			}
		if ($conts==1)
			{
				header("Refresh:0.1; url=menu_list.php");
			}
	}?>
<?php
require 'dbconnection_code.php'; 
//include 'Show_records_of_Menu.php';
$conts=0;

$records=array();

 if($results=$conn->query("SELECT * FROM menu")) 
 {
    if($results->num_rows)
	{
	   while($row=$results->fetch_object())
	   {
			$records[]=$row;
			}
	   $results->free();
		if(isset($_POST['delete']))
					{
					$check = trim($_POST['delete']);
							foreach($records as $rec)
								{
									if($check==$rec->item_id)
										{
											$update="UPDATE `backend`.`menu` SET `item_counter` = '0' WHERE `menu`.`item_id` = $check";											
											$delete = "DELETE FROM `backend`.`menu_list` WHERE `menu_list`.`t_item_id` = $check";
								            if (($conn->query($update) === TRUE) && ($conn->query($delete) === TRUE)) 
											{$conts=1;
											}
											break;
										}	
									}				
						
					if ($conts==1)
						{
							header("Refresh:0.1; url=menu_list.php");
						}

					} 
					
	}
					
 }				?>
	
   
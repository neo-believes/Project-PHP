<?php 
require 'dbconnection_code.php';
$counts=0;
if($results=$conn->query("SELECT * FROM menu"))
	{   
         $counter=$results->num_rows;
		if($counter)
			{
				while($row=$results->fetch_object())
				{
				$records[]=$row;
				}
				$results->free();
				$counte=0;
				foreach($records as $rec)
				{
					if($rec->item_counter=='1')
						{	
							$counte=$counte + 1;
						}
					else 
						{
						$counte = $counte;
						}
				}
				if ($counte==$counter)
				{
					echo "No items to add in Menu List please refer to Menu table to view all records";
				}
				else {
                		
					if(isset($_POST['check_to_add']))
						{
							$check = $_POST['check'];
							for ($u=0;$u<sizeof($check);$u++)
								{
									foreach($records as $rec)
										{
											if($check[$u]==$rec->item_no)
												{
													$item_no=$check[$u];
													$item_id=$rec->item_id;
													$item_name=$rec->item_name;
													$item_price=$rec->item_price;
													$item_description=$rec->item_description;
													$update=$conn->query("UPDATE menu SET item_counter=1 WHERE item_no=$item_no");				
													$insert= $conn->prepare("INSERT INTO menu_list (t_item_id,t_item_name,t_item_price,t_item_description) VALUES (?,?,?,?)");
													$insert->bind_param("isis",$item_id,$item_name,$item_price,$item_description);
													$counts=1;
													$insert->execute();		
													break;
												}
											
											
										}
								}				
						
							if ($counts==1)
								{
									header("Refresh:0.1; url=menu_list.php");
								}
							else 
								{
								echo "No Item added in Menu List";
								}	
						}
					 }
			}
		else
			{
				echo "Number of rows ectracted is Zero";
			}
	}
else
	{			
       echo "Query not sucessful";
	}
$conn->close();
?>
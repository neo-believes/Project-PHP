<?php
require 'dbconnection_code.php'; 
//include 'Show_records_of_Menu.php';

if(isset($_POST['submit']))
{
   $item_no = trim($_POST['submit']);
   if(isset($_POST['item_id'],$_POST['item_name'],$_POST['item_price'],$_POST['item_description'])) 
	{
		$item_id = trim($_POST['item_id']);
		$item_name = trim($_POST['item_name']);
		$item_price = trim($_POST['item_price']);
		$item_description = trim($_POST['item_description']);
		$records=array();
		if($results=$conn->query("SELECT item_no,item_id,item_name FROM Menu"))
			{
				if($results->num_rows)
				{
					while($row=$results->fetch_object())
						{
						$records[]=$row;
						}
				$results->free();
				}
			}	
	
		
		foreach($records as $rec)
			{
				if($rec->item_id==$item_id)
					{
						if($rec->item_no==$item_no)
						{
							
						$count=0;break;
						}
                        else
						{
							$count=1;break;
						}							
					}
				else
					{
					$count=0;
					
					}			
			}
		foreach($records as $rec)
			{
			 if($rec->item_name==$item_name)
					{
					 if($rec->item_no==$item_no)
						{
							$coun=0;break;
						}
                        else
						{
							$coun=1;break;
						}							
					}
				else
					{
					$coun=0;
					
					}			
			}
		
         if($coun==0 && $count==0)
				{
				if (!empty ($item_id) && !empty ($item_name) && !empty ($item_price) || !empty ($item_description)) 
						{
							$update= $conn->prepare("UPDATE menu SET
							item_id=?,
							item_name=?,
							item_price=?,
							item_description=?
							where item_no=?");
							$update->bind_param("isisi",$item_id,$item_name,$item_price,$item_description,$item_no);
                            $update->execute();
							if($update)
							{
								header("Refresh:0.1; url=Show_records_of_Menu.php");
								//print 'Success! record updated';
							}
							else
							{
								print 'Error : ('. $conn->errno .') '. $conn->error;
								}
						}
						else 
						{
							echo "Fields are Empty";
						}
				} 
				elseif($coun==0 && $count==1)
		  {
			  echo "Item ID= ".$item_id." already exits";
			  ?>
				<!DOCTYPE HTML>
				<html>
					<body>
						<h4 align="center">
						<a href ="Show_records_of_Menu.php" > Show Records</a>
						</h4>
					</body>		 
				</html>
				<?php
		  }
			elseif($coun==1 && $count==0)
		  {
			  echo "Item name = ".$item_name." already exits";
			  ?>
				<!DOCTYPE HTML>
				<html>
					<body>
						<h4 align="center">
						<a href ="Show_records_of_Menu.php" > Show Records</a>
						</h4>
					</body>		 
				</html>
				<?php
		  }
		  else 
		  {
			  echo "Item ID = ".$item_id." and Item Name= ".$item_name." already exits";
		  
				?>
				<!DOCTYPE HTML>
				<html>
					<body>
						<h4 align="center">
						<a href ="Show_records_of_Menu.php" > Show Records</a>
						</h4>
					</body>		 
				</html>
				<?php
				}
	}
	else
     {
	 echo "typo error";
	  }	
	
}
 
?>

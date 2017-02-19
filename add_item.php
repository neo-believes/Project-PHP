<?php
require 'dbconnection_code.php';
$coun=0;
$count=0;
if(!empty($_POST))
{
   if(isset($_POST['item_id'],$_POST['item_name'],$_POST['item_price'],$_POST['item_description'])) 
	{
		$item_id = trim($_POST['item_id']);
		$item_name = trim($_POST['item_name']);
		$item_price = trim($_POST['item_price']);
		$item_description = trim($_POST['item_description']);
		$records=array();
		if($results=$conn->query("SELECT item_id,item_name FROM Menu"))
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
						
							$count=1;break;
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
						
							$coun=1;break;
					}
				else
					{
					$coun=0;
					
					}			
			}
   
   
		if($coun==0 && $count==0)
			{
				if (!empty ($item_id) && !empty ($item_name) && !empty ($item_price) || !empty ($item_description)) 
					{ $i=0;
						$insert= $conn->prepare("INSERT INTO menu (item_id,item_name,item_price,item_description,item_counter) VALUES (?,?,?,?,?)");
						$insert->bind_param("isisi",$item_id,$item_name,$item_price,$item_description,$i);
						if($insert->execute())
							{
								header('location add_item.php');
								//die();
							}	
					}	
				else 
					{
						echo "Fields are Missing";
						
					}
				
			}
		elseif($coun==0 && $count==1)
			{
				echo "<h2>";
				echo "Item ID= ".$item_id." already exits";
				echo "</h2>";
			}
		elseif($coun==1 && $count==0)
			{
				echo "<h2>";
				echo "Item name = ".$item_name." already exits";
				echo "</h2>";
			}
			else 
			{
				echo "<h2>";
				echo "Item ID = ".$item_id." and Item Name= ".$item_name." already exits";
				echo "</h2>";
			}
	} 
}  

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>ADD ITEM</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	
<div class="content">
<h2>Add item </h2>
<h3 align="Right">
		<a href="Show_records_of_Menu.php">Show Records</a>
		</h3>
		<div id="contact">
<form action="add_item.php" method="post"  enctype="multipart/form-data">
	<div class="field">
		<label for="item_id">Enter Item ID:</label>
		<input type="text" name="item_id"  id="item_id" autocomplete="off"> 
	</div>
	<div class="field">
		<label for="item_name">Enter Item Name:</label>
		<input type="text" name="item_name" id="item_name" autocomplete="off">
	</div>
	<div class="field">
		<label for="item_price">Enter Item Price:</label>
		<input type="text" name="item_price" id ="item_price" autocomplete="off" >
	</div>
	<div class="field">
		<label for="item_description">Enter Item Description:</label>
		<textarea name="item_description" id="item_description" ></textarea>
	</div>


<input type="submit" name="sub" value="Submit">

</form>
</div>
</div>



</body>
</html>
<?php $conn->close(); 
?>

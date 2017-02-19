
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="style.css">
<h4 align="Right">
		<a href="Show_records_of_Menu.php">Show Records</a>
		</h4>
<h1>Add to Menu List </h1>
<?php 
require 'dbconnection_code.php';
require 'security_1.php'; 
$records=array();
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
					?>
                		
<form action="actio_page.php" method="post"  enctype="multipart/form-data">



<table>
					<thead>
						<tr>
						    <th>Check<th>
							<th>Item ID </th>
							<th>Item Name </th>
							<th>Item Price </th>
							<th>Item Description </th>
							
						</tr>
					</thead>
				<tbody>
				<?php
				foreach($records as $rec)
				{
					if ($rec->item_counter=='0')
					{
				?>
					<tr>
					    <td><input type="checkbox" name="check[]" value="<?php echo $rec->item_no;?>"> </td>
						<td></td>
						<td><?php echo escape($rec->item_id);?></td>
						<td><?php echo escape($rec->item_name);?></td>
						<td><?php echo escape($rec->item_price);?></td>
				        <td><?php echo escape($rec->item_description);?></td>
				        
 
					</tr>
					
					<?php
					}
					
				}
					
					?>
				
			    </tbody>
				</table>









<input type="submit" name="check_to_add" value="Add">

</form> 


</body>
</html>

<?php
	

				}
			}
	}
	else
	{			
       echo "Query not sucessful";
	}
	
$conn->close();
?>
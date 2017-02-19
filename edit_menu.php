<?php 
require 'dbconnection_code.php'; 
 if(isset($_POST['edit']))
	 {
		$edit_item_no = trim($_POST['edit']);
     
 ?>

<!DOCTYPE HTML>
<html>
	<body><link rel="stylesheet" type="text/css" href="style.css">
	<div class="content">
	<div id="contact">
		<form action="update_menu.php" method="post" enctype="multipart/form-data">
		<div class="field">
		<label for="item_id">Enter Item ID:</label>
		<input type="text" name="item_id"  id="item_id"
		value="<?php $d=$conn->prepare("SELECT item_id FROM Menu where item_no=$edit_item_no");
		$d->execute();
		$d->bind_result($temp1);
		$d->fetch();
		echo $temp1;
         $d->close();
		?>"> 
		
		</div>
		<div class="field">
		<label for="item_name">Enter Item Name:</label>
		<input type="text" name="item_name" id="item_name"
        value="<?php $d=$conn->prepare("SELECT item_name FROM Menu where item_no=$edit_item_no");
		$d->execute();
		$d->bind_result($temp);
		$d->fetch();
		echo $temp;
         $d->close();
		?>"		>
		</div>
		<div class="field">
		<label for="item_price">Enter Item Price:</label>
		<input type="text" name="item_price" id ="item_price" maxlength="4"
		value="<?php $d=$conn->prepare("SELECT item_price FROM Menu where item_no=$edit_item_no");
		$d->execute();
		$d->bind_result($temp);
		$d->fetch();
		echo $temp;
         $d->close();
		?>" >
		</div>
		<div class="field">
		<label for="item_description">Enter Item Description:</label>
		<textarea name="item_description" id="item_description" rows="6" >
		<?php $d=$conn->prepare("SELECT item_description FROM Menu where item_no=$edit_item_no");
		$d->execute();
		$d->bind_result($temp);
		$d->fetch();
		echo $temp;
         $d->close();
		?>
		</textarea>
		</div>


<button type="submit" name="submit" value="<?php echo $edit_item_no?>" class="btn btn-submit">Submit</button>
</form>
</div>
</div>
</body>
</html>
<?php } 
else { echo "No Records Fetched";}
?>

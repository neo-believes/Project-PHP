<?php 
require 'dbconnection_code.php'; 
 if(isset($_POST['edit']))
	 {
		$edit_id = trim($_POST['edit']);
     
 ?>

<!DOCTYPE HTML>
<html>
	<body><link rel="stylesheet" type="text/css" href="style.css">
	<div class="content">
	<div id="contact">
		<form action="update_credit_debit.php" method="post" enctype="multipart/form-data">
		<div class="field"><h2>
		 Customer ID :
		
		<?php echo $edit_id;?>
		</h2>
		 
  
		
		</div>
	<div class="field">
		<label for="c_d_amount">Credit/Debit Amount:</label>
		<input type="text" name="c_d_amount" id="c_d_amount"
        value="<?php $d=$conn->prepare("SELECT wallet FROM registration where customer_mobile_number=$edit_id");
		$d->execute();
		$d->bind_result($temp);
		$d->fetch();
		echo $temp;
         $d->close();
		?>"		>
		</div>


<button type="submit" name="submit" value="<?php echo $edit_id;?>" class="btn btn-submit">Submit</button>
</form>
</div>
</div>
</body>
</html>
<?php } 
else { echo "No Records Fetched";}
?>

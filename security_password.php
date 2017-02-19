<?php
require 'dbconnection_code.php';

if(isset($_POST['submit']))
{    $mobile_number=trim($_POST['submit']);
     $password=trim($_POST['new_password']);
	$re_password=trim($_POST['re_password']);
	if($password==$re_password)
	{
        $update_password= "UPDATE `backend`.`registration` SET `customer_password` = '".$password."' WHERE `registration`.`customer_mobile_number` = '".$mobile_number."'";
		if($conn->query($update_password)=== TRUE)
		{
		 session_start();
		 
	    $u_name =$conn->query("SELECT customer_name FROM registration WHERE customer_mobile_number='".$mobile_number."'");
		if($u_name->num_rows > 0){
		$user_name=$u_name->fetch_object()->customer_name;
	
}
		$_SESSION['username']=$user_name;
		
		 $_SESSION['user_mob_no']=$mobile_number;
		 header("LOCATION:home.php");
		 
		}
		else{
			
		    require 'front_end_error_page.html';
		}
	
	}
	else
	{   
        ?>
        <!DOCTYPE HTML>
		<html>
		<body>
         <h1>Password didn't match </h1><br> <h1>please re-enter</h1>
	<form  class="form-horizontal" role="form" action="security_password.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label class="control-label col-sm-2"  for="new_password">Please choose a password</label>
				<div class="col-sm-10">
			<input type="password" class="form-control" name="new_password" id="new_password" autocomplete="off" required>
		</div></div>
		<div class="field">
			<label class="control-label col-sm-2"  for="re_password">Re-enter password to confirm</label>
			<div class="col-sm-10">
	<input type="password" class="form-control" name="re_password" id="re_password" autocomplete="off" required>
		</div></div>
		<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10"><br>
		<button ==type="submit" name="submit" value=<?php echo $mobile_number;?>>SUBMIT</button>
		</div>
		</div>
	</form>
		</body>
		</html>
		
	<?php		
	}
}
else{
  require 'front_end_error_page.html';
}

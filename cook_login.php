<?php

require 'dbconnection_code.php';
$name='cook';
$pass='staff';
if(isset($_POST['submit']))
{ 
   $login_id=trim($_POST['login_id']);
   $pwd=trim($_POST['pwd']);
   if ($pass==$pwd)
	{
		header("location:order_tracker_for_cook.php");
	}
	else
	{
		header("location:cook_login.php");
	}
}
else {
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Cook Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<body>
<div id="header-wrapper">
	<div id="header" >
		<div id="logo">
			<h1>DAILY MEALS</h1>
			<p>Much needed freedom</p>
		</div>
	</div>
</div>
<br><br><br><br><br>
<div class="content"><center>
	<form action=" " method="post" enctype="multipart/form-data" style="margin:10px;">
	<div class="field">
		<label for="login_id">Enter your Name:<br></label>
		<input type="text" name="login_id"  id="login_id" autocomplete="off" required> 
	</div>
	<div class="field">
			<label for="pwd">Enter your Password:<br></label>
			<input type="password" name="pwd" id="pwd" autocomplete="off" required>
		</div>
	
	<input type="submit" name="submit" value="submit" class="btn btn-submit">
	
</form>
</div>
</center

<form action="order_tracker.html" method="post">
						<button type="submit" name="back" value="back" >
							<< Back</button>
				</form>

</body>
</html>
<?php }
?>

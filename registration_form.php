

<!DOCTYPE HTML>
<html>
<head>
	<title>Registeration Form</title>
	
</head>
<body >
	<?php require 'top_bar.html';?>

<div class="content">


<div id="container">
		<h3 class="conthead">JOIN US</h3>
	<form  class="form-horizontal" role="form" action="processing_registration_form.php" method="post" enctype="multipart/form-data" r>
		<div class="form-group">
			<label  class="control-label col-sm-2" for="name">Enter your Name</label>
			<div class="col-sm-10">
			<input type="text"  class="form-control" name="name" id="name" autocomplete="on"  placeholder="Enter Your Name" required>
		</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="mobile_number">Enter your Mobile Number:</label>
			<div class="col-sm-10">
			<input type="number" class="form-control" name="mobile_number"  id="mobile_number" autocomplete="on" required max="9999999999" min="7000000000" placeholder="Enter Your Mobile Number" required> 
		</div>
		</div>
		<div class="form-group">
			<label  class="control-label col-sm-2"  for="email_id">Enter your Email Id</label>
			<div class="col-sm-10">
			<input type="email"  class="form-control" name="email_id" id="email_id" autocomplete="on" required placeholder="abc.xyz@gmail.com" >
		</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="address">Enter Your Address </label>
			<div class="col-sm-10">
			<input class="form-control" type="text" name="address" id="address" autocomplete="on" required>
		</div>
		</div>
		<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="submit" value="submit" class="btn btn-submit">
		<small>or press <strong>enter</strong></small>
		</div>
		</div>
	</form>

</div>
</div>


	<?php require 'footer.html'?>
</body>
</html>

	
	
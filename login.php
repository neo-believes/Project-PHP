<!DOCTYPE HTML>
<html>
<head>
	<title>User Login</title>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/amanNew.css">
 
  
	
</head>

<body>

<div class='w3-container top'>
<P class='w3schools-logo' >DaiLY MEals</P>
<div class='w3-right toptext w3-wide'>Much Needed Freedom</div>
</div>

	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
                <li class="active"><a href="home.php">Home</a></li>
       
        <li><a href="menu.php">Menu</a></li>
        <li><a href="about_us.php">About US</a></li>
	    <li><a href="contact_us.php">Contact Us</a></li>

      </ul>

      </ul>
    </div>
  </div>
</nav>

	<h3 align="right">Not Yet Registered?
	<a href="registration_form.php" style="color:#1a1a1a;">Join us</a>
	</h3>
	<div class="container">
	
	<form class="form-horizontal" role="form" enctype="munltipart/form-data" method="post" action="login_page.php" >
	<div class="form-group">
		<label class="control-label col-sm-2" for="login_id">Enter your Email ID or Mobile Number:</label>
		<div class="col-sm-10">
		<input type="text"  class="form-control" name="login_id" id="login_id"  placeholder="Enter Phone Number or Email" autocomplete="on"  required> 
	</div>
	</div>
	 <div class="form-group">
			<label   class="control-label col-sm-2" for="pwd">Enter your password:</label>
			 <div class="col-sm-10"> 
			<br><input type="password"   class="form-control" name="pwd" id="pwd" placeholder="Enter password"  required>
		</div>
		</div>
		<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
		 <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
	</div></div>
	<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
	<input type="submit" name="submit"  class="btn btn-submit" value="submit" >
	</div>
	</div>
	
</form>
</div>

<?php require 'footer.html';?>

</body>
</html>

	
	
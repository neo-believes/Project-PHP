<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
	.container1{
	width: 90%;
	margin: 0 auto;
	}	

	</style>

<title>Home</title>

<link rel="stylesheet" href="css/jquery.bxslider.css">

<link rel="stylesheet" media="screen,projection" href="css/ui.totop.css" />

<!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
	
<!-- Latest compiled and minified jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.bxslider.js" > </script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/amanNew.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">

</head>


<body><?php SESSION_START();
require 'top_bar.html';?>
 
<div class="container1">
<ul class="slider">
     <li><img src="img/test2.jpg" style="position: relative;margin-left: auto;
			margin-right: auto;" alt=""></li>
           <li><img src="img/test1.jpg" style="position: relative;margin-left: auto;
			margin-right: auto;" alt="" ></li>
		  
</ul>

</div>

<!--horizontal image slider ends-->

<div class="container">
  <h3>Daily Meals</h3>
  <p>We work on the concept of providing Customized Tiffin Service on Daily Basis to our Clients.</p>
  <h2>Customized Tiffin Service?</h2>
  <p>Yeah you Got it right! </p>
  <p> By Customized Tiffin Service we mean that now you can decide on daily basis what you want in your Meal via our Website.It is a must needed changed in Tiffin Service Sector.<br>According to the current trend of Tiffin Service your meals are decided by your Tiffin Service Provider and you are forced to eat it no-matter how bad it tastes.</p>
  
  <center>
<img src="photos/reaction when your favourite food in on table.jpg" class="img-thumbnail" alt="reaction when your favourite food in on table" width="20%" height="20%">
</center>
	<p> Missing Home. Missing Food </p>
	<center>
<img src="photos/tremptation.jpg" class="img-thumbnail" alt="tremptation" width="40%" height="40%">
</center>
<p> Sometimes It also happens <p>
<center>
<img src="photos/when your ordered food takes too much time.png" class="img-thumbnail" alt="when your ordered food takes too much time" width="40%" height="40%">
</center>
<h2> Frustating !</h2>
	<p> Yeah!But Wait Good times are rolling in Again.</p>
	<p> Join Us and Enjoy the Most Awaited Freedom</p>
	<h3> Happy </h3>
	<h2> We Still have many surprises Left</h2>
	<center>
<img src="photos/Really.jpg" class="img-thumbnail" alt="Really" width="40%" height="40%">
</center>
<p>Wait,Before we wil show you you need to do one thiing daily. Before 9am in Morning order your Lunch and before 5pm order your Dinner via this website after logging in.<p>
<P> Here Come A Surprise. It will happen that you will miss out to order you meal. But that doesn't mean you will die Straving you will get a meal by Default on your Doorstep which you can also decide. </p>
<center>
<img src="photos/What I Just Read.jpg" class="img-thumbnail" alt="What I Just Read" width="40%" height="40%">
</center>
<h3> Surprised </h3>
<p> HAhahaha.</p>
<center>
<h3> One More thing </h3></center>
<center>
<img src="photos/Yes.jpg" class="img-thumbnail" alt="Yes" width="20%" height="20%">
</center>
<br><br><H3> Pay for Only what you want to eat </h3>
<p> Their is no minimun amount you book a tiffin about and no extra hidden COST .Sometimes It may also happen You may get Complementary Sweets, DISHES.</p>
<center>
<img src="photos/Joking.jpg" class="img-thumbnail" alt="Joking" width="40%" height="40%">
</center>
<h1> You will Get a Hang of it Soon. </h1>

<center>
<img src="photos/DUDE.jpg" class="img-thumbnail" alt="DUDE" width="40%" height="40%">
</center>
	</div>
<br><br><br><br>




</div>

<?php require 'footer.html';?>
	<!-- easing plugin ( optional ) -->
	<script src="js/easing.js" type="text/javascript"></script>
	<!-- UItoTop plugin -->
	<script src="js/jquery.ui.totop.js" type="text/javascript"></script>
	<!-- Starting the plugin -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	
<!-- script for bxslider plugin-->
<script>
$(document).ready(function(){
      $('.slider').bxSlider({
	  auto: true,
      autoControls: true,
	  pause: 3000,
	  infinteLoop:true,
	  controls : true,
      });
	  });
     </script>	


</body>

</html>
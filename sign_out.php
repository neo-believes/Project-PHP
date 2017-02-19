<?php 
session_start();



 ?>
<!DOCTYPE HTML>
<html>
<body>
<?php require 'top_bar.html';?>
<center>
<h1 style="margin: 150px">Thank you for visting this AWEsome place</h1>
<h4 align="right"><a href="home.php">Main Page</a></h4>
</center>

</body>
</html>
<?php 
session_unset();
session_destroy();
require 'footer.html';
?>

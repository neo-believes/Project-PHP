<?php
session_start();

require 'dbconnection_code.php';
$mob=$_SESSION['user_mob_no'];
$order_no=$_SESSION['order_no'];
echo "<center>Thank you ".$_SESSION['username']." for checking us out <BR> Hope to see you back here again till then stay AWEsome and Spread Happiness.</center>";
$delete=$conn->query("DELETE FROM order_table WHERE order_no=$order_no");
if ($conn->query($delete)===TRUE)
{
echo "ORDER cancelled ";
}
session_unset();
session_destroy();
?>


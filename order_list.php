<?php 
require 'dbconnection_code.php';
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<h4 align="Right"> 
<?php echo $_SESSION['username'];?>
</h4>
<h4 align="right"><a href="sign_out.php">Sign out</a></h4>
</body>
</html>
<?php 
if (isset($_POST['order']))
{
$check=$_POST['check'];
$a=0;

$quantity='quantity_'.$a;

$customer_id=$_SESSION['user_mob_no'];

   $t_order_no = $conn->query("SELECT MAX(order_no) as max FROM order_table");
   $row = mysqli_fetch_array($t_order_no);
   $max = ($row['max']+1);
   
$insert_customer_id_in_order_table= "INSERT INTO order_table (order_no,customer_id) VALUES ($max,$customer_id)";
 $conn->query($insert_customer_id_in_order_table);
 $_SESSION['order_no']=$max;

for ($u=0;$u<sizeof($check);$u++)
{
$a=$a+1;
$item='item_'.$a;
$update= $conn->prepare("UPDATE order_table SET
							$item=?
							where customer_id=? AND order_no=?");
 
 
               
						$update->bind_param("iii",$check[$u],$customer_id,$max);
						if($update->execute()===TRUE)
						{
	
								
								echo "yes";
								//die();
							}	
						else 
						{
							echo "dn";
							echo $conn->error;
						}
					}	
                    $_SESSION['quantity']=$a;
 $update1=$conn->query("UPDATE order_table SET num=$a WHERE customer_id=$customer_id AND order_no=$max");

					header("location:order_quantity.php");
					

  
 $conn->close();

}
else{
	echo "empty POst";
	
}
?>
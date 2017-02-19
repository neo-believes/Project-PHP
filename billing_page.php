<?php 
session_start();
require 'dbconnection_code.php';

if (isset($_POST['order']))
{
$quant=array();
$ite='item_';
$quantit='quantity_';
$pric='price_';
$totalprice=0;
$customer_id=$_SESSION['user_mob_no'];
$order_no=$_SESSION['order_no'];




for($a=1;$a<=$_SESSION['quantity'];$a++)
{

$quantity=$quantit.$a;
$item=$ite.$a;
$price=$pric.$a;
$quant[]=$_POST[$quantity];
$mob=$_SESSION['user_mob_no'];
$pr=$conn->query("SELECT menu_list.t_item_price FROM menu_list LEFT JOIN order_table ON menu_list.t_item_id=order_table.$item where order_table.order_no=$order_no");
	if ($pr->num_rows>0)
		{
		$pri=$pr->fetch_object()->t_item_price;
        $item_price=($pri*$quant[$a-1]);
        $update=$conn->prepare("UPDATE order_table SET 
                  $quantity=?,
                  $price=?
                  WHERE order_no=?");
        $update->bind_param("iii",$quant[$a-1],$item_price,$order_no);
        if($update->execute()===TRUE)
			{
			$totalprice=$totalprice+$item_price;
			}
        
		}
	else 
	{
		require 'front_end_error_page.html';
	}
	}
$update2=$conn->prepare("UPDATE order_table SET 
                total_price=?
                WHERE order_no=?");
$update2->bind_param("ii",$totalprice,$order_no);
if($update2->execute()===TRUE)
{
header("LOCATION:generate_bill.php");

}
else 
	{
		require 'front_end_error_page.php';
	}

}
else 
	{
		require 'front_end_error_page.php';
	}


?>

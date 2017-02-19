


<?php
require 'dbconnection_code.php';

if(isset($_POST['submit']))
{ 
   $login_id=trim($_POST['login_id']);
   $pwd=trim($_POST['pwd']);
    if (is_numeric($login_id))
    {
		$password=$conn->query("SELECT customer_password FROM registration WHERE customer_mobile_number='".$login_id."'");

		if($password->num_rows > 0)
			{
				$pass=$password->fetch_object()->customer_password;
				if ($pass==$pwd)
					{
						session_start();
						
						$user_name =$conn->query("SELECT customer_name FROM registration WHERE customer_mobile_number='".$login_id."'");
						if ($user_name->num_rows >0)
							{
								$u_name=$user_name->fetch_object()->customer_name;
								$_SESSION['username']=$u_name;
								$_SESSION['user_mob_no']=$login_id;
								$_SESSION['quantity']=0;
							
									header("location:menu.php");
								
								
		
								
								
							}
						else 
							{
								header("Location:front_end_error_page.html");
							}		
					}
				else 
					{
						echo "wrong Password";
						header("Location:login.php");
					}
			}
		else 
			{
				echo "user not registered";
				header("LOCATION:registration_form.php");
			}
  
	}
	else
	{
	  $password=$conn->query("SELECT customer_password FROM registration WHERE customer_email_id='".$login_id."'");
		if($password->num_rows > 0)
			{
				$pass=$password->fetch_object()->customer_password;
				if ($pass==$pwd)
					{
						session_start();
						$user_name =$conn->query("SELECT customer_name FROM registration WHERE customer_email_id='".$login_id."'");
						$user_mobile_number =$conn->query("SELECT customer_mobile_number FROM registration WHERE customer_email_id='".$login_id."'");
						if (($user_name->num_rows >0) && ($user_mobile_number >0))
							{
								$u_name=$user_name->fetch_object()->customer_name;
								$u_mobile_number=$user_mobile_number->fetch_object()->customer_mobile_number;
								$_SESSION['username']=$u_name;
								$_SESSION['user_mob_no']=$u_mobile_number;
								$_SESSION['quantity']=0;
							 header("location:menu.php");
							}
						else 
							{
								header("Location:front_end_error_page.php");
							}		
					}
				else 
					{
						echo "wrong Password";
						echo "user not registered";
				header("LOCATION:login.php");
					}
			}
		else 
			{
				echo "user not registered";
				header("LOCATION:registration_form.php");
			}
	}
	
}

else
{
	header("Location:front_end_error_page.php");
}

?>
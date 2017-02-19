



<?php 
require 'dbconnection_code.php';
require 'top_bar.html';
$count=0;
$coun=0;
if(isset($_POST['submit']))
{
	if(isset($_POST['name'],$_POST['mobile_number'],$_POST['email_id'],$_POST['address']))
	{
		$name=trim($_POST['name']);
		
		$mobile_number=trim($_POST['mobile_number']);
		$email_id=trim($_POST['email_id']);
		$address=trim($_POST['address']);
		$record=array();
		if($results=$conn->query("SELECT customer_mobile_number,customer_email_id FROM registration"))
			{
				if($results->num_rows)
				{
					while($row=$results->fetch_object())
						{
						$record[]=$row;
						}
				$results->free();
				}
			}
		foreach($record as $rec)
			{
				if($rec->customer_mobile_number==$mobile_number)
					{
						
							$count=1;break;
					}
				else
					{
					$count=0;
					
					}			
			}
		foreach($record as $rec)
			{
				if($rec->customer_email_id==$email_id)
					{
						
							$coun=1;break;
					}
				else
					{
					$coun=0;
					
					}			
			}
		
		if($coun==0 && $count==0)
			{
				if (!empty ($name) && !empty ($mobile_number) && !empty ($email_id) && !empty ($address)) 
					{ 
				       
						$insert= $conn->prepare("INSERT INTO registration (customer_name,customer_mobile_number,customer_email_id,customer_address) VALUES (?,?,?,?)");
						$insert->bind_param("siss",$name,$mobile_number,$email_id,$address);
						if($insert->execute())
							{ 
							 require 'password_form.html'; 
							}
					}	 
				else 
					{
						echo "Fields are Missing";
						
					}
				
			}
		elseif($coun==0 && $count==1)
			{
				echo "Mobile Number= ".$mobile_number." already exits please choose different Mobile number for registration" ;
	            include 'error_script_2.php';		
			}
		elseif($coun==1 && $count==0)
			{
				echo "Email ID = ".$email_id." already exits  please choose different Email id for registration";
				include 'error_script_2.php';
			}
			else 
			{
				echo "mobile_number = ".$mobile_number." and Email ID= ".$email_id." already exits  please choose different Mobile number  and Email ID for registration";
				include 'error_script_2.php';
			}
	} 
}  
else 
{
	echo"empty posT";
}
require 'footer.html';
 ?>
			

<?php
require 'dbconnection_code.php'; 
//include 'Show_records_of_Menu.php';

if(isset($_POST['submit']))
{
   $id = trim($_POST['submit']);
   if(isset($_POST['c_d_amount'])) 
	{
		$amount = trim($_POST['c_d_amount']);
		
				
				if (!empty ($amount) ) 
						{
							$update= $conn->prepare("UPDATE registration SET
							wallet =?
							where customer_mobile_number=?");
							$update->bind_param("ii",$amount,$id);
                            $update->execute();
							if($update)
							{
								header("Refresh:0.1; url=wallet_tracker.php");
								//print 'Success! record updated';
							}
							else
							{
								print 'Error : ('. $conn->errno .') '. $conn->error;
								}
						}
						else 
						{
							echo "Fields are Empty";
						}
				} 
				
	else
     {
	 echo "typo error";
	  }	
	
}
 
?>

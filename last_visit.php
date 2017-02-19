
<?php 
require 'dbconnection_code.php';
$mob=$_SESSION['user_mob_no'];

$date_time=$conn->query("SELECT order_date_time from order_table WHERE customer_id=$mob");
if($date_time->num_rows>0)
{
$date_ti=$date_time->fetch_object()->order_date_time;
$date = date('Y-m-d', strtotime($date_ti));
$time = date('H:i:s', strtotime($date_ti));
echo $date."DSFDSF";
echo $time;
$record=$conn->query('SELECT TIMESTAMPDIFF(MINUTE,$date_ti,NOW())');

foreach($record as $row) {  
echo "<tr>";  
echo "<td>" . $row['TIMESTAMPDIFF(TIMESTAMPDIFF(MINUTE,$date_ti,NOW())'] . "</td>";  
echo "</tr>";  }



}
?> 

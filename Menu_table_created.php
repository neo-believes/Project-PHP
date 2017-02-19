<?php
require 'dbconnection_code.php';
$sql="CREATE TABLE Menu(
						item_no int(10) NOT NULL UNIQUE AUTO_INCREMENT,
						item_id int(6) unsigned primary key,
					    item_name varchar(30) NOT NUll,
						item_price int(4) NOT NULL,
						item_description varchar(50),
						item_counter int(1) unsigned 					
						)";


if($conn->query($sql)){
	echo "table Menu created successfully<BR>";
	}
else{
echo "Error Creating table Menu";
	}
$sql2="CREATE TABLE Menu_list(
						t_item_no int(10) NOT NULL UNIQUE AUTO_INCREMENT,
						t_item_id int(6) unsigned primary key,
					    t_item_name varchar(30) NOT NUll,
						t_item_price int(4) NOT NULL,
						t_item_description varchar(50)	
						)";


if($conn->query($sql2)){
	echo "table Menu_list created successfully";
	}
else{
echo "Error Creating table Menu_list";
	}

	
$sql3="CREATE TABLE registration(
						customer_no int(10) unsigned NOT NULL UNIQUE AUTO_INCREMENT,
						customer_mobile_number varchar(30) primary key,
						customer_password varchar(15) NOT NUll,
					    customer_name varchar(30) NOT NUll,
						wallet smallint(4)  unsigned DEFAULT '0',
						customer_email_id varchar(30) NOT NULL UNIQUE,
						customer_address varchar(100) NOT NULL,
						customer_registration_date_time datetime NOT NULL DEFAULT NOW()
						)";


if($conn->query($sql3)){
	echo "table Registration created successfully";
	}
else{
echo "Error Creating table registration";
	}

$sql4="CREATE TABLE order_table(
						order_no int(10) NOT NULL UNIQUE AUTO_INCREMENT,
						customer_id varchar(30)  primary key,
					    order_date_time datetime NOT NULL DEFAULT NOW(),
						total_price smallint(5)unsigned NOT NULL,
						item_1 varchar(30) DEFAULT NUll,
						quantity_1 tinyint(2) unsigned DEFAULT '0',
						price_1 tinyint(3) unsigned DEFAULT '0',
						item_2 varchar(30) DEFAULT NUll,
						quantity_2 tinyint(2) unsigned DEFAULT '0',
						price_2 tinyint(3) unsigned DEFAULT '0',
						item_3 varchar(30) DEFAULT NUll,
						quantity_3 tinyint(2) unsigned DEFAULT '0',
						price_3 tinyint(3) unsigned DEFAULT '0',
						item_4 varchar(30) DEFAULT NUll,
						quantity_4 tinyint(2) unsigned DEFAULT '0',
						price_4 tinyint(3) unsigned DEFAULT '0',
						item_5 varchar(30) DEFAULT NUll,
						quantity_5 tinyint(2) unsigned DEFAULT '0',
						price_5 tinyint(3) unsigned DEFAULT '0',
						item_6 varchar(30) DEFAULT NUll,
						quantity_6 tinyint(2) unsigned DEFAULT '0',
						price_6 tinyint(3) unsigned DEFAULT '0',
						item_7 varchar(30) DEFAULT NUll,
						quantity_7 tinyint(2) unsigned DEFAULT '0',
						price_7 tinyint(3) unsigned DEFAULT '0',
						item_8 varchar(30) DEFAULT NUll,
						quantity_8 tinyint(2) unsigned DEFAULT '0',
						price_8 tinyint(3) unsigned DEFAULT '0',
						item_9 varchar(30) DEFAULT NUll,
						quantity_9 tinyint(2) unsigned DEFAULT '0',
						price_9 tinyint(3) unsigned DEFAULT '0',
						item_10 varchar(30) DEFAULT NUll,
						quantity_10 tinyint(2) unsigned DEFAULT '0',
						price_10 tinyint(3) unsigned DEFAULT '0'
						)";


if($conn->query($sql4)){
	echo "table Order created successfully";
	}
else{
echo "Error Creating table order";
	}	
	
	
$conn->close();
?>
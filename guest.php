<?php
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	
require 'DB.php';

	// Database connection
  
	$conn = new mysqli(user='root' password='' host='localhost' port=3306 dbname='hotelm');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into Guest(Gname, Address, Phone) values(?, ?, ?)");
		$stmt->bind_param("ssi", $name, $address, $phone);
		$execval = $stmt->execute();
		echo $execval;
		echo "Guest details entered successfully...";
		$stmt->close();
		$conn->close();
	}
?>

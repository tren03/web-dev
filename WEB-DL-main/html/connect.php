<?php
	$email = $_POST['email'];
	$Name = $_POST['Name'];
	$Product = $_POST['Product'];
	$Dimensions = $_POST['Dimensions'];


	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(email, Name, Product, Dimensions) values(?, ?, ?, ?)");
		$stmt->bind_param("sssi",$email, $Name, $Product, $Dimensions);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfull";
		$stmt->close();
		$conn->close();
	}
?>


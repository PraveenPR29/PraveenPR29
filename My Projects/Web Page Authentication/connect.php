<?php

	$email = $_POST['email'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$country = $_POST['country'];


	// Database connection
	$conn = new mysqli('localhost','root','','projectdb');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registerdb(email, password, firstname, lastname, gender, country) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $email, $password, $firstname, $lastname, $gender, $country);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfull...";
		$stmt->close();
		$conn->close();
	}
?>
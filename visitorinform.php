<?php
	header('Access-Control-Allow-Origin: *'); 
	$servername = "";
	$username = "";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";

	$data = json_decode(file_get_contents("php://input"));

	echo $data->mobile;

	$flat=1;

	$sql = "INSERT INTO temp (name,mob,num,flat)
	VALUES ('".$data->name."','".$data->mobile."','".$data->number."','".$flat."')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>

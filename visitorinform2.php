<?php
	header('Access-Control-Allow-Origin: *'); 
	$servername = "31.170.166.61";
	$username = "u903561932_root";
	$password = "Theknight7";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	//echo "Connected successfully";

	$data = json_decode(file_get_contents("php://input"));

	echo $data->type;

	$flat=1;
	$sql = "INSERT INTO u903561932_excit.temp_nv (type,flat)
	VALUES ('".$data->type."','".$flat."')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>
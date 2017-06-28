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

	//echo $data->mobile;

	$flat=1;
	//$otp=rand(1000,9999);

	$sql1 = "DELETE  from u903561932_excit.temp_nv where type= '".$data->type."'";		

				if ($conn->query($sql1) === TRUE) {
				    echo "Granted Access to the ".$data->type."'";
				} else {
				    echo "Error: " . $sql1 . "<br>" . $conn->error;
				}
	$conn->close();

?>
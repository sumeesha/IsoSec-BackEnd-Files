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
	//echo "Connected successfully";

	$data = json_decode(file_get_contents("php://input"));

	//echo $data->mobile;

	$flat=1;
	//$otp=rand(1000,9999);

	$sql1 = "DELETE  from temp_nv where type= '".$data->type."'";		

				if ($conn->query($sql1) === TRUE) {
				    echo "Granted Access to the ".$data->type."'";
				} else {
				    echo "Error: " . $sql1 . "<br>" . $conn->error;
				}
	$conn->close();

?>

<?php
	header('Access-Control-Allow-Origin: *'); 
	$servername = "localhost";
	$username = "root";
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
	$otp=rand(1000,9999);

	$sql = "INSERT INTO excite.otp (mob,otp)
	VALUES ('".$data->mobile."','".$otp."')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
		 include('way2sms-api.php');
	    sendWay2SMS ( 'your no.' , 'pass' , 'reciever no.' , $otp);   
	    
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>

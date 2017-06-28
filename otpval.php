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

	$sql = "SELECT * from otp where mob =".$data->mobile;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	if($row['otp']==$data->otp){
	    		echo "Open The Gate!";
			    		//$flat=1;
				$sql1 = "DELETE  from temp where mob= '".$data->mobile."' AND flat ='".$flat."'";		

				if ($conn->query($sql1) === TRUE) {
				    //echo "New record created successfully";
				} else {
				    //echo "Error: " . $sql1 . "<br>" . $conn->error;
				}
	    	}else{
	    		echo "Wrong OTP! Please Retry";
	    	}
	   
	    }
	    //echo json_encode($visit);
	} else {
	    echo "0 results";
	    
	}

	$conn->close();

?>

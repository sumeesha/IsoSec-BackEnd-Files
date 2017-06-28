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

	echo $data->data->type;

	if($data->data->name == "-"){
		$flat=1;
		$sql = "DELETE  from u903561932_excit.temp_nv where type= '".$data->data->type."' AND flat ='".$flat."'";		

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}else{
		$flat=1;
		$sql1 = "DELETE  from u903561932_excit.temp where name= '".$data->data->name."' AND flat ='".$flat."'";		

		if ($conn->query($sql1) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql1 . "<br>" . $conn->error;
		}
	}

	// $flat=1;
	// $sql = "DELETE * from excite.temp_nv (type,flat)
	// VALUES ('".$data->type."','".$flat."')";

	// if ($conn->query($sql) === TRUE) {
	//     echo "New record created successfully";
	// } else {
	//     echo "Error: " . $sql . "<br>" . $conn->error;
	// }



	$conn->close();

?>
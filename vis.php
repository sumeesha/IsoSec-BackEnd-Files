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

	//echo $data->flat;

	//$flat=1;
	$count=0;
	$sql = "SELECT * from excite.temp where flat =".$data->flat;

	$result = $conn->query($sql);
	$visit1 = array();
	$visit2 = array();
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {

	       	$vis = array(
	       			"name"=>$row['name'],
	       			"mobile"=>$row['mob'],
	       			"num"=>$row['num'],
	       			"type"=>'Visitor',
	       			"id"=>$count
	       		);
	       	$count++;
	       	$visit1[] = $vis;
	    }
	    //echo json_encode($visit);
	} else {
	    //echo "0 results at 1";
	}

	$sql1 = "SELECT * from excite.temp_nv where flat =".$data->flat;

	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0) {
	    // output data of each row
	    while($row1 = $result1->fetch_assoc()) {
	       	$vis1 = array(
	       			"name"=>"-",
	       			"mobile"=>"-",
	       			"num"=>"1",
	       			"type"=>$row1['type'],
	       			"id"=>$count

	       		);
	       	$visit2[] = $vis1;
	    }
	    
	} else {
	    //echo "0 results at 2";
	}
	if($visit2!=null&&$visit1!=null){
		echo json_encode(array_merge($visit1,$visit2));
		//echo "1111111111111111111111111";
	}else if($visit2!=null){
		echo json_encode($visit2);//echo "2222222222222222222222";
	}
	else if($visit1!=null){
		echo json_encode($visit1);//echo "3333333333333333333333";
	}
	//echo json_encode(array_merge($visit1,$visit2));
	$conn->close();

?>
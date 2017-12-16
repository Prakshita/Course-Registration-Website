<?php 
session_start();

	$username = "admin";
	$password = "admin";
	
	$chosenTable = $_GET['tablechoice'];
//	$chosenTable = "course";
	
	$conn = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	


	$data = [];
	
	
	
	
	$result = mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'courseregistration' AND TABLE_NAME = '$chosenTable';");
	
	while(	$userData = mysqli_fetch_array($result, MYSQLI_NUM))
	{
		$data[] = $userData;
	}
	
	mysqli_close($conn);
	if($data)
	{
		echo json_encode($data);
		
	
	}

	
	
	
	
	
	
	
	
?>
<?php 
session_start();

	$username = "admin";
	$password = "admin";
	
	$chosenTable = $_GET['tablechoice'];
	//$chosenTable = "college";
	
	$conn = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	


	$data = [];
	
	
	
	
	$result = mysqli_query($conn,"SELECT * FROM $chosenTable where Deleted ='N'");
	
	while(	$userData = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$data[] = $userData;
	}
	
	//print_r ($data);
	mysqli_close($conn);
	if($data)
	{
		echo json_encode($data);
		
	
	}

	
	
	
	
	
	
	
	
?>
<?php 
session_start();

	$username = "admin";
	$password = "admin";
	
	$chosenTable = $_GET['tablechoice'];
	//$chosenTable = "cart";
	
	$conn = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
	if (!$conn) {
   echo "Connection failed: " . mysqli_connect_error();
	}
	


	$data = [];
	
	
	
	$result = mysqli_query($conn,"SHOW KEYS FROM $chosenTable WHERE Key_name = 'PRIMARY'");
	
	while(	$userData = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$data[] = $userData;
	}
	
	mysqli_close($conn);
	
	if($data)
	{
		echo json_encode($data);
		
	}
	
	//echo json_encode($data);
		
	
	

	
	
	

	
	
	
	
?>
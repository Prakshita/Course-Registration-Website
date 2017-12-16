<?php 
session_start();

	$username = "admin";
	$password = "admin";
	
	$chosenTable = $_GET['tablechoice'];
	$chosenColumn = $_GET['columnchoice'];
	
//	$chosenTable = "section";
	
	$conn = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	


	$data = [];
	
	
	
	if($chosenTable == "college" || $chosenTable == "instrphone")
	{
	$result = mysqli_query($conn,"SELECT ID from Instructor");
	}
	
	else if($chosenTable == "collegephone")
	{
		$result = mysqli_query($conn,"SELECT CName from college");
	}
	else if($chosenTable == "course" || $chosenTable == "deptphone" || $chosenTable == "instructor" || $chosenTable == "student")
	{
		$result = mysqli_query($conn,"SELECT DCode from department");
	}
	else if($chosenTable == "department")
	{
		$query  = "SELECT CName from college;";
		$query1 = "SELECT ID from instructor;";
		$result = mysqli_query($conn,$query);
		$result1 = mysqli_query($conn,$query1);
		
	
	}
	else if($chosenTable == "section")
	{
		$query  = "SELECT CoCode from course;";
		$query1 = "SELECT ID from instructor;";
		$result = mysqli_query($conn,$query);
		$result1 = mysqli_query($conn,$query1);
		
	
	}
	else if($chosenTable == "studentphone" || $chosenTable == "logindetail")
	{
		$result = mysqli_query($conn,"SELECT SID from student");
	}
	else if($chosenTable == "takes" || $chosenTable == "cart")
	{
		$query  = "SELECT SecId from section;";
		$query1 = "SELECT SID from student;";
		$result = mysqli_query($conn,$query);
		$result1 = mysqli_query($conn,$query1);
		
	
	}
	 
	
	while(	$userData = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$data[] = $userData;
	}
	if($chosenTable == "department" || $chosenTable == "section" || $chosenTable == "takes" || $chosenTable == "cart")
	{
	while(	$userData = mysqli_fetch_array($result1, MYSQLI_ASSOC))
	{
		$data[] = $userData;
	}
	}
	mysqli_close($conn);
	
	if($data)
	{
		echo json_encode($data);
		
	
	}

	
	
//	print_r ($data);
	//var_dump ($userData);
	
	
	
	
	
	
	
?>
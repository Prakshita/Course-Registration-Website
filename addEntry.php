<?php


session_start();

$conn = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	
$tablename = $_POST['tablename'];
$array = $_POST;
$removed = array_shift($array);

$values = array();
foreach ($array as $key => $value) {
  $columns = implode(", ",array_keys($array));
	
	
$value = "'".$value."'";
array_push($values, $value); 


}
$values  = implode(",", $values);



$sql = "INSERT INTO `$tablename` ($columns) VALUES ($values)";


	
	if (mysqli_query($conn, $sql)) 
	{
	echo "New record created successfully";
	$_SESSION['coltod'] = $tablename;
	header("Location: Course.php");
	die();	
	} 
	else 
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);



?>
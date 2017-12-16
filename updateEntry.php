<?php


session_start();

$conn = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	
$chosenTable = $_POST['tablename'];
$originalKey1 = $_POST['originalkey1'];

if($_POST['originalkey2'])
{
	$originalKey2 = $_POST['originalkey2'];
}




$array = $_POST;
$removed = array_shift($array);

if($originalKey2)
{
	$removed2 = array_pop($array);
}


$removed1 = array_pop($array);
//$chosenTable = ;

$values = array();
foreach ($array as $key => $value) {
  $columns = implode(", ",array_keys($array));
	
	
$value = "'".$value."'";
array_push($values, $value); 


}
//$values  = implode(",", $values);

//print_r($values);

$data = [];




$result = mysqli_query($conn,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'courseregistration' AND TABLE_NAME = '$chosenTable';");

while(	$userData = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $data[] = $userData['COLUMN_NAME'];
}

//print_r($data);
$strtemp = "";
foreach($values as $i => $item)
{
if($strtemp == "")
{
	$strtemp = $data[$i]."=".$item;
}
else{

	$strtemp = $strtemp.",". $data[$i]."=".$item;
}


}

//print_r($strtemp);

$originalkeyforsql1 = "'".$originalKey1."'";
if($originalKey2)
{
	$originalkeyforsql2 = "'".$originalKey2."'";
	$sql = "UPDATE $chosenTable SET $strtemp where $data[0] = $originalkeyforsql1 && $data[1] = $originalkeyforsql2";
	
	
}
else{

	
	$sql = "UPDATE $chosenTable SET $strtemp where $data[0] = $originalkeyforsql1";
}
	
	if (mysqli_query($conn, $sql)) 
	{
	echo "Updated Record Successfully";

	$_SESSION['coltod'] = $chosenTable;
	header("Location: Course.php");
	die();
	} 
	else 
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);



?>
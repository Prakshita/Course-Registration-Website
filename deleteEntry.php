<?php


session_start();

$conn = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	
$chosenTable = $_GET['tablechoice'];
$primarykeyValue1 = $_GET['primarykeyValue1'];
$primekey1 = $_GET['primekey1'];

if($_GET['primekey2'])
{
    $primarykeyValue2 = $_GET['primarykeyValue2'];
    $primekey2 = $_GET['primekey2'];

}



if($primekey2)
{
	$sql = "UPDATE $chosenTable SET Deleted='Y' where $primekey1 = '$primarykeyValue1' && $primekey2 = '$primarykeyValue2'";
	
}
else{
    $sql = "UPDATE $chosenTable SET Deleted='Y' where $primekey1 = '$primarykeyValue1'";
}



	
	if (mysqli_query($conn, $sql)) 
	{
	echo "Deleted record successfully";
	//header("Location: Course.html");
	//die();
	} 
	else 
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);



?>
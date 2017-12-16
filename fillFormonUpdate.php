<?php 
session_start();

	$username = "admin";
	$password = "admin";
	
    $chosenTable = $_GET['tablechoice'];
    $primarykeyValue1 = $_GET['primarykeyValue1'];
    $primekey1 = $_GET['primekey1'];

    if($_GET['primekey2'])
    {
        $primarykeyValue2 = $_GET['primarykeyValue2'];
        $primekey2 = $_GET['primekey2'];
    }

	//$chosenTable = "takes";
    //$primarykeyValue1 = "3";
    //$primekey1 = "SID";
    //$primarykeyValue2 = "2002";
    //$primekey2 = "SecID";
    // $nPrimaryKey2 =null;
    

	$conn = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
    
    if($primekey2)
    {
        $result = mysqli_query($conn,"SELECT * FROM $chosenTable where $primekey1 = '$primarykeyValue1' && $primekey2 = '$primarykeyValue2'");
    }
    else{
        $result = mysqli_query($conn,"SELECT * FROM $chosenTable where $primekey1 = '$primarykeyValue1'");
    }
   
	
	$userData = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	
	mysqli_close($conn);
	if($userData)
	{
	$jsonstr = json_encode($userData);
    
    echo $jsonstr;
	}

	
	
	
	
	
	
	
	
?>
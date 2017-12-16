<?php
    $department = $_REQUEST['department']; 
    $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
    $query = "SELECT DISTINCT CoDescription FROM course WHERE CoDCode 
                IN (SELECT DCode FROM department WHERE department.DName ='" . $department . "')";
    $result = mysqli_query($con, $query);
    // if (!mysqli_query($con, $query)){
    //     echo("Error description: " . mysqli_error($con));
    // }
    $response = array();
    $response[0] = '<option value = ""></option>';
    $count = 1;
    while($row = mysqli_fetch_assoc($result)){
        $response[$count] = "<option value ='" . $row['CoDescription'] . "'>" . $row['CoDescription'] . "</option>";
        $count++;
    }
    echo json_encode($response);
    //  var_dump($response);
    mysqli_close($con);
?>
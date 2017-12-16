<?php
    $course = $_REQUEST['course']; 
    $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
    $query = "SELECT DISTINCT SecNo FROM section WHERE CoCode 
                IN (SELECT CoCode FROM course WHERE course.CoDescription ='" . $course . "')";
    $result = mysqli_query($con, $query);
    // if (!mysqli_query($con, $query)){
    //     echo("Error description: " . mysqli_error($con));
    // }
    $response = array();
    $response[0] = '<option value = ""></option>';
    $count = 1;
    while($row = mysqli_fetch_assoc($result)){
        $response[$count] = "<option value ='" . $row['SecNo'] . "'>" . $row['SecNo'] . "</option>";
        $count++;
    }
    echo json_encode($response);
    //  var_dump($response);
    mysqli_close($con);
?>
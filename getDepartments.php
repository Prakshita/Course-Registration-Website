<?php
    $college = $_REQUEST['college']; 
    $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
    $query = "SELECT DISTINCT DName FROM department WHERE CName ='" . $college . "'";
    $result = mysqli_query($con, $query);
    $response = array();
    $response[0] = '<option value = ""></option>';
    $count = 1;
    while($row = mysqli_fetch_assoc($result)){
        $response[$count] = "<option value ='" . $row['DName'] . "'>" . $row['DName'] . "</option>";
        $count++;
    }
    echo json_encode($response);
    mysqli_close($con);
                
?>
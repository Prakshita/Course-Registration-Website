<?php
    session_start();

    // $course = $_POST['course'];
    // $department = $_POST['department'];
    // $college = $_POST['college'];
    // $section = $_POST['section'];
    // $id = $_SESSION['user'];

   
    $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
    // $query = "SELECT DCode FROM department WHERE CName='" . $college . "'";
    // $result = mysqli_query($con, $query);
    // $dCode = mysqli_fetch_assoc($result)['DCode'];
    
    // $query = "SELECT CoCode FROM course WHERE CoDCode='" . $dCode . "'" . "AND CoDescription='" .
    //             $course . "'";

    // $result = mysqli_query($con, $query);
    // $courseCode = mysqli_fetch_assoc($result)['CoCode'];

    // $query = "SELECT SecId, SectionLimit FROM section WHERE CoCode='" . $courseCode . "'" . "AND SecNo='" .
    //             $section . "'";

   $sectionID = $_REQUEST['sectionID'];
   $userID = $_REQUEST['userID'];


   
   
        // add to cart table
        $query = "INSERT INTO cart (SecId, SID, Deleted) VALUES ('$sectionID', '$userID', 'N' )";
        if(mysqli_query($con, $query))
        {
            
            echo "Added";
        } 
        elseif(mysqli_num_rows(mysqli_query($con, "SELECT * FROM cart WHERE SecId='$sectionID' AND SID='$userID' AND cart.Deleted = 'Y'")) > 0) {
            $query = "UPDATE cart SET Deleted = 'N' WHERE SecId= '$sectionID' AND SID='$userID'";
            mysqli_query($con, $query);
            echo "Added again";
        } 
       else{
            echo $query . "<br>" . mysqli_error($con);
       }
      

    

    // route to view cart page
    mysqli_close($con);
    
?>

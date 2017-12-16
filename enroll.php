<?php
    session_start();

   
    $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');

    $sectionIDS = $_REQUEST['sectionIDS'];
    $userID = $_REQUEST['userID'];
    $test = "true";
    $testsection = "true";
    

    
    
    foreach($sectionIDS as $i  => $item){
        
        $query = "SELECT SectionLimit FROM section WHERE SecId = '$item'";
        $result = mysqli_query($con, $query);
        $sectionLimit = mysqli_fetch_assoc($result)['SectionLimit'];
    
    
        if($sectionLimit - 1 < 0){
            // section is full, reroute to search
           echo "One or more of the sections is Full";
           $testsection = "false";
        }
        
        else{

            if(mysqli_num_rows(mysqli_query($con, "SELECT * FROM takes WHERE SecId='$item' AND SID='$userID' AND takes.Deleted = 'Y'")) > 0) {
                $query = "UPDATE takes SET Deleted = 'N' WHERE SecId= '$item' AND SID='$userID'";
                if(mysqli_query($con, $query)){
                    $sectionLimit = $sectionLimit - 1; 
                    
                       $query = "UPDATE section SET SectionLimit= $sectionLimit WHERE SecId='$item'";
                       mysqli_query($con, $query);
                       $test = "true";
                       echo "Added again";
                }
                
            } 
           else{
            $query = "INSERT INTO takes (SID, SecID) VALUES ('$userID', '$item')";
            if(mysqli_query($con, $query))
            {
                   $sectionLimit = $sectionLimit - 1; 
                    $test = "true";
                   $query = "UPDATE section SET SectionLimit= $sectionLimit WHERE SecId='$item'";
                   mysqli_query($con, $query);
                   echo "enrolled";
            }
            else{
                $test = "false";
                echo "You've already been enrolled in one or more of these classes.";
            }
           } 
           
        }
       
    }

    

    // route to view cart page
    mysqli_close($con);
    
?>

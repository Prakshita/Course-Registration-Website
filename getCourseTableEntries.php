<?php
    session_start();
    
    $course = $_POST['course'];
    $department = $_POST['department'];
    $college = $_REQUEST['college'];
    $section = $_REQUEST['section'];
    $txtsearch = $_POST['txtsearch'];

    // $college = 'ATEC';

    $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');

    if(isset($txtsearch))
    {
        $query = "SELECT department.DName, course.Level, course.CoDescription, section.DaysTime, section.SecNo FROM department INNER JOIN course ON department.DCode = course.CoDCode INNER JOIN section ON course.CoCode = section.CoCode WHERE section.OpenClosed = 'Y' AND section.Deleted = 'N' AND (department.CName ='$txtsearch' || department.DName='$txtsearch'  || course.CoDescription= '$txtsearch'  || course.Level= '$txtsearch') ";
        
        $result = mysqli_query($con, $query);
        $response = array();
        $response[] = "<tr><th>Department</th><th>Course Number</th><th>Course Name</th><th>Time</th><th>Section Number</th><th>Add To Cart</th></tr>";
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
           
            $response[] = "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td><button class='add btn btn-primary'>Add</button></td></tr>";
        }
        
    }
    if (isset($college) and !isset($department) and !isset($course) and !isset($section)){
        $query = "SELECT department.DName, course.Level, course.CoDescription, section.DaysTime, section.SecNo, section.SecId FROM department INNER JOIN course ON department.DCode = course.CoDCode INNER JOIN section ON course.CoCode = section.CoCode WHERE  section.OpenClosed = 'Y' AND section.Deleted = 'N' AND department.CName ='$college'";
        
        $result = mysqli_query($con, $query);
        $response = array();
        $response[] = "<tr><th>Department</th><th>Course Number</th><th>Course Name</th><th>Time</th><th>Section Number</th><th>Add To Cart</th></tr>";
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
            $response[] = "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td><button class='add btn btn-primary' id ='". $row[5] ."'>Add</button></td></tr>";
        }
    } elseif (isset($college) and isset($department) and !isset($course) and !isset($section)) {
        $query = "SELECT department.DName, course.Level, course.CoDescription, section.DaysTime, section.SecNo,section.SecId FROM department INNER JOIN course ON department.DCode = course.CoDCode INNER JOIN section ON course.CoCode = section.CoCode WHERE  section.OpenClosed = 'Y' AND section.Deleted = 'N' AND department.CName ='$college' AND department.DName='$department'";
        
        $result = mysqli_query($con, $query);
        $response = array();
        $response[] = "<tr><th>Department</th><th>Course Number</th><th>Course Name</th><th>Time</th><th>Section Number</th><th>Add To Cart</th></tr>";
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
            $response[] = "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td><button class='add btn btn-primary'  id ='". $row[5] ."'>Add</button></td></tr>";
        }
    } elseif (isset($college) and isset($department) and isset($course) and !isset($section)) {
        $query = "SELECT department.DName, course.Level, course.CoDescription, section.DaysTime, section.SecNo, section.SecId FROM department INNER JOIN course ON department.DCode = course.CoDCode INNER JOIN section ON course.CoCode = section.CoCode WHERE   section.OpenClosed = 'Y' AND section.Deleted = 'N' AND department.CName ='$college' AND department.DName='$department' AND course.CoDescription= '$course'";
        
        $result = mysqli_query($con, $query);
        $response = array();
        $response[] = "<tr><th>Department</th><th>Course Number</th><th>Course Name</th><th>Time</th><th>Section Number</th><th>Add To Cart</th></tr>";
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
            $response[] = "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td><button class='add btn btn-primary' id ='". $row[5] ."'>Add</button></td></tr>";
        }
    }
    elseif (isset($college) and isset($department) and isset($course) and isset($section)) {
        $query = "SELECT department.DName, course.Level, course.CoDescription, section.DaysTime, section.SecNo,section.SecId FROM department INNER JOIN course ON department.DCode = course.CoDCode INNER JOIN section ON course.CoCode = section.CoCode WHERE  section.OpenClosed = 'Y' AND section.Deleted = 'N' AND department.CName ='$college' AND department.DName='$department' AND course.CoDescription= '$course' AND section.SecNo ='$section'";
        
        $result = mysqli_query($con, $query);
        $response = array();
        $response[] = "<tr><th>Department</th><th>Course Number</th><th>Course Name</th><th>Time</th><th>Section Number</th><th>Add To Cart</th></tr>";
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
            $response[] = "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td><button class='add btn btn-primary'  id ='". $row[5] ."'>Add</button></td></tr>";
        }
    }


    echo json_encode($response);
    
    // $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
    // $query = "SELECT DCode FROM department WHERE CName='" . $college . "'";
    // $result = mysqli_query($con, $query);
    // $dCode = mysqli_fetch_assoc($result)['DCode'];
    
    // $query = "SELECT CoCode FROM course WHERE CoDCode='" . $dCode . "'" . "AND CoDescription='" .
    //             $course . "'";

    // $result = mysqli_query($con, $query);
    // $courseCode = mysqli_fetch_assoc($result)['CoCode'];

    // $query = "SELECT SecId, SectionLimit FROM section WHERE CoCode='" . $courseCode . "'" . "AND SecNo='" .
    //             $section . "'";

    // $result = mysqli_query($con, $query);
    // while($row = mysqli_fetch_assoc($result)){
    //     $sectionCode = $row['SecId'];
    //     $sectionLimit = $row['SectionLimit'];
    // }

    // if($sectionLimit - 1 <= 0){
    //     // section is full, reroute to search
    //     header("Location: enrollment.php");
    // }
    // else{
    //     // add to cart table
    //     $query = "INSERT INTO cart (SecId, SID, Deleted) VALUES (". $sectionCode .
    //                 ", " . $id . ", 'N' )";
    //     mysqli_query($con, $query);  
    //     $query = "UPDATE section SET SectionLimit =" . $sectionLimit - 1 . 
    //                 "WHERE SecId='" . $sectionCode . "'";
    //     mysqli_query($con, $query);
    //     header("Location: cart.php");
    // }

    // // route to view cart page
    mysqli_close($con);
        
?>
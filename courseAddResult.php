<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="myCss.css">
<title>Show the course add result</title>
</head>

<body>

<?php
        include_once 'connection.php';
        extract( $_POST);
        session_start();
        $sID = $_SESSION['sID'];
        echo "$sID";
        $selectSemester = $_SESSION['semester'];
        echo "$selectSemester";


        // To fetch the startDate of the input course
        $sql = "SELECT course.startDate
                      FROM course
                      Where course.cID = $cID";
        $db = new PDO('mysql:host=localhost;dbname=soen387_teamproject;charset=utf8', 'root', '');
        $query = $db->query($sql);
        $date1 = $query->fetch();
        $query->closeCursor();
        echo $date1[0];

        $stardDate=date_create("$date1[0]");

        // To fetch the current Date
        date_default_timezone_set("America/New_York");
        $currentDate1 = date("Y-m-d");
        echo $currentDate1;
        $currentDate=date_create("$currentDate1");




        // Result1: if the registered course for this semester is >= 5, add can not be executed.

        $sql = "SELECT Count(enrolled.cID)
                FROM enrolled, course
                WHERE enrolled.sID = $sID AND course.cID = enrolled.cID AND course.semester = '$selectSemester' ";

       
            // Create a PDO to fetch the count value

        $db = new PDO('mysql:host=localhost;dbname=soen387_teamproject;charset=utf8', 'root', '');
        $query = $db->query($sql);
        $countq = $query->fetch();
        $query->closeCursor();
        echo $countq[0];

        if($countq[0]>= 5){
                echo "Sorry, could not register more courses for semester ". $selectSemester ;        
        }
        
        // Result2: if the registerd course: Date(current time) - startDate >= 7, add can not be executed.

        else if(date_diff($stardDate,$currentDate ) >= 7){
                echo "Sorry, You have already passed the start date of this course more than 7 days. Can't register. ";
        }
        else{
                $sql = "INSERT INTO enrolled (`sID`, cID) values ('$sID', '$cID')";
                $result = $conn->query($sql);
                echo "Successfully Registered!"; 
        }
       

        mysqli_close( $conn );

?>
        
    
</body>
</html>
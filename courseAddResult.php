<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <link rel="icon" href="">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Management System</title>
    <!--  CSS Stylesheets-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="myCss.scss">

</head>
<title>Show the course add result</title>
</head>

<body>
<div class="title">
        <span class="title">Course Management System</span>
    </div>
<?php
        include_once 'connection.php';
        extract( $_POST);
        session_start();
        $sID = $_SESSION['sID'];
        $selectSemester = $_SESSION['semester'];

        // To fetch the startDate of the input course
        $sql = "SELECT course.startDate
                FROM course
                Where course.cID = $cID";

        // use a PDO to get an array for the result
        $db = new PDO('mysql:host=localhost;dbname=soen387_teamproject;charset=utf8', 'root', '');
        $query = $db->query($sql);
        $date1 = $query->fetch();
        $query->closeCursor();

        // create an Object of start date
        $stardDate=date_create("$date1[0]");


        // To fetch the current Date
        date_default_timezone_set("America/New_York");
        $currentDate1 = date("Y-m-d");

        //  create an object of current date
        $currentDate=date_create("$currentDate1");


        // To fetch the difference between 2 objects: current Date and start Date
         $intvl = $stardDate ->diff($currentDate);
    
        // Fetch the count of the registered courses of this student in this semester 
        $sql = "SELECT Count(enrolled.cID)
                FROM enrolled, course
                WHERE enrolled.sID = $sID AND course.cID = enrolled.cID AND course.semester = '$selectSemester' ";

        // Create a PDO to fetch the count value
        $db = new PDO('mysql:host=localhost;dbname=soen387_teamproject;charset=utf8', 'root', '');
        $query = $db->query($sql);
        $countq = $query->fetch();
        $query->closeCursor();

        // if the student has already registered this course in this semester, he/she could not register again
        $select = mysqli_query($conn, "SELECT * FROM enrolled WHERE cID = '".$_POST['cID']."' AND sID = $sID");
        if(mysqli_num_rows($select)) {
        exit('You have already registered this course, can not registered again.');
        } 

        // Result1: if the registered course for this semester is >= 5, add can not be executed.
        else if($countq[0]>= 5){
                echo "Sorry, could not register more courses for semester ". $selectSemester ;        
        }
        
        // Result2: if the registerd course: Date(current time) - startDate >= 7, add can not be executed.
        else if($intvl->format("%r%a") >= 7){
                echo "Sorry, You have already passed the start date of this course more than 7 days. Can't register. ";
        }

        // Result3: otherwise, add course into the enrolled table is successful
        else{
                $sql = "INSERT INTO enrolled (`sID`, cID) values ('$sID', '$cID')";
                $result = $conn->query($sql);
                echo "Successfully Registered!"; 
        } 
        mysqli_close( $conn );

?>
        <div class="footer">
        Copyright &copy Julie&Yui COMPANY &nbsp; Technical support: (514) 555-1234
        </div>
    
</body>
</html>
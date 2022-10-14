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
<title>Drop the course</title>
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
        //  test: echo "$sID";


        // To fetch the endDate of the input course
        $sql = "SELECT course.endDate
                FROM course
                Where course.cID = $cID";

        // use a PDO to get an array for the result
        $db = new PDO('mysql:host=localhost;dbname=soen387_teamproject;charset=utf8', 'root', '');
        $query = $db->query($sql);
        $date1 = $query->fetch();
        $query->closeCursor();
        //  test: echo $date1[0];
        // create an Object of end date
        $endDate=date_create("$date1[0]");


        // To fetch the current Date
        date_default_timezone_set("America/New_York");
        $currentDate1 = date("Y-m-d");
        //  test: echo $currentDate1;
        //  create an object of current date
        $currentDate=date_create("$currentDate1");


        // To fetch the difference between 2 objects: current Date and start Date
         $intvl = $endDate ->diff($currentDate);
    
        // for test the Total amount of days
        //  test: echo $intvl->format("%r%a");
        //   echo $intvl->days . " days ";

        // if the drop date(current date) is already passed the endDate of the selected course, drop fail
            if($intvl->format("%r%a") >= 0) { echo "Sorry, You have already finished this course. Can't drop. "; }

    // Result3: otherwise, drop the input course from the enrolled table
           else{
            $sql = " Delete 
                    From enrolled 
                    Where sID = $sID AND cID = $cID";
            $result = $conn->query($sql);
            echo "Successfully Dropped!"; 
    }
   
    mysqli_close( $conn );

?>
        <div class="footer">
        Copyright &copy Julie&Yui COMPANY &nbsp; Technical support: (514) 555-1234
    </div>

</body>
</html>
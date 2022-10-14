<!DOCTYPE html>
<html>
    <title>student report Page6</title>
    <body>
   

    <h1> Student have already chosen the following courses !</h1>  
 
<?php

    function display_registeredCourse1(){
    include_once 'connection.php';
    extract( $_POST);

    $query = "SELECT * 
              FROM enrolled, course
              WHERE enrolled.sID = $srID AND enrolled.cID = course.cID ";
    
    if($result = $conn->query($query)){
        while($row = $result->fetch_assoc()) {
            $cID = $row["cID"];
            $courseCode = $row["courseCode"];
            $title = $row["title"];
            $semester = $row["semester"];
            $days = $row["days"];
            $time = $row["time"];
            $instructor = $row["instructor"];
            $room = $row["room"];
            $startDate = $row["startDate"];
            $endDate = $row["endDate"];

            $courseList = <<<DELIMETER
            <tr role="row">
            <td row="cell">{$courseCode}</td>
            <td row="cell">{$title}</td>
            <td row="cell">{$semester}</td>
            <td row="cell">{$days}</td>
            <td row="cell">{$time}</td>
            <td row="cell">{$instructor}</td>
            <td row="cell">{$room}</td>
            <td row="cell">{$startDate}</td>
            <td row="cell">{$endDate}</td>
            </tr> 
            DELIMETER;

        echo $courseList; 
        }

        $result->free();
    } 

}

?>

<table class = "courseTable">
        <tr>
            <th>courseCode</th>
            <th>title</th>
            <th>semester</th>
            <th>days</th>
            <th>time</th>
            <th>instructor</th>
            <th>room</th>
            <th>startDate</th>
            <th>endDate</th>
        </tr>
        <?php
        display_registeredCourse1();
        ?>
    </table>


</body>
</html>


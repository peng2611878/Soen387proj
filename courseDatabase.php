<!DOCTYPE html>

<head>
<link rel="stylesheet" href="myCss.css">
</head>

<html>
    <title>show all the courses in the selected semester page4 </title>

<body>
    <?php
    function display_course(){
        include_once 'connection.php';
        extract( $_POST);
        session_start();
        $sID = $_SESSION['sID'];
        echo "$sID";
        $_SESSION['semester'] = $selectSemester;
       

        $sql = "SELECT * FROM course WHERE semester = '$selectSemester';";
        if($result = $conn->query($sql)){
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
                // <td>
                //      <input type="submit" name="regBtn"
                //              value="$row[cID]" />
                //  </td> 
            </tr> 
            DELIMETER;

            echo $courseList;
            //echo "$cID";
            //echo "$sID";
            echo "$row[cID]";
                
            }

            $result->free();
        } 

        
    }

 
    ?>

    <form action="courseAddResult.php" method="post">
    <p>Please input the cID that you want to add</p>
    <input name="cID" type="int" size=2 />
    <input type="submit" value="Add">
    </form>

    <form method="post">
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
        display_course();
        ?>
    </table>
    </form>
    
    
</body>

</html>

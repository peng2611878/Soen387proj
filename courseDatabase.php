<!DOCTYPE html>

<head>
<link rel="stylesheet" href="myCss.css">
</head>

<html>
    <title>show all the courses in semester page4 </title>


<body>
    <?php
    function display_course($sID){
        include_once 'connection.php';
        extract( $_POST);

        $sql = "SELECT * FROM `course` WHERE semester = \"$selectSemester\";";
        if($result = $conn->query($sql)){
            while($row = $result->fetch_assoc()) {
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
               <td>
                    <button type="button" class="btn" onclick ="window.location.href = 'index.php?edit_inperson&id=$sID'">Add</button>
                </td> 
            </tr> 
            
            DELIMETER;
          
            echo $courseList;
/* 
                print( "<tr>" );
                echo  $row["courseCode"]. " " . $row["title"]. " " . $row["semester"].
                " " . $row["days"]." " . $row["time"]." " . $row["instructor"]." " . $row["room"].
                " " . $row["startDate"]." " . $row["endDate"].
                "<br>";
                print( "<td></td> " );  */
            }
        }
        else {
            echo "0 results";
        }
        
        //connect to MySQL
        

          $conn->close();
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
        display_course($sID);
        ?>
    </table>
    

    
</body>

</html>

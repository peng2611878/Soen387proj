<!DOCTYPE html>

<html>
    <title>show all the courses in semester page4 </title>


<body>
    <?php
        include_once 'connection.php';
        extract( $_POST);

        $sql = "SELECT * FROM `course` WHERE semester = \"$selectSemester\";";
        $result = $conn->query($sql);
        //connect to MySQL
        

          $conn->close();
    ?>

    <table>
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
    </table>
    
    <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                print( "<tr>" );
                echo  $row["courseCode"]. " " . $row["title"]. " " . $row["semester"].
                " " . $row["days"]." " . $row["time"]." " . $row["instructor"]." " . $row["room"].
                " " . $row["startDate"]." " . $row["endDate"].
                "<br>";
                print( "<td></td> " );
            }
          } else {
            echo "0 results";
          }
    ?>
    
</body>

</html>

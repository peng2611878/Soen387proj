<!DOCTYPE html>
<html>
    <title>user select courses Page2</title>
    <body>

        <h1>Welcome</h1>
        <?php 
            include_once 'connection.php';
            extract( $_POST);

            $sql = "select fName, lName FROM student WHERE sID = ". $sID;
            $result = $conn->query($sql);
            //connect to MySQL
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "id: " . $sID . "  Name: " . $row["fName"]. " " . $row["lName"]. "<br>";
                }
              } else {
                echo "0 results";
              }
              $conn->close();
        ?>


        
        <form method = "post" action = "courseDetail.php">
        <div>    
            <h2>Select courses
            <select name = "selectSemester">
                <option> fall 2022 </option>
                <option> winter 2023 </option>
            </select>
            </h2>
            <input type = "submit" value = "cheak detail">
        </div>
        </form>
    </body>
</html>
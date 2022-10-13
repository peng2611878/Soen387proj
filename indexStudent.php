<!DOCTYPE html>
<html>

    <title>user select courses Page2</title>
    <body>

        <h1>Welcome <?php 
            include_once 'connection.php';
            extract( $_POST);

            $sql = "select fName, lName FROM student WHERE sID = ". $sID;
            $result = $conn->query($sql);
            //connect to MySQL
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo  $row["fName"]. " " . $row["lName"]. "<br>";
                }
              } else {
                echo "0 results";
              }
              $conn->close();
        ?>


        <form method post = "post" action = "coursesRegistered.php">
              <div>
                <h2>Click here to view your registered courses</h2>
                <input type = "submit" value = "view">
              </div>
        </form>

        <form method = "post" action = "courseDatabase.php">
        <div>    
            <h2>Select Semester
            <select name = "selectSemester">
                <option> 2022Fall </option>
                <option> 2023winter </option>
            </select>
            </h2>
            <input type = "submit" value = "cheak detail">
        </div>
        </form>
        <?php
        session_start();
        $_SESSION['sID'] = $sID;
        ?>
    </body>
</html>
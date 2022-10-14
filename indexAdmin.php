<!DOCTYPE html>
<html>
    <title>admin page Page6</title>
    <body>

        <h1> Welcome </h1>
          <?php 
            include_once 'connection.php';
            extract( $_POST);

            $sql = "select fName, lName FROM administrator WHERE eID = ". $eID;
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


        <form method post = "post" action = "courseCreation.php">
              <div>
                <h2>Click here to create a new course</h2>
                <input type = "submit" value = "create">
              </div>
        </form>

        
        <!--a list of course taken by a certain student -->
        <form method="post" action="studentReport.php" >
        <h2>Please enter student ID</h2>
        <input name = "srID" type = "int" size = 2 />
        <input type = "submit" value = "view courses of this student">
        </form>

        <!--a list of students in a certain course -->
        <form method="post" action="courseReport.php" >
        <h2>Please enter course ID</h2>
        <input name = "crID" type = "int" size = 2 />
        <input type = "submit" value = "view student on this course">
        </form>

    </body>
</html>
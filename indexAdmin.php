<!DOCTYPE html>
<html>
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
    <title>admin page Page6</title>
    <body>
    <div class="title">
        <span class="title">Course Management System</span>
    </div>
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
                <h4>Click here to create a new course</h2>
                <input class="btn btn-outline-primary btn-sm" type = "submit" value = "create">
              </div>
        </form>

        <!--a list of course taken by a certain student -->
        <form method="post" action="studentReport.php" >
        <h4>Please enter student ID</h2>
        <input name = "srID" type = "int" size = 2 />
        <input class="btn btn-outline-primary btn-sm" type = "submit" value = "view courses of this student">
        </form>

        <!--a list of students in a certain course -->
        <form method="post" action="courseReport.php" >
        <h4>Please enter course ID</h2>
        <input name = "crID" type = "int" size = 2 />
        <input class="btn btn-outline-primary btn-sm" type = "submit" value = "view student on this course">
        </form>
    <div class="footer">
        Copyright &copy Julie&Yui COMPANY &nbsp; Technical support: (514) 555-1234
    </div>
    </body>
</html>
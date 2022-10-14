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

    <title>user select courses Page2</title>
    <body>
    <div class="title">
        <span class="title">Course Management System</span>
    </div>

        <h4>Welcome <?php 
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
                <h4>Click here to view your registered courses</h2>
                <input class="btn btn-outline-primary btn-sm" type = "submit" value = "view">
              </div>
        </form>

        <form method = "post" action = "courseDatabase.php">
        <div>    
            <h4>Select Semester
            <select name = "selectSemester">
                <option> 2022Fall </option>
                <option> 2023winter </option>
            </select>
            </h2>
            <input class="btn btn-outline-primary btn-sm" type = "submit" value = "show available courses">
        </div>
        </form>
        <?php
        session_start();

        $_SESSION['sID'] = $sID;
        
        ?>
    <div class="footer">
        Copyright &copy Julie&Yui COMPANY &nbsp; Technical support: (514) 555-1234
    </div>
    </body>
</html>
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
    <title>course report Page6</title>
    <body>
    <div class="title">
        <span class="title">Course Management System</span>
    </div>

    <h1> The Following Student are on this courses !</h1>  
 
<?php

    function display_registeredStudent(){
    include_once 'connection.php';
    extract( $_POST);
    // session_start();
    // $sID = $_SESSION['sID'];
    // extract($_POST);

    $query = "SELECT * 
              FROM enrolled, student 
              WHERE enrolled.cID = $crID AND enrolled.sID = student.sID ";
    
    if($result = $conn->query($query)){
        while($row = $result->fetch_assoc()) {
            $sID = $row["sID"];
            $fName = $row["fName"];
            $lName = $row["lName"];
            $address = $row["address"];
            $email = $row["email"];
            $phone = $row["phone"];
            $dOB = $row["dOB"];
           

            $studentList = <<<DELIMETER
            <tr role="row">
            <td row="cell">{$sID}</td>
            <td row="cell">{$fName}</td>
            <td row="cell">{$lName}</td>
            <td row="cell">{$address}</td>
            <td row="cell">{$email}</td>
            <td row="cell">{$phone}</td>
            <td row="cell">{$dOB}</td>
            </tr> 
            DELIMETER;

        echo $studentList;
        //echo "$cID";
        //echo "$sID";
        // echo "$row[cID]";
            
        }

        $result->free();
    } 

}

?>

<table class = "courseTable">
        <tr>
            <th>sID</th>
            <th>fName</th>
            <th>lName</th>
            <th>address</th>
            <th>email</th>
            <th>phone</th>
            <th>dOB</th>
        </tr>
        <?php
        display_registeredStudent();
        ?>
    </table>

    <div class="footer">
        Copyright &copy Julie&Yui COMPANY &nbsp; Technical support: (514) 555-1234
    </div>
</body>
</html>


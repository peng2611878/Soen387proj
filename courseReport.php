<!DOCTYPE html>
<html>
    <title>course report Page6</title>
    <body>
   

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


</body>
</html>


<!DOCTYPE html>
<html>
    <title>course creatation sucessful page 10</title>


<?php
    include_once 'connection.php';
    extract($_POST);

    $sql = "INSERT INTO course (courseCode, title, semester, days, time, instructor, room, startDate, endDate)
    values ('$courseCode', '$title', '$semester', '$days', '$time', '$instructor', '$room', '$startDate', '$endDate')";
    if ($result = $conn->query($sql)){
        print("Course was insterted into the Database correctly");
    };



    mysqli_close( $conn );
?>
</html>
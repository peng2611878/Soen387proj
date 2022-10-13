<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="myCss.css">
<title>Show the course add result</title>
</head>

<body>

<?php
        include_once 'connection.php';
        extract( $_POST);
        session_start();
        $sID = $_SESSION['sID'];
        echo "$sID";
        
    
</body>
</html>
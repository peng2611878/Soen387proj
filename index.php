<?php require_once("sources/connection.php");?>
<?php include(TEMPLATE . "/header.php"); ?>

<?php

    include(TEMPLATE . "/welcome.php"); 

/*     if($_SERVER['REQUEST_URI'] == "/index.php" )  {


        include(TEMPLATE . "/welcome.php");

    } */

    if(isset($_GET['student'])){
          
          
        include(TEMPLATE . "/student.php");


    }

?>

<?php include(TEMPLATE . "/footer.php") ?>
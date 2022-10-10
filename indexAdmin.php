<!DOCTYPE html>
<html>
    <title>Administrator Management Page Page6</title>
    <body>

        <h1>Welcome Administrator!</h1>
        <?php 
            include_once 'connection.php';
            extract( $_POST);

            $sql = "select fName, lName FROM Administrator WHERE eID = ". $eID;
            $result = $conn->query($sql);
            //connect to MySQL

            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "id: " . $eID . "  Name: " . $row["fName"]. " " . $row["lName"]. "<br>";
                }
              } else {
                echo "0 results";
              }
              $conn->close();
        ?>


        

    </body>
</html>
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
    <title> courseDetail </title>

    <body>
    <div class="title">
        <span class="title">Course Management System</span>
    </div>

        <?php
            extract( $_POST);

            //build select query, select all from course table 
            //@julieyingjie@peng2611878 there is some problem with the query writinng, i tried select *, it works fine
            $query = "SELECT * FROM course WHERE title = ' " .$selectCourse . " ' ";

            //connect to MySQL
            if(!($database = mysqli_connect("localhost", "root", "")))
                die ("connection to database has failed </body></html>");

            //open soen387_teamproject database 
            if (!mysqli_select_db( $database, "soen387_teamproject"))
                die ("could not open soen387 database for detail </body></html>");

            //query soen387 database 
            if (!( $result = mysqli_query($database, $query)))
            {
                print("could not execute query <br />");
                die (mysqli_error(). "</body></html>");
            }

            mysqli_close( $database);
        ?>

        <h2> course detail </h2>
        <table>
            <?php 
                // fetch each record in result set 
                for ($counter = 0; $row = mysqli_fetch_row ($result); $counter++)
                {
                    print( "<tr>" );
                    foreach ($row as $key => $value)
                    print("<td>$value</td>");
                    print( "</tr>" );
                }
            ?>
        </table>

        <br />Your search yielded 
        <strong> <?php print( "$counter" ) ?> results.<br /><br /></strong>
        <div class="footer">
        Copyright &copy Julie&Yui COMPANY &nbsp; Technical support: (514) 555-1234
    </div>
    </body>

</html>
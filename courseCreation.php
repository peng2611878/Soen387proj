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
    <title>course creation page 7</title>
    <body>
    <div class="title">
        <span class="title">Course Management System</span>
    </div>
        <h2>Input the following blank to creat a course</h2>
        <form method = "post" action = "courseInsertion.php">
        <p>course code <input name = "courseCode" type = "varchar" value = "comp/soenXXX" size = "30"/><br /></p>
        <p>title <input name = "title" type = "varchar" value = "XXX" size = "30"/><br /></p>
        <p>semester <select name = "semester"><option>2022Fall</option><option>2023winter</option></select><br /></p>
        <p>days <input name = "days" type = "int" value = "XXX" size = "20"/><br /></p>
        <p>time <input name = "time" type = "time" value = "XXX" size = "20"/><br /></p>
        <p>instructor <input name = "instructor" type = "char" value = "XXX" size = "30"/><br /></p>
        <p>room <input name = "room" type = "varchar" value = "XXX" size = "30"/><br /></p>
        <p>start date <input name = "startDate" type = "date" value = ""/><br /></p>
        <p>end date <input name = "endDate" type = "date" value = "" /><br /></p>
        <input type = "submit" value = "Click to Create!" />
        </form>
        <div class="footer">
        Copyright &copy Julie&Yui COMPANY &nbsp; Technical support: (514) 555-1234
    </div>
    </body>

</html>

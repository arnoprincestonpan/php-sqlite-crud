<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD w/ PHP & SQLite</title>
</head>
<body>
    <form method="POST">
        <a href="index.php">BACK</a>
        <p>
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" placeholder="First Name">
        </p>
        <p>
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" placeholder="Last Name">
        </p>
        <p>
            <label for="major">Major:</label>
            <input type="text" id="major" name="major" placeholder="Major">
        </p>
        <input type="submit" name="save" value="Save">
    </form>
    <?php
        if(isset($_POST["save"])){
            
            include "dbconfig.php";
            
            $sql = "INSERT INTO students (firstname, lastname, major) VALUES ('".$_POST["firstname"]."', '".$_POST["lastname"]."', '".$_POST["major"]."')";
            $db->exec($sql);

            header("location: index.php");
        }
    ?>
</body>
</html>
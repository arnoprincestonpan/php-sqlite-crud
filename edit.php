<?php

    include "dbconfig.php";

    $sql = "SELECT rowid, * FROM students WHERE rowid = '".$_GET['id']."'";
    $query = $db->query($sql);
    $row = $query->fetchArray();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD w/ PHP & SQLite</title>
</head>
<body>
    <form>
        <a href="index.php">BACK</a>
        <p>
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $row["firstname"]; ?>">
        </p>
        <p>
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo $row["lastname"]; ?>">
        </p>
        <p>
            <label for="major">Major:</label>
            <input type="text" id="major" name="major" value="<?php echo $row["major"]; ?>">
        </p>
        <input type="submit" name="save" value="Save">
    </form>
    <?php
        if(isset($_POST["save"])){
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $major = $_POST["major"];

            // Update our table
            $sql = "UPDATE students SET firstname = '$firstname', lastname = '$lastname', major = '$major' WHERE rowid = '".$_GET["id"]."'";
            $db->exec($sql);

            header('location: index.php');
        }
    ?>
</body>
</html>
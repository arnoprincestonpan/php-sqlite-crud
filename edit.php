<?php
include 'dbconfig.php';

$sql = "SELECT rowid, * FROM students WHERE rowid = '" . $_GET['id'] . "'";
$query = $db->query($sql);
$row = $query->fetchArray();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>CRUD w/ PHP & SQLite</title>
</head>

<body>
    <div class="m-3">
        <h1>Edit Students</h1>
        <form class="form-group" method="POST">
            <a class="btn btn-secondary mb-1" href="index.php">BACK</a>
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
            <input class="btn btn-primary" type="submit" name="save" value="Save">
        </form>
    </div>
    <?php
    if (isset($_POST["save"])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $major = $_POST["major"];

        // Update our table
        $sql = "UPDATE students SET firstname = '$firstname', lastname = '$lastname', major = '$major' WHERE rowid = '" . $_GET["id"] . "'";
        $db->exec($sql);

        header('location: index.php');
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
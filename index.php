<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD w/ PHP & SQLite</title>
</head>
<body>
    <a href="add.php">ADD</a>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Major</th>
        </thead>
        <tbody>
            <?php
                // include the database connection
                include "dbconfig.php";

                // query information from table we're creating
                $sql = "SELECT rowid, * FROM students";
                $query = $db->query($sql);

                while($row = $query->fetchArray()){
                    echo 
                    "
                        <tr>
                            <td>".$row["rowid"]."</td>
                            <td>".$row["firstname"]."</td>
                            <td>".$row["lastname"]."</td>
                            <td>".$row["major"]."</td>
                            <td>
                                <a href='edit.php?id=".$row['rowid']."'>Edit</a>
                                <a href='delete.php?id=".$row["rowid"]."'>Delete</a>
                            </td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
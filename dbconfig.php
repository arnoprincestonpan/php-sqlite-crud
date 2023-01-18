<?php
// Create a new SQLite Database
$db = new SQLite3("students.db"); 
$query = "CREATE TABLE IF NOT EXISTS students (firstname STRING, lastname STRING, major STRING)";
$db->exec($query);
?>
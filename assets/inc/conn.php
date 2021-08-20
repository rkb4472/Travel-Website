<!-- Renee Bogdany
   Individual Project Part 2
   5/7/2021 
   Connection to Database
-->

<?php
    // host
    $db = "localhost";
    // username
    $dbUsername = "rkb4472";
    // password
    $password = "Degenerate4=barbarism";
    // dbname
    $dbName = "rkb4472";

    $mysqli = new mysqli($db, $dbUsername, $password, $dbName);

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
?>
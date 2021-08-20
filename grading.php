<!-- John-Paul Takats, ISTE-240, 2205 -->
    <!-- Renee Bogdany
         Individual Project Part 2
         Grading
         5/7/2021 -->

<?php

    // start session / check login
    session_name("renee");
    session_start();
    if(!$_SESSION['login']) {
        header('Location: login.php');
    }       

    // page/path vars
    $page = "GRADING";
    $path = "./";

    // header
    include($path . "assets/inc/header.php");

    // move to DB
    // connect to database
    include($path . "assets/inc/conn.php");

    // build sql query
    $query = "SELECT * FROM `projectContent` WHERE `name` = '" . $page . "' ";

    // run query/ retrieve results
    $result = $mysqli -> query($query);

    // get content
    while ($row = $result -> fetch_assoc()) {
        $records[] = $row;
    }

    // echo out content
    foreach($records as $this_row) {
        echo $this_row['content'];
    }

    // footer
    include($path . "assets/inc/footer.php"); 
    
?>
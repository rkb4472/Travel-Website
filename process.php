<!-- John-Paul Takats, ISTE-240, 2205 -->
    <!-- Renee Bogdany
         Individual Project Part 2
         Process Page (for Comments Form)
         5/7/2021 -->

<?php

// connect to DB
include($path . "assets/inc/conn.php");

    // sanitize data
    function sanitize($str, $length=50) {
        $str = trim($str);
        $str = htmlentities($str, ENT_QUOTES);
        $str = substr($str, 0, $length);
        return $str;
    }

    // insert into database
    if($mysqli) {
        // validate - check submit btn is clicked & name/comment
        if(isset($_GET['submit1'])) {
            if( !empty($_GET['name']) && !empty($_GET['comment']) ) {

                // sanitize name/comment
                $name = sanitize($_GET['name'], 50);
                $comment = sanitize($_GET['comment'], 100);

                // prepare and bind, insert name/comment in DB
                $stmp = $mysqli->prepare("INSERT INTO comments (name, comment) VALUES (?, ?)");
                $stmp->bind_param("ss", $name, $comment);
                $stmp->execute();
                // close
                $stmp->close();
            }
        }


    }
    
    // close
    $mysqli->close();

    // go back to comments page
    header('Location: comments.php');

    ?>
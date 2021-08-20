<!-- John-Paul Takats, ISTE-240, 2205 -->
    <!-- Renee Bogdany
         Individual Project Part 2
         Clear Session
         5/7/2021 -->

<?php
    session_name("renee");
    session_start();
    session_destroy();
    header('Location: login.php');
?>
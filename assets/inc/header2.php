<!DOCTYPE html>
<html lang="en">
    <!-- John-Paul Takats, ISTE-240, 2205 -->
    <!-- Renee Bogdany
         Individual Project Part 2
         Header
         5/7/2021 -->
    
    <!-- head -->
    <head>
        <meta charset="UTF-8">
        <link  href="<?php echo $path; ?>assets/css/style.css" rel="stylesheet">
        <script src="<?php echo $path; ?>assets/scripts/javascript.js"></script> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> <?php echo $page; ?> </title> 
        <link rel="shortcut icon" type="image/png" href="assets/images/vlogosmaller.png"/>
    </head>

    <!-- body, onload if parks page -->
    <body <?php if($page == "PARKS") { echo 'onload="init();"'; } ?>>

    <header>
            <!-- vville logo and title -->
            <img class="vlogo" src= "assets/images/vlogosmaller.png" alt="Voorheesville school logo" width="75">
            <h1> VOORHEESVILLE </h1>
            <img class="vlogo" src= "assets/images/vlogosmaller.png" alt="Voorheesville school logo" width="75">
        </header>
        <hr class="line1"/>
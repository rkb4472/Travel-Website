<!DOCTYPE html>
<html lang="en">
    <!-- John-Paul Takats, ISTE-240, 2205 -->
    <!-- Renee Bogdany
         Individual Project Part 2
         Header / Navigation
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
    <body <?php if($page == "PARKS") { echo 'onload="init();"'; }?>>
    
    <!-- nav btn for smaller screens -->
    <div id="navBtn">
        <a href="#nav" class="lines" onclick="lowerOpacity();">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
        </a> 
    </div>

    <!-- navigation for smaller screens -->
    <nav id="nav" class="nav">
        <div>
            <!-- close navigation -->
            <a href="#nav-toggle" id="toggle-close" class="lines" onclick="higherOpacity();">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </a> 
            </div>
        <div>
            <ul class="nav2">
                <li class="top3"><a href="index.php">Home</a></li>
                <li><a href="grading.php">Grading/About</a></li>
                <li class="ref"><a href="references.php">References</a></li>
            </ul>
            <hr/>
            <ul class="navList">
                <li>
                    <button class="dropdown-btn" onclick="drop()">Shopping</button>
                    <div class="dropdown-container" id="dropdown-container">
                        <a href="shopping.php">Malls</a><br>
                        <a href="restaurants.php">Restaurants</a>
                    </div>
                </li>
                <li>
                    <button class="dropdown-btn2" onclick="drop2()">About</button>
                    <div class="dropdown-container2" id="dropdown-container2">
                        <a href="history.php">History</a><br>
                        <a href="religion.php">Religion</a><br>
                        <a href="education.php">Education</a>
                    </div>
                </li>
                <li>
                    <button class="dropdown-btn3" onclick="drop3()">Fun</button>
                    <div class="dropdown-container3" id="dropdown-container3">
                        <a href="parks.php">Parks</a><br>
                        <a href="other.php">Other</a>
                    </div>
                </li>
                <li>
                    <button class="dropdown-btn4" onclick="drop4()">Surveys</button>
                    <div class="dropdown-container4" id="dropdown-container4">
                        <a href="survey.php">Visit Survey</a><br>
                        <a href="comments.php">Comments</a>
                    </div>
                </li>
            </ul>
			  
    </div>
  </nav>

<!-- top navigation for bigger screens -->
<nav class="topnav">
            <ul class="nav2">
                <li><a id="top" href="index.php">Home</a></li>
                <li><a href="grading.php">Grading/About</a></li>
                <li><a href="references.php">References</a></li>
            </ul>
        <!-- bottom navigation and heading with website title -->
        </nav>   
        <header>
            <!-- vville logo and title -->
            <img class="vlogo" src= "assets/images/vlogosmaller.png" alt="Voorheesville school logo" width="75">
            <h1 id="topPage"> VOORHEESVILLE </h1>
            <img class="vlogo" src= "assets/images/vlogosmaller.png" alt="Voorheesville school logo" width="75">
        </header>
        <hr class="line1"/>
        <!-- bottom navigation for bigger screens -->
        <nav>
            <ul class="newnav">
                <li>
                    <div class="noLink"><a href="">Shopping</a></div>
                    <ul>
                        <li><a href="shopping.php">Malls</a></li>
                        <li><a href="restaurants.php">Restaurants</a></li>
                    </ul>
                </li>
                <li>
                    <div class="noLink"><a href="">About</a></div>
                    <ul>
                        <li><a href="history.php">History</a></li>
                        <li><a href="religion.php">Religion</a></li>
                        <li><a href="education.php">Education</a></li>
                    </ul>
                </li>
                <li>
                    <div class="noLink"><a href="">Fun</a></div>
                    <ul>
                        <li><a href="parks.php">Parks</a></li>
                        <li><a href="other.php">Other</a></li>
                    </ul>
                </li>
                <li>
                    <div class="noLink"><a href="">Surveys</a></div>
                    <ul>
                        <li><a href="survey.php">Visit Survey</a></li>
                        <li><a href="comments.php">Comments</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <hr/>

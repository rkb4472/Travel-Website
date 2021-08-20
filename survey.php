<!-- John-Paul Takats, ISTE-240, 2205 -->
    <!-- Renee Bogdany
         Individual Project Part 2
         Visit Survey
         5/7/2021 -->

<?php  

        // start session / check login
        session_name("renee");
        session_start(); 
        if(!$_SESSION['login']) {
            header('Location: login.php');
        }       
        
        // error vars
        $errors = '';
        $fail = '';

        // page/path vars
        $page = "SURVEY";
        $path = "./";

        // check that form has been submitting
        if(isset($_POST['submit'])) {
            
            // check captcha has been filled out & is correct
            if(empty($_SESSION['6_letters_code'] ) || strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
            {
                // write errors to echo out later
                $errors .= "\n The captcha code did not match!";
                $fail .= "\n *Survey was not submitted. Check for errors below.";
            }
            // if it's correct:
            if(empty($errors))  {
                // connect to DB
                include($path . "assets/inc/conn.php");

                    // insert into database
                    if($mysqli) {
                            // if( !empty($_GET['visit']) && !empty($_GET['comment']) ) {
                                // get vars to insert
                                $group = $_POST['groupnumber'];
                                $visit = $_POST['visit'];
                                $favPlace = $_POST['place'];
                                $rate = $_POST['rate'];
                                // prepare and bind
                                $stmp = $mysqli->prepare("INSERT INTO `survey` (`group`, `visit`, `favPlace`, `rate`)
                                VALUES (?, ?, ?, ?);");
                                $stmp->bind_param("ssss", $group, $visit, $favPlace, $rate);
                                $stmp->execute();
                                $stmp->close();
                            // }

                    }
                    
                    // close
                    $mysqli->close();

                    // redirect to thank you page
                    header('Location: surveythankyou.php');
	        }
            
        }

        // header
        include($path . "assets/inc/header.php");
        ?>

    <!-- page title -->
    <h2> SURVEY </h2>
    <!-- let user know if survey was not submitted -->
    <?php
            if(!empty($errors)){
                echo "<p style='text-align:center;color:red'>".$fail."</p>";
            }
        ?>

    <!-- tell about visit text-->
    <p class="text2"> If you have visited Voorheesville, please take the following survey in order to let us know about your trip. </p>

    <!-- form about town visit -->
	<form method="post" action="survey.php">
        <!-- ask about group size w/ number-->
        <div class="groupdiv">
            <label class="group2" for="groupnumber">How many in your group?</label><input type="number" id="groupnumber" name="groupnumber" min="0" max="100"/>
        </div>

        <br>

        <!-- ask about time of visit with date-->
        <div class="visit">
            <label for="visit">When did you visit?</label>
            <input class="date" type="date" id="visit" name="visit"/>
        </div>

        <!-- ask about fav place to eat w/ fieldset and radio options -->
        <fieldset class="favplace">
            <legend>Favorite Place to Eat</legend>
            <label for="chinagarden"><input type="radio" id="chinagarden" name="place"/>China Garden</label><br>
            <label for="brickhouse"><input type="radio" id="brickhouse" name="place"/>Brick House</label><br>
            <label for="emmaclearys"><input type="radio" id="emmaclearys" name="place"/>Emma Cleary's</label><br>
            <label for="gracies"><input type="radio" id="gracies" name="place"/>Gracie's</label><br>
            <label for="other"><input type="radio" id="other" name="place"/>Other</label>
        </fieldset>

        <!-- ask to rate voorheesville w/ range -->
        <p class="text2"> Overall Rate your visit to Voorheesville: </p>
        <div class="ratebar">
            <label for="rate">0</label><input type="range" id="rate" name="rate" min="0" max="10" value="5" step="1"/><label for="rate">10</label><br>
        </div>

        <p class="captcha">
            <img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' alt="captcha image" ><br>
            <label>Enter the code above here :</label><br>
            <input id="6_letters_code" name="6_letters_code" type="text"><br>
        </p>
        <!-- let user know if captcha code was incorrect -->
        <?php
            if(!empty($errors)){
                echo "<p class='err' style='text-align:center;color:red;'>".$errors."</p>";
            }
        ?>

        <!-- submit button -->
        <div class="submitbutton">
            <input type="submit" name="submit" value="Submit" />
        </div>

    </form>

    <!-- footer -->
    <?php include($path . "assets/inc/footer.php"); ?>
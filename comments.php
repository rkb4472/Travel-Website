<!-- John-Paul Takats, ISTE-240, 2205 -->
    <!-- Renee Bogdany
         Individual Project Part 2
         Comments Form
         5/7/2021 -->

    <?php
        
        // start session / check login
        session_name("renee");
        session_start();
        if(!$_SESSION['login']) {
            header('Location: login.php');
        }       

        // page/path comments
        $page = "COMMENTS";
        $path = "./";
    
        // connect to DB
        include($path . "assets/inc/conn.php");

        // header
        include($path . "assets/inc/header.php");    
    
        // get table from database
        $query = "SELECT * FROM comments";
        $result = $mysqli->query($query);
        
        // use fetc_assoc
        while ($row = $result->fetch_assoc()) {
            $records[] = $row;
        }
        
        // close
        $mysqli->close();
        
     ?>

<!-- contact form -->
<h2>Comments Form</h2> 
<h3>Please Leave us a comment about Voorheesville!</h3>
    <div class="form" id="form">
        <form name="commentform" action="process.php" onsubmit="return validateForm();" method="get">
            <fieldset>
                <legend class="commentTitle">Comment Form:</legend>
                First Name: <input type="text" name="name" id="name" />
                <span id="fname*" style="color:red;display:none;">*</span><br/>
                Comment: <br/>
                <textarea name="comment" id="comment" rows="3" cols="31"></textarea>
                <span id="lname*" style="color:red;display:none;">*</span><br/>
            <input type="submit" name="submit1" value="Comment">
            </fieldset>
        </form>
    </div>
    <p id="check" style="display:none;text-align: center;padding-top:.5em;"><span class="red">*</span>Both name and comment text fields must be filled out to submit!</p>
    <h3>Check out what other people thought below:</h3>

<!-- display comments from database -->
<div id ="list">
    <ul>
    <?php   
        foreach($records as $this_row) {
            echo '<li class="wrap"><strong>'. $this_row['name'] . "</strong>: " . $this_row['comment'] . " @ " . $this_row['date'] . "</li>";
        }
    ?>
    </ul>
</div>
<hr/>

<!-- footer -->
<?php include($path . "assets/inc/footer.php"); ?>
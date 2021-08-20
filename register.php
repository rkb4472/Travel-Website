<!-- John-Paul Takats, ISTE-240, 2205 -->
    <!-- Renee Bogdany
         Individual Project Part 2
         Register
         5/7/2021 -->

<?php

	// page/path vars
	$page = "REGISTER";
	$path = "./";

	// header w/o nav	
	include($path . "assets/inc/header2.php");

	// check uname/pass have been entered & passwords match
	if(!empty($_POST['uname']) && !empty($_POST['pass']) && !empty($_POST['pass2']) && passMatch()) {
		
		// connect to DB
		include($path . "assets/inc/conn.php");

		// insert uname/password in DB
		$stmt=$mysqli->prepare("INSERT INTO ProjectLogin (uname, pass) VALUES(?,?)");
		//bind
		$stmt->bind_param("ss",$_POST['uname'],password_hash($_POST['pass'],PASSWORD_DEFAULT));
		
		//do it
		$stmt->execute();
		//close
		$stmt->close();

		// go back to login
		header('Location: login.php');
	} else {
		if(isset($_POST["submit"])) {
			// write error message
			$fail = "*Username or password is empty, or passwords did not match.";
		}
	}

	// function to check passwords match
	function passMatch(){
		if(strcmp($_POST['pass'],$_POST['pass2'])==0){
			return true;
		}else{
			return false;
		}
	}
?>

	<!-- form to register -->
	<form class="form2" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset>
			<legend class="login">Register</legend>
		<!-- username -->
		<div class="usname">
			User Name:
			<input type="text" name="uname" size="30" />
		</div>
		<!-- password -->
		<div class="password">
			Password:
			<input type="password" name="pass" size="30" />
		</div>
		<!-- password again -->
		<div class="password">
			Password (again):
			<input type="password" name="pass2" size="30" />
		</div>
		<!-- reset / enter buttons -->
		<div class="loginBtns">
			<input class="reset2" type="reset" value="Reset Form" />
			<input class="enter2" type="submit" name="submit" value="Submit Form" />
		</div>	
	</fieldset>
	</form>
	<!-- print out error message -->
	<?php 
		if(!empty($fail)) {
			echo "<p style='text-align:center;padding-bottom:2em;'>".$fail."</p";
		}
		?>

<!-- footer -->
<?php 
	include($path . "assets/inc/footer2.php");
?>

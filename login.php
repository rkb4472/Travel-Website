<!-- John-Paul Takats, ISTE-240, 2205 -->
    <!-- Renee Bogdany
         Individual Project Part 2
         Login
         5/7/2021 -->

<?php
	// start session
	session_name("renee");
	session_start();

	// page/path vars
	$page = "LOGIN";
	$path = "./";

	// header w/o nav
	include($path . "assets/inc/header2.php");

	// check username & password have been entered
	if(!empty($_POST['uname']) && !empty($_POST['pass'])) {

		// connect to DB
		include($path . "assets/inc/conn.php");

		// get from DB
		$stmt=$mysqli->prepare("SELECT pass from ProjectLogin WHERE uname=?");
		//bind
		$stmt->bind_param("s",$_POST['uname']);
		//do it
		$stmt->execute();
		$stmt->bind_result($res);
		$stmt->fetch();

		// check password matches
		if(password_verify($_POST['pass'], $res)) {
			$_SESSION['login']=true;
			$_SESSION['name']=$_POST['uname'];
			// go to website
			header('Location: index.php');
		} else {
			// get error message for incorrect uname/password
			if(isset($_POST["submit"])) {
				$fail = "*Incorrect username or password.";
			}
		}
		// close
		$stmt->close();
	} else {
		if(isset($_POST["submit"])) {
			// get error message for not entering uname/password
			$fail = "*Username or password was not entered.";
		}
	}
?>

	<!-- form for login -->
	<form class="form2" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset>
			<legend class="login">Login</legend>
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
		<!-- buttons for rest, submit, & register -->
		<div class="loginBtns">
			<input type="reset" class="reset" value="Reset Form" />
			<input type="submit" name="submit" class="enter" value="Enter Site" />
			<div>
			<input type="button" class="register" value="Register" onclick="window.location='register.php'" />
			</div>
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


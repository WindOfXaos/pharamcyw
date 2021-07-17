<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])) {
	// removes backslashes
	$username = stripslashes($_REQUEST['username']);
	//escapes special characters in a string
	$username = mysqli_real_escape_string($con, $username); //to escape injecation
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con, $password);
	//Checking is user existing in the database or not
	$query = "SELECT * FROM `users` WHERE username='$username'
and password='" . md5($password) . "'";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	$rows = mysqli_num_rows($result);
	if ($rows == 1) {
		$_SESSION['username'] = $username;
		// Redirect user to home.php
		header("Location: home.php");
	} else {
		echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
		header("Location: home.php");
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>
	<div class="container">
		<div class="cont form">
			<form action="" method="post" name="login">
				<label>Username</label>
				<input type="text" name="username" placeholder="username">
				<label class="lab2">Password</label>
				<input type="password" name="password" placeholder="write your password">
				<!-- <input name="submit" type="submit" value="Login" />-->
				<input class="submit" type="submit" name="submit" value="Login" />
			</form>
			<p>No account?<a href="signup.php"> Sign up</a></p>
		</div>
	</div>
</body>

</html>
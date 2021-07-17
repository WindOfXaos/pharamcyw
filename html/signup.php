<!DOCTYPE html>
<html>

<head>
	<title>signup</title>
	<link rel="stylesheet" type="text/css" href="../css/signup.css">
</head>

<body>
	<?php
	require('db.php');
	// If form submitted, insert values into the database.
	if (isset($_REQUEST['username'])) {
		// removes backslashes
		$username = stripslashes($_REQUEST['username']);
		//escapes special characters in a string
		$username = mysqli_real_escape_string($con, $username);
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con, $email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con, $password);
		$trn_date = date("Y-m-d H:i:s");


		$query = "SELECT * from users where username='$username'";

		$res = mysqli_query($con, $query) or die(mysqli_error($con));
		$res = $res->fetch_all(MYSQLI_ASSOC);
		$tmp = 0;
		if (count($res) == 0) {
			$query = "INSERT into `users` (username, password, email, trn_date)VALUES ('$username', '" . md5($password) . "', '$email', '$trn_date')";
			$result = mysqli_query($con, $query);
			$tmp = $result;
			header("Location: home.php");
		} else {
			echo "<script>
                alert('user already existed');
                window.location.href='login.php';
                </script>";
		}
		if ($tmp) {
			header("Location: login.php");
		}
	} else {
		//failed to enter due to bad network
		//add the signup failed
	?>
		<div class="container">
			<div class="cont form">
				<form name="registration" action="" method="post">
					<label>Username</label>
					<input type="text" name="username" placeholder="Entered" required>
					<label>Email</label>
					<input type="email" name="email" placeholder="user@mail.com" required>
					<label class="lab2">Password</label>
					<input type="password" name="password" placeholder="write your password" required>
					<label class="lab2">Confirm Password</label>
					<input type="password" name="password" placeholder="Rewrite your password" required>
					<!-- <input type="submit" name="submit" value="Create Account" /> -->
					<input class="submit" type="submit" name="submit" value="Create Account" />
				</form>
				<!-- <a href="home.php"><input class="submit" type="button" value="Create Account"></a> -->
				<p>Have an account?<a href="login.php"> log in</a></p>
			</div>

		</div>
	<?php } ?>
</body>

</html>
<!DOCTYPE html>
<html>
<head>
	<title>confirm</title>
	<link rel="stylesheet" type="text/css" href="../css/confirm.css">
</head>
<body>
<?php
require('auth.php');
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['fullname'])){
        // removes backslashes
	$fullname = stripslashes($_REQUEST['fullname']);
        //escapes special characters in a string
	$fullname = mysqli_real_escape_string($con,$fullname);
	$address = stripslashes($_REQUEST['address']);
	$address = mysqli_real_escape_string($con,$address);
	$phone = stripslashes($_REQUEST['phone']);
	$phone = mysqli_real_escape_string($con,$phone);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT INTO `details` (username, fullname, address, phone, trn_date)
                  VALUES ('".$_SESSION['username']."','$fullname','$address', '$phone', '$trn_date')";
        $result = mysqli_query($con,$query);

        $query = "SELECT * from details where username='".$_SESSION['username']."'";

        $res = mysqli_query($con,$query) or die(mysqli_error($con));
        $res = $res->fetch_all(MYSQLI_ASSOC);
        if($result){
			//echo"<script>alert.document('your order has been confirm')</script>"
			header("Location: home.php");
        }elseif (count($res) == 1){
            echo count($res);
            $query_user_update ="update details set fullname='$fullname' , address='$address' , phone = '$phone' , trn_date='$trn_date' where username='".$_SESSION['username']."'";
            mysqli_query($con,$query_user_update);
            echo "<script>
                alert('your contact info has been updated');
                window.location.href='profile.php';
                </script>";
        }
        else{
            echo"<label>Full name</label>";
        }
    }else{
?>
	<div class="container">
		<div class="cont form">
			<form name="registration" action="" method="post">
			<label>Full name</label>
			<input type="text" name="fullname" placeholder="Entered" required>
			<label>Address</label>
			<input type="text" name="address"  placeholder="Tanta - Saed Street" required>
			<label class="lab2">Mobile number</label>
			<input type="text" name="phone"  placeholder="+01012341234" required>
			<textarea id = "notes" type="text" placeholder="Additional Notes..." cols="40" rows="5"></textarea>
			<input class="submit" type="submit" name="submit" value="Confirm Order" />
			</form>
		</div>	
	</div>
    <?php } ?>
</body>

</html>
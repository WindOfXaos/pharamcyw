<?php
require('auth.php');
require('db.php');
$query = "SELECT * from details , users where users.username='" . $_SESSION['username'] . "' and details.username='" . $_SESSION['username'] . "'";
$res = mysqli_query($con, $query) or die(mysqli_error($con));
$res = $res->fetch_all(MYSQLI_ASSOC);


$date = $res;
$address = $date[0]["username"];
$email = $date[0]["email"];
$fname = $date[0]["fullname"];
$phone = $date[0]["phone"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>profile</title>
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
</head>

<body>
    <h1>Welcome <?php echo $_SESSION['username']; ?> !</h1>
    <div class="container">
        <div class="cont form">
            <form name="registration" action="" method="get">
                <label>Full name</label>
                <label class="dbtext"><?php echo $fname; ?></label>

                <label>Email</label>
                <label class="dbtext"><?php echo $email; ?></label>

                <label>Address</label>
                <label class="dbtext"><?php echo $address; ?></label>

                <label>Mobile number</label>
                <label class="dbtext" style="margin-bottom: 35px;"><?php echo $phone; ?></label>

                <input class="submit2" type="button" value="Edit Account Info" onclick="location.href='contact.php'">
                <input class="submit" type="button" value="Home" onclick="location.href='home.php'">

            </form>
        </div>
    </div>

</body>

</html>
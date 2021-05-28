<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body>
<?php
//include auth.php file on all secure pages
include("auth.php");
?>
	<div>	
        <nav>
            <ul>
                <li class="logo"><img src="../imgs/Logo.png"></li>
                <li><a href="">HOME</a></li>
                <li><a href="products.php#bottom">ABOUT</a></li>
                <li><a href="products.php#bottom">CONTACT US</a></li>
                <div style="margin-left: 925px;"></div>
				<li><a href="logout.php">Log OUT</a></li>
                <li class="icon"><a href="checkout.php"><img src="../iconst/cart.svg"></a></li>
                <li class="profile"><img src="../iconst/userimg.svg">
                </li>
            </ul>
        </nav>
        <h1>Welcome <?php echo $_SESSION['username']; ?> to TMYMKA Pharmacy</h1>
        <h2>We sell the newest and most advanced healthcare devices and medicines.</h2>
        <input type="text" placeholder="Search stock...">
        <label>
            <a href="products.php"><img src="../iconst/search.svg" style="width: 40%; height: 1%;"></a>
        </label>
	</div>
</body>
</html>
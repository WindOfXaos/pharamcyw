<?php
	require('db.php');
	$query = "SELECT * from product";
	
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	$result = $result->fetch_all(MYSQLI_ASSOC);
	//var_dump($result)
	//echo $result[0]["email"]
?>
<!DOCTYPE html>
<html>
<head>
	<title>products</title>
	<link rel="stylesheet" type="text/css" href="../css/products.css">
</head>
<body>
	<div>	
        <nav style="position: sticky; top: 0; z-index: 2;">
            <ul>
                <li class="logo"><img src="../imgs/Logo.png"></li>
                <li><a href="home.php">HOME</a></li>
                <li><a href="#bottom">ABOUT</a></li>
                <li><a href="#bottom">CONTACT US</a></li>
                <div style="margin-left: 925px;"></div>
                <li class="icon"><a href="checkout.php"><img src="../iconst/cart.svg"></a></li>
                <li class="profile"><a href="profile.php"><img src="../iconst/cat.png"></a></li>
            </ul>
        </nav>
        <div style="position: fixed; top: 100px; z-index: 2;">
            <input type="text" placeholder="Search stock...">
            <label><img src="../iconst/search.svg" style="width: 40%; height: 1%;"></label>
        </div>
	<?php
		$xc = count($result);
		$i=0;
		echo"<div class='row'>";
		while($i < $xc ) {
            if (($i % 4) == 0 and $i != 0) {
                echo "</div>";
                echo "<div class='row'>";
            }
            
            $product = $result;
            $id = $product[$i]["id"];
            $name = $product[$i]["name"];
            $price = $product[$i]["price"];
            $img = $product[$i]["image"];
            echo "<div class='product'>
						<img src='../iconst/layoutback.svg'>
						<img class = 'layout1' src='../iconst/layoutfront.svg'>
						<h2 style='color:white;'>$name</h2>
						<h3 style='color:#79E6F2;'>Price: <span style='color:white;'>$price$</span></h3>
						<img src='../iconst/prodback.svg'>
						<a href='checkout.php?idp=$id'><img class = 'layout2' src='../iconst/arrow.svg'></a>
						<img class = 'layout3' src='$img'>
						</div>";

            $i++;
		}
            echo "</div>";

			

	?>
        <footer id = "bottom">
            <ul>    
                <li>
                    <a href="">CONTACT US</a>
                    <p>+44 345 678 903</p>
                    <p>adobexd@mail.com</p>
                </li>
                <li style="padding-bottom: 25px;">
                    <a href="">ABOUT</a>
                    <p>We aim to deliver the best online pharmacy
                        shopping experience.</p>
                </li>
                <div style="margin-left: 1005px;"></div>
                <li>
                    <a href="#"><img src="../iconst/uparrow.svg"></a>
                </li>
            </ul>
        </footer>
	</div>
</body>
</html>
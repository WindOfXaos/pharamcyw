<?php
require('auth.php');
require('db.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>checkout</title>
    <link rel="stylesheet" type="text/css" href="../css/checkout.css">
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
        <?php
        if (isset($_GET['idp'])) {
            $id = $_GET['idp'];
            echo "$id";
            $query = "SELECT * from product where id=$id";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            $result = $result->fetch_all(MYSQLI_ASSOC);
            $product = $result;
            $name = $product[0]["name"];
            $price = $product[0]["price"];
            echo "<img class = 'layoutcheck' src='../iconst/checkout/Info.svg'>
        <h1 id = 'total'>Total Price:   $price</h1>
        <a href='contact.php'><img class = 'checkbutton' src='../iconst/checkout/checkout.svg'></a>'";
            $img = $product[0]["image"];
            echo "<div class='column'>
                <div class='product'>
                    <img class = 'layout1' src='../iconst/checkout/container.svg'>
                    <h2 id = 'name'>$name</h2>
                    <h3 id = 'price'>$price$</h3>
                    <img class = 'layout2' src='../iconst/checkout/imgback.svg'>
                    <img class = 'layout3' src='$img'>
                    <img class = 'layout4' src='../iconst/checkout/delete.svg'>
                    <img class = 'layout5' src='../iconst/checkout/plus.svg'>
                    <img class = 'layout6' src='../iconst/checkout/minus.svg'>
                    <img class = 'layout7' src='../iconst/checkout/rect.svg'>
                    <h3 id = 'qty'>100</h3>
                </div>
            </div>";
        }
        ?>
        <div class="column">
            <div class="product">
                <img class="layout1" src="../iconst/checkout/container.svg">
                <h2 id="name">Product name</h2>
                <h3 id="price">2500$</h3>
                <img class="layout2" src="../iconst/checkout/imgback.svg">
                <img class="layout3" src="../iconst/checkout/img.png">
                <img class="layout4" src="../iconst/checkout/delete.svg">
                <img class="layout5" src="../iconst/checkout/plus.svg">
                <img class="layout6" src="../iconst/checkout/minus.svg">
                <img class="layout7" src="../iconst/checkout/rect.svg">
                <h3 id="qty">100</h3>
            </div>
        </div>
        <div class="column">
            <div class="product">
                <img class="layout1" src="../iconst/checkout/container.svg">
                <h2 id="name">Product name</h2>
                <h3 id="price">2500$</h3>
                <img class="layout2" src="../iconst/checkout/imgback.svg">
                <img class="layout3" src="../iconst/checkout/img.png">
                <img class="layout4" src="../iconst/checkout/delete.svg">
                <img class="layout5" src="../iconst/checkout/plus.svg">
                <img class="layout6" src="../iconst/checkout/minus.svg">
                <img class="layout7" src="../iconst/checkout/rect.svg">
                <h3 id="qty">100</h3>
            </div>
        </div>
    </div>
    <footer id="bottom">
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
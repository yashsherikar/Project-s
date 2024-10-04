<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Instincts</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

<!-- header section starts -->


<header class="header">

    <section class="flex">

        <a href="#home" class="logo"><i class=""></i>Art Instincts</a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="about.html">about</a>
            <a href="product.php">products</a>
            <a href="gallery.html">gallery</a>
            <a href="#contact">contact</a>
            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
            <a href="logout.php" class="btn">logout</a>

        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>

    </section>

</header>

<!-- header section ends -->

<!-- home section starts -->

<div class="home-bg">

    <section class="home" id="home">

        <div class="content">
            <h3>GentleGlimmar</h3>
            <p>In an era driven by industry, we bring you one step closer to a world of handmade treasures from the interiors of India..</p>
            <a href="about.html" class="btn">about us</a>
        </div>

        <div class="logo">
            <img src="images/logo.png" alt="">
        </div>

    </section>

</div>

<!-- home section ends -->

<!-- about section starts -->

<section class="about" id="about">

    <div class="image">
        <img src="images/about.jpg" alt="">
    </div>

    <div class="content">
        <h3>Get Your Aesthetic Enjoyment</h3>
        <p>Hi, I am Sanjana , I run a small business called 'art instincts' which was started in 2020. we provide products such as handmade and customized diyas. earrings, keychains, pendants and bracelets. we also have scented candle diyas which are made with good quality wax and with pleasant odour. these diyas can burn all night long. our other products are also very durable and can be made however you wish for it. we also craft home decor items in wide range. so, do visit our venue or atleast our website for new updates!</p>
        <a href="products.html" class="btn">our products</a>
    </div>

</section>

<!-- about section ends -->

<!-- products section starts -->

<section class="products" id="products">

    <div class="heading">
        <span>our products</span>
    </div>

    <div class="box-container">

        <div class="box">
            <a href="products.html"><img src="images/diya.png" alt="">
            <h3>diyas</h3>
            <p>handmade scented diya's</p></a>
        </div>

       <div class="box">
        <a href="products.html"><img src="images/keychain.jpg" alt="">
            <h3>Keychains</h3>
            <p>customized keychains</p></a>
        </div>

        <div class="box">
            <a href="products.html"><img src="images/bracelet.jpg" alt="">
            <h3>bracelets</h3>
            <p>aesthetic designer bracelets</p></a>
        </div>

        <div class="box">
            <a href="products.html"><img src="images/pendant.jpg" alt="">
            <h3>pendants and many more</h3>
            <p>with customized designs of your will</p></a>
        </div>

    </div>

</section>

<!-- facility section ends -->

<!-- gallery section starts -->

<section class="gallery" id="gallery">

    <div class="heading">
        <span>our gallery</span>
    </div>

    <div class="box-container">
        <img src="images/product-1.jpg" alt="">
        <img src="images/product-2.jpg" alt="">
        <img src="images/product-3.jpg" alt="">
        <img src="images/product-4.jpg" alt="">
        <img src="images/product-5.jpg" alt="">
        <img src="images/product-6.jpg" alt="">
        <img src="images/product-7.jpg" alt="">
        <img src="images/product-8.jpg" alt="">
        <img src="images/product-9.jpg" alt="">
        <img src="images/product-10.jpg" alt="">
        <img src="images/product-11.jpg" alt="">
        <img src="images/product-12.jpg" alt="">
    </div>

</section>

<!-- gallery section ends -->

<!-- contact section starts -->



<!-- contact section ends -->

<!-- footer section starts -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <i class="fas fa-user"></i>
            <h3>owner</h3>
            <p>Sanjana Kore</p>
        </div>

        <div class="box">
            <i class="fas fa-phone"></i>
            <h3>our number</h3>
            <p>9145773001</p>
        </div>

        <div class="box">
            <i class="fas fa-envelope"></i>
            <h3>our e-mail</h3>
            <p>sanjanakore1528@gmail.com</p>
        </div>

    </div>

</section>

<!-- footer section ends -->

<!-- custom js file link -->
<script src="script.js"></script>

</body>
</html>
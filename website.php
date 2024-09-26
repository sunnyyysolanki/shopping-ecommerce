
<!DOCTYPE html>
<html>
<head>
    <title>1shop</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Welcome, $username!";
} 

?>




    <header>
        <a href="website.php" class="logo"><img class="logo" src="Urban.png"></a>
        <nav>
            <ul class="nav_links">
                <li><a class="ab" href="website.html">Home</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
        <div class="button-container">
	    <form action="checkout.php" method="post">
            <button class="cart_button" type="submit">Cart</p></button>
	    </form>
        <form action="s.php" method="post" style="display:inline-block;">
            <button class="logout_button" type="submit" name="logout">Logout</button>
        </form>
        </div>
    </header>
    
    <div class="banner_parent">
        <div class="banner_child">
            <marquee class="sale">Sale Up To 50% Biggest Discounts. Hurry! Offer Valid Till Diwali...</marquee>
        </div>
    </div>

    <div class="middle_div" align="center">
        <h2>CASUAL SHIRTS</h2>
        <p>Discover the perfect off-duty shirt to suit your downtime. Our casual shirts come in our more relaxed</p>
        <p>weekend or holiday fits, with a range of collar and cuff options to choose from.</p>
    </div>

<div class="product_row">
    <!-- Product 1 -->
    <div class="product_div">
        <img class="product_image" src="images/shirt1.jpg" alt="shirt1">
        <img class="hover-image" src="images/shirt1a.jpg" alt="shirt1">
        <div class="product_info">
            <p class="product_info1">ECRU MERINO WOOL RONALDO POLO SHIRT</p><br/>
            <p class="product_price">₹1299.00</p>
            <form method="post" action="add.php">
                <input type="hidden" name="product_id" value="1">
		<input type="hidden" name="image_url" value="images/shirt1.jpg">
                <input type="hidden" name="product_name" value="ECRU MERINO WOOL RONALDO POLO SHIRT">
                <input type="hidden" name="product_price" value="1299.00">
		 <input type="hidden" name="username" value="<?php echo "<p>" . $_SESSION['username'] . "</p>";?>">
		<button  type="submit"  id="addtocart" name="addtocart">ADD TO CART</button>
              
            </form>
        </div>
    </div>

    <!-- Product 2 -->
    <div class="product_div">
        <img class="product_image" src="images/shirt2.jpg" alt="shirt2">
        <img class="hover-image" src="images/shirt2a.jpg" alt="shirt2">
        <div class="product_info">
            <p class="product_info1">GREY MERINO WOOL CECIL POLO SHIRT</p><br/>
            <p class="product_price">₹1299.00</p>
            <form method="post" action="add.php">
                <input type="hidden" name="product_id" value="2">
		<input type="hidden" name="image_url" value="images/shirt2.jpg">
                <input type="hidden" name="product_name" value="GREY MERINO WOOL CECIL POLO SHIRT">
                <input type="hidden" name="product_price" value="1299.00">
		  <input type="hidden" name="username" value="<?php echo "<p>" . $_SESSION['username'] . "</p>";?>">
                <button type="submit"id="addtocart" name="addtocart">ADD TO CART</button>
            </form>
        </div>
    </div>

    <!-- Product 3 -->
    <div class="product_div">
        <img class="product_image" src="images/shirt3.jpg" alt="shirt3">
        <img class="hover-image" src="images/shirt3a.jpg" alt="shirt3">
        <div class="product_info">
            <p class="product_info1">WHITE LINEN HOLIDAY FIT WINNINGTON SHIRT</p><br/>
            <p class="product_price">₹1499.00</p>
            <form method="post" action="add.php">
                <input type="hidden" name="product_id" value="3">
		<input type="hidden" name="image_url" value="images/shirt3.jpg">
                <input type="hidden" name="product_name" value="WHITE LINEN HOLIDAY FIT WINNINGTON SHIRT">
                <input type="hidden" name="product_price" value="1499.00">
		  <input type="hidden" name="username" value="<?php echo "<p>" . $_SESSION['username'] . "</p>";?>">
                <button type="submit" id="addtocart" name="addtocart">ADD TO CART</button>
            </form>
        </div>
    </div>
</div>


<div class="product_row">
    <!-- Product 10 -->
    <div class="product_div">
        <img class="product_image" src="images/shirt10.jpg" alt="shirt10">
        <img class="hover-image" src="images/shirt10a.jpg" alt="shirt10">
        <div class="product_info">
            <p class="product_info1">CHARCOAL PATTERN COTTON VOILE TAILORED FIT SHELTON SHIRT</p><br/>
            <p class="product_price">₹2300.00</p>
            <form method="post" action="add.php">
                <input type="hidden" name="product_id" value="10">
		<input type="hidden" name="image_url" value="images/shirt10.jpg">
                <input type="hidden" name="product_name" value="CHARCOAL PATTERN COTTON VOILE TAILORED FIT SHELTON SHIRT">
                <input type="hidden" name="product_price" value="2300.00">
		  <input type="hidden" name="username" value="<?php echo "<p>" . $_SESSION['username'] . "</p>";?>">
                <button type="submit" id="addtocart" name="addtocart">ADD TO CART</button>
            </form>
        </div>
    </div>

    <!-- Product 11 -->
    <div class="product_div">
        <img class="product_image" src="images/shirt11.jpg" alt="shirt11">
        <img class="hover-image" src="images/shirt11a.jpg" alt="shirt11">
        <div class="product_info">
            <p class="product_info1">DARK BLUE AND WHITE GRAPH CHECK MAYFAIR SHIRT</p><br/>
            <p class="product_price">₹2000.00</p>
            <form method="post" action="add.php" >
                <input type="hidden" name="product_id" value="11">
		<input type="hidden" name="image_url" value="images/shirt11.jpg">
                <input type="hidden" name="product_name" value="DARK BLUE AND WHITE GRAPH CHECK MAYFAIR SHIRT">
                <input type="hidden" name="product_price" value="2000.00">
		  <input type="hidden" name="username" value="<?php echo "<p>" . $_SESSION['username'] . "</p>";?>">
                <button type="submit" id="addtocart" name="addtocart">ADD TO CART</button>
            </form>
        </div>
    </div>

    <!-- Product 12 -->
    <div class="product_div">
        <img class="product_image" src="images/shirt12.jpg" alt="shirt12">
        <img class="hover-image" src="images/shirt12a.jpg" alt="shirt12">
        <div class="product_info">
            <p class="product_info1">FADED BLUE BLOCK CHECK COTTON TAILORED FIT SHELTON SHIRT</p><br/>
            <p class="product_price">₹2100.00</p>
            <form method="post" action="add.php">
                <input type="hidden" name="product_id" value="12">
		<input type="hidden" name="image_url" value="images/shirt12.jpg">
                <input type="hidden" name="product_name" value="FADED BLUE BLOCK CHECK COTTON TAILORED FIT SHELTON SHIRT">
                <input type="hidden" name="product_price" value="2100.00">
		  <input type="hidden" name="username" value="<?php echo "<p>" . $_SESSION['username'] . "</p>";?>">
                <button type="submit" id="addtocart" name="addtocart">ADD TO CART</button>
            </form>
        </div>
    </div>
</div>


    <div class="product_row">
    <!-- Product 4 -->
    <div class="product_div">
        <img class="product_image" src="images/shirt7.jpg" alt="shirt7">
        <img class="hover-image" src="images/shirt7a.jpg" alt="shirt7">
        <div class="product_info">
            <p class="product_info1">LIGHT BLUE AND NAVY COTTON REGULAR FIT MAYFAIR SHIRT</p><br/>
            <p class="product_price">₹2000.00</p>
            <form method="post" action="add.php">
                <input type="hidden" name="product_id" value="7">
		<input type="hidden" name="image_url" value="images/shirt7.jpg">
                <input type="hidden" name="product_name" value="LIGHT BLUE AND NAVY COTTON REGULAR FIT MAYFAIR SHIRT">
                <input type="hidden" name="product_price" value="2000.00">
		  <input type="hidden" name="username" value="<?php echo "<p>" . $_SESSION['username'] . "</p>";?>">
                <button type="submit" id="addtocart" name="addtocart">ADD TO CART</button>
            </form>
        </div>
    </div>

    <!-- Product 5 -->
    <div class="product_div">
        <img class="product_image" src="images/shirt8.jpg" alt="shirt8">
        <img class="hover-image" src="images/shirt8a.jpg" alt="shirt8">
        <div class="product_info">
            <p class="product_info1">NAVY PATTERN COTTON VOILE TAILORED FIT SHELTON SHIRT</p><br/>
            <p class="product_price">₹1499.00</p>
            <form method="post" action="add.php">
                <input type="hidden" name="product_id" value="8">
		<input type="hidden" name="image_url" value="images/shirt8.jpg">
                <input type="hidden" name="product_name" value="NAVY PATTERN COTTON VOILE TAILORED FIT SHELTON SHIRT">
                <input type="hidden" name="product_price" value="1499.00">
		  <input type="hidden" name="username" value="<?php echo "<p>" . $_SESSION['username'] . "</p>";?>">
                <button type="submit" id="addtocart" name="addtocart">ADD TO CART</button>
            </form>
        </div>
    </div>

    <!-- Product 6 -->
    <div class="product_div">
        <img class="product_image" src="images/shirt9.jpg" alt="shirt9">
        <img class="hover-image" src="images/shirt9a.jpg" alt="shirt9">
        <div class="product_info">
            <p class="product_info1">BLACK PRINCE OF WALES CHECK COTTON REGULAR FIT MAYFAIR SHIRT</p><br/>
            <p class="product_price">₹1299.00</p>
            <form method="post" action="add.php">
                <input type="hidden" name="product_id" value="9">
		<input type="hidden" name="image_url" value="images/shirt9.jpg">
                <input type="hidden" name="product_name" value="BLACK PRINCE OF WALES CHECK COTTON REGULAR FIT MAYFAIR SHIRT">
                <input type="hidden" name="product_price" value="1299.00">
		  <input type="hidden" name="username" value="<?php echo "<p>" . $_SESSION['username'] . "</p>";?>">
                <button type="submit" id="addtocart" name="addtocart">ADD TO CART</button>
            </form>
        </div>
    </div>
</div>


   <div class="product_row">
    <!-- Product 1 -->
    <div class="product_div">
        <img class="product_image" src="images/shirt4.jpg" alt="shirt4">
        <img class="hover-image" src="images/shirt4a.jpg" alt="shirt4">
        <div class="product_info">
            <p class="product_info1">CHARCOAL PATTERN COTTON VOILE TAILORED FIT SHELTON SHIRT</p><br/>
            <p class="product_price">₹2300.00</p>
            <form method="post" action="add.php">
                <input type="hidden" name="product_id" value="4">
		<input type="hidden" name="image_url" value="images/shirt4.jpg">
                <input type="hidden" name="product_name" value="CHARCOAL PATTERN COTTON VOILE TAILORED FIT SHELTON SHIRT">
                <input type="hidden" name="product_price" value="2300.00">
		  <input type="hidden" name="username" value="<?php echo "<p>" . $_SESSION['username'] . "</p>";?>">
                <button type="submit" id="addtocart" name="addtocart">ADD TO CART</button>
            </form>
        </div>
    </div>

    <!-- Product 2 -->
    <div class="product_div">
        <img class="product_image" src="images/shirt5.jpg" alt="shirt5">
        <img class="hover-image" src="images/shirt5a.jpg" alt="shirt5">
        <div class="product_info">
            <p class="product_info1">DARK BLUE AND WHITE GRAPH CHECK MAYFAIR SHIRT</p><br/>
            <p class="product_price">₹2000.00</p>
            <form method="post" action="add.php">
                <input type="hidden" name="product_id" value="5">
		<input type="hidden" name="image_url" value="images/shirt5.jpg">
                <input type="hidden" name="product_name" value="DARK BLUE AND WHITE GRAPH CHECK MAYFAIR SHIRT">
                <input type="hidden" name="product_price" value="2000.00">
		  <input type="hidden" name="username" value="<?php echo "<p>" . $_SESSION['username'] . "</p>";?>">
                <button type="submit" id="addtocart" name="addtocart">ADD TO CART</button>
            </form>
        </div>
    </div>

    <!-- Product 3 -->
    <div class="product_div">
        <img class="product_image" src="images/shirt6.jpg" alt="shirt6">
        <img class="hover-image" src="images/shirt6a.jpg" alt="shirt6">
        <div class="product_info">
            <p class="product_info1">FADED BLUE BLOCK CHECK COTTON TAILORED FIT SHELTON SHIRT</p><br/>
            <p class="product_price">₹2100.00</p>
            <form method="post" action="add.php">
                <input type="hidden" name="product_id" value="6">
		<input type="hidden" name="image_url" value="images/shirt6.jpg">
                <input type="hidden" name="product_name" value="FADED BLUE BLOCK CHECK COTTON TAILORED FIT SHELTON SHIRT">
                <input type="hidden" name="product_price" value="2100.00">

		  <input type="hidden" name="username" value="<?php echo "<p>" . $_SESSION['username'] . "</p>";?>">

                <button type="submit"id="addtocart" name="addtocart">ADD TO CART</button>
            </form>
        </div>
    </div>
</div>

    <div class="fre-container">
        <div class="fre-item">
            <img src="https://s7ap1.scene7.com/is/image/adityabirlafashion/as-icon-package_3x?resMode=sharp2&amp;fmt=png8-alpha&amp;wid=90&amp;hei=90" alt="free shipping">
            <p class="fre_info">FREE SHIPPING</p>
        </div>
        <div class="fre-item">
            <img src="https://s7ap1.scene7.com/is/image/adityabirlafashion/as-icon-exchange_3x?resMode=sharp2&amp;fmt=png8-alpha&amp;wid=90&amp;hei=90" alt="return">
            <p class="fre_info">RETURN WITHIN 30 DAYS</p>
        </div>
        <div class="fre-item">
            <img src="https://s7ap1.scene7.com/is/image/adityabirlafashion/a-sicon-fastdelivery_2x?resMode=sharp2&amp;fmt=png8-alpha&amp;wid=90&amp;hei=90" alt="express delivery">
            <p class="fre_info">EXPRESS DELIVERY IN STORE</p>
        </div>
    </div>

    <div class="bottom">
        <div class="bt_parent">
            <ul class="bt_child">
                <li><h3>NEED HELP?</h3></li>
                <li><a href="#">Order Status</a></li>
                <li><a href="#">Delivery</a></li>
                <li><a href="#">Returns</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Shipping Policy</a></li>
                <li><a href="#">Return And Cancellation Policy</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
        <div class="bt_parent">
            <ul class="bt_child">
                <li><h3 class="aboutjoin">ABOUT US</h3></li>
                <li><a href="#">Aditya Birla Fashion & Retail Ltd</a></li>
                <li><a href="#">Find A Store</a></li>
                <li><a href="#">Urban Fashion Blogs</a></li>
                <li><a href="#">Terms And Conditions For Return And Cancellation</a></li>
                <li><a href="#">Membership Program</a></li>
                <li><a href="#">Bulk Order</a></li>
                <li><br></li>
            </ul>
        </div>
        <div class="bt_parent">
            <ul class="bt_child">
                <li><h3 class="aboutjoin">JOIN THE URBAN FASHION COMMUNITY</h3></li>
                <li><input class="home_email" type="text" id="email" name="email"> <button class="home_submit" type="submit" onclick="email()">SUBMIT</button></li>
                <li>Sign up for updates on the latest Allen Solly collection, </li>
                <li>campaigns, and videos.</li>
                <li class="find_us"><h3>FIND US ON SOCIAL MEDIA</h3></li>
                <li class="social"><a href="#"><i class="w3-xxlarge fa fa-facebook"></i></a><span><a href="#"><i class="w3-xxlarge fa fa-instagram"></i></a><span><a href="#"><i class="w3-xxlarge fa fa-twitter"></i></a></li>
                <li><br></li>
            </ul>
        </div>
    </div>

    <hr>
    <p class="mfas"><a href="#">MORE FROM URBAN FASHION"</a></p>
    <hr>
    <p class="pp"><a href="#">Privacy Policy</a></p><p class="pp">|</p><p class="pp"><a href="#">Terms & Conditions of Use</a></p>
    <p class="pp1">© 2023 Madura Fashion & Lifestyle, A Division of Aditya Birla Fashion & Retail Limited. All Rights Reserved.</p>
</body>

</html>

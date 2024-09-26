
<?php
session_start();
$username = $_SESSION['username'];

// Establish a database connection (replace with your database details)
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "shopping";

// Create a database connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement using a prepared statement to avoid SQL injection
$sql = "SELECT * FROM addtocart WHERE username = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}


$stmt->bind_param("s", $username);


$stmt->execute();


$result = $stmt->get_result();
$totalBilling = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <title>1shop</title>
    <link href="style_checkout.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <a href="website.php" class="logo"><img class="logo" src="Urban.png"></a>
        <nav>
            <ul class="nav_links">
                <li><a class="ab" href="website.php">Home</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
        <div class="button-container">
            <button onclick="cart()"><a href="addtocart.php">Cart&nbsp;</a><p class="button_paragraph" name="cart" id="cart">0</p></button>
        </div>
    </header>
    <div class="banner_parent">
        <div class="banner_child">
            <marquee class="sale">Sale Up To 50% Biggest Discounts. Hurry! Offer Valid Till Diwali...</marquee>
        </div>
    </div>
    <div class="checkout-container" align=center>
        <h1>Checkout</h1>

        <div class="cart-table-container">
            <!-- Display the cart items and allow users to remove items -->
            <table class="cart-table" cellspacing="5" border="1">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
if ($result === false) {
    echo "Error: " . mysqli_error($conn); // Output the specific database error
} elseif (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
        echo "<td><img src='" . $row['image_url'] . "' width='100' height='100'></td>";
        echo "<td>{$row['product_name']}</td>";
        echo "<td>₹{$row['product_price']}</td>";
        echo "<td>{$row['quantity']}</td>";
        
        // Cast the values to float for the calculation
        $productPrice = (float)$row['product_price'];
        $quantity = (int)$row['quantity'];
        $total = $productPrice *$quantity;
        echo "<td>₹" . number_format($total, 2) . "</td>";
	$totalBilling+=$total;
        echo "<td><button><a href='remove.php?product_id={$row['product_id']}&quantity={$row['quantity']}'>Remove</a></button></td>";

        echo "</tr>";
	

	
    }
} else {
    echo "<tr><td colspan='6'>No products found.</td></tr>";
}

echo "<tr>";
                echo "<td colspan='4' class='total-label'>Total Bill:</td>";
                echo "<td class='total-amount'>₹" . number_format($totalBilling, 2) . "</td>";
                echo "<td></td>"; // Empty cell for alignment
        echo "</tr>";
		?>
                </tbody>
            </table>
        </div>
        <br><br>
        <div class="checkout">
            <form action="order_detail.php" method="post">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
                <br><br>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <br><br>

                <label for="address">Address:</label>
                <textarea name="address" id="address" required></textarea>
                <br><br>

                <label for="phone">Phone Number:</label>
                <input type="tel" name="phone" id="phone" required>
                <br><br>

                <label for="credit_card">Credit Card Number:</label>
                <input type="text" name="credit_card" id="credit_card" required>
                <br><br>

                <table class="submit">
                    <tr>
                        <td>
                            <label for="expiry_date">Expiry Date:</label>
                            <input type="text" name="expiry_date" id="expiry_date" required>
                        </td>
                        <td>
                            <label for="cvv">CVV:</label>
                            <input type="text" name="cvv" id="cvv" required>
                        </td>
                    </tr>
                </table>
                <br><br>
                <?php
                // Calculate the total price
             
                        $totalPrice = $totalBilling;
          
                ?>
                <input type="hidden" name="total_price" value="<?php echo $totalPrice; ?>">
                <p>Total price: ₹<?php echo $totalPrice; ?></p>
                <!-- Additional fields can be added as needed -->
                <input type="submit" value="Proceed to Checkout">
            </form>
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
                <li>Sign up for updates on the latest Allen Solly collection, campaigns, and videos.</li>
                <li class="find_us"><h3>FIND US ON SOCIAL MEDIA</h3></li>
                <li class="social"><a href="#"><i class="w3-xxlarge fa fa-facebook"></i></a><span><a href="#"><i class="w3-xxlarge fa fa-instagram"></i></a><span><a href="#"><i class="w3-xxlarge fa fa-twitter"></i></a></li>
                <li><br></li>
            </ul>
        </div>
    </div>
    <hr>
    <p class="mfas"><a href="#">MORE FROM URBAN FASHION</a></p>
    <hr>
    <p class="pp"><a href="#">Privacy Policy</a></p>
    <p class="pp">|</p>
    <p class="pp"><a href="#">Terms & Conditions of Use</a></p>
    <p class="pp1">© 2023 Madura Fashion & Lifestyle, A Division of Aditya Birla Fashion & Retail Limited. All Rights Reserved.</p>
</body>

</html>

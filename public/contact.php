<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shopping cart</title>
	<link rel="icon" href="./favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
	<nav class="navbar">

		<input type="checkbox" id="menu-trigger" />
		<label class='label' for="menu-trigger">
			<i class="fas fa-bars"></i>
		</label>
		<span class="cart" id="cart-toggle"><i class="fas fa-cart-plus"></i><span class="cart-qty"></span></span>

		<ul class="nav-menu">
			<li class="nav-item"><a href="index.php">Home</a></li>
			<li class="nav-item"><a href="about.php">About</a></li>
			<li class="nav-item"><a href="contact.php">Contact</a></li>
			<li class="nav-item"><a href="blog.php">Blog</a></li>
		</ul>
	</nav>

	<header class="special container">
		<span style="font-size: 48px; color: Dodgerblue;">
			<i class="fas fa-igloo"></i>
		</span>
		<h1>Contact Page</h1>
	</header>

	<aside class="aside">
		<!-- Aside Area Start -->
		<header>
			<a href="#0" class="toggle-sidebar">close</a>
		</header>
		<div id="cart-sidebar" class="cart--sidebar">
			<h2>Cart</h2>
			<!-- cart-items start-->
			<ul class="cart-items">
	
	
			</ul>
			<!-- cart-items end -->
	
			<div class="cart-total">
				<p>Total <span>$00.00</span></p>
			</div> <!-- cart-total -->
	
			<a href="#" class="checkout-button">Checkout</a>
			<a href="#" class="clear-cart">Clear Cart</a>
		</div> <!-- cart end -->
		<!-- Aside Area end -->
	</aside>

	<!-- Main -->
	<div id="main-content">
        
	</div>
	<!-- start section footer -->
	<footer class="footer">
		<div class="footer-socials">
			<a href="#"><i class="fab fa-facebook"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
			<a href="#"><i class="fab fa-google-plus"></i></a>
			<a href="#"><i class="fab fa-dribbble"></i></a>
			<a href="#"><i class="fab fa-reddit"></i></a>
		</div>

		<div class="footer-bottom">
			&copy; 2020. All rights reserved.<br>
			Design made by <a href="#">Couch Janus</a>
			<address>NAU, Kyiv, Ukraine </address>
		</div>
	</footer>

	<div class="backdrop"></div>
	
	<!-- End section footer -->

	<script src=/assets/js/app.js async defer></script>


</body>

</html>

<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");

?>
<html>
<head>
	<title>My Online Shop</title>
	<style type="text/css">
		/* http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body{
	background: skyblue;
}
.main_wrapper{
	width: 1000px;
	height: auto;
	margin: auto;
	background: black;
}

.header_wrapper{
	width: 1000px;
	height: 100px;
	margin: auto;
}
#logo{
	float: left;
}
#banner{
	float: right;
}
.menubar{
	width: 1000px;
	height: 50px;
	background: gray;
	color: white;
}
#menu{
	padding: 0;
	margin: 0;
	line-height: 40px;
	float: left;
}
#menu li{
	list-style: none;
	display: inline;	
}
#menu a{
	text-decoration: none;
	color: white;
	padding: 8px;
	margin: 5px;
	font-size: 18px;
	font-family: COMIC SANS MS;
}
#menu a:hover{
	color: orange;
	font-weight: bolder;
	text-decoration: underline;
}
#form{
	float: right;
	padding-left:8px;
	padding-right: 8px;
	line-height: 40px; 
}
.content_wrapper{
	width: 1000px;
	
	margin: auto;
	background: pink;
}
#content_area{
	width: 800px;
	
	float: right;
	background: pink;
}
#sidebar{
	width: 200px;
	
	background: black;
	float: left;
}
#sidebar_title {
background:white;
color:black;
font-size:22px;
font-family:arial; 
padding:10px;
text-align:center;
}
#cats{
	text-align: center;
}
#cats li{
	list-style: none;
	margin: 5px;
}
#cats a{
	color: white;
	padding: 8px;
	margin: 5px;
	text-align: center;
	font-size: 20px;
	font-family: comic Sans MS;
	text-decoration: none;
}
#cats a:hover{
color: orange;
font-weight: bolder;
text-decoration: underline;
}

#products_box{
	width: 780px;
	text-align: center;
	margin-left: 30px;
	margin-bottom: 10px;
}
#single_product{
	float: left;
	margin-left: 30px;
	padding: 10px;
}
#single_product img{
	border: 2px solid black;
}
#shopping_cart{
	width: 800px;
	height: 50px;
	background: black;
	color: white;
}
#footer{
	width: 1000px;
	height: 100px;
	background: gray;
	clear: both;
}
	</style>
</head>
<body>
<div class="main_wrapper">
	
<div class="header_wrapper">
	<a href="index.php"><img id="logo" src="images/logo.gif"></a>
	<img id="banner" src="images/ad_banner.gif">
	
</div>
<div class="menubar">
		
<ul id="menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="all_products.php">Our Products</a></li>
	<li><a href="customer/my_account.php">My Account</a></li>
	<li><a href="#">Sign Up</a></li>
	<li><a href="cart.php">Shopping Cart</a></li>
	<li><a href="#">Contact Us</a></li>

</ul>
<div id="form">
	<form method="get" action="results.php" enctype="multipart/form-data">
		<input type="text" name="user_query" placeholder="Search A Product" />
		<input type="submit" name="search" value="Search">

	</form>
</div>

	</div>
<div class="content_wrapper">
	<div id="sidebar">
			
	<div id="sidebar_title">Categories</div>
	<ul id="cats">
		<?php 
		getCats(); ?>
	</ul> 
	
	<div id="sidebar_title">Brands</div>
	<ul id="cats">
		<?php
		getBrands();
		?>

	</ul> 
	</div>

<div id="content_area">

	<?php
		cart();

	?>

	<div id="shopping_cart">
		<span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">
			<?php
				if (isset($_SESSION['customer_email'])) {
					echo "<b>Welcome: </b>" . $_SESSION['customer_email'] . "<b style='color:yellow';>Your</b>";
				}
				else {
					echo "<b>Welcome Guest!</b>";
				}

			?>


			<b style="color: yellow;"> Shopping Cart- </b> Total Items: <?php total_items(); ?> Total Price: <?php total_price();?> <a href="cart.php" style="color: yellow;"> Go To Cart</a>
			
		
		<?php 
		if (!isset($_SESSION['customer_email'])) {
			echo "<a href='checkout.php' style='color:orange;'>Log In</a>";
		}
		else
		{
			echo "<a href='logout.php' style='color:orange;'>Log Out</a>";
		}

		?>
		</span>

	</div>

	
	<div id="products_box">
		
		<?php
		getPro();
		?>

		<?php  getCatPro(); ?>

		<?php  getBrandPro(); ?>
	</div>


</div>
</div>

<div id="footer">
<h2 style="text-align: center; padding-top:30px; ">
	&copy; 2018 by Priyanka
</h2>
</div>
</div>
</body>
</html>
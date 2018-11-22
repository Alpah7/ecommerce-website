<!DOCTYPE>
<?php 
session_start();
include("functions/functions.php");
include("includes/db.php"); 
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
		
	<link rel="stylesheet" href="styles/style.css" media="all" /> 
	</head>
	
<body>
	
	<!--Main Container starts here-->
	<div class="main_wrapper">
	
		<!--Header starts here-->
		<div class="header_wrapper">
		
			<a href="index.php"><img id="logo" src="images/logo.gif" /> </a>
			<img id="banner" src="images/ad_banner.gif" />
		</div>
		<!--Header ends here-->
		
		<!--Navigation Bar starts-->
		<div class="menubar">
			
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="customer/my_account.php">My Account</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>
			
			</ul>
			
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search a Product"/ > 
					<input type="submit" name="search" value="Search" />
				</form>
			
			</div>
			
		</div>
		<!--Navigation Bar ends-->
	
		<!--Content wrapper starts-->
		<div class="content_wrapper">
		
			<div id="sidebar">
			
				<div id="sidebar_title">Categories</div>
				
				<ul id="cats">
				
				<?php getCats(); ?>
				
				<ul>
					
				<div id="sidebar_title">Brands</div>
				
				<ul id="cats">
					
					<?php getBrands(); ?>
				
				<ul>
			
			
			</div>
		
			<div id="content_area">
			
			<?php cart(); ?>
			
			<div id="shopping_cart"> 
					
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color:yellow">Go to Cart</a>
					
					
					
					</span>
			</div>
			
				<form action="customer_register.php" method="post" enctype="multipart/form-data">
					
					<table align="center" width="750">
						
						<tr align="center">
							<td colspan="6"><h2>Create an Account</h2></td>
						</tr>
						
						<tr>
							<td align="right">Customer Name:</td>
							<td><input type="text" name="c_name" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Email:</td>
							<td><input type="text" name="c_email" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Password:</td>
							<td><input type="password" name="c_pass" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Image:</td>
							<td><input type="file" name="c_image" required/></td>
						</tr>
						
						
						
						<tr>
							<td align="right">Customer Country:</td>
							<td>
							<select name="c_country">
								<option>Select a Country</option>
								<option>Afghanistan</option>
								<option>India</option>
								<option>Japan</option>
								<option>Pakistan</option>
								<option>Israel</option>
								<option>Nepal</option>
								<option>United Arab Emirates</option>
								<option>United States</option>
								<option>United Kingdom</option>
							</select>
							
							</td>
						</tr>
						
						<tr>
							<td align="right">Customer City:</td>
							<td><input type="text" name="c_city" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Contact:</td>
							<td><input type="text" name="c_contact" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Address</td>
							<td><input type="text" name="c_address" required/></td>
						</tr>
						
						
					<tr align="center">
						<td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
					</tr>
					
					
					
					</table>
				
				</form>
			
			</div>
		</div>
		<!--Content wrapper ends-->
		
		
		
		<div id="footer">
		
		<h2 style="text-align:center; padding-top:30px;">&copy; 2018 by Priyanka</h2>
		
		</div>
	
	</div> 
<!--Main Container ends here-->


</body>
</html>
<?php 
	if(isset($_POST['register'])){
	
		
		$ip = getIp();
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
	
		
		move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
		
		 $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
	
		/*$run_c = mysqli_query($con, $insert_c); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else {
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}*/
		$run_c=mysqli_query($con,$insert_c);
		/*if ($run_c) {

			echo "<script>alert('Registeration Successfull!')</script>";
			
		}*/

		$sel_cart="select * from cart where ip_add='$ip'";
		$run_cart=mysqli_query($con,$sel_cart);
		$check_cart=mysqli_num_rows($run_cart);

		if ($check_cart==0) {

				$_SESSION['customer_email']=$c_email;

				echo "<script>alert('Account has been created successfully, Thanks!!')</script>";	
				echo "<script>window.open('customer/my_account.php','_self')</script>";
		}
		else {
		$_SESSION['customer_email']=$c_email;

				echo "<script>alert('Account has been created successfully, Thanks!!')</script>";	
				echo "<script>window.open('checkout.php','_self')</script>";	
		}
	}





?>










<?php
session_start();
if(isset($_SESSION["id"]))
{
	header("location:user/home.php");
	exit();
}

 if(isset($_SESSION["aid"]))
 {
	 header("location:admin/home.php");
	 exit();
 }
?>

<html lang="en-us">

<head>
	<title> welcome to pipago </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="keywords"
		content="social media,the best social media platform,chat with your friend ,easy social media,pipago">
	<meta name="description" content="light weight secured sudent's social media!!!">
	<meta name="author" content="black eagle team">
	<link rel="stylesheet" href="index.css">
	<script src="index.js"> </script>
</head>
<!-- body goes here -->

<body>
	<!--header-->
	<header>
		<h1 class="pipaheader"> PIPA GO</h1>
	</header>
	<!-- content-->
	<main>
		<div class="innerbox">
			<div class="buttonbox">
				<h1> pipago the first secure and simple friendly students social media platform! do easily think complex
				</h1>
				<nav>
					<button onclick="redirectp('login.html')">
						<p1 style="font-size:50px;">login </p1>
					</button>

					<button onclick="redirectp('signup.html')">
						<p1 style="font-size:50px;">sign up </p1>
					</button>

				</nav>
			</div>

		</div>
	</main>
	<!--footer content-->
	<footer>
		<div class="footer">
			<hr>
			<hr>
			<p1>&copy; 2023 fobybus:black eagles(updated)</p1>
		</div>

	</footer>
</body>

</html>
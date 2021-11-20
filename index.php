<?php 
session_start();

	include('connection.php');
	include('functions.php');

	$data = check_login($con);
?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Gan's Backend Challenge #2</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<span class="logo"><img src="images/logo.svg" alt="" /></span>
						<h1>Welcome, <?php echo $data['username'] ?></h1>
						<p>To Airbnb database search.<br />
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Introduction</a></li>
							<li><a href="#first">Features</a></li>
							<li><a href="#second">Search Now</a></li>
							<li><a href="#cta">Logging out</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>Prepr's Backend Developer Challenge #2: HTML, CSS and PHP</h2>
										</header>
										<p>In this project you will find a PHP project used for searching through a database.</p>
									</div>
									<span class="image"><img src="images/pic01.jpg" alt="" /></span>
								</div>
							</section>

						<!-- Features Section -->
							<section id="first" class="main special">
								<header class="major">
									<h2>Features</h2>
								</header>
								<ul class="features">
									<li>
										<span class="icon solid major style1 fa-code"></span>
										<h3>Login, Logout and Signups</h3>
										<p>The login system is connected to a MySQL database.</p>
									</li>
									<li>
										<span class="icon major style3 fa-copy"></span>
										<h3>Search function divided by cities.</h3>
										<p>You will be able to search through 5 of Airbnb data connected to MySQL.</p>
									</li>
									<li>
										<span class="icon major style5 fa-gem"></span>
										<h3>Live listing count and more.</h3>
										<p>The below listing of each city changes based on the amount of listings there are on the databases.</p>
									</li>
								</ul>
							</section>

						<!-- Search Section -->
							<section id="second" class="main special">
								<header class="major">
									<h2>Search now</h2>
									<p>Our database contains 5 popular cities to search from, each with thousands of listings.</p>
								</header>
								<ul class="statistics">
									<li class="style1">
										<span class="icon solid fas fa-city"></span>
										<strong><?php echo list_count($con, 'nyc')?></strong> New York City
									</li>
									<li class="style2">
										<span class="icon fa-building"></span>
										<strong><?php echo list_count($con, 'dublin') ?></strong> Dublin
									</li>
									<li class="style3">
										<span class="icon solid fa-torii-gate"></span>
										<strong><?php echo list_count($con, 'tokyo') ?></strong> Tokyo
									</li>
									<li class="style4">
										<span class="icon solid fa-landmark"></span>
										<strong><?php echo list_count($con, 'athens') ?></strong> Athens
									</li>
									<li class="style5">
										<span class="icon solid fa-archway"></span>
										<strong><?php echo list_count($con, 'paris') ?></strong> Paris
									</li>
								</ul>
								<footer class="major">
									<ul class="actions special">
										<li><a href="search.php" class="button">Search Now</a></li>
									</ul>
								</footer>
							</section>

						<!-- Logout -->
							<section id="cta" class="main special">
								<footer>
									<ul class="actions special">
										<li><a href="logout.php" class="button primary">Logout</a></li>
									</ul>
								</footer>
							</section>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">Gan's backend challenge #2. Template from: <a href="https://html5up.net">HTML5 UP</a>.</p>
					</footer>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
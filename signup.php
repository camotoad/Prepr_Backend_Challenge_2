<?php

session_start();
    include('connection.php');
    include('functions.php');
    check_login2();

    $error = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user = $_POST['username'];
        $pw = $_POST['password'];
        $email = $_POST['email'];

        $dup_check = "select * from users where username = '$user' limit 1";
        $result = mysqli_query($con, $dup_check);

        $dup_check2 = "select * from users where email = '$email' limit 1";
        $result2 = mysqli_query($con, $dup_check);

        if(!empty($user) && !empty($pw)){
            if($result && !mysqli_num_rows($result) > 0 && $result2 && !mysqli_num_rows($result2) > 0){
                $query = "insert into users (username, password, email) values ('$user', '$pw', '$email')";

                mysqli_query($con, $query);
                header("Location: login.php");
                die;
            }
            $error = 'Username or email is taken';
        } else {
            $error = 'Please enter valid information';
        }
    }
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
					<header id="header">
						<h1>Sign-up</h1>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
                        <section id="content" class="main">
                            <div style="justify-content: center;">
                                <p style='color:red'><?php echo $error ?> </p>
                                <form method="post">
                                <div class="col-6 col-12-xsmall">
                                    <input type="text" name="username" id="username" value="" placeholder="Username" required/>
                                </div>
                                <br>
                                <div class="col-6 col-12-xsmall">
                                    <input type="password" name="password" id="password" value="" placeholder="Password" required/>
                                </div>
                                <br>
                                <div class="col-6 col-12-xsmall">
                                    <input type="email" name="email" id="email" value="" placeholder="Email" required/>
                                </div>
                                <br>
                                <div class="col-12">
                                    <ul class="actions">
                                        <li><input type="submit" value="Sign up" class="primary" /></li>
                                    </ul>
                                </div>
                            </form>
                            </div>
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
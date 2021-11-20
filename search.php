<?php 
session_start();

	include('connection.php');
	include('functions.php');
    error_reporting(0);
    $result = '';

	$data = check_login($con);

    $search = $_POST['search'];
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $result = search($con, $_POST['cities'], $_POST['search']);
        //print_r($result);
        //$result = $con->query("select * from nyc limit 5") or die($con->error);
        //$row = mysqli_fetch_assoc($result);
        //print_r($row);
        //echo $row['name'];
        $avg = list_avg($con, $_POST['cities']);
        // $avg_row = mysqli_fetch_assoc($avg);
        // print_r($avg_row);
        // echo $row['neighbourhood'];
        
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
						<h1>Search the database</h1>
					</header>

                <!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#main" class="active">Search bar</a></li>
							<li><a href="#second">Neighbourhood Average Prices</a></li>
							<li><a href="#third">Results</a></li>
							<li><a href="#fourth">Log out</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<!-- Content -->
                        <section id="content" class="main">
                                <form method="post">
                                <div class="row gtr-uniform">
                                <ul class="actions fit">
                                    <div style="width: 100%">
                                    <li><input type="text" name="search" id="search" value="" placeholder="Search"/></li>
                                    </div>
                                    <div style="width: 30%">
                                    <li><select name="cities" id="demo-category">
                                        <option value="Athens">Athens</option>
                                        <option value="Dublin">Dublin</option>
                                        <option value="NYC">NYC</option>
                                        <option value="Paris">Paris</option>
                                        <option value="Tokyo">Tokyo</option>
                                    </select> </li>
                                    </div>
                                    <div>
                                        <li><input type="submit" value="Search" class="button"></input></li>
                                        </div>
                                    </ul>
                                <br>
                            </form>
                            </div>
                        </section>
                        <?php if($avg){
                            echo '<section id="content, second" class="main">';
                            echo '<div class="table-wrapper" id="second">';
                            echo '<table>';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>Neighbourhood</th>';
                            echo '<th>Average Price</th>';
                            echo '</tr>';
                            echo '</thead>';
                            
                            while($avg_row = mysqli_fetch_assoc($avg)){
                                echo '<tr>';
                                echo "<td>"; echo $avg_row['neighbourhood']; echo "</td>";
                                echo "<td>$"; echo $avg_row['price']; echo "</td>";
                                echo '</tr>';
                            }
                            
                            echo '</table>';
                            echo '</div>';
                            echo '</section>';

                        }?>
                        <section id="content" class="main">
                            <?php 
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                if(!$result){
                                echo "No results found for search term '<b>$search</b>'.";
                                }
                            }?>
                            <div class="table-wrapper" id="third">
                                <table class="alt">
                                    <?php if($result){ ?>
                                    <thead>
                                        <tr>
                                            <th>Room Name</th>
                                            <th>Description</th>
                                            <th>Neighbourhood</th>
                                            <th>Room Type</th>
                                            <th>Price</th>
                                            <th>Beds</th>
                                            <th>Accommodates</th>                                    
                                            <th>Review Score</th>
                                            <th>Listing URL</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    while ($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['description']?></td>
                                            <td><?php echo $row['neighbourhood'] ?></td>
                                            <td><?php echo $row['room_type']?></td>
                                            <td><?php echo $row['price'] ?></td>
                                            <td><?php echo $row['beds']  ?></td>
                                            <td><?php echo $row['accommodates']  ?></td>
                                            <td><?php echo $row['review_scores_rating'] ?></td>
                                            <td><a href="<?php echo $row['listing_url']?>"> Link </a></td>
                                        </tr>
                                        
                                        <?php } }?>
                                    </table>
                                    
                            </div>
                        </section>
					        

                
                <!-- Logout -->
							<section id="fourth" class="main special">
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
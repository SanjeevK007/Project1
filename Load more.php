<html lang="en">
	<head>
		<title>YouTrend | Trending Videos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
		<script src="layout/scripts/jquery.backtotop.js"></script>
		<script src="layout/scripts/jquery.mobilemenu.js"></script>
	</head>
	<body id="top">
		<div class="wrapper row1">
			<header id="header" class="hoc clear">
				<div id="logo" class="fl_left"> 
				  <h1 class="logoname"><a href="index.php">You<span>T</span>rend</a></h1>
				</div>
				<nav id="mainav" class="fl_right"> 
					<ul class="clear">
						<li><a href="index.php">Home</a></li>
						<li><a href="#Contact">Contact</a></li>
					</ul>
				<form action="#">
					<select>
						<option selected="selected" value="">MENU</option>
						<option value="index.php">Home</option>
						<option value="#Contact">Contact</option>
					</select>
				</form>
				</nav>
			</header>
		</div>
		<div class="bgded overlay" style="background-image:url('layout/pics/01.jpg');">
			<div id="breadcrumb" class="hoc clear"> 
				<ul>
					<li>Relax & Enjoy !!</li>
				</ul>
			</div>
		</div>
		
		<div class="wrapper row3">
			<main class="hoc container clear"> 
				<div class="content"> 
					<div id="gallery">
							<center><header class="heading">YouTrend Gallery</header></center>
							<?php	
								include "DbConnect.php";
								$db = new DbConnect();
								$conn = $db->connect();
								$stmt = $conn->prepare("SELECT * FROM videos LIMIT 25");
								$stmt->execute();
								$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
								foreach($videos as $video){
									echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$video['video_id'].'" frameborder="1"
											allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
								}
							?>
					</div>
					<nav class="pagination">
						<button type="button"><a href ="Load more videos">Load more videos</a></button>
					</nav>
				</div>
				<div class="clear"></div>
		    </main>
		</div>
		<div id ="Contact" class="wrapper row5">
			<div id="copyright" class="hoc clear">
				<p><center>Fell free to contact me @Sanjeevkumardev007@gmail.com</center></p>
				<p class="fl_left">Copyright © 2021 - All Rights Reserved</p>
				<p class="fl_right">Designed by Sanjeev Kumar</p>
			</div>
		</div>
		<div style ="position : fixed; bottom:10px;right: 10px; color: green;">
			<strong>
				By Sanjeev Kumar
			</strong>
		</div>
		<a id="backtotop" href="#top" class="visible"><i class="fas fa-chevron-up"></i></a>
	</body>
</html>

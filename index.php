<html>
<head>
	<title>Retrive Youtube Videos</title>	
	<link rel ="stylesheet" href="style.css" type = "text/css">
</head>
<body>		
	<div class="container">
		<header id="header">
		<h1 id="title" class="text-center">Fetching Youtube Videos from the Database</h1>
			<nav id="nav-bar">
			  <ul>
				<li><a class="nav-link" href="Load more.php">More Videos</a></li>
				<li><a class="nav-link" href="#Contact">Contact</a></li>
			  </ul>
			</nav>
		</header>	
<!-- 		<?php	
			require("DbConnect.php");
			$db = new DbConnect();
			$conn = $db->connect();

			$stmt = $conn->prepare("SELECT * FROM videos LIMIT 10");
			$stmt->execute();
			$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
			echo "<div class ='row'>";
			foreach($videos as $video){
				echo "<div class='col-md-6'>";
				echo "<center><lable>".$video['title']."</lable></center>";
				echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$video['video_id'].'" frameborder="1"
						allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
				echo "</div>";
			}
			echo "</div>";
		?> -->
		<section id="Contact">
			<div class="grid">
				<h4>Contact : </h4>
				<p>
					<center>Fell free to contact me @Sanjeevkumardev007@gmail.com</center>
				</p>
			</div>
		</section>
	</div>
</body>
<footer>
	<span>Designed by Sanjeev Kumar</span>
</footer>
</html>


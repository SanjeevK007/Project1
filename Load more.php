<html>
    <head>
        <title>Load more data</title>
        <link type="text/css" rel="stylesheet" href="style.css" >
    </head>
    <body>
        <div class="container">
			<header id="header">
			<h1 id="title" class="text-center">Hurray !!Some More Videos. Enjoy!!</h1>
				<nav id="nav-bar">
				  <ul>
					<li><a class="nav-link" href="FetchVideo.php">Home</a></li>
				  </ul>
				</nav>
			</header>	
			<section id="load-more">
				<center>
				<?php
					include "DbConnect.php";
					$db = new DbConnect();
					$conn = $db->connect();

					$stmt = $conn->prepare("SELECT * FROM videos LIMIT 20");
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
				?>
				</center>
			</section>
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
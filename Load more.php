<html>
    <head>
        <title>Load more data</title>
        <link type="text/css" rel="stylesheet" href="style.css" >
    </head>
    <body>
        <div class="container">
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
					echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$video['video_id'].'" frameborder="1"
							allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
					echo "</div>";
				}
				echo "</div>";
			?>
        </div>
    </body>
</html>

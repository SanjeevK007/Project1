<html>
<head>
	<h1>Retrive Youtube Videos</h1>
	<link rel ="stylesheet" href ="C:\xampp\htdocs\Project1\style.css">
</head>
<body>
	<div class="container">
		<header class="header">
			<h1 id="title" class="text-center">Saving Youtube Videos into the Database</h1>
		</header>
	<?php
		$key = "AIzaSyCZLkAh-QpVmnsw-Iqb4V7RzVOodcTrQ08";
		$base_url = "https://www.googleapis.com/youtube/v3/";
		$maxResult = 10;
		$apiError = 'Video not found';
		try{
			$API_URL = $base_url."search?order=date&part=snippet&maxResults=".$maxResult."&key=".$key;
			$apiData = @file_get_contents($base_url."search?order=date&part=snippet&maxResults=".$maxResult."&key=".$key);
			if($apiData){
				$videos = json_decode( $apiData );
			}
			else{
				throw new Exception('Invalid API key');
			}		
		}
		catch(Exception $e){
			$apiError = $e->getMassage();
		}
		include "DbConnect.php";
		$db = new DbConnect();
		$conn = $db->connect();

		foreach($videos->items as $video){
			$sql = "INSERT INTO `videos` (`id`, `title`, `video_id`, `description`, `video_url`, `video_murl`, `video_hurl`, `channel_id`, `channel_title`) 
					VALUES (NULL, :title, :vid, :vdesc, :vurl, :vmurl, :vhurl, :cid, :ctitle)";

			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":title",$video->snippet->title);
			$stmt->bindParam(":vid",$video->id->videoId);
			$stmt->bindParam(":vdesc",$video->snippet->description);
			$stmt->bindParam(":vurl",$video->snippet->thumbnails->default->url);
			$stmt->bindParam(":vmurl",$video->snippet->thumbnails->medium->url);
			$stmt->bindParam(":vhurl",$video->snippet->thumbnails->high->url);
			$stmt->bindParam(":cid",$video->snippet->channelId);
			$stmt->bindParam(":ctitle",$video->snippet->channelTitle);
			$stmt->execute();
		}		
		
	?>
	</div>
</body>
</html>


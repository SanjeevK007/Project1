<html lang="en">
	<head>
		<title>YouTrend | Save into Database</title>
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
					<li><a href="#">Home</a></li>
				</ul>
			</div>
		</div>
		
		<div class="wrapper row3">
			<main class="hoc container clear"> 
				<div class="content"> 
					<center><header class="heading">YouTrend Saving into database</header></center>
					<p><center><strong>Trending YouTube Videos saved into Database</strong></center></p>
					<?php
						$key = "AIzaSyCZLkAh-QpVmnsw-Iqb4V7RzVOodcTrQ08";
						$base_url = "https://www.googleapis.com/youtube/v3/";
						$maxResult = 10;
						$nextPageToken = "CAoQAA";
						$apiError = 'Video not found';
						try{
							$API_URL = $base_url."search?order=date&part=snippet&maxResults=".$maxResult."&key=".$key."&pageToken=".$nextPageToken;
							$apiData = @file_get_contents($base_url."search?order=date&part=snippet&maxResults=".$maxResult."&key=".$key."&pageToken=".$nextPageToken);
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
				<div class="clear"></div>
		    </main>
		</div>
		<div style ="position : fixed; bottom:10px;right: 10px; color: green;">
			<strong>
				By Sanjeev Kumar
			</strong>
		</div>
	
		<div id ="Contact" class="wrapper row5">
			<div id="copyright" class="hoc clear">
				<p><center>Fell free to contact me @Sanjeevkumardev007@gmail.com</center></p>
				<p class="fl_left">Copyright © 2021 - All Rights Reserved</p>
				<p class="fl_right">Designed by Sanjeev Kumar</p>
			</div>
		</div>
		<a id="backtotop" href="#top" class="visible"><i class="fas fa-chevron-up"></i></a>
	</body>
</html>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_POST['uname']; ?></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<p style="text-align:center; margin-bottom:0;" class="lead">Click on a picture to download it.</p>
<p style="text-align:center; margin-bottom:0;" class="lead">Username: <?php echo $_POST['uname'] ?> </p>
<p style="text-align:center; margin-bottom:0;" class="lead">		
		<?php 
			if(isset($_POST['limit']))
				echo "Showing only first ". $_POST['limit'] ." pictures.";
		?>
</p>

<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	if(isset($_POST['btn_one'])) {
		$content = file_get_contents($_POST['imgurl']);
		// echo strval($content);
		
		preg_match('/"og:video" content="(.*?)"/', $content, $match_final_img);
		if(!isset($match_final_img[1])) {
			preg_match('/"og:image" content="(.*?)"/', $content, $match_final_img);
		}
		$url = $match_final_img[1];

		$info = getimagesize($url);
	    header('Content-Description: File Transfer');
	    header('Content-Type: '.$info['mime']);
	    header('Content-Disposition: attachment; filename="'.basename($url).'"');
	    ob_clean();	//to prevent corruption of image
	    readfile($url);
	    exit;
	}
	else if(isset($_POST['btn_all'])) {

		$username = $_POST['uname'];
		$limit = 50;
		
		if(isset($_POST['limit'])) {
			$limit = $_POST['limit'];
		}		


		$url = "http://www.instagram.com/".$username;
		$content = file_get_contents(($url));

		//get thumbnails
		preg_match_all('/"thumbnail_src":"(.*?)"/i', $content, $matches_thumbs);

		//get image ids
		preg_match_all('/"code":"(.*?)"/i', $content, $matches_codes);

		echo '<div class="container">';
		foreach ($matches_codes[1] as $key => $value) {
			$content = file_get_contents("http://www.instagram.com/p/".$value);

			//check for videos
			preg_match('/"og:video" content="(.*?)"/', $content, $match_final_img);
			if(!isset($match_final_img[1])) {
				//if not a video, check for images
				preg_match('/"og:image" content="(.*?)"/', $content, $match_final_img);	
			}	

			echo "<form style='display:inline-block;' action='multigrabber.php' method='POST'>";
			echo '<a style="margin-bottom:5px; display:none" target="_blank" href='.$match_final_img[1].'><input type="hidden" name="url" value="'.$match_final_img[1].'"/><img src='.$matches_thumbs[1][$key].' width="100px" height="100px"/></a>';
			echo '<br><input type="submit" value="" class="btn" style="background: url('.$matches_thumbs[1][$key].'); background-size:100% 100%; display:inline-block; width:200px; height:200px; margin-right:5px; border:0px">';
			echo "</form>";

			if($key == $limit - 1)
				break;
			
		}
		echo "</div>";
	}

 ?>

 </body>
</html>
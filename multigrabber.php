<?php 
	
	$url = $_POST['url'];

	$info = getimagesize($url);

    header('Content-Description: File Transfer');
    header('Content-Type: '.$info['mime']);
    header('Content-Disposition: attachment; filename="'.basename($url).'"');
    ob_clean();
    readfile($url);
    exit;

 ?>
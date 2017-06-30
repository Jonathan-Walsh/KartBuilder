<?php
	$img = $_POST['img'];
	list($width, $height) = getimagesize($img);
	echo $height . "," . $width;
?>
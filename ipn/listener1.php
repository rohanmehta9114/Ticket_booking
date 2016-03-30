<?php

	//$ipn_post_data = $_POST;
	
	//file_put_contents(serialize($_POST), 'post.log');
	//$data="nisarg";
	file_put_contents('ipn.txt', json_encode($_POST).PHP_EOL, FILE_APPEND);
	
	/*
	echo "<pre>";
	print_r ($ipn_post_data);
	echo "</pre>";
	*/
?>
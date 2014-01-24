<?php
	require_once (__DIR__ . "/lib/AmazonECS.class.php";
	$client = new AmazonECS('YAKIAJKTEYNKJYROFSX3Q', 'IlFACjHl3HwTjRnStKy3UQdBGoITnJY/AGATyfBX', 'US', 'munerum-20');


	$response  = $client->category('Books')->search('PHP 5');
	var_dump($response);
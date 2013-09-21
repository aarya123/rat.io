<?php
include "AmazonECS.class.php";
$AmzazonECS = new AmazonECS(
	/*$accessKey*/ 		'AKIAJGDUYZ22LGVKPFAA', 
	/*$secretKey*/ 		'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', 
	/*$country*/ 		'com', 
	/*$associateTag*/ 	'ratio0b-20'
);
$result=$AmzazonECS.sec;
echo $result;
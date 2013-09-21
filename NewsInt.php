<?php
function getNewsScore($query) {
	try {
		include 'AlchInt.php';
	    $outputAlch = $AlchemyObj->URLGetTextSentiment("https://news.google.com/news/feeds?q=".$query, AlchemyAPI::JSON_OUTPUT_MODE);
	    $output = json_decode($outputAlch, true);
	    $score = $output['docSentiment']['score'];
	    return $score * 5;
	} catch(Exception $e) {
    	return 2;
    }
}
?>
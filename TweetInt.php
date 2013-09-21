<?php
function getTwitterScore($query) {
	try {
		include 'AlchInt.php';
	    $outputAlch = $AlchemyObj->URLGetTextSentiment("https://twitter.com/search?q=%23".$query."&src=typd", AlchemyAPI::JSON_OUTPUT_MODE);
	    $output = json_decode($outputAlch, true);
	    $score = $output['docSentiment']['score'];
	    return $score * 5;
	} catch(Exception $e) {
    	return 2;
    }
}
?>
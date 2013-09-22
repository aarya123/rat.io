<?php
function getNewsScore($query) {
	include 'AlchInt.php';
	$query = urlencode($query);
	$searchResults = json_decode(file_get_contents("https://ajax.googleapis.com/ajax/services/search/news?v=1.0&q=$query"), true);
	if($searchResults != null && array_key_exists("responseData", $searchResults)) {
	    $searchResults = $searchResults["responseData"];
	    if($searchResults != null && array_key_exists("results", $searchResults)) {
	        $searchResults = $searchResults["results"];
	    }
	    else {
	        return 2;
	    }
	}
	else {
	    return 2;
	}
	$sentiments = array();
	foreach($searchResults as $result) {
	    try {
	        array_push($sentiments, json_decode($AlchemyObj->URLGetTextSentiment($result["unescapedUrl"], AlchemyAPI::JSON_OUTPUT_MODE), true)['docSentiment']['score']);
	    }
	    catch(Exception $e) {
	    }
	}
	$size = sizeof($sentiments);
	if($size > 0) {
    	sort($sentiments);
    	if($size % 2 == 0) {
    	    return $sentiments[$size / 2];
    	}
    	else {
    	    return ($sentiments[$size / 2] + $sentiments[($size / 2) + 1]) / 2;
    	}
	}
	else {
	    return 2;
	}
}
?>
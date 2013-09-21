<?php
    function getGoogleSearchScore($query) {
        include "AlchInt.php";
        $query = urlencode($query);
        $searchResults = json_decode(file_get_contents("http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=$query"), true)["responseData"]["results"];
        $sentimentAvg = 0;
        $size = sizeof($searchResults);
        if($size > 0) {
            foreach($searchResults as $result) {
                try {
                    $sentimentAvg += floatval(json_decode($AlchemyObj->URLGetTextSentiment($result["url"], AlchemyAPI::JSON_OUTPUT_MODE), true)["docSentiment"]["score"]);
                }
                catch(Exception $e) {
                    $size--;
                }
            }
            $sentimentAvg /= $size;
        }
        return $sentimentAvg;
    }
?>
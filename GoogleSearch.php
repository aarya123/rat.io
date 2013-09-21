<?php
    function getGoogleSearchScore($query) {
        include "AlchInt.php";
        $query = urlencode($query);
        $searchResults = json_decode(file_get_contents("http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=$query"), true);
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
        if(sizeof($searchResults) > 0) {
            foreach($searchResults as $result) {
                try {
                    array_push($sentiments, floatval(json_decode($AlchemyObj->URLGetTextSentiment($result["url"], AlchemyAPI::JSON_OUTPUT_MODE), true)["docSentiment"]["score"]));
                }
                catch(Exception $e) {
                }
            }
            sort($sentiments);
            $size = sizeof($sentiments);
            if($size % 2 == 0) {
                return $sentiments[$size / 2];
            }
            else {
                return ($sentiments[$size / 2] + $sentiments[($size / 2) + 1]) / 2;
            }
        }
        else {
            return 0;
        }
    }
?>
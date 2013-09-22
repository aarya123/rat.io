<?php

require 'lib/AmazonECS.class.php';

const ACCESS_KEY = 'AKIAJGDUYZ22LGVKPFAA';
const SECRET_KEY = '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';
const ASSOCIATE_TAG = 'ratio0b-20';

function getAmazonScore($query) {
    // FETCH RESULTS FROM AWS
    include "AlchInt.php";
    include_once 'lib.php';
    $amazonEcs = new AmazonECS(ACCESS_KEY, SECRET_KEY, 'com', ASSOCIATE_TAG);
    $amazonEcs->associateTag(ASSOCIATE_TAG);
    $amazonEcs->returnType(AmazonECS::RETURN_TYPE_ARRAY);
    
    $results = $amazonEcs->category('All')->responseGroup('Small')->search($query);
    if($results["Items"]) {
        $results = $results["Items"];
    }
    else {
        return 2;
    }
    $sentiments = array();
    // Search Alchemy for Sentiment
    foreach($results["Item"] as $item) {
        try {
            $outputAlch = $AlchemyObj->URLGetTextSentiment("http://www.amazon.com/review/product/".$item['ASIN'], AlchemyAPI::JSON_OUTPUT_MODE);
            $output = json_decode($outputAlch, true);
            if(array_key_exists("score", $output["docSentiment"])) {
                array_push($sentiments, $output["docSentiment"]["score"]);
            }
        }
        catch(Exception $e) {
        }
        
    }
    return scoreCalc($sentiments);
}

?>
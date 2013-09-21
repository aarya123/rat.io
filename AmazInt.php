<?php

require 'lib/AmazonECS.class.php';
include 'AlchInt.php';

const ACCESS_KEY = 'AKIAJGDUYZ22LGVKPFAA';
const SECRET_KEY = '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';
const ASSOCIATE_TAG = 'ratio0b-20';

try {
    // FETCH RESULTS FROM AWS
    
    $amazonEcs = new AmazonECS(ACCESS_KEY, SECRET_KEY, 'com', ASSOCIATE_TAG);
    $amazonEcs->associateTag(ASSOCIATE_TAG);
    
    $result = $amazonEcs->category('All')->responseGroup('Small')->search($_GET["keywords"]);
    $json = json_encode($result);
    $array = json_decode($json, true)['Items'];
    
    //print_r($array['Item']);
    $output = "--PRINTOUT--<br>";
    //print_r($array_keys($array['Item']));
    
    if (count($array['Item']) > 1) {
        for ($x=0; $x<count($array['Item'])-1; $x++) {
            $asin = $array['Item'][$x]['ASIN'];
            //print_r($asin."<br>");
            $output = $output."http://www.amazon.com/review/product/".$asin."<br
    } else {
        $output = "No results found.";
    }
    
    //print_r($output);
    
    // Search Alchemy for Sentiment
    if (count($array['Item']) > 1) {
        $score = 0;
        for ($x=0; $x<count($array['Item'])-1; $x++) {
            $outputAlch = $AlchemyObj->URLGetTextSentiment("http://www.amazon.com/review/product/".$array['Item'][$x]['ASIN'], AlchemyAPI::JSON_OUTPUT_MODE);
            $output = json_decode($outputAlch, true);
            $score = $score.$output['docSentiment']['score'];
            //print_r($output);
        }
        $totalScore = $score / count($array['Item']);
        //print_r("Total Score: ".$totalScore);
        echo $totalScore;
    }
    
}
catch(Exception $e) {
  echo $e->getMessage();
}
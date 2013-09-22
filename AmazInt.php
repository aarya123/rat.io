<?php

require 'lib/AmazonECS.class.php';

const ACCESS_KEY = 'AKIAJGDUYZ22LGVKPFAA';
const SECRET_KEY = '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';
const ASSOCIATE_TAG = 'ratio0b-20';

function getAmazonScore($query) {
    try {
        // FETCH RESULTS FROM AWS
        include "AlchInt.php";
        $amazonEcs = new AmazonECS(ACCESS_KEY, SECRET_KEY, 'com', ASSOCIATE_TAG);
        $amazonEcs->associateTag(ASSOCIATE_TAG);
        
        $result = $amazonEcs->category('All')->responseGroup('Small')->search($query);
        $json = json_encode($result);
        $array = json_decode($json, true)['Items'];
        
        // Search Alchemy for Sentiment
        if (count($array['Item']) > 0) {
            $score = 0;
            for ($x=0; $x<count($array['Item'])-1; $x++) {
                $outputAlch = $AlchemyObj->URLGetTextSentiment("http://www.amazon.com/review/product/".$array['Item'][$x]['ASIN'], AlchemyAPI::JSON_OUTPUT_MODE);
                $output = json_decode($outputAlch, true);
                $scores[x] = $output['docSentiment']['score'];
                $score += $scores[x];
            }
            $average = $score / count($array['Item']);
            sort($scores);
            $median = $scores[$count / 2];
            $lower = $scores[$count / 4];
            $upper = $scores[3*$count / 4];
            
            $iqr = $upper - $lower;
            $lowerF = $lower - 1.5*$iqr;
            $upperF = $upper + 1.5*$iqr;
            
            $newTotal = 0;
            $count = 0;
            foreach($scores as $i => $val) {
                if($val >= $lowerF && $val <= $upperF) {
                    $newTotal+=$val;
                    $count++;
                }
            }
            
            $newAverage = $newTotal / $count;
            
            return $newAverage;
        } else {
            return 2;
        }
    }
    catch(Exception $e) {
      return 2;
    }
}

getAmazonScore("Bill");

?>
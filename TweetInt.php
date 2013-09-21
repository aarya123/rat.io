<?php
include 'AlchInt.php';
try {
    $keywords = $_GET["q"];
    $outputAlch = $AlchemyObj->URLGetTextSentiment("https://twitter.com/search?q=%23".$keywords."&src=typd", AlchemyAPI::JSON_OUTPUT_MODE);
    $output = json_decode($outputAlch, true);
    $score = $output['docSentiment']['score'];
    echo $score * 5;
} catch(Exception $e) {
  echo $e->getMessage();
}
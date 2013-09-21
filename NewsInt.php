<?php
include 'AlchInt.php';
try {
    $keywords = $_GET["q"];
    $outputAlch = $AlchemyObj->URLGetTextSentiment("https://news.google.com/news/feeds?q=".$keywords."&output=rss, AlchemyAPI::JSON_OUTPUT_MODE);
    $output = json_decode($outputAlch, true);
    $score = $output['docSentiment']['score'];
    echo $score;
} catch(Exception $e) {
  echo $e->getMessage();
}
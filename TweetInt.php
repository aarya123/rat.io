<?php

include 'AlchInt.php';

try {
    $keywords = $_GET["keywords"];
    $score = $AlchemyObj->URLGetTextSentiment("https://twitter.com/search?q=%23".$keywords, AlchemyAPI::JSON_OUTPUT_MODE);
    echo $score
} catch(Exception $e) {
  echo $e->getMessage();
}
    
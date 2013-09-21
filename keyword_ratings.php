<?php
    include "AlchInt.php";
    /*
    $query = urlencode($_GET["q"]);
    $searchResults = json_decode(file_get_contents("https://www.googleapis.com/customsearch/v1?key=AIzaSyAqy2OnDc_LQU-JZfoBytrOmm10RnOpAlM&cx=009662266714833546482:ysarq25lr-4&q=$query"), true);
    //$alchRes = array();
    $sentimentSum = 0;
    for($i = 0; $i < min(10, sizeof($searchResults["items"])); $i++) {
        $val = floatval(json_decode($AlchemyObj->URLGetTextSentiment($searchResults["items"][$i]["link"], AlchemyAPI::JSON_OUTPUT_MODE), true)["docSentiment"]["score"]);
        $sentimentSum += $val;
    }
    echo(json_encode(array("score" => $sentimentSum / min(10, sizeof($searchResults["items"])))));
    */
    $isNeg = mt_rand(0, 1) == 0;
    $val = mt_rand() / mt_getrandmax();
    echo json_encode(array("score" => $isNeg ? -$val : $val));
    /*
    $maxKeywords = array(array("relevance" => 0));
    const maxSize = 5;
    foreach($alchRes as $curRes) {
        $curKeyword = $curRes["keywords"][0];
        if(sizeof($maxKeywords) < maxSize) {
            array_push($maxKeywords, $curKeyword);
        }
        else {
            for($i = 0; $i < maxSize; $i++) {
                if()
            }
        }
        
    }
    var_dump($maxKeyword);
    */
?>
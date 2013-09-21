<?php
function getGoogleReviewScore($query) {
    include "AlchInt.php";
    $result=json_decode(file_get_contents("https://maps.googleapis.com/maps/api/place/textsearch/json?query=".urlencode($query)."&sensor=false&key=AIzaSyAw3G2Nm0A7gDa8dzKm3UnBI6CPxIHkayo"),true)["results"];
    $IDs=array();
    for($x=0;$x<sizeof($result);$x++)
        $IDs[$x]=$result[$x]["reference"];
    $score=0;
    $count=0;
    for($x=0;$x<sizeof($IDs);$x++)
    {
        $reviews=json_decode(file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?reference=".$IDs[$x]."&sensor=true&key=AIzaSyAw3G2Nm0A7gDa8dzKm3UnBI6CPxIHkayo"),true)["result"]["reviews"];
        for($y=0;$y<sizeof($reviews);$y++)
        {
            try{
                $outputAlch = $AlchemyObj->TextGetTextSentiment($reviews[$y]["text"], AlchemyAPI::JSON_OUTPUT_MODE);
                $output = json_decode($outputAlch, true);
                $score += $output['docSentiment']['score'];
                $count++;
            }
            catch(Exception $e){}
        }
    }
    if($count!=0)
        return ($score/$count)*5;
    else
        return 0;
}
?>
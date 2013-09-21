<?php
function getGoogleReviewScore($query) {
    include "AlchInt.php";
    $result=json_decode(file_get_contents("https://maps.googleapis.com/maps/api/place/textsearch/json?query=".urlencode($query)."&sensor=false&key=AIzaSyDs4lsfh1xT0F6xL_liNt6pPtvsp4rSd8g"),true)["results"];
    $IDs=array();
    if(sizeof($result)<5)
        for($x=0;$x<sizeof($result);$x++)
            $IDs[$x]=$result[$x]["reference"];
    else
        for($x=0;$x<5;$x++)
            $IDs[$x]=$result[$x]["reference"];
    $score=0;
    $count=0;
    for($x=0;$x<sizeof($IDs);$x++)
    {
        $reviews=json_decode(file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?reference=".$IDs[$x]."&sensor=true&key=AIzaSyDs4lsfh1xT0F6xL_liNt6pPtvsp4rSd8g"),true)["result"];
        if(isset($reviews["reviews"]))
            $reviews=$reviews["reviews"];
        else
            continue;
        for($y=0;$y<sizeof($reviews);$y++)
        {
            try
            {
                $outputAlch = $AlchemyObj->TextGetTextSentiment($reviews[$y]["text"], AlchemyAPI::JSON_OUTPUT_MODE);
                $output = json_decode($outputAlch, true);
                if(isset($output['docSentiment']['score']))
                {
                    $score += $output['docSentiment']['score'];
                    $count++;
                }
            }
            catch(Exception $e){
                //Weird errors...
            }
        }
    }
    if($count!=0)
        return ($score/$count)*5;
    else
        return 2;
}
?>
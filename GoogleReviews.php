<?php
function getGoogleReviewScore($query) {
    include "AlchInt.php";
    include_once 'lib.php';
    $result=json_decode(
        file_get_contents(
            "https://maps.googleapis.com/maps/api/place/textsearch/json?query="
            .urlencode($query)
            ."&sensor=false&key=AIzaSyAqy2OnDc_LQU-JZfoBytrOmm10RnOpAlM"
        ),
        true
    );
    if($result != null && array_key_exists("results", $result)) {
        $result = $result["results"];
    }
    else {
        return 2;
    }
    $sentiments = array();
    foreach($result as $loc) {
        if(array_key_exists("rating", $loc)) {
            array_push($sentiments, $loc["rating"] / 5);
        }
        else {
            array_push($sentiments, 0);
        }
    }
    return count($sentiments) > 0 ? scoreCalc($sentiments) : 2;
    /*
    $IDs=array();
    if(sizeof($result)<5)
        for($x=0;$x<sizeof($result);$x++)
            $IDs[$x]=$result[$x]["reference"];
    else
        for($x=0;$x<5;$x++)
            $IDs[$x]=$result[$x]["reference"];
    $sentiments = array();
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
                    array_push($sentiments, $output['docSentiment']['score']);
                }
            }
            catch(Exception $e){
                //Weird errors...
            }
        }
    }
    return count($sentiments) > 0 ? scoreCalc($sentiments) : 2;
    */
}
?>
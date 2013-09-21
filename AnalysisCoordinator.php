<?php
include "GoogleReviews.php";
include "AmazInt.php";
include "GoogleSearch.php";
include "TweetInt.php";
include "NewsInt.php";
$queryArr = array_unique(explode(" ", $_GET["q"]));
$options = array("-shopping" => "getAmazonScore",
    "-places" => "getGoogleReviewScore",
    "-search" => "getGoogleSearchScore",
    "-social" => "getTwitterScore",
    "-news" => "getNewsScore");
$myFuncs = array();
$myKeywords = array();
foreach($queryArr as $token) {
    if(array_key_exists($token, $options)) {
        array_push($myFuncs, $options[$token]);
    }
    else {
        array_push($myKeywords, $token);
    }
}
if(sizeof($myFuncs) == 0) {
    array_push($myFuncs, "getGoogleSearchScore");
}
$result = 0;
foreach($myFuncs as $func) {
    foreach($myKeywords as $keyword) {
        $result += call_user_func($func, $keyword);
    }
}
//echo $AlchemyObj->TextGetTextSentiment(file_get_contents("http://autoapi.hearst.com/v1/UsedCarWS/UsedCarWS/UsedVehicle/2010/Ford?model=F150&series=XLT&style=Supercab%204WD&api_key=r9rkc5jq8gk64w7zahhs6ed6"));
echo $result / (sizeof($myFuncs) * sizeof($myKeywords));
?>
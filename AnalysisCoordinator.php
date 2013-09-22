<?php
include "GoogleReviews.php";
include "AmazInt.php";
include "GoogleSearch.php";
include "TweetInt.php";
include "NewsInt.php";
$queryArr = explode(" ", $_GET["q"]);
$options = array("-shopping" => "getAmazonScore",
    "-places" => "getGoogleReviewScore",
    "-search" => "getGoogleSearchScore",
    "-social" => "getTwitterScore",
    "-news" => "getNewsScore");
$myOptions = array();
$myKeywords = array();
foreach($queryArr as $token) {
    if(array_key_exists($token, $options)) {
        array_push($myOptions, $token);
    }
    else {
        array_push($myKeywords, $token);
    }
}
$myKeywords = implode(" ", $myKeywords);
if(sizeof($myOptions) == 0) {
    array_push($myOptions, "-search");
}
else {
    $myOptions = array_unique($myOptions);
}
$result = array();
foreach($myOptions as $option) {
    $result[$option] = call_user_func($options[$option], $myKeywords);
}
echo json_encode($result);
?>
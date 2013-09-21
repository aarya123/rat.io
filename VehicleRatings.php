<?php
include "AlchInt.php";
$values=explode(" ",$_GET['q']);
$results= json_decode(file_get_contents("http://www.nhtsa.gov/webapi/api/SafetyRatings/modelyear/".$values[2]."/make/".$values[0]."/model/".$values[1]."?format=json"))->{"Results"};
$IDs=array();
for ($x=0; $x<sizeof($results); $x++)
{
    $IDs[$x]=$results[$x]->{"VehicleId"};
}
for ($x=0; $x<sizeof($IDs); $x++)
{
    echo file_get_contents("https://api.edmunds.com/api/vehiclereviews/v2/styles/".$IDs[$x]."?fmt=json&api_key=tvaudq3x22dwdwk8ep7a7r35");
    echo $AlchemyObj->TextGetTextSentiment(file_get_contents("https://api.edmunds.com/api/vehiclereviews/v2/styles/".$IDs[$x]."?fmt=json&api_key=tvaudq3x22dwdwk8ep7a7r35"),AlchemyAPI::JSON_OUTPUT_MODE);
}
?>
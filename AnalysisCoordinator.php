<?php
include "AlchInt.php";
echo $AlchemyObj->TextGetTextSentiment(file_get_contents("http://autoapi.hearst.com/v1/UsedCarWS/UsedCarWS/UsedVehicle/2010/Ford?model=F150&series=XLT&style=Supercab%204WD&api_key=r9rkc5jq8gk64w7zahhs6ed6"));
?>
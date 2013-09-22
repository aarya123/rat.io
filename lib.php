<?php
function scoreCalc($scores) {
    $count = count($scores);
    sort($scores);
    $median = $scores[$count / 2];
    $lower = $scores[$count / 4];
    $upper = $scores[3*$count / 4];
    
    $iqr = $upper - $lower;
    $lowerF = $lower - 1.5*$iqr;
    $upperF = $upper + 1.5*$iqr;
    
    $newTotal = 0;
    $count = 0;
    foreach($scores as $i => $val) {
        if($val >= $lowerF && $val <= $upperF) {
            $newTotal+=$val;
            $count++;
        }
    }
    
    $newAverage = $newTotal / $count;
    return $newAverage;
}
?>
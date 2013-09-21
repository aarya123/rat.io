<?php

include "AmazonECS.class.php";

class AmazInt
{
    const ACCESS_KEY = 'AKIAJGDUYZ22LGVKPFAA';
    const SECRET_KEY = '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';
    const ASSOCIATE_TAG = 'ratio0b-20';
    
    $amazonEcs = new AmazonECS(ACCESS_KEY, SECRET_KEY, 'com', ASSOCIATE_TAG);
    
    $amazonEcs->associateTag(ASSOCIATE_TAG);
    
    $return = $amazonEcs->category('All')->responseGroup('Large')->search($_GET[keyword]);
    echo $return;
}
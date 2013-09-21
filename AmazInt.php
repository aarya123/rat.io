<?php

include com.amazon.advertising.api.Item;
include com.amazon.advertising.api.ItemLookup;
include com.amazon.advertising.api.ItemLookupRequest;
include com.amazon.advertising.api.ItemLookupResponse;

class AmazInt ($input)
{
	$AmzazonECS = new AmazonECS(
		/*$accessKey*/ 		'AKIAJGDUYZ22LGVKPFAA', 
		/*$secretKey*/ 		'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', 
		/*$country*/ 		'com', 
		/*$associateTag*/ 	'ratio0b-20'
	);

	$result=$AmzazonECS.search($input);
	echo $result;
}
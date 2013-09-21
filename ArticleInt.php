<?php
require "../google-api-php-client/src/apiClient.php";
require "../google-api-php-client/src/contrib/apiArticlesapiService.php";

$client = new apiClient();
$client->setDeveloperKey("tnpbg32cfdf633uvkeg7nsqs");

$service = new apiArticlesapiService($client);

$StoryList = new StoryList;
$story = new Story;

$search = $_GET['q'];
$StoryList = new StoryList($service->ArticlesMethods->TopNews("json", $search));

print_r($StoryList);
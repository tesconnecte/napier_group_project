<?php

require_once('C:\xampp\htdocs\napier_group_project\__class\twitter-api-php-master\TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "970953751258390528-Z3ETeETyI0Ey00VOVtCDtb5PmcYCIET",
    'oauth_access_token_secret' => "41VdBHgK8m46SFOxVpK71jJGEmJdzdp4eQT4cLDGTQ5cL",
    'consumer_key' => "axntszug8MrAJxHtmPvuNRpK0",
    'consumer_secret' => "u0tuuJJ2DSLiuIugVW95UGhTKSXNDGtieIlP83Q5fM6gcrCWdD"
);

$url = "https://api.twitter.com/1.1/statuses/show.json";
$getfield = '?id=970476456139608064';
$requestMethod = "GET";

$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
?>

<?php

require_once('C:\xampp\htdocs\napier_group_project\__class\twitter-api-php-master\TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "YOUR_OAUTH_ACCESS_TOKEN",
    'oauth_access_token_secret' => "YOUR_OAUTH_ACCESS_TOKEN_SECRET",
    'consumer_key' => "YOUR_CONSUMER_KEY",
    'consumer_secret' => "YOUR_CONSUMER_SECRET"
);

$url = "https://publish.twitter.com/oembed?url=https://twitter.com/Twitter/status/970476456139608064";
$requestMethod = "GET";

$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
    ->performRequest();
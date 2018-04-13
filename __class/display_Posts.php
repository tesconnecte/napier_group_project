<?php

require_once('C:\xampp\htdocs\napier_group_project\__class\twitter-api-php-master\TwitterAPIExchange.php');

$url = "https://twitter.com/PolaroidFrance/status/984753026048102400";
$id = substr($url, strrpos($url, "/") + 1); //gets id of the tweet using the url

$settings = array(
    'oauth_access_token' => "970953751258390528-Z3ETeETyI0Ey00VOVtCDtb5PmcYCIET",
    'oauth_access_token_secret' => "41VdBHgK8m46SFOxVpK71jJGEmJdzdp4eQT4cLDGTQ5cL",
    'consumer_key' => "axntszug8MrAJxHtmPvuNRpK0",
    'consumer_secret' => "u0tuuJJ2DSLiuIugVW95UGhTKSXNDGtieIlP83Q5fM6gcrCWdD"
);

$req = "https://api.twitter.com/1.1/statuses/show.json";
$getfield = '?id='.$id;
$requestMethod = "GET";

$twitter = new TwitterAPIExchange($settings);
$parameters = $twitter->setGetfield($getfield)
    ->buildOauth($req, $requestMethod)
    ->performRequest(); // GEts all the attributes and data of a tweet


$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://publish.twitter.com/oembed?url='.$url
));
$result = curl_exec($curl);
curl_close($curl);

$result = json_decode($result, true);
$parameters = json_decode($parameters, true);
$textParameter = $parameters['text'];
//var_dump($parameters);
//var_dump($result);
echo($result['html']); // Displays the embedded tweet

?>

<div>
    <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v2.5"async></script>
    <script async defer src="//www.instagram.com/embed.js"></script>
    <div class="fb-post"
         data-href="https://www.facebook.com/LICORNEGrenoble/photos/a.973545789350309.1073741830.955836854454536/1785330678171812/?type=3"></div>
    <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/BhZRfRnFl0V/" data-instgrm-version="8" ></blockquote>
</div>

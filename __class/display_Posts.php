<?php

require_once('C:\xampp\htdocs\napier_group_project\__class\twitter-api-php-master\TwitterAPIExchange.php');

//$settings = array(
//    'oauth_access_token' => "970953751258390528-Z3ETeETyI0Ey00VOVtCDtb5PmcYCIET",
//    'oauth_access_token_secret' => "41VdBHgK8m46SFOxVpK71jJGEmJdzdp4eQT4cLDGTQ5cL",
//    'consumer_key' => "axntszug8MrAJxHtmPvuNRpK0",
//    'consumer_secret' => "u0tuuJJ2DSLiuIugVW95UGhTKSXNDGtieIlP83Q5fM6gcrCWdD"
//);
//
//$url = "https://api.twitter.com/1.1/statuses/show.json";
//$getfield = '?id=970476456139608064';
//$requestMethod = "GET";
//
//$twitter = new TwitterAPIExchange($settings);
//echo $twitter->setGetfield($getfield)
//    ->buildOauth($url, $requestMethod)
//    ->performRequest();

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://publish.twitter.com/oembed?url=https%3A%2F%2Ftwitter.com%2FInterior%2Fstatus%2F507185938620219395'
));
$result = curl_exec($curl);
curl_close($curl);
$result = json_decode($result, true);
echo($result['html']);

?>

<div>
    <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v2.5"async></script>
    <div class="fb-post"
         data-href="https://www.facebook.com/LICORNEGrenoble/photos/a.973545789350309.1073741830.955836854454536/1785330678171812/?type=3"
         data-width="500"></div>
    <div class="fb-post"
         data-href="https://www.facebook.com/Pianitza/photos/a.500284130035886.1073741825.500280596702906/1755653667832253/?type=3"
         data-width="500"></div>
    <div class="fb-post"
         data-href="https://www.facebook.com/la.demeure.du.chaos.theabodeofchaos999/photos/a.419850215978.219880.62396175978/10156328600345979/?type=3"
         data-width="500"></div>
</div>

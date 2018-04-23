<?php
/**
 * Created by PhpStorm.
 * User: Liam
 * Date: 23/04/2018
 * Time: 19:08
 */

require_once('.\twitter-api-php-master\TwitterAPIExchange.php');
session_start();
require_once ("../__class/autoload_Class.php");

if(isset($_SESSION['userid'])) {
    if (isset($_POST['postType'])) {
        $urlTwitter = "https://twitter.com/PolaroidFrance/status/984753026048102400";
        $id = substr($urlTwitter, strrpos($urlTwitter, "/") + 1); //gets id of the tweet using the url
        $urlFacebook = "https://www.facebook.com/LICORNEGrenoble/photos/a.973545789350309.1073741830.955836854454536/1785330678171812/?type=3";
        $urlInstagram = "https://www.instagram.com/p/BhZRfRnFl0V/";

        $settings = array(
            'oauth_access_token' => "970953751258390528-Z3ETeETyI0Ey00VOVtCDtb5PmcYCIET",
            'oauth_access_token_secret' => "41VdBHgK8m46SFOxVpK71jJGEmJdzdp4eQT4cLDGTQ5cL",
            'consumer_key' => "axntszug8MrAJxHtmPvuNRpK0",
            'consumer_secret' => "u0tuuJJ2DSLiuIugVW95UGhTKSXNDGtieIlP83Q5fM6gcrCWdD"
        );

        $req = "https://api.twitter.com/1.1/statuses/show.json";
        $getfield = '?id=' . $id;
        $requestMethod = "GET";

        $twitter = new TwitterAPIExchange($settings);
        $parameters = $twitter->setGetfield($getfield)
            ->buildOauth($req, $requestMethod)
            ->performRequest(); // Gets all the attributes and data of a tweet

        $parameters = json_decode($parameters, true);

        try{
            $dao = new DAO();
            if (isset($_POST['link'])) {
                $link = $_POST['link'];
            } else {
                $link ="Local";
            }
            if (isset($_POST['file'])) {
                $file = $_POST['file'];
            } else {
                $file = "";
            }
            if (isset($_POST[]))
            $dao->insertPost($);
            header('Location: ../user_home/successActionUser.php?action=1');
        } catch (Exception $e){
            header('Location: ../user_home/errorActionUser.php?errType=database&errID=1');
        }
    }
    else {
            header('Location: ../user_home/errorActionUser.php?errType=user&errID=1');
        }
}
else {
    header('Location: ../home/logIn.php?error=2');
}
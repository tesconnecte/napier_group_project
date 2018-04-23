<?php
/**
 * Created by PhpStorm.
 * User: Liam
 * Date: 23/04/2018
 * Time: 19:08
 */

require_once('../__class/twitter-api-php-master/TwitterAPIExchange.php');
session_start();
require_once ("../__class/autoload_Class.php");

if(isset($_SESSION['userid'])) {
    if (isset($_POST['postType'])&&isset($_POST['album'])) {
        $urlTwitter = $_POST['link'];
        $id = substr($urlTwitter, strrpos($urlTwitter, "/") + 1); //gets id of the tweet using the url

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
            $album = $_POST['album'];
            if ($_POST['postType']=="existing") {
                if ($parameters['text']!=null) {
                    $text = $parameters['text'];
                }
                if ($parameters["media_url"]!=null) {
                    $file = $parameters["media_url"];
                }
                if ($parameters['name']!=null&&$parameters['screen_name']!=null&&$parameters['created_at']!=null) {
                    $description = $parameters['name'] . " " . $parameters['screen_name'] . " " . $parameters['created_at'];
                }
                $link = $_POST['link'];
            } else {
                $link = "Local";
                if (isset($_POST['file'])) {
                    $file = $_POST['file'];
                }else {
                    $file = "";
                }
                if (isset($_POST['description'])) {
                    $description = $_POST['description'];
                }else {
                    $description = "";
                }
                if (isset($_POST['text'])) {
                    $text = $_POST['text'];
                }else {
                    $text = "";
                }
            }

            $dao->insertPost($link,$description,$file,$text,$album);
            header('Location: ../user_home/successActionUser.php?action=8');
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
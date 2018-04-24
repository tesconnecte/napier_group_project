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

                if($_FILES['fileToUpload']['size']>0) {
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $file = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                }else{
                    $file = "NULL";
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

            $postId=$dao->insertPost($link,$description,$file,$text,$album);

            if($_FILES['fileToUpload']['size']>0) {
                $uploadOk = 1;
                $target_dir = "../user_content/".$_SESSION['userid']."/".$_POST['album']."/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $target_dest = $target_dir.$postId.'.'.$imageFileType;
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

                if($check === false) {
                    header('Location: ../user_home/errorActionUser.php?errType=user&errID=6');
                    $uploadOk = 0;
                }

                if (file_exists($target_file)) {
                    header('Location: ../user_home/errorActionUser.php?errType=user&errID=7');
                    $uploadOk = 0;
                }

                if ($_FILES["fileToUpload"]["size"] > 2000000) {
                    header('Location: ../user_home/errorActionUser.php?errType=database&errID=5');
                    $uploadOk = 0;
                }

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    header('Location: ../user_home/errorActionUser.php?errType=user&errID=6');
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    header('Location: ../user_home/errorActionUser.php?errType=database&errID=6');

                } else {
                    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dest)) {
                        header('Location: ../user_home/errorActionUser.php?errType=database&errID=6');
                    }
                }
            }

            //var_dump($_FILES['fileToUpload']);


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
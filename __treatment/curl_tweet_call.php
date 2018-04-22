<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 22/04/2018
 * Time: 17:58
 */
session_start();
require_once ("../__class/autoload_Class.php");

if(isset($_SESSION['userid'])){
    if(isset($_POST['link'])){
        $link=$_POST['link'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://publish.twitter.com/oembed?url=' . $link . '&maxwidth=350&maxheight=350'
        ));
        $result = curl_exec($curl);
        curl_close($curl);
        echo($result);
    }else{
        echo(json_encode(array( 'link'=>'../user_home/errorActionUser.php?errType=user&errID=1')));
    }
}else{
    header('Location: ../home/logIn.php?error=2');
}
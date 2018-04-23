<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 22/04/2018
 * Time: 14:36
 */
session_start();
require_once ("../__class/autoload_Class.php");

if(isset($_SESSION['userid'])){
    if((isset($_POST['albumid']))&&(isset($_POST['lastpid']))&&(isset($_POST['nbposts']))){
        try{
            $dao = new DAO();
            $useralbums = $dao->getAlbums($_SESSION['userid']);
            $ownsAlbum=false;
            for ($i = 0; $i < count($useralbums); ++$i) {
                $currentalbum=$useralbums[$i];
                if($currentalbum->getId()==$_POST['albumid']){
                    $ownsAlbum=true;
                }
            }

            if($ownsAlbum==true){
                $newposts = $dao->getPostsFromRange(intval($_POST['albumid']),intval($_POST['lastpid']),intval($_POST['nbposts']));
                echo(json_encode($newposts));
            }else{
                echo(json_encode(array( 'link'=>'../user_home/errorActionUser.php?errType=user&errID=3')));
            }

        } catch (Exception $e){
            echo(json_encode(array( 'link'=>'../user_home/errorActionUser.php?errType=database&errID=1')));
        }
    } else {
        echo(json_encode(array( 'link'=>'../user_home/errorActionUser.php?errType=user&errID=1')));
    }
} else {
    header('Location: ../home/logIn.php?error=2');
}
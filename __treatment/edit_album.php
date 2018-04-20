<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 20/04/2018
 * Time: 21:11
 */
session_start();
require_once ("../__class/autoload_Class.php");

if(isset($_SESSION['userid'])){
    if((isset($_POST['title']))&&(isset($_POST['privacy']))&&(isset($_GET['id']))){
        $isPublic = false;
        if($_POST['privacy']=="public"){
            $isPublic=true;
        }
        try{
            $dao = new DAO();
            $useralbums = $dao->getAlbums($_SESSION['userid']);
            $ownsAlbum=false;
            for ($i = 0; $i < count($useralbums); ++$i) {
                $currentalbum=$useralbums[$i];
                if($currentalbum->getId()==$_GET['id']){
                    $ownsAlbum=true;
                }
            }

            if($ownsAlbum==true){
                $dao->updateAlbum($_GET['id'],$_POST['title'],$isPublic);
                header('Location: ../user_home/successActionUser.php?action=3');
            }else{
                header('Location: ../user_home/errorActionUser.php?errType=user&errID=3');
            }

        } catch (Exception $e){
            header('Location: ../user_home/errorActionUser.php?errType=database&errID=1');
        }
    } else {
        header('Location: ../user_home/errorActionUser.php?errType=user&errID=1');
    }
} else {
    header('Location: ../home/logIn.php?error=2');
}
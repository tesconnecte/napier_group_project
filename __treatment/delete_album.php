<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 21/04/2018
 * Time: 21:26
 */
session_start();
require_once ("../__class/autoload_Class.php");

if(isset($_SESSION['userid'])){
    if(isset($_POST['albumid'])){
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
                $dao->deleteAlbum($_POST['albumid']);
                echo('../user_home/successActionUser.php?action=5');
            }else{
                echo('../user_home/errorActionUser.php?errType=user&errID=3');
            }

        } catch (Exception $e){
            echo('../user_home/errorActionUser.php?errType=database&errID=1');
        }
    } else {
        echo('../user_home/errorActionUser.php?errType=user&errID=1');
    }
} else {
    header('Location: ../home/logIn.php?error=2');
}
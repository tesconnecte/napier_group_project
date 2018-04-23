<?php
/**
 * Created by PhpStorm.
 * User: Liam
 * Date: 21/04/2018
 * Time: 15:06
 */

session_start();
require_once ("../__class/autoload_Class.php");

if(isset($_SESSION['userid'])){
    if((isset($_POST['postType']))&&(isset($_POST['description']))&&(isset($_GET['id']))){

        try{
            $dao = new DAO();
            $post = $dao->getPost($_GET['id']);
            $useralbums = $dao->getAlbums($_SESSION['userid']);
            var_dump($post);
            $ownsAlbum=false;
            for ($i = 0; $i < count($useralbums); ++$i) {
                $currentalbum=$useralbums[$i];
                if($currentalbum->getId()==$post->getAlbum()){
                    $ownsAlbum=true;
                }
            }

            if($ownsAlbum==true){
                $dao->updatePost($_GET['id'],$_POST['link'],$_POST['description'],$_POST['image'],$_POST['text']);
                header('Location: ../user_home/successActionUser.php?action=7');
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
<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 20/04/2018
 * Time: 10:32
 */
session_start();
require_once ("../__class/autoload_Class.php");

if(isset($_SESSION['userid'])){
    if((isset($_POST['title']))&&(isset($_POST['privacy']))){
        $isPublic = false;
        if($_POST['privacy']=="public"){
            $isPublic=true;
        }
        try{
            $dao = new DAO();
            $dao->insertAlbum($_POST['title'],$isPublic,$_SESSION['userid']);
            header('Location: ../user_home/successActionUser.php?action=1');
        } catch (Exception $e){
            header('Location: ../user_home/errorActionUser.php?errType=database&errID=1');
        }
    } else {
        header('Location: ../user_home/errorActionUser.php?errType=user&errID=1');
    }
} else {
    header('Location: ../home/logIn.php?error=2');
}
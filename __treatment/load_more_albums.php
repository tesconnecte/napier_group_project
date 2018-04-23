<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 23/04/2018
 * Time: 08:46
 */
session_start();
require_once ("../__class/autoload_Class.php");

if(isset($_SESSION['userid'])){
    if((isset($_POST['lastaid']))&&(isset($_POST['nbalbums']))){
        try{
            $dao = new DAO();
            $useralbums = $dao->getAlbumsFromRange(intval($_SESSION['userid']),intval($_POST['lastaid']),intval($_POST['nbalbums']));
            echo(json_encode($useralbums));

        } catch (Exception $e){
            echo(json_encode(array( 'link'=>'../user_home/errorActionUser.php?errType=database&errID=1')));
        }
    } else {
        echo(json_encode(array( 'link'=>'../user_home/errorActionUser.php?errType=user&errID=1')));
    }
} else {
    header('Location: ../home/logIn.php?error=2');
}
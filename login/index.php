<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 19/02/2018
 * Time: 13:58
 */
try {
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: ../user_home/index.php');
    } else if (isset($_POST['uname'])&&($_POST['pword'])) {
        $dao = new DAO();


    }
}
catch(Exception $e)
{
    unset($_SESSION['utilisateur']);
    header('Location: ../controler/page_accueil.ctrl.php');
}
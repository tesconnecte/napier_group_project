<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 20/04/2018
 * Time: 21:54
 */
require_once ("../__class/autoload_Class.php");
try {
    session_start();
    if (!isset($_SESSION['userid'])) {
        header('Location: ../home/index.php');
    } else if ((isset($_POST['psw']))&&(isset($_POST['npsw']))&&(isset($_POST['cnpsw']))) {
        if(trim($_POST['npsw'])==trim($_POST['cnpsw'])){
            $dao = new DAO();
            $userdata=$dao->getUser($_SESSION['userid']);
            $user = $dao->connection(trim($userdata->getEmail()), hash("sha256",trim($_POST['psw'])));
            if($user!=null){
                $dao->updateUserPassword($_SESSION['userid'],hash("sha256",trim($_POST['npsw'])));
                header('Location: ../user_home/successActionUser.php?action=4');
            }else{
                header('Location: ../user_home/errorActionUser.php?errType=user&errID=4');
            }
        }else{
            header('Location: ../user_home/errorActionUser.php?errType=user&errID=5');
        }
    }else{
        header('Location: ../user_home/errorActionUser.php?errType=user&errID=1');    }
}
catch(Exception $e)
{
    header('Location: ../user_home/errorActionUser.php?errType=database&errID=1');
}

?>
<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 19/02/2018
 * Time: 13:58
 */
require_once ("../__class/autoload_Class.php");
try {
    session_start();
    if (isset($_SESSION['userid'])) {
        header('Location: ../user_home/index.php');
    } else if (isset($_POST['uname'])&&($_POST['pword'])) {
        $dao = new DAO();
        $user = $dao->connection($_POST['uname'], hash("sha256",$_POST['pword']));
        var_dump($user);
        if($user!=null){
            session_start();
            $_SESSION["userid"]=$user->getId();
            header('Location: ../user_home/index.php');
        }else{
            header('Location: ../home/logIn.php?error=1');
        }
    }else{
        header('Location: ../home/logIn.php?error=0');
    }
}
catch(Exception $e)
{
    unset($_SESSION['userid']);
    session_abort();
    header('Location: ../home/index.php');
}

?>
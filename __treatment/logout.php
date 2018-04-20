<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 19/04/2018
 * Time: 10:18
 */
try {
    session_start();
    if (isset($_SESSION['userid'])) {
        unset($_SESSION['userid']);
        session_destroy();
        header('Location: ../home/index.php');

    }else{
        header('Location: ../home/index.php');
    }
}
catch(Exception $e)
{
    unset($_SESSION['userid']);
    session_abort();
    header('Location: ../home/index.php');
}
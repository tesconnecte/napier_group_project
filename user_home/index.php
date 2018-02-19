<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 19/02/2018
 * Time: 14:03
 */
session_start();
if(!isset($_SESSION['userid'])){
    header('Location: ../home/index.php?error=0');
} else {
    echo("<h1>Welcome on Posted"+$_SESSION['userid']+"</h1>");
}


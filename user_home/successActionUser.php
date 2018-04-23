<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 20/04/2018
 * Time: 11:03
 */
session_start();
require_once ("../__class/autoload_Class.php");

if(!isset($_SESSION['userid'])){
    header('Location: ../home/logIn.php?error=2');
} else {
    include("../header/htmlhead.php");
    echo('<link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">');
    include("../header/header.php");
    
    if(isset($_GET['action'])){
        echo ("<div class=\"container\">");
        if($_GET['action']=='1'){
            echo ("<h3>Album created !</h3>");
        } else if($_GET['action']=='2'){
            echo ("<h3>Account details updated</h3>");
        }else if($_GET['action']=='3'){
            echo ("<h3>Album details updated</h3>");
        }else if($_GET['action']=='4'){
            echo ("<h3>Password successfully changed</h3>");
        }else if($_GET['action']=='5'){
            echo ("<h3>Album deleted</h3>");
        }else if($_GET['action']=='6'){
            echo ("<h3>Add new action completed</h3>");
        }else if($_GET['action']=='7'){
            echo ("<h3>Post details updated</h3>");
        }else if($_GET['action']=='8'){
            echo ("<h3>Post added!</h3>");
        }else{
            header('Location: ../user_home/index.php');
        }
        echo ("<h3><a href='../user_home/index.php'> Back to home page</a></h3></div>");
    }else{
        header('Location: ../user_home/index.php');
    }
}
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
            echo ("<h1 id='actionSuccededOrFailed'>Album created !</h1>");
        } else if($_GET['action']=='2'){
            echo ("<h1 id='actionSuccededOrFailed'>Account details updated</h1>");
        }else if($_GET['action']=='3'){
            echo ("<h1 id='actionSuccededOrFailed'>Album details updated</h1>");
        }else if($_GET['action']=='4'){
            echo ("<h1 id='actionSuccededOrFailed'>Password successfully changed</h1>");
        }else if($_GET['action']=='5'){
            echo ("<h1 id='actionSuccededOrFailed'>Album deleted</h1>");
        }else if($_GET['action']=='6'){
            echo ("<h1 id='actionSuccededOrFailed'>Add new action completed</h1>");
        }else if($_GET['action']=='7'){
            echo ("<h1 id='actionSuccededOrFailed'>Post details updated</h1>");
        }else if($_GET['action']=='8'){
            echo ("<h1 id='actionSuccededOrFailed'>Post added!</h1>");
        }else{
            header('Location: ../user_home/index.php');
        }
        echo ("<h1 id='actionSuccededOrFailed'><a href='../user_home/index.php'> Back to home page</a></h1></div>");
    }else{
        header('Location: ../user_home/index.php');
    }
}
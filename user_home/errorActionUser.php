<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 20/04/2018
 * Time: 10:51
 */
session_start();
require_once ("../__class/autoload_Class.php");

if(!isset($_SESSION['userid'])){
    header('Location: ../home/logIn.php?error=2');
} else {
    include("../header/htmlhead.php");
    echo('<link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">');
    include("../header/header.php");

    if(isset($_GET['errType'])&&(isset($_GET['errID']))){
        if($_GET['errType']=='database'){
            if($_GET['errID']=='1'){
                echo ("<h3>Database error, please contact administrator</h3>");
            } else if($_GET['errID']=='2'){
                echo ("<h3>Another account uses this e-mail, update cancelled.</h3>");
            }else if($_GET['errID']=='3'){
                echo ("<h3>Account creation error: An account with this email already exists. Log in.</h3>");
            }else if($_GET['errID']=='4'){
                echo ("<h3>Account creation error: Date format is not correct or date does not exist.</h3>");
            }else if($_GET['errID']=='5'){
                echo ("<h3>Server error : ". $_GET['msg'] ."</h3>");
            }else{
                echo ("<h3>Unknown error please contact administrator</h3>");
            }
        } else if($_GET['errType']=='user'){
            if($_GET['errID']=='1'){
                echo ("<h3>Some fields aren't field. Action cancelled.</h3>");
            } else if($_GET['errID']=='2'){
                echo ("<h3>The birth date doesn't have the right format, update cancelled.</h3>");
            }else if($_GET['errID']=='3'){
                echo ("<h3>You can't update albums you don't own. Update cancelled.</h3>");
            }else if($_GET['errID']=='4'){
                echo ("<h3>The current password you typed is not correct. Your password hasn't been changed. Please try again.</h3>");
            }else if($_GET['errID']=='5'){
                echo ("<h3>Your new password wasn't the same twice. Please make sure you didn't mistype and try again.</h3>");
            }else if($_GET['errID']=='6'){
                echo ("<h3></h3>");
            }else{
                echo ("<h3>Unknown error please contact administrator</h3>");
            }
        }else{
            echo ("<h3>Unknown error please contact administrator</h3>");
        }

        echo ("<h3><a href='../user_home/index.php'> Back to home page</a></h3>");
    }else{
        header('Location: ../user_home/index.php');
    }
}
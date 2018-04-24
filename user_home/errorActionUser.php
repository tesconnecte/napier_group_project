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
                echo ("<h1 id='actionSuccededOrFailed'>Database error, please contact administrator</h1>");
            } else if($_GET['errID']=='2'){
                echo ("<h1 id='actionSuccededOrFailed'>Another account uses this e-mail, update cancelled.</h1>");
            }else if($_GET['errID']=='3'){
                echo ("<h1 id='actionSuccededOrFailed'>Account creation error: An account with this email already exists. Log in.</h1>");
            }else if($_GET['errID']=='4'){
                echo ("<h1 id='actionSuccededOrFailed'>Account creation error: Date format is not correct or date does not exist.</h1>");
            }else if($_GET['errID']=='5'){
                echo ("<h1 id='actionSuccededOrFailed'>The file you provided is too heavy. Maximum size: 2Mo. Post added without the image. </h1>");
            }else if($_GET['errID']=='6'){
                echo ("<h1 id='actionSuccededOrFailed'>Error during image importation. Post added without the image. </h1>");
            }else{
                echo ("<h1 id='actionSuccededOrFailed'>Unknown error please contact administrator</h1>");
            }
        } else if($_GET['errType']=='user'){
            if($_GET['errID']=='1'){
                echo ("<h1 id='actionSuccededOrFailed'>Some fields aren't filled. Action cancelled.</h1>");
            } else if($_GET['errID']=='2'){
                echo ("<h1 id='actionSuccededOrFailed'>The birth date doesn't have the right format, update cancelled.</h1>");
            }else if($_GET['errID']=='3'){
                echo ("<h1 id='actionSuccededOrFailed'>You can't update or delete albums you don't own. Action cancelled.</h1>");
            }else if($_GET['errID']=='4'){
                echo ("<h1 id='actionSuccededOrFailed'>The current password you typed is not correct. Your password hasn't been changed. Please try again.</h1>");
            }else if($_GET['errID']=='5'){
                echo ("<h1 id='actionSuccededOrFailed'>Your new password wasn't the same twice. Please make sure you didn't mistype and try again.</h1>");
            }else if($_GET['errID']=='6'){
                echo ("<h1 id='actionSuccededOrFailed'>The file you provided is not an accepted format (only jpg, jpeg, png, gif). Post added without the image.</h1>");
            }else if($_GET['errID']=='7'){
                echo ("<h1 id='actionSuccededOrFailed'>The file already exists in the destination. Post added without the image.</h1>");
            }else if($_GET['errID']=='8'){
                echo ("<h1 id='actionSuccededOrFailed'>The file already exists in the destination. Post added without the image.</h1>");
            }else{
                echo ("<h1 id='actionSuccededOrFailed'>Unknown error please contact administrator</h1>");
            }
        }else{
            echo ("<h1 id='actionSuccededOrFailed'>Unknown error please contact administrator</h1>");
        }

        echo ("<h1 id='actionSuccededOrFailed'><a href='../user_home/index.php'> Back to home page</a></h1>");
    }else{
        header('Location: ../user_home/index.php');
    }
}
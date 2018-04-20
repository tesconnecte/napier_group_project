<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 26/02/2018
 * Time: 14:25
 */
require_once ("../__class/autoload_Class.php");

session_start();
if (isset($_SESSION['userid'])) {
    if ((isset($_POST['fname']))&&(isset($_POST['sname']))&&(isset($_POST['email']))&&(isset($_POST['bdate']))) {
            $dao = new DAO();
            $userExisting = null;//Provisionnary code, waiting for getUserByEmail method to be available

            $ubirthdate = trim($_POST['bdate']);

            list($ubirthdateday, $ubirthdatemonth, $ubirthdateyear) = explode('-', $ubirthdate);

            if(checkdate($ubirthdatemonth, $ubirthdateday, $ubirthdateyear)){//Checking the date has the good format and exists
                try{
                    $userExisting = $dao->getUserByEmail(trim($_POST['email']));

                    if(($userExisting==null)||(($userExisting!=null)&&($userExisting->getId()==$_SESSION['userid']))){
                        try {
                           $dao->updateUser($_SESSION['userid'],trim($_POST['fname']),trim($_POST['sname']),trim($_POST['email']),trim($_POST['bdate']));
                            header('Location: ../user_home/successActionUser.php?action=2');
                        } catch(Exception $e){
                            header('Location: ../user_home/errorActionUser.php?error=database&errID=1');
                        }
                    } else {
                        header('Location: ../user_home/errorActionUser.php?error=database&errID=2');
                    }
                } catch(Exception $e){
                    header('Location: ../user_home/errorActionUser.php?error=database&errID=1');
                }
            }else{
                header('Location: ../user_home/errorActionUser.php?error=user&errID=2');
            }
        }else{
            header('Location: ../user_home/errorActionUser.php?error=user&errID=1');
        }

} else {
    header('Location: ../home/index.php');
}
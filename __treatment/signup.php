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
        header('Location: ../user_home/index.php');
    } elseif ((isset($_POST['fname']))&&(isset($_POST['sname']))&&(isset($_POST['email']))&&(isset($_POST['pword']))&&(isset($_POST['cpword']))&&(isset($_POST['ubday']))) {
        if((trim($_POST['pword']))==(trim($_POST['cpword']))){
            $dao = new DAO();
            $userExisting = null;//Provisionnary code, waiting for getUserByEmail method to be available

            $ubirthdate = trim($_POST['ubday']);

            list($ubirthdateday, $ubirthdatemonth, $ubirthdateyear) = explode('-', $ubirthdate);

            if(checkdate($ubirthdatemonth, $ubirthdateday, $ubirthdateyear)){//Checking the date has the good format and exists
                try{
                    $userExisting = $dao->getUserByEmail(trim($_POST['email']));

                    if($userExisting==null){
                        try {
                            $dao->insertUser(trim($_POST['fname']),trim($_POST['sname']),trim($_POST['email']),hash("sha256",trim($_POST['pword'])),trim($_POST['ubday']));
                            header('Location: ../signup_complete/index.php');
                        } catch(Exception $e){
                            unset($_SESSION['userid']);
                            session_abort();
                            header('Location: ../home/signUp.php?error=dberror&msg='.$e->getMessage());
                        }
                    } else {
                        header('Location: ../home/signUp.php?error=2');
                    }
                } catch(Exception $e){
                    unset($_SESSION['userid']);
                    session_abort();
                    header('Location: ../home/signUp.php?error=dberror&msg='.$e->getMessage());
                }
            }else{
                header('Location: ../home/signUp.php?error=3');
            }
        }else{
            header('Location: ../home/signUp.php?error=1');
        }
    } else {
        header('Location: ../home/signUp.php?error=0');
    }
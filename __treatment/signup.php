<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 26/02/2018
 * Time: 14:25
 */

    session_start();
    if (isset($_SESSION['userid'])) {
        header('Location: ../user_home/index.php');
    } else if ((isset($_POST['fname']))&&(isset($_POST['sname']))&&(isset($_POST['email']))&&(isset($_POST['pword']))&&(isset($_POST['cpword']))) {
        if((trim($_POST['pword']))==(trim($_POST['cpword']))){
            $dao = new DAO();
            $userExisting = null;//Provisionnary code, waiting for getUserByEmail method to be available

           /* try{
                $userExisting = $dao->getUserByEmail($_POST['email']);
            } catch(Exception $e){
                unset($_SESSION['userid']);
                session_abort();
                header('Location: ../home/index.php');
            }*/


            if($userExisting==null){
                try {
                    //$dao->insertUser();
                } catch(Exception $e){
                    unset($_SESSION['userid']);
                    session_abort();
                    header('Location: ../home/index.php');
                }
            }

        }else{

        }
        $dao = new DAO();
        $user = $dao->connection($_POST['uname'], hash("sha256",$_POST['pword']));
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
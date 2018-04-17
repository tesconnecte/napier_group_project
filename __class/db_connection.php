<?php
    //session_start();
    require_once("dao_Class.php");
    /*$result = array() ;
    $result["status"] = "success" ;
    if (isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
        $reponse=$dao->connexion($_REQUEST['login'],$_REQUEST['password']);
        if(!empty($reponse)){
            $result["reponse"] = "true" ;
            $_SESSION['user']= $_REQUEST['login'];
        }else{
            $result["reponse"] = "false" ;
        }
    } else {
        $result["status"] = "error" ;
    }
    echo json_encode($result) ;*/
    $dao = new DAO();
    //var_dump($dao->getAlbum(1));
    //var_dump($dao->getPost(1));
    //$dao->insertPost('link','description','image','text',5);
    var_dump($dao->insertPost('https://twitter.com/PolaroidFrance/status/984753026048102400','Twitter post','image','Twitter post',2));
?>

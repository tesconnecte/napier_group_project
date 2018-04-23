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
    //var_dump($dao->insertPost('https://twitter.com/PolaroidFrance/status/984753026048102400','Twitter post','image','Twitter post',2));
    //var_dump($dao->insertPost('https://www.facebook.com/uniladmag/videos/4733917056631316/','Facebook post','image','Facebook post',2));
    //var_dump($dao->insertPost('https://www.instagram.com/p/BhZRfRnFl0V/','Instagram post','image','Instagram post',2));
//$dao->insertPost('https://www.facebook.com/UGrenobleAlpes/videos/989388411212716/','Facebook post','image','Facebook post',25);
$dao->insertPost('https://www.facebook.com/bbcnews/videos/10155762024607217/','Facebook post','image','Facebook post',27);
$dao->insertPost('https://twitter.com/franceinfo/status/987960042442887168','Twitter post','image','Twitter post',27);
//$dao->insertPost('https://twitter.com/UNILAD/status/987722641485123586','Twitter post','image','Twitter post',24);
//$dao->insertPost('https://www.facebook.com/lessybelles/photos/a.10151638672188891.1073741827.96178093890/10155773550383891/?type=3&theater','Facebook post','image','Facebook post',24);
//$dao->insertPost('https://twitter.com/UNILAD/status/987254549936160770','Twitter post','image','Twitter post',24);
var_dump($dao->insertPost('https://www.instagram.com/p/Ba8wTuaFlfF/?taken-by=sncf','Instagram post','image','Instagram post',27));


?>

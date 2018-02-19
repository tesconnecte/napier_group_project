<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 19/02/2018
 * Time: 14:03
 */
session_start();
require_once ("../__class/autoload_Class.php");

if(!isset($_SESSION['userid'])){
    header('Location: ../home/logIn.php?error=2');
} else {
    include ("../header/htmlhead.php");
    echo('<link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">');

    include ("../header/header.php");
    $dao = new DAO();

    $user = $dao->getUser($_SESSION['userid']);
    $str_usr_name = $user->getFirstName() ." ".$user->getSurname();

    $albums = $dao->getAlbums($_SESSION['userid']);
    ?>
    <html>
    <head>
        <link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">
    </head>
    <body>
    <h1>Welcome on Posted <?php echo($str_usr_name) ?></h1>
    <section>
        <h1>My albums</h1>
    </section>
    </body>
    </html>
<?php
}

?>
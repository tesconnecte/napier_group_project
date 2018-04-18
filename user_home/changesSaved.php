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
    include("../header/htmlhead.php");
    echo('<link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">');

    include("../header/header.php");
    $dao = new DAO();

    $user = $dao->getUser($_SESSION['userid']);
    $str_usr_name = $user->getFirstName() . " " . $user->getSurname();

    $albums = $dao->getAlbums($_SESSION['userid']);
    ?>
    <html>
    <head>
        <link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">
        <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v2.5"async></script>
        <script async defer src="//www.instagram.com/embed.js"></script>
    </head>
    <body>

<div class="container">
      <h1>Changes have been saved</h1><br>

      <div class="userSettings">

        <a href="index.php">Back To Posted</a>

    </div>
</div><!--container-->

</body>
</html>
<?php
}
?>

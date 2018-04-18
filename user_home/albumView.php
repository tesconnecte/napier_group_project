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
        <script type="text/javascript" src="../user_home/js/carousel.js"> </script>
    </head>
    <body>

<div class="container">
      <h1>Music Festival</h1><br>

      <div class="radio">

        <input id="r1" type="radio" name="bullet" checked="checked">
        <span>
          <label for="r1"></label>
          <img src="../__website_content/lorem.jpg"/>
        </span>

        <input id="r2" type="radio" name="bullet">
        <span>
          <label for="r2"></label>
          <img src="../__website_content/lorem.jpg"/>
        </span>

        <input id="r3" type="radio" name="bullet">
        <span>
          <label for="r3"></label>
          <img src="../__website_content/lorem.jpg"/>
        </span>

        <input id="r4" type="radio" name="bullet">
        <span>
          <label for="r4"></label>
          <img src="../__website_content/lorem.jpg"/>
        </span>

        <input id="r5" type="radio" name="bullet">
        <span>
          <label for="r5"></label>
          <img src="../__website_content/lorem.jpg"/>
        </span>
      </div>

</div><!--container-->

</body>
</html>
<?php
}
?>

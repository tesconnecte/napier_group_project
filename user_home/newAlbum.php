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
    ?>
    <html>
        <head>
        <link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">
        <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v2.5"async></script>
        <script async defer src="//www.instagram.com/embed.js"></script>
    </head>
    <body>

<div class="container">
      <h1>Create a New Album</h1><br>

      <div class="newAlbum">
      <form class="accountSettings" method="post"  action="../__treatment/new_album.php">

          <label for="title">Title:</label>
          <input type="text" placeholder="Give your album a title..." name="title" required><br>

          <div class="radioNA">
          <label for="privacySetting">Privacy Setting:</label><br>
          <input type="radio" class="privacySetting" name="privacy" value="public" checked>Public</input><br>
          <input type="radio" class="privacySetting" name="privacy" value="private">Private</input>
          </div>
          <br>

          <button class="btn btn-primary btn-US">Create</button><br>


      </form>
    </div>
</div><!--container-->

</body>
</html>
<?php
}
?>

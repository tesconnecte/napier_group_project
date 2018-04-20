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
      <h1>Edit Post</h1><br>

      <div class="addPost">
      <form class="accountSettings" method="post"  action="">

        <div class="form-group">
          <label for="sel1">Change Album:</label>
          <select class="form-control ddPost">
            <option>Music Festival</option>
            <option>Party</option>
            <option>Holiday</option>
            <option>Birthday</option>
        </select>
        <br>

          <label for="title">Change Title:</label>
          <input type="text" placeholder="Give your post a title..." name="title" required><br>

          <div class="radioNA">
          <label for="postType">Change Post Type:</label>

          <input type="radio" class="postType" name="postType" value="public" checked>Local</input>

          <input type="radio" class="postType" name="postType" value="private">Facebook</input>

          <input type="radio" class="postType" name="postType" value="private">Twitter</input>

          <input type="radio" class="postType" name="postType" value="private">Instagram</input>
          </div>
          <br>

          <label for="description">Change Description:</label>
          <input type="text" placeholder="Give your post a description..." name="description" required><br>

          <img src="../__website_content/lorem.jpg"><br>

          <label for="chooseFile">Change Media:</label>
          <input type="file" placeholder="Choose a file or photo to upload..." name="chooseFile" required><br>
          <input type="text" placeholder="URL of Post..." name="chooseFile" required><br>


          <button class="btn btn-primary">Save Changes</button>
          <button class="btn btn-primary">Delete Post</button><br>


      </form>
    </div>
</div><!--container-->

</body>
</html>
<?php
}
?>

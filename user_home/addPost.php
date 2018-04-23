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
    <script type="text/javascript" src="../user_home/js/addpost.js"></script>
    <body>

<div class="container">
      <h1>Add Post</h1><br>
      <div class="addPost">
      <form class="accountSettings" method="post"  action="">

        <div class="form-group">
          <label for="sel1">Select Album:</label>
          <select class="form-control ddPost">
            <?php
            foreach ($albums as $key => $currentAlbum) {
              echo '<option value="'.$currentAlbum->getId().'">'.$currentAlbum->getName().'</option>';
            }
            ?>
        </select>
        <br>

          <div class="radioNA">
          <label for="postType">Post Type:</label>

          <input type="radio" class="postType" name="postType" value="existing" checked>Existing</input>

          <input type="radio" class="postType" name="postType" value="local">Local</input>
          </div>
          <br>
          <div id="local_div">
            <label for="description">Description:</label>
            <input type="text" id="desc_field" placeholder="Give your post a description..." name="description"><br>

            <label for="chooseFile">Choose file or photo:</label>
            <input type="file" id="photo_field" placeholder="Choose a file or photo to upload..." name="chooseFile"><br>
          </div>

          <input type="text" id="url_field" placeholder="URL of Post..." name="chooseFile"><br>
          <button class="btn btn-primary">Add Post</button><br>
          <div id="preview"></div>


      </form>
    </div>
</div><!--container-->

</body>
</html>
<?php
}
?>

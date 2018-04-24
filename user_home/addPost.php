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
      <form class="accountSettings" method="post"  action="../__treatment/new_post.php" enctype="multipart/form-data">

        <div class="form-group">
          <label for="sel1">Select Album:</label>
          <select class="form-control ddPost" name="album">
            <?php
            $albumSet = null;
            if(isset($_GET['albumid'])){
                $albumSet = $_GET['albumid'];
            }
            foreach ($albums as $key => $currentAlbum) {
                if(($albumSet!=null)&&($albumSet==$currentAlbum->getId())){
                    echo '<option value="'.$currentAlbum->getId().'" selected>'.$currentAlbum->getName().'</option>';
                }else{
                    echo '<option value="'.$currentAlbum->getId().'">'.$currentAlbum->getName().'</option>';
                }
            }
            ?>
        </select>
        <br>

          <div class="radioNA">
          <label for="postType">Post Type:</label>

          <input type="radio" class="postType" name="postType" value="existing" checked>Social media</input>

          <input type="radio" class="postType" name="postType" value="local">Local</input>
          </div>
          <br>
          <div id="local_div">
            <label for="description">Description:</label>
            <input type="text" id="desc_field" placeholder="Give your post a description..." name="description"><br>

            <label for="chooseFile">Choose a Photo: (Max 2Mo or import will be denied)</label>
            <input type="file" id="fileToUpload" placeholder="Choose a file or photo to upload..." name="fileToUpload" data-max-size="2000000"><br>

            <label for="text">Text:</label>
            <input type="text" id="text_field" placeholder="Give your post a text..." name="text"><br>
          </div>
          <!--<p>test</p>-->
          <input type="text" id="url_field" placeholder="URL of Post..." name="link"><br>
          <!--<a id = "testButton" >Please work</a><br>-->
          <button id = "addButton" class="btn btn-primary">Add Post</button><br>
          <div id="preview"></div>


      </form>
    </div>
</div><!--container-->

</body>
</html>
<?php
}
?>

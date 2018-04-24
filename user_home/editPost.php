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
    if(!isset($_GET['id'])){
        header('Location: ../user_home/index.php');
    } else {
        try {
            $dao = new DAO();

            $user = $dao->getUser($_SESSION['userid']);
            $str_usr_name = $user->getFirstName() . " " . $user->getSurname();

            $albums = $dao->getAlbums($_SESSION['userid']);

            $post = $dao->getPost($_GET['id']);

        } catch (Exception $e){
            header('Location: ../user_home/errorActionUser.php?errType=database&errID=1');
        }
    }
    include("../header/htmlhead.php");
    echo('<link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">');

    include("../header/header.php");
    ?>
    <body>

<div class="container">
      <h1>Edit Post</h1><br>

      <div class="addPost">
      <form class="accountSettings" method="post"  action="../__treatment/edit_post.php?id=<?php echo ($post->getId()) ?>">

        <div class="form-group">
          <label for="sel1">Change Album:</label>
          <select class="form-control ddPost">
              <?php
              echo(var_dump($albums));
              for ($i = 0; $i < count($albums); ++$i) {
                  $current_album = $albums[$i];
                  echo ("<option>".$current_album->getName()."</option>");
              }
              ?>

        </select>
        <br>

          <div class="radioNA">
          <label for="postType">Change Post Type:</label>

          <input type="radio" class="postType" name="postType" value="public" checked>Local</input>

          <input type="radio" class="postType" name="postType" value="private">Facebook</input>

          <input type="radio" class="postType" name="postType" value="private">Twitter</input>

          <input type="radio" class="postType" name="postType" value="private">Instagram</input>
          </div>
          <br>

          <label for="description">Change Description:</label>
          <input type="text" placeholder="Give your post a description..." name="description" value="<?php echo($post->getDescription()) ?>" required><br>

            <?php
            if ($post->getImage() != null) {
                echo(" <img src='../'" . $post->getImage() . "/>");
            } else {
                echo(" <img src='../__website_content/no_image.png'>");
            }
            ?>
            <br>
          <label for="chooseFile">Change Media:</label>
          <input type="file" placeholder="Choose a file or photo to upload..." name="image" value="<?php echo($post->getImage()) ?>" ><br>

            <label for="chooseLink">Change Link:</label>
            <input type="text" placeholder="URL of Post..." name="link" value="<?php echo($post->getLink()) ?>" required><br>

            <label for="chooseText">Change Text:</label>
            <input type="text" placeholder="Text of Post..." name="text" value="<?php echo($post->getText()) ?>" required><br>


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

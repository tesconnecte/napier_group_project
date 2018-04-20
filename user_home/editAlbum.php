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
    }else{
        try {
            $dao = new DAO();
            $useralbums = $dao->getAlbums($_SESSION['userid']);
            $ownsAlbum = false;
            for ($i = 0; $i < count($useralbums); ++$i) {
                $currentalbum = $useralbums[$i];
                if ($currentalbum->getId() == $_GET['id']) {
                    $ownsAlbum = true;
                }
            }
            if($ownsAlbum==false){
                header('Location: ../user_home/index.php');
            }
            $album=$dao->getAlbum($_GET['id']);
        } catch (Exception $e){
            header('Location: ../user_home/errorActionUser.php?errType=database&errID=1');
        }

     include("../header/htmlhead.php");
    echo('<link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">');
    include("../header/header.php");
    ?>
    <body>

<div class="container">
      <h1>Edit Album</h1><br>

      <div class="newAlbum">
      <form class="accountSettings" method="post"  action="../__treatment/edit_album.php?id=<?php echo ($album->getId()) ?>">

          <label for="title">Title:</label>
          <input type="text" placeholder="Give your album a title..." name="title" value="<?php echo($album->getName()) ?>" required><br>

          <div class="radioNA">
          <label for="privacySetting">Privacy Setting:</label><br>
          <input type="radio" class="privacySetting" name="privacy" value="public" <?php if($album->getisPublic()==true){echo("checked");}?>>Public</input><br>
          <input type="radio" class="privacySetting" name="privacy" value="private"<?php if($album->getisPublic()==false){echo("checked");}?>>Private</input>
          </div>
          <br>

          <button class="btn btn-primary btn-US">Save Changes</button><br>


      </form>
    </div>
</div><!--container-->

</body>
</html>
<?php
    }
}
?>

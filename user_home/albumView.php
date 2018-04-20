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
      <h1>Music Festival</h1><br>

      <div id="gallery row clearfix">

        <div class="userButtons">
            <a href="editAlbum.php" class="btn btn-primary btnNewAlbum">Edit Album</a>
            <input class="userSearch" type="text" placeholder="Search Albums" name="search" required>
            <a href="addPost.php" class="btn btn-primary btnAddPosts">Add Post</a>
        </div>

<!--     Main album gallery    -->

<h3>Click to edit posts</h3>

  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image one" title="Gallery Image One"/>
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image two" />
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image three" />
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image four" />
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image five" />
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image six" />
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image seven" />
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image eight" />
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image nine" />
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image ten" />
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image eleven" />
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image twelve" />
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image thirteen" />
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image fourteen" />
    </a></div>
  <div class="gallery-item">
    <a href="../user_home/editPost.php">
      <img src="../__website_content/lorem.jpg" alt="gallery image fifteen" />
    </a></div>
</div><!--gllery -->

<div class="loadMore">
<button class="btn btn-primary">Load More</button>
</div>

</div><!--container-->

</body>
</html>
<?php
}
?>

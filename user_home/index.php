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
    </head>
    <body>
    <h1>Welcome on Posted <?php echo($str_usr_name) ?></h1>
    <section>
        <h1>My albums :</h1>
        <?php
        if (($albums == null) || (empty($albums))) {
            echo("<p>You have no albums.</p>");

        } else {
            $current_album;
            for ($i = 0; $i < count($albums); ++$i) {
                $current_album = $albums[$i];
                $posts = $dao->getPosts($current_album->getId());
                echo(" <div>");
                echo(" <h2>" . $current_album->getName() . "</h2>");
                if ($current_album->getisPublic() == 1) {
                    echo("<p>Public</p>");
                } else {
                    echo("<p>Private</p>");
                }
                echo("<h4> My posts </h4>");
                for ($i = 0; $i < count($posts); ++$i) {
                    $current_post = $posts[$i];
                    if(!empty($current_post->getLink())) {
                        $link = $current_post->getLink();

                        if (strpos($link, 'facebook') !== false) {

                        } elseif (strpos($link, 'twitter') !== false) {

                        } elseif (strpos($link, 'instagram') !== false) {

                        } else {
                            echo(" <div>");
                            echo(" <p>" . $current_post->getDescription() . "</p>");
                            echo("</div>");
                        }
                    }
                    else {
                        echo(" <div>");
                        echo(" <p>" . $current_post->getDescription() . "</p>");
                        echo("</div>");
                    }
                }
                echo("</div>");

            }
        }
        ?>
    </section>

    <div class="container"> <!-- Jack's Code -->

        <h1>Welcome Back, username</h1>

    <div class="userButtons">
        <button class="btn btn-primary btnNewAlbum">New Album</button>
        <input class="userSearch" type="text" placeholder="Search Albums" name="search" required>
        <button class="btn btn-primary btnAddPosts">Add Post</button>
    </div>


      <div class="userGallery cf galleryLeft">
        <h3>Music Festival</h3>
      <div>
        <img src="../__website_content/lorem.jpg" /> <!-- Not sure whether or not posts will be displayed -->
      </div>                                            <!-- as images or text but this should fit both -->
      <div>
        <img src="../__website_content/lorem.jpg" />
      </div>
      <div>
        <img src="../__website_content/lorem.jpg" />
      </div>
      <div>
        <img src="../__website_content/lorem.jpg" />
      </div>
      <div>
        <img src="../__website_content/lorem.jpg" />
      </div>
      <div>
        <img src="../__website_content/lorem.jpg" />
      </div>
      <button class="btn btn-primary btnAP">Add Post</button>
      <button class="btn btn-primary btnEA">Edit Album</button><br>
    </div>


      <div class="userGallery cf galleryRight">
        <h3>Napier</h3>
      <div>
        <img src="../__website_content/lorem.jpg" /> <!-- Not sure whether or not posts will be displayed -->
      </div>                                            <!-- as images or text but this should fit both -->
      <div>
        <img src="../__website_content/lorem.jpg" />
      </div>
      <div>
        <img src="../__website_content/lorem.jpg" />
      </div>
      <div>
        <img src="../__website_content/lorem.jpg" />
      </div>
      <div>
        <img src="../__website_content/lorem.jpg" />
      </div>
      <div>
        <img src="../__website_content/lorem.jpg" />
      </div>
      <button class="btn btn-primary btnAP">Add Post</button>
      <button class="btn btn-primary btnEA">Edit Album</button><br>
    </div>

    <div class="loadMore">
    <button class="btn btn-primary">Load More</button>
    </div>

    </body>
    </html>
    <?php
}
?>

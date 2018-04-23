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
    echo('<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">');
    echo('<link rel="stylesheet" href="/resources/demos/style.css">');
    echo('<script src="../__scripts/jquery-ui.js"></script>');
    echo('<script type="text/javascript" src="../user_home/js/index.js"></script>');
    echo('<script type="text/javascript" src="../user_home/js/insta_post_through_js.js"></script>');

 include("../header/header.php");
    $dao = new DAO();

    $user = $dao->getUser($_SESSION['userid']);
    $str_usr_name = $user->getFirstName() . " " . $user->getSurname();

    $albums = $dao->getAlbums($_SESSION['userid']);
    $lastaid = 0;
    $nbAlbumsToDisplay=5;
    $ultimateAlbumID = 0;
    $nbInstaPosts=0;
    if(count($albums)>0){
        $albumToTreat = $albums[(count($albums)-1)];
        $ultimateAlbumID = $albumToTreat->getId();
    }

    ?>

    <body>
    <div class="container">
    <h1>Welcome Back,  <?php echo($str_usr_name) ?></h1>

        <div class="userButtons">
            <a href="newAlbum.php" class="btn btn-primary btnNewAlbum">New Album</a>
            <input class="userSearch" type="text" placeholder="Search Albums" name="search" required>
            <a href="addPost.php" class="btn btn-primary btnAddPosts">Add Post</a>
        </div>

<h1>My albums :</h1>
        <div id="albums">

        <?php
        if (($albums == null) || (empty($albums))) {
            echo("<p>You have no albums.</p>");

        } else {
            $current_album;
            for ($i = 0; $i < $nbAlbumsToDisplay; ++$i) {
                if($i<count($albums)) {

                    $current_album = $albums[$i];
                    $lastaid = $current_album->getId();
                    $posts = $dao->getPosts($current_album->getId());

                    echo(" <div class='userGallery'>");

                    if ($current_album->getisPublic() == 1) {
                        echo(" <h2>" . $current_album->getName() . "  - Public </h2>");
                    } else {
                        echo(" <h2>" . $current_album->getName() . " - Private </h2>");
                    }
                    echo("<div class='btnalbumcontrols'  autofocus><a href=\"../user_home/albumView.php?id=" . $current_album->getId() . "\" class=\"btn btn-primary btnVA\">View Album</a>
                        <a href=\"../user_home/addPost.php?albumid=" . $current_album->getId() . "\" class=\"btn btn-primary btnAP\">Add Post</a>
                            <a href=\"../user_home/editAlbum.php?id=" . $current_album->getId() . "\" class=\"btn btn-primary btnEA\">Edit Album</a>
                            <a href='javascript: void(0);' data-albumid='" . $current_album->getId() . "' data-albumname='" . $current_album->getName() . "' class=\"btn btn-primary btnDE\">Delete Album</a></div>");
                    //echo("<h4> My posts </h4>");
                    if (count($posts) == 0) {
                        echo("<div><h3>No posts in this album</h3></div>");
                    }
                    for ($j = 0; $j < 4; ++$j) {
                        if ($j < count($posts)) {
                            $current_post = $posts[$j];
                            if (!empty($current_post->getLink())) {
                                $link = $current_post->getLink();
                                if (strpos($link, 'facebook') !== false) {
                                    echo("<div class=\"fb-post gallery-item\"data-href=\"" . $link . "\" data-width=\"350\" data-height=\"350\"></div>");
                                } elseif (strpos($link, 'twitter') !== false) {
                                    $curl = curl_init();
                                    curl_setopt_array($curl, array(
                                        CURLOPT_RETURNTRANSFER => 1,
                                        CURLOPT_URL => 'https://publish.twitter.com/oembed?url=' . $link . '&maxwidth=350&maxheight=350'
                                    ));
                                    $result = curl_exec($curl);
                                    curl_close($curl);
                                    $result = json_decode($result, true);
                                    echo("<div class='gallery-item'>" . $result['html'] . "</div>"); // Displays the embedded tweet
                                } elseif (strpos($link, 'instagram') !== false) {
                                    echo("<div class='gallery-item' id='insta-".$nbInstaPosts."'><script type='text/javascript'>loadInstaPost('".$link."',".$nbInstaPosts.");</script> </div>");
                                    $nbInstaPosts++;
                                } else {
                                    echo(" <div class='gallery-item'><h3>" . $current_post->getText() . "</h3>");
                                    echo(" <img src='../__website_content/no_image.png'/></div>");
                                }
                            } else {
                                echo(" <div class='gallery-item'><h3>" . $current_post->getText . "</h3>");
                                echo(" <img src='../__website_content/no_image.png'/></div>");
                            }
                        }
                }
                    echo(" </div>");

                }
            }
        }
        ?>
     </div>
    <div class="loadMore">
        <?php echo("<button id='loadMoreAlbums' class='btn btn-primary'  data-lastaid='".$lastaid."' data-nbalbums='".$nbAlbumsToDisplay."' data-ultimateaid='".$ultimateAlbumID."'>Load More</button>"); ?>
    </div>

    </body>
    </html>
    <?php
}
?>

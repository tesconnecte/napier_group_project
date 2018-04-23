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
}else {
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
        if ($ownsAlbum == false) {
            header('Location: ../user_home/index.php');
        }
        $album = $dao->getAlbum($_GET['id']);
        $posts = $dao->getPosts($_GET['id']);
        $nbPostsToDisplay=9;
        $lastpid = 0;
        $lastAlbumPostID=0;
        $nbInstaPosts=0;
        if(count($posts)>0){
            $postToTreat = $posts[(count($posts)-1)];
            $lastAlbumPostID = $postToTreat->getId();
        }

    } catch (Exception $e) {
        header('Location: ../user_home/errorActionUser.php?errType=database&errID=1');
    }

    include("../header/htmlhead.php");
    echo('<link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">');
    echo('<script type="text/javascript" src="../user_home/js/loadMorePost.js"></script>');
    echo('<script type="text/javascript" src="../user_home/js/insta_post_through_js.js"></script>');
    include("../header/header.php");
    ?>
    <body>

    <div class="container">
        <h1><?php echo($album->getName()); ?></h1><br>

        <div id="gallery row clearfix">

            <div class="userButtons">
                <a href="editAlbum.php?<?php echo("id=".$album->getId()) ?>" class="btn btn-primary btnNewAlbum">Edit Album</a>
                <input class="userSearch" type="text" placeholder="Search Posts" name="search" required>
                <a href="addPost.php" class="btn btn-primary btnAddPosts">Add Post</a>
            </div>

            <!--     Main album gallery    -->

            <h3>Click to edit posts</h3>
            <div id="albumposts">
            <?php


                //COMPLETE HERE
                if (count($posts) == 0) {
                    echo("<div><p>No posts in this album</p></div>");
                }
                else {
                    for ($j = 0; $j < $nbPostsToDisplay; ++$j) {
                        if ($j < count($posts)) {
                            $current_post = $posts[$j];
                            $lastpid = $current_post->getId();
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
                }



            ?>
            </div>
        </div><!--gllery -->
        <?php
        if(count($posts)>=$nbPostsToDisplay){?>
            <div class="loadMore">
                <?php echo("<button id='loadMorePosts' class='btn btn-primary' data-albumid='".$album->getId()."' data-lastpid='".$lastpid."' data-nbposts='".$nbPostsToDisplay."' data-ultimatepid='".$lastAlbumPostID."'>Load More</button>"); ?>
            </div>
        <?php } ?>

    </div><!--container-->

    </body>
    </html>
    <?php
    }
}
?>

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
    } catch (Exception $e) {
        header('Location: ../user_home/errorActionUser.php?errType=database&errID=1');
    }

    include("../header/htmlhead.php");
    echo('<link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">');
    include("../header/header.php");
    ?>
    <body>

    <div class="container">
        <h1><?php echo($album->getName()); ?></h1><br>

        <div id="gallery row clearfix">

            <div class="userButtons">
                <a href="editAlbum.php" class="btn btn-primary btnNewAlbum">Edit Album</a>
                <input class="userSearch" type="text" placeholder="Search Posts" name="search" required>
                <a href="addPost.php" class="btn btn-primary btnAddPosts">Add Post</a>
            </div>

            <!--     Main album gallery    -->

            <h3>Click to edit posts</h3>
            <?php

                //COMPLETE HERE
                if (count($posts) == 0) {
                    echo("<div><p>No posts in this album</p></div>");
                }
                else {
                    for ($j = 0; $j < count($posts); ++$j) {
                        $current_post = $posts[$j];
                        if (!empty($current_post->getLink())) {
                            echo("<a href=\"../user_home/editPost.php?id=".$current_post->getId()."\">");
                            echo(" <div class=\"gallery-item\">");
                            $link = $current_post->getLink();
                            if (strpos($link, 'facebook') !== false) {
                                echo("<div class=\"fb-post\"data-href=\"" . $link . "\"></div>");
                            } elseif (strpos($link, 'twitter') !== false) {
                                //echo($link);
                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                    CURLOPT_RETURNTRANSFER => 1,
                                    CURLOPT_URL => 'https://publish.twitter.com/oembed?url=' . $link
                                ));
                                $result = curl_exec($curl);
                                curl_close($curl);
                                $result = json_decode($result, true);
                                echo($result['html']); // Displays the embedded tweet

                            } elseif (strpos($link, 'instagram') !== false) {
                                echo("<blockquote class=\"instagram-media\" data-instgrm-captioned data-instgrm-permalink=\"" . $link . "\" data-instgrm-version=\"8\" ></blockquote>");
                            } else {
                                echo(" <p>" . $current_post->getDescription() . "</p>");
                                echo(" <img src='../__website_content/no_image.png'/>");
                            }
                            echo("</div></a>");
                        } else {
                            echo("<a href=\"../user_home/editPost.php?id=".$current_post->getId()."\">");
                            echo(" <div class=\"gallery-item\">");
                            echo(" <p>" . $current_post->getDescription() . "</p>");
                            if ($current_post->getImage() != null) {
                                echo(" <img src='../'" . $current_post->getImage() . "/>");
                            } else {
                                echo(" <img src='../__website_content/no_image.png'/>");
                            }
                            echo(" </div></a>");
                        }
                    }
                }



            ?>

        </div><!--gllery -->

        <div class="loadMore">
            <button class="btn btn-primary">Load More</button>
        </div>

    </div><!--container-->

    </body>
    </html>
    <?php
    }
}
?>

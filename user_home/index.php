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
    <div class="container"> <!-- Jack's Code -->
    <h1>Welcome Back,  <?php echo($str_usr_name) ?></h1>

        <div class="userButtons">
            <button class="btn btn-primary btnNewAlbum">New Album</button>
            <input class="userSearch" type="text" placeholder="Search Albums" name="search" required>
            <button class="btn btn-primary btnAddPosts">Add Post</button>
        </div>

<h1>My albums :</h1>

        <?php
        if (($albums == null) || (empty($albums))) {
            echo("<p>You have no albums.</p>");

        } else {
            $current_album;
            for ($i = 0; $i < count($albums); ++$i) {
                $current_album = $albums[$i];
                $posts = $dao->getPosts($current_album->getId());

                if($i%2==0){
                    echo(" <div class='div2albums'>");
                    echo(" <div class='userGallery cf galleryLeft'>");
                } else {
                    echo(" <div class='userGallery cf galleryRight'>");
                }

                if ($current_album->getisPublic() == 1) {
                    echo(" <h3>" . $current_album->getName() ."  - Public </h3>");
                } else {
                    echo(" <h3>" . $current_album->getName() ." - Private </h3>");
                }
                //echo("<h4> My posts </h4>");
                if(count($posts)==0){
                    echo ("<div><p>No posts in this album</p></div>");
                }
                for ($j = 0; $j < count($posts); ++$j) {
                    $current_post = $posts[$j];
                    if(!empty($current_post->getLink())) {
                        $link = $current_post->getLink();
                        if (strpos($link, 'facebook') !== false) {
                            echo("<div class=\"fb-post\"data-href=\"".$link."\"></div>");
                        } elseif (strpos($link, 'twitter') !== false) {
                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                                CURLOPT_RETURNTRANSFER => 1,
                                CURLOPT_URL => 'https://publish.twitter.com/oembed?url='.$link
                            ));
                            $result = curl_exec($curl);
                            curl_close($curl);
                            $result = json_decode($result, true);
                            echo($result['html']); // Displays the embedded tweet

                        } elseif (strpos($link, 'instagram') !== false) {
                            echo("<blockquote class=\"instagram-media\" data-instgrm-captioned data-instgrm-permalink=\"".$link."\" data-instgrm-version=\"8\" ></blockquote>");
                        } else {
                            echo(" <div>");
                            echo(" <p>" . $current_post->getDescription() . "</p>");
                            echo(" <img src='../__website_content/no_image.png'/>");
                            echo("</div>");
                        }
                    }
                    else {
                        echo(" <div>");
                        echo(" <p>" . $current_post->getDescription() . "</p>");
                        echo(" <img src='../__website_content/no_image.png'/>");
                        echo("</div>");
                    }
                }

                echo ("<button class=\"btn btn-primary btnAP\">Add Post</button>
                            <button class=\"btn btn-primary btnEA\">Edit Album</button><br>");

                echo(" </div>");
                if($i%2==0){
                    echo(" </div>");
                }

            }
        }
        ?>


<!--

      <div class="userGallery cf galleryLeft">
        <h3>Music Festival</h3>
      <div>
        <img src="../__website_content/lorem.jpg" /> <!-- Not sure whether or not posts will be displayed -->
      <!--</div>                                            <!-- as images or text but this should fit both -->
     <!-- <div>
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
     <!-- </div>                                            <!-- as images or text but this should fit both -->
      <!--<div>
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
    </div>-->

    <div class="loadMore">
    <button class="btn btn-primary">Load More</button>
    </div>

    </body>
    </html>
    <?php
}
?>

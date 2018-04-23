<?php
$link = $_POST["url"];
switch ($_POST["social"]) {
  case 'facebook':
  $translink = str_replace(':','%3A',$link);
  $translink = str_replace('/','%2F',$translink);
  $translink = $translink.'&amp';
    echo '<div class="fb-post fb_iframe_widget" data-href="'.$link.'" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=1110&amp;href=https%3A%2F%2Fwww.facebook.com%2Flecultedapophis%2Fposts%2F2053606981561198&amp;locale=en_US&amp;sdk=joey"><span style="vertical-align: bottom; width: 552px; height: 344px;"><iframe name="f3745aed85b3f0c" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:post Facebook Social Plugin" src="https://www.facebook.com/v2.5/plugins/post.php?app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FFdM1l_dpErI.js%3Fversion%3D42%23cb%3Df27fbe0b561e638%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%252Ff22f4308ec9e74%26relation%3Dparent.parent&amp;container_width=1110&amp;href='.$translink.';locale=en_US&amp;sdk=joey"></iframe></span></div>';
    break;
  case 'instagram':
    echo '<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="'.$link.'" data-instgrm-version="8" ></blockquote>';
    break;
  case 'twitter':
    echo "<p>not implemented yet</p>";
    break;

  default:
    echo "<p>not implemented yet</p>";
    break;
}

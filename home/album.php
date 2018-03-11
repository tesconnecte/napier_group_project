<?php
session_start();
 if(isset($_SESSION['userid'])){
     header('Location: ../user_home/index.php');
 }
 include ("../header/htmlhead.php");
?>

<link rel="stylesheet" href="../home/css/style.css" alt="style" width="50 px" height="50px">
<body>
<?php
include ("../header/header.php");
?>

<div class="container">
    <h1>Album Template</h1>

    <?php if(isset($_GET['error'])){
        if($_GET['error']=='1'){
            echo ("<h3 class='error'>Connection error: Please make sure e-mail and password are correct</h3>");//It would be good to apply a red color to the class error in CSS
        } else if($_GET['error']=='0'){
            echo ("<h3 class='error'>Connection error: E-mail or password is not filled</h3>");
        }else if($_GET['error']=='2'){
            echo ("<h3 class='error'>Access error: You must be connected to access the page you're trying to reach</h3>");
        }else{
            echo ("<h3 class='error'>Connection error: unknown error, please contact administrator</h3>");
        }
    } ?>
<body>

  <div class="gallery cf">
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
  <button class="btn btn-primary">Edit Album</button><br>
</div>



</div><!--container-->
</body>
</html>

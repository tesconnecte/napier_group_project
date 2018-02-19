<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once ("../__class/autoload_Class.php");
?>

<!-- navbar -->
<link rel="stylesheet" href="../header/css/style.css" alt="style" width="50 px" height="50px">
<nav class="navbar">

    <div class="container">

        <ul class="nav nav-left">
            <li><a href="../home/index.php"><h2>Posted</h2></a></li>
        </ul>
        <ul class="nav nav-right">
            <li>

<?php
    if(!isset($_SESSION['userid'])){?>
        <img src="../__website_content/logIn.png" height="8%" alt="log in"/><a href="../home/logIn.php">Log In</a>
  <?php  } else{
        $dao = new DAO();
        $user = $dao->getUser($_SESSION['userid']);

        $str_usr_name = $user->getFirstName() ." ". $user->getSurname();

        ?>

        <img src="../__website_content/logIn.png" height="8%" alt="log in"/><a href="../user_home/index.php"><?php echo ($str_usr_name);?></a>
   <?php } ?>
            </li>
        </ul>
</nav>
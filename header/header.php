<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once ("../__class/autoload_Class.php");
?>

<!-- navbar -->
<link rel="stylesheet" href="../header/css/style.css" alt="style" width="50 px" height="50px">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="../header/js/dd.js"></script>

<nav class="navbar">

    <div class="container">
        <ul class="nav nav-left">

<?php
    if(!isset($_SESSION['userid'])){?>
            <li><a href="../home/index.php"><h2>Posted</h2></a></li>
        </ul>
        <ul class="nav nav-right">
            <li>
        <a href="../home/logIn.php">Log In</a>
  <?php  } else{
        $dao = new DAO();
        $user = $dao->getUser($_SESSION['userid']);
        $str_usr_firstname = $user->getFirstName();
        $str_usr_lastname = $user->getSurname();
        $str_usr_firstname_length = strlen($str_usr_firstname);
        $str_usr_lastname_length = strlen($str_usr_lastname);
        if (($str_usr_firstname_length+$str_usr_lastname_length+1)<=10){
            $str_usr_name = $str_usr_firstname." ".$str_usr_lastname;
        } elseif (($str_usr_firstname_length<=8)&&($str_usr_firstname_length+$str_usr_lastname_length+1)>10){
            $str_usr_name = $str_usr_firstname." ".substr($str_usr_lastname,0,1);
        } elseif ($str_usr_firstname_length<=10){
            $str_usr_name = $str_usr_firstname;
        } else {
            $str_usr_name = substr($str_usr_firstname,0,10);
        }
        ?>
            <li><a href="../user_home/index.php"><h2>Posted</h2></a></li>
        </ul>

    <ul class="nav nav-right">

<ul class="navDD nav-right">

    <li class="button-dropdown">
      <a href="javascript:void(0)" class="dropdown-toggle">
        <img src="../__website_content/logIn.png" height="50%" alt="log in"/><?php echo ($str_usr_name);?>
      </a>

      <ul class=" dropdown-menu dropdown-menu-right">
        <li>
          <a href="editProfile.php">
            Edit Profile
          </a>
        </li>
        <li>
          <a href="#">
            New Album
          </a>
        </li>
        <li>
          <a href="#">
            Add Post
          </a>
        </li>
        <li>
          <a href="#">
            Log Out
          </a>
        </li>
      </ul>
    </li>
  </ul>
    </ul>
  </li>

   <?php } ?>
            </li>
        </ul>
</nav>

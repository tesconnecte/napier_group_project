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
    echo('<link rel="stylesheet" href="../user_home/css/style.css" alt="style" width="50 px" height="50px">');

    include("../header/header.php");
    ?>
    <body>

<div class="container">
      <h1>Edit Profile</h1><br>

      <div class="userSettings">
      <a href="accountDetails.php" class="btn btn-primary btn-US">Account Details</a><br>

      <a href="changePassword.php" class="btn btn-primary btn-US">Password Settings</a>
    </div>
</div><!--container-->

</body>
</html>
<?php
}
?>

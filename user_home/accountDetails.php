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
    echo('<link href="../__scripts/jquery-ui.css" rel="stylesheet">');
    echo('<link href="../__scripts/theme.css" rel="stylesheet">');
    echo('<script src="../__scripts/jquery-ui.js"></script>');
    echo('<script src="../user_home/js/accountDetails.js"></script>');

    include("../header/header.php");
    $dao = new DAO();

    $user = $dao->getUser($_SESSION['userid']);
    $birthdateFormat = date("d-m-Y", strtotime($user->getBirthDate()));
    ?>
    <body>

<div class="container">
      <h1>Account Details</h1><br>
      <h3>Edit fields to be changed</h3><br>

      <div class="userSettings">
      <form class="accountSettings" method="post"  action="../__treatment/update_account_details.php">

          <label for="fname">First Name:</label>
          <input type="text" placeholder="Enter first name..." name="fname" value="<?php echo($user->getFirstName())?>" required>

          <label for="sname">Surname:</label>
          <input type="text" placeholder="Enter surname..." name="sname" value="<?php echo($user->getSurname())?>"required>

          <label for="email">Email:</label>
          <input type="email" placeholder="Enter email address..." name="email" value="<?php echo($user->getEmail())?>" required>

          <label for="bdate">Date of Birth:</label>
          <input type="text" placeholder="Click to enter your birth date" name="bdate" id="bdate" value="<?php echo($birthdateFormat)?>"><br>

          <button class="btn btn-primary btn-US">Save Changes</button><br>


      </form>
    </div>
</div><!--container-->

</body>
</html>
<?php
}
?>

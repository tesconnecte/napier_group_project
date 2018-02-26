<?php
session_start();
if(isset($_SESSION['userid'])){
    header('Location: ../user_home/index.php');
}
include ("../header/htmlhead.php");
?>

<link rel="stylesheet" href="../signup_complete/css/style.css" alt="style" width="50 px" height="50px">
<body>
<?php
include ("../header/header.php");
?>

<div class="container">
    <h1>Sign up process complete and successful</h1>
    <p>Log in to start using Posted</p>
</div>
</body>
</html>
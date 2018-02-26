<?php include ("../header/htmlhead.php"); ?>
<link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">
<link href="../__scripts/jquery-ui.css" rel="stylesheet">
<link href="../__scripts/theme.css" rel="stylesheet">
<script src="../__scripts/jquery-ui.js"></script>
<script src="../home/js/signup.js"></script>
<!--<link rel="stylesheet" href="css/reset.css" alt="reset" width="50 px" height="50px">-->

<body>
<?php
include ("../header/header.php");
?>

<div class="container">
    <h1>Create Account</h1>
    <?php if(isset($_GET['error'])){
        if($_GET['error']=='0'){
            echo ("<h3 class='error'>Account creation error: Please make sure all the fields are filled correctly</h3>");//It would be good to apply a red color to the class error in CSS
        } else if($_GET['error']=='1'){
            echo ("<h3 class='error'>Account creation error: Passwords do not match</h3>");
        }else if($_GET['error']=='2'){
            echo ("<h3 class='error'>Account creation error: An account with this email already exists. Log in.</h3>");
        }else if(($_GET['error']=='dberror')&&(isset($_GET['msg']))){
            echo ("<h3 class='error'>Server error : ". $_GET['msg'] ."</h3>");
        }else if($_GET['error']=='dberror'){
            echo ("<h3 class='error'>Servor error: Unknown error please contact administrator</h3>");
        }else{
            echo ("<h3 class='error'>Account creation error : unknown error, please contact administrator</h3>");
        }
    } ?>

<div class="logIn" action="../__treatment.php">

    <label for="fname">First Name</label>
    <input type="text" placeholder="Enter First Name" name="fname" required>

    <label for="sname">Surname</label>
    <input type="text" placeholder="Enter Surname" name="sname" required>

    <label for="email">Email</label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="uname">Username</label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="ubdate">Birth date</label>
    <input type="text" placeholder="Click to enter your birth date" name="ubday" id="ubday">

    <label for="pword">Password</label>
    <input type="password" placeholder="Enter Password" name="pword" required>

    <label for="cpword">Confirm Password</label>
    <input type="password" placeholder="Confirm Password" name="cpword" required><br>

    <button class="btn btn-primary">Sign Up</button>


</div>
<br>
</div><!--container-->
</body>
</html>

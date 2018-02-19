<?php include ("../header/htmlhead.php"); ?>
<link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">


<?php
include ("../header/header.php");
?>
<head>
    <link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">
</head>
<body>
<div class="container">
    <h1>Create Account</h1>

<div class="logIn">

    <label for="fname">First Name</label>
    <input type="text" placeholder="Enter First Name" name="fname" required>

    <label for="uname">Surname</label>
    <input type="text" placeholder="Enter Surname" name="sname" required>

    <label for="email">Email</label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="uname">Username</label>
    <input type="text" placeholder="Enter Username" name="uname" required>

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

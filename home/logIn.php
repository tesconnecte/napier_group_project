<?php
session_start();
 if(isset($_SESSION['userid'])){
     header('Location: ../user_home/index.php');
 }
 include ("../header/htmlhead.php");
?>
<<<<<<< HEAD
<link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">
<body>

<?php
include ("../header/header.php");
?>
=======

<!DOCTYPE html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Posted</title>

  <link rel="shortcut icon" type="image/png" href="img/logo2.png"/>
  <link rel="shortcut icon" type="image/png" href="http://eg.com/logo2.png"/>

    <link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,700&subset=latin,latin-ext">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Indie+Flower">

</head>
<body>

  <!-- navbar -->
  <nav class="navbar">

    <div class="container">

      <h1 class="logo"><a href="index.php">Posted</a></h1>
      <ul class="nav nav-right">
        <li><a href="logIn.php">Log In</a></li>
      </ul>
    </div>

  </nav><!--/.navbar-->


</nav>
>>>>>>> bf804b10d4c4659922cb671f3158d979f1d46e53

<div class="container">
    <h1>Log In</h1>

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

<form class="logIn" method="post"  action="../__treatment/login.php">

    <label for="uname">Username</label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <label for="pword">Password</label>
    <input type="password" placeholder="Enter Password" name="pword" required><br>

    <button class="btn btn-primary">Log In</button><br>

    <span class="psw">Forgot <a href="#">password?</a></span>


</form>

</div><!--container-->
</body>
</html>

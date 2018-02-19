<!DOCTYPE html>
<meta charset="utf-8"/>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Posted</title>
  <link rel="shortcut icon" type="image/png" href="img/logo2.png"/>
  <link rel="shortcut icon" type="image/png" href="http://eg.com/logo2.png"/>

    <link rel="stylesheet" href="css/reset.css" alt="reset" width="50 px" height="50px">
    <link rel="stylesheet" href="css/style.css" alt="style" width="50 px" height="50px">
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

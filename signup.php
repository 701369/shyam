<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  include 'partials/_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  $exits = false;
  if (($password == $cpassword) && $exits == false) {
    $sql = "INSERT INTO `users` ( `username`, `password`, `datetime`) VALUES ( '$username', '$password', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $showAlert = true;
    } else {
      $showError = "Passwords didn't match";

    }


  }

}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>
   
    <?php require 'partials/_nav.php' ?>

    <?php
    if ($showAlert) {
      echo
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>success!</strong>your account is create now you can login
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    if ($showError) {
      echo
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR!</strong>' . $showError . '
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }

    ?>

    <div class="container">
        <h1 class="text-center">Signup to our Website</h1>
        <form action="/loginsytems/signup.php" method="post">
  <div class="form-group my-4">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="name" name="username" aria-describedby="emailHelp" placeholder="username">
  </div>
  <div class="form-group my-4">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <div class="form-group my-4">
    <label for="cpassword">ConfirmPassword</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary my-4">SignUp</button>
</form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
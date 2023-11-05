<?php
  include_once '../controller/db.php';
  session_start(); 

  if (isset($_SESSION['user'])) {
    header("Location: /page/app.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Kamagru</title>
  <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>
  <div class="container">

    <div class="cont_item left">
      <h1>
        K
      </h1>
    </div>

    <div class="cont_item right">
      <p class="right_text right_title">
        Discover the world of Kamagru
      </p>
      <div class="register_group">
      <p class="right_text right_subtitle">
        Register
      </p>
      <form name="register" action="/controller/proccess.php" method="post">
        <input type="email" name="email" id="email" placeholder="Email" class="input_control" required>
        <input type="password" name="password" id="password" placeholder="Password" class="input_control" required>
        <input type="password" name="confirm_password" id="password" placeholder="Confirm Password" class="input_control" required>
        
        <button type="submit" name="register"  class="btn">Register</button>
      </form>
      </div>
      <div class="signin_group">
        <p id="already">
            Already have an account?
        </p>
        <a href="/page/login.php" class="btn signin_btn">
            Login
        </a>
      </div>
    </div>
  </div>
</body>

</html>

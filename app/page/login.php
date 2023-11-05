<?php session_start(); 


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
  <title>Login | Kamagru</title>
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
        Login
      </p>
      <form name="login" action="/controller/proccess.php" method="post">
        <input type="email" name="email" id="email" placeholder="Email" class="input_control" required>
        <input type="password" name="password" id="password" placeholder="Password" class="input_control" required>
       
        <button type="submit" name="login"  class="btn">Login</button>
      </form>
      </div>
      <div class="signin_group">
        <p id="already">
          Don't have an account?
        </p>
        <a href="/page/register.php" class="btn signin_btn">
          Register
        </a>
      </div>
      <a href="/page/forgot-password.php" class="forget">
        Forgot Password?
      </a>
    </div>
  </div>
</body>

</html>

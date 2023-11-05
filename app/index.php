<?php 
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
  <title>Kamagru - Full Stack Web App</title>
  <link rel="stylesheet" href="assets/style/style.css">
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
      <p class="right_text right_subtitle">
        Join Now.
      </p>
      <div class="register_group">
        <a href="#" class="btn social_btn">
          <img src="assets/icons/google.png" alt="google">
          Sign up with Google
        </a>
        <a href="#" class="btn social_btn">
          <img src="assets/icons/github.png" alt="github">
          Sign up with Github
        </a>
        <div id="or">OR</div>
        <a href="/page/register.php" class="btn">Register</a>
        <span class="terms_text">
          By signing up, you agree to the Terms of Service and Privacy Policy, including Cookie Use.
        </span>
      </div>
      <div class="signin_group">
        <p id="already">
          Already a member?
        </p>
        <a href="/page/login.php" class="btn signin_btn">Login</a>
      </div>
    </div>
  </div>
</body>

</html>

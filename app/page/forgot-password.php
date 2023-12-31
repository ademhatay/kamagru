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
  <title>Reset Password | Kamagru</title>
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
        <div class="register_group">
        <p class="right_text right_subtitle">
        Forgot Password?
        </p>
        <span>
          Enter your email address and we'll send you a link to reset your password.
        </span>
        <form action="../controller/proccess.php" method="POST" name="forgot_password">
          <input type="email" name="email" id="email" placeholder="Email" class="input_control">
          <button type="submit" name="forgot_password" class="btn">Send</button>
        </form>
      </div>

      <div class="signin_group">
        <p id="already">
            Did you remember your password?
        </p>
        <a href="/page/login.php" class="btn signin_btn">
            Login
        </a>
      </div>
      
    </div>
  </div>
</body>

</html>

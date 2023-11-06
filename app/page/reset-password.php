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
        Reset Password
        </p>
        <span>
         Enter new password
        </span>
        <form action="../controller/proccess.php" method="POST" name="new_password">
            <input type="password" name="password" id="password" placeholder="Password" class="input_control" required>
            <input type="password" name="password_repeat" id="password_repeat" placeholder="Repeat Password" class="input_control" required>
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
          <button type="submit" name="new_password" class="btn">Send</button>
        </form>
      </div>
      
    </div>
  </div>
</body>

</html>

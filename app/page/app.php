<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /index.php");
  exit();
}

// butona basıldığında sessionu sil ve index.php'ye yönlendir
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: /");
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App | Kamagru</title>
</head>
<body>

    <form action="" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>


</body>
</html>

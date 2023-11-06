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
    <link rel="stylesheet" href="/assets/style/app.css">
</head>
<body>

   <div class="container">
    <header class="cont_item">
        <div class="logo">
            <a href="/page/app.php">Kamagru</a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="/page/app.php">
                        <img src="/assets/icons/home-outlined.png" alt="home">
                        Home
                    </a>
                </li>
                <li><a href="/page/app.php">
                <img src="/assets/icons/search-outlined.png" alt="search">
                    Search
                </a></li>
                <li><a href="/page/app.php">
                    <img src="/assets/icons/notification-outlined.png" alt="notification">
                    Notifications
                </a></li>
                <li><a href="/page/app.php">
                    <img src="/assets/icons/create-outlined.png" alt="create">
                    Create
                </a></li>
                <li><a href="/page/app.php">
                    <img src="/assets/icons/account.png" alt="profile">
                    Profile</a></li>
            </ul>
        </nav>
        <form action="" method="post" class="logout">
            <button type="submit" class="btn" name="logout">Logout</button>
        </form> 
    </header>

        <main class="cont_item main">
            2
        </main>

        <aside class="cont_item">
            3
        </aside>
   </div>

</body>
</html>

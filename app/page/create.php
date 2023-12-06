<?php

session_start();

if (!isset($_SESSION['user_id'])) {
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
    <title>Create | Kamagru</title>
    <link rel="stylesheet" href="/assets/style/app.css">
</head>
<body>

   <div class="container">
    <header class="">
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
                <li><a href="/page/search.php">
                <img src="/assets/icons/search-outlined.png" alt="search">
                    Search
                </a></li>
                <li><a href="/page/gallery.php">
                <img src="/assets/icons/explore.png" alt="search">
                    Gallery
                </a></li>
                <li><a href="/page/notifications.php">
                    <img src="/assets/icons/notification-outlined.png" alt="notification">
                    Notifications
                </a></li>
                <li><a href="/page/create.php">
                    <img src="/assets/icons/create-outlined.png" alt="create">
                    Create
                </a></li>
                <li><a href="/page/profile.php">
                    <img src="/assets/icons/account.png" alt="profile">
                    Profile</a></li>
            </ul>
        </nav>
        <form action="" method="post" class="logout">
            <button type="submit" class="btn" name="logout">Logout</button>
        </form> 
    </header>

        <main class="cont_item main">
            <div class="card_group">
                <input type="text" name="title" id="title" placeholder="Title" class="input_comment">
                <select name="cameras" id="cameras" class="input_comment">
                </select>
                <button class="btn my-5" id="start">Start</button>
                    <video id="video" autoplay></video>
                <div class="btn_group">
                    <button class="btn filterbox-toggle" id="filterBtn">Filters</button>
                    <button class="btn" id="upload">Upload</button>
                </div>
                <div class="btn_group">
                    <button class="btn" id="capture">Capture</button>
                    <button class="btn" id="clear">Clear</button>
                </div>
                <canvas id="canvas"></canvas>
                <div id="photos"></div>
                <div class="filterbox">
                        <div class="close">
                            CLOSE
                        </div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                        <div class="filter"></div>
                </div>
            </div>
            
        </main>
   </div>

   <script src="/assets/js/app.js"></script>

</body>
</html>

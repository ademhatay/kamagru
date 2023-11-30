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
    <title>Search | Kamagru</title>
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
             <input type="text" name="search" id="search" placeholder="Search" class="input_comment">
                <button type="submit" class="btn" name="search">Search</button> 
                
                <div class="card">
                    <div class="card_header">
                        <p class="card_header_left_text_name">Username</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card_header">
                        <p class="card_header_left_text_name">Username</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card_header">
                        <p class="card_header_left_text_name">Username</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card_header">
                        <p class="card_header_left_text_name">Username</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card_header">
                        <p class="card_header_left_text_name">Username</p>
                    </div>
                </div>
           </div>
        </main>
   </div>
</body>
</html>

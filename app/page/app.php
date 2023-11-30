<?php

require_once("../controller/functions.php");

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
                <div class="card">
                    <div class="card_header">
                       <div class="card_header_info">
                        <img src="/assets/icons/account.png" alt="profile">
                        <span class="username">username</span>
                       </div>
                        <div class="card_header_info">
                            <img src="/assets/icons/clock.png" alt="clock">
                            <span>31m</span>
                        </div>
                    </div>
                    <div class="card_body">
                        <img src="/assets/images/example.png" alt="image">
                    </div>
                    <div class="card_footer">
                      <div class="card_footer_up">
                        <div class="card_footer_left">
                        <img class="icon" src="/assets/icons/notification-outlined.png" alt="like">
                        <img class="icon" src="/assets/icons/comment-outlined.png" alt="comment">
                      </div>
                      <div class="card_footer_right">
                        <img class="icon" src="/assets/icons/save-outlined.png" alt="save">
                      </div>
                      </div>
                      <div class="card_footer_bottom">
                        <div class="likes">
                            123 likes
                        </div>
                        <div>
                            <span>username</span>
                            <span class="card_description">
                            <?php
                            echo convertHashtags("U18 Millî Takımımızın 13-21 Kasım tarihleri arasında Antalya'da yapacağı hazırlık kampının aday kadrosu açıklandı. #BizimÇocuklar #oSeneBuSene #hastagsss");
                            ?>
                            </span>
                        </div>
                      </div>
                    </div>
                    <div class="card_comment">
                        <div class="addComment">
                            <input class="input_comment" type="text" placeholder="Add a comment...">
                            <button type="submit" class="btn commentBtn">Add comment</button>
                        </div>
                        <div class="comments">
                            <div class="comment">
                                <span class="username">username</span>
                                <span class="comment_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</span>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="card">
                    <div class="card_header">
                       <div class="card_header_info">
                        <img src="/assets/icons/account.png" alt="profile">
                        <span class="username">username</span>
                       </div>
                        <div class="card_header_info">
                            <img src="/assets/icons/clock.png" alt="clock">
                            <span>31m</span>
                        </div>
                    </div>
                    <div class="card_body">
                        <img src="/assets/images/example.png" alt="image">
                    </div>
                    <div class="card_footer">
                      <div class="card_footer_up">
                        <div class="card_footer_left">
                        <img class="icon" src="/assets/icons/notification-outlined.png" alt="like">
                        <img class="icon" src="/assets/icons/comment-outlined.png" alt="comment">
                      </div>
                      <div class="card_footer_right">
                        <img class="icon" src="/assets/icons/save-outlined.png" alt="save">
                      </div>
                      </div>
                      <div class="card_footer_bottom">
                        <div class="likes">
                            123 likes
                        </div>
                        <div>
                            <span>username</span>
                            <span class="card_description">
                           <?php 
                            echo convertHashtags("U18 Millî Takımımızın 13-21 Kasım tarihleri arasında Antalya'da yapacağı hazırlık kampının aday kadrosu açıklandı. #BizimÇocuklar");
                            ?>
                            </span>
                        </div>
                      </div>
                    </div>
                    <div class="card_comment">
                        <div class="addComment">
                            <input class="input_comment" type="text" placeholder="Add a comment...">
                            <button type="submit" class="btn commentBtn">Add comment</button>
                        </div>
                        <div class="comments">
                            <div class="comment">
                                <span class="username">username</span>
                                <span class="comment_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</span>
                            </div>
                            <div class="comment">
                                <span class="username">username</span>
                                <span class="comment_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</span>
                            </div>
                            <div class="comment">
                                <span class="username">username</span>
                                <span class="comment_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</span>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </main>

        <aside class="cont_item rightbar">
            <h4>
                Notifications
            </h4>
            <a href="/page/notifications.php" class="btn">Show all</a>
        </aside>
   </div>

</body>
</html>

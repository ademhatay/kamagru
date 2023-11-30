<?php

require_once '../controller/db.php';

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
    <title>Profile | Kamagru</title>
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
            <table class="table">
                <thead>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Email Notification</th>
                    <th>Action</th>
                </thead>
                <tbody>

                <?php
                  $userId = $_SESSION['user_id'];
                    $sql = "SELECT * FROM users WHERE _id = '$userId'";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <tr>
                        <form action="/controller/proccess.php" method="post" name="profile">
                            <td data-label="Email">
                                <input type="text" name="email" value="<?php echo $user['_email']; ?>" class="input_comment"  disabled />
                            </td>
                            <td data-label="password">
                                <input type="password" name="password" placeholder="Enter new password..." class="input_comment"  />
                            </td>
                            <td data-label="email notification">
                                <select name="_notification_permission" id="_notification_permission" class="input_comment">
                                    <option value="1" <?php if ($user['_notification_permission'] == 1) echo 'selected'; ?>>Yes</option>
                                    <option value="0" <?php if ($user['_notification_permission'] == 0) echo 'selected'; ?>>No</option>
                                </select>
                            </td>
                            <td data-label="delete">
                                <button type="submit" name="profile" class="btn">Update</button>
                            </td>
                        </form>
                    </tr>
                
                </tbody>
            </table>
        </main>
   </div>
</body>
</html>

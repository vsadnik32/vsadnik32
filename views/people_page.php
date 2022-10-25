<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Style/style.css">
    <title>страница <?= $_GET['user'] ?></title>
</head>

<body>
    <div class="main">
        <div class="left_stack">
            <ul>
                <li>
                    <h1><?= $_SESSION['nick'] ?></h1>
                </li>
                <li><a class="list_a" href="you_page.php">твоя страница</a></li>
                <li><a class="list_a" href="../controllers/Frends/frends_controller.php">твои друзья</a></li>
                <li><a class="list_a" href="../controllers/Frends/frends_controller.php">твои сообщения</a></li>
                <li><a class="list_a" href="../controllers/Entr_Log/out_controller.php">выход с акаунта</a></li>
            </ul>
        </div>
        <div class="content_page">
            
        </div>
        <div class="avatar">
            <img src="img/avatar.png" alt="avatar_photo" class="img">
        </div>
    </div>

</body>

</html>
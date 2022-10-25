<?php
session_start();
$rezolt_post = json_decode($_SESSION['post_user'], true);
// echo"<pre>";
// print_r($rezolt_post);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Style/style.css">
    <title>твоя страница</title>
</head>

<body>
    <div class="main">
        <div class="left_stack">
            <ul>
                <li>
                    <h1><?= $_SESSION['nick'] ?></h1>
                </li>
                <li><a class="list_a" href="../controllers/Post/post_controller.php">твои страница</a></li>
                <li><a class="list_a" href="../controllers/Frends/frends_controller.php">твои друзья</a></li>
                <li><a class="list_a" href="../controllers/Frends/frends_controller.php">твои сообщения</a></li>
                <li><a class="list_a" href="../controllers/Entr_Log/out_controller.php">выход с акаунта</a></li>
            </ul>
        </div>

        <div class="body_content">
            <div class="avatar">
                <img src="img/avatar.png" alt="avatar_photo" class="img">
            </div>
            <div class="content"></div>
            <div class="write_post">
                <form method="POST" action="../controllers/Post/post_controller.php">
                    <textarea class="text_block" placeholder="Напиши свой пост" name="post"></textarea>
                    <br>
                    <div class="add">
                        <input class="add-btn" type="submit" name="Оправить">
                    </div>
                    <br>
                </form>
            </div>

            <div class="read_post">

                <?php foreach ($rezolt_post as $key => $value) : ?>
                    <div class="post">
                        <div class="text_post">
                            <h4> <?= $value['text']; ?></h4>
                        </div>
                        <div class="date">
                            <div class="date_post">
                                <p><?= $value['date']; ?></p>
                            </div>
                        </div>
                        <div class="dell">
                            <button class="dell"><a href="../controllers/Post/post_controller.php?id=<?= $value['id'] ?>">Удалить</a></button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


        </div>
    </div>


</body>

</html>
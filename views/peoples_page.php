<?php
session_start();

if (!isset($_SESSION['nick'])) {
    header('Location:../index.php');
}
$almost_json = $_SESSION['almost'];
$almost_js = json_decode($almost_json, true);

$frend_json = $_SESSION['frends'];
$frends_js = json_decode($frend_json, true);

$people_json = $_SESSION['people'];
$people_js = json_decode($people_json, true);





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
    <title>друзья</title>
</head>

<body>
    <div class="main">
        <div class="left_stack">
            <ul>
                <li>
                    <h1><?= $_SESSION['nick'] ?></h1>
                </li>
                <li><a class="list_a" href="you_page.php">твои страница</a></li>
                <li><a class="list_a" href="../controllers/Frends/frends_controller.php">твои друзья</a></li>
                <li><a class="list_a" href="../controllers/Frends/frends_controller.php">твои сообщения</a></li>
                <li><a class="list_a" href="../controllers/Entr_Log/out_controller.php">выход с акаунта</a></li>
            </ul>
        </div>

        <div class="list_frend">
            <div class="frend_list">

                <form>
                    <h1>твои друзья</h1>
                    <?php if (is_array($frends_js)) : ?>
                        <?php foreach ($frends_js as $key => $value) : ?>
                            <div class="list-people">
                                <a href="people_page.php?user=<?= $value["nick"] ?>"> <?php echo $value["name"]; ?></a> <button class="dell-frend"><a href="../controllers/Frends/frends_controller.php?dell=<?= $value["nick"] ?>">УДАЛИТЬ ИЗ ДРУЗЕЙ</a></button>
                            </div>
                            <br>

                        <?php endforeach; ?>
                    <?php endif; ?>

                </form>
            </div>
            <div class="frend_list">

                <form>
                    <h1>твои возможные друзья</h1>
                    <?php if (is_array($people_js)) : ?>

                        <?php foreach ($people_js as $key => $value) : ?>

                            <div class="list-people">
                                <?php echo $value["name"]; ?> <button id="add-frend"><a href="../controllers/Frends/frends_controller.php?add=<?= $value["nick"] ?>">ДОБАВИТЬ В ДРУЗЬЯ</a></button>
                            </div>
                            <br>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </form>
            </div>
            <br>
            <div class="frend_list">
                <form>
                    <h1>Запрос в друзья</h1>
                    <?php if (is_array($almost_js)) : ?>
                        <?php foreach ($almost_js as $key => $value) : ?>
                            <?php echo $value["name"]; ?> <button id="all-frend"><a href="../controllers/Frends/frends_controller.php?confirm=<?= $value["nick"] ?>">ПОДТВЕРДИТЬ ДРУЖБУ</a></button>
                            <br>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
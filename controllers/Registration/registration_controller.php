<?php  // страница где происходит логика регистрации пользователя
session_start();

require_once '../../models/Frend.php';
include 'classRegistr_controller.php';

$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
$nick = htmlspecialchars($_POST['nick'], ENT_QUOTES, 'UTF-8');


$user = new Registration();
$user = $user->dat_aval($name, $nick, $password);

if ($user == '1') {
    $usr = new Bd(); //создаем екземпляр класса 
    $status_frend= new Frend();
    

    $pas_hash = password_hash($password, PASSWORD_DEFAULT); //используем функцию для хеширования пароля

    $usr->Add($name, $pas_hash, $nick); //используем метод для добавления даных в базу данных
    $status_frend->Add_statusFrend($nick);
    $_SESSION['mesage_info'] = 'Регистрация прошла успешно' . '<br>' . 'введите свои данные для входа в сситему';
    header('Location:/index.php');
    exit();
} else {
    $_SESSION['mesage_info'] = $user;
    header('Location:/index.php');
    exit();
}

<?php
session_start();
require_once '../../models/Bd.php';
include 'classEntr_controller.php';

$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$nick = htmlspecialchars($_POST['nick'], ENT_QUOTES, 'UTF-8');
$password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
$user = new Entr_Log();
$us = new Bd();

if ($user->Avail($nick, $name, $password)) //проверка на наличие таких даных в таблице бд
{
    $_SESSION['nick'] = $nick;
    header('Location:../Post/post_controller.php');
    exit();
} else {
    $_SESSION['mesage_info'] = ' Введеные данные не верны, попробуйте еще раз ';
    header('Location:../../index.php');
    exit();
}

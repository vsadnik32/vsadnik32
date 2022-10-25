<?php
session_start();
include "../../models/Post.php";
$autor = $_SESSION['nick'];
$text= htmlspecialchars($_POST['post'], ENT_QUOTES, 'UTF-8');
$dell=htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

$post = new Post();

if(isset($_POST['post']))//проверка на наличие отправки поста с формы
{
    $post->Add_post($text,$autor);// отправка поста 
}

if(isset($_GET['id']))// проврека на удаление поста
{
    $post->Dell_post($dell,$autor);//удаление поста
}

$rezolt = $post->Get_post($autor);// метод получения всех постов по нику
$_SESSION['post_user'] = json_encode($rezolt);
header("Location:../../views/you_page.php");
exit();

?>
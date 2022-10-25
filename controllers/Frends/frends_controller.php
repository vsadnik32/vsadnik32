<?php
session_start();

include_once 'classFrends_controller.php';
$nick = $_SESSION['nick'];
$add = htmlspecialchars($_GET['add'], ENT_QUOTES, 'UTF-8'); // запрос на добавление в друзья 
$dell = htmlspecialchars($_GET['dell'], ENT_QUOTES, 'UTF-8'); // запрос на удаление из  друзей
$confirm = htmlspecialchars($_GET['confirm'], ENT_QUOTES, 'UTF-8'); // запрос на подтверждение  в   друзья

$frends = new Frends(); // СОЗДАЕМ ЭКЗЕМПЛЯР КЛАССА FRENDS

if(isset($_GET['add']))// запрос на добавление в друзья 
{
    $frends->Send_add_frend($add,$nick);
}

if(isset($_GET['confirm'])) // подвердить запрос в друзья
{
    $frends->Aceept_add_frends($nick,$confirm);
}

if(isset($_GET['dell']))
{
    $frends->Del_frends($nick,$dell);
    
}
$ar_frend= $frends->All_frends($nick); // используем метод для получения всего списка друзей
$ar_people= $frends->Poss_frends($nick); // используем метод для получения возможных людей 
$ar_almost= $frends->Almost_frend($nick);//метод получения людей которые отправили запрос в друзья 
$_SESSION['frends']=json_encode($ar_frend);
$_SESSION['people']=json_encode($ar_people);
$_SESSION['almost']=json_encode($ar_almost);




header('Location:../../views/peoples_page.php');
exit();


?>









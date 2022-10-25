<?php
include_once 'Bd.php';
class Frend extends Bd
{

    function Get_frend($nick) // метод получения списка друзей по нику
    {
        
        $sql = 'SELECT frend FROM frends_table WHERE nick = "' . $nick . '" AND status_frend = 2  ';
        $resolt = $this->pdo->query($sql);
        return $resolt_ar = $resolt->fetchAll();
    }
    function Get_people($nick) // метод получения списка людей которых нет в твоем списке друзей по нику
    {
        $sql = 'SELECT nick,  status_frend FROM frends_table WHERE status_frend = 0 AND nick != "'.$nick.'" ';
        $resolt = $this->pdo->query($sql);
        return $resolt_ar = $resolt->fetchAll();
    }

    

    function Add_statusFrend($nick) //метод добовляет строку при регистрации
    {
        $people=$this->In_nick($nick);
        $sql = 'INSERT INTO frends_table SET nick = "' . $nick . '", frend =0, status_frend=0 ';
        $this->pdo->exec($sql);
    }


    function Send_add_frend($add, $nick) // отправить запрос в друзья
    {
        $zero='0';

        $sql = 'UPDATE frends_table  SET  frend = "' . $nick . '" , status_frend=1 WHERE nick = "' . $add . '" AND frend = "'.$zero.'"';
        $this->pdo->exec($sql);

        // $sql = 'INSERT INTO frends_table SET nick = "' . $nick . '", frend = "' . $add . '", status_frend=1 ';
        // $this->pdo->exec($sql);


        $sql = 'INSERT INTO frends_table SET nick = "' . $add . '", frend =0, status_frend=0 ';
        $this->pdo->exec($sql);
    }

    function Aceept_add_frend($nick, $confirm) // принимать запросы в друзья 
    {
        $sql = 'INSERT INTO frends_table SET status_frend = 2, nick = "' . $confirm . '" , frend = "' . $nick . '" ';
        $this->pdo->exec($sql);
        $sql = 'UPDATE frends_table SET  status_frend = 2 WHERE nick = "' . $confirm . '" AND frend = "' . $nick . '"  ';
        $this->pdo->exec($sql);
        $sql = 'UPDATE frends_table SET  status_frend = 2 WHERE nick = "' . $nick . '" AND frend = "' . $confirm . '"  ';
        $this->pdo->exec($sql);
        
    }

    function Dell_frend($nick, $add)
    {
        $sql = 'DELETE FROM frends_table WHERE nick = "' . $add . '" AND frend = "' . $nick . '" ';
        $this->pdo->exec($sql);
        $sql = 'DELETE FROM frends_table WHERE nick = "' . $nick . '" AND frend = "' . $add . '" ';
        $this->pdo->exec($sql);
    }

    function Get_almost_frend($nick) //метод получения людей которые отправили запрос в друзья 
    {
        $sql= 'SELECT frend FROM frends_table WHERE status_frend = 1 AND nick = "'.$nick.'"' ;
        $resolt = $this->pdo->query($sql);
        return $resolt_ar = $resolt->fetchAll();
    }
}

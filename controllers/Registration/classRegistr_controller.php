<?php

class Registration
{
    public $name;
    public $nick;
    public $password;

    // public function __construct($name,$nick,$password)
    // {
    //     $this->name=$name;
    //     $this->nick=$nick;
    //     $this->password=$password;
    // }
    public function dat_aval($name, $nick, $password) // метод проверяет на вод данных
    {
        if (mb_strlen($name) < 4 || mb_strlen($password) < 4 || mb_strlen($nick) < 2) {
            return $mesage_info = 'Ведите коректные данные!!!';
        }
        return $mesage_info = '1';
    }
    public function repeat() //метод будет проверять данные на наличие их в базе данных
    {
    }
}

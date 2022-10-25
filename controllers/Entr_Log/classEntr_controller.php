<?php
require_once '../../models/Bd.php';
class Entr_Log extends Bd
{
    public $nick;
    public $name;
    public $user;

    public function Check_Name($name)
    {
        $this->user = $this->All(); //получаем всех пользователей с бд
        foreach ($this->user as $key) {
            if ($key['name'] == $name) {
                $this->name = $key['name'];
                return true;
                break;
            }
        }
        return false;
    }


    public function Check_Nick($nick)
    {
        $this->user = $this->All(); //получаем всех пользователей с бд
        foreach ($this->user as $key) {
            if ($key['nick'] == $nick) {
                $this->nick = $key['nick'];
                return true;
                break;
            }
        }
        return false;
    }




    public function Pass_verify($password) //метод проверки пароля 
    {
        $block_nick = $this->In_nick($this->nick);
        $hash = $block_nick['password'];

        return password_verify($password, $hash);
    }




    public function  Avail($nick, $name, $password) //метод будет проверять все данные на наличие их в базе данных
    {
        if ($this->Check_Name($name) && $this->Check_Nick($nick) && $this->Pass_verify($password)) {
            return true;
        } else {
            return false;
        }
    }
}

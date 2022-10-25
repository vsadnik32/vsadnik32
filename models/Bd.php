<?php
//КЛАСС ДЛЯ РАБОТЫ С БАЗОЙ ДАНЫХ
class Bd
{
	public $pdo;

	function __construct()
	{

		$this->pdo = new PDO('mysql:host=127.0.0.1;dbname=vsadnik32', 'root', 'root');
	}

	function All() // метод который возврощает все записи таблицы
	{
		$sql = 'SELECT * FROM post_user';
		$resolt = $this->pdo->query($sql);
		return $resolt = $resolt->fetchAll();
		
	}

	function In($id) //метод получения записи из таблицы по id
	{
		$sql = 'SELECT name FROM post_user WHERE id="' . $id . '"';
		$resolt = $this->pdo->query($sql);
		return $resoltar = $resolt->fetchAll();
	}

	function In_nick($nick) //метод получения записи из таблицы по nick
	{
		$sql = 'SELECT * FROM post_user WHERE nick="' . $nick . '"';
		$resolt = $this->pdo->query($sql);
	    $resoltar = $resolt->fetchAll();
		foreach ($resoltar as $key => $value) 
		{
			$arr=array('id'=>$value['id'],'name'=>$value['name'],'nick'=>$value['nick'],'password'=>$value['password']);
		}
		return $arr;

	}




	function Add($name, $password, $nick) //метод заполнение полей таблицы 
	{

		$sql = 'INSERT INTO post_user SET name="' . $name . '",
										  nick="' . $nick . '" ,
										  password= "' . $password . '"';
		$this->pdo->exec($sql);
	}

	function Delete($id) //метод удаления записи в таблице по id
	{
		$sql = 'DELETE FROM post_user WHERE id = "' . $id . '"';
		$this->pdo->exec($sql);
	}


	function Create_all($id, $name, $password) //метод изменения полей таблицы по id
	{
		$sql = 'UPDATE post_user SET name="' . $name . '",password="' . $password . '" WHERE id="' . $id . '"';
		$this->pdo->exec($sql);
	}
}

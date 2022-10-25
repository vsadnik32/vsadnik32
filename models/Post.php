<?php

class Post
{

    function __construct()
    {

        $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=vsadnik32', 'root', 'root');
    }

    public function Add_post($text,$autor)
    {
        $sql = 'INSERT INTO blog_entry SET text = "'.$text.'",
                                           autor = "'.$autor.'"';
        $this->pdo->exec($sql);                                   

    }
    public function Dell_post($dell,$autor)
    {   
        $sql='DELETE FROM blog_entry WHERE autor="'.$autor.'" AND id = "'.$dell.'"';
        $this->pdo->exec($sql);

    }
    public function Get_post($autor)
    {
        $sql = 'SELECT id,text,date FROM blog_entry WHERE autor = "'.$autor.'"';
        $resolt = $this->pdo->query($sql);
		return $resolt = $resolt->fetchAll();
    }
}

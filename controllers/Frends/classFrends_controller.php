<?php
require '../../models/Frend.php';
class Frends extends Frend
{
  public function Almost_frend($nick) //метод получения людей которые отправили запрос в друзья 
  {
    $ar_all = $this->All();
    $resolt = $this->Get_almost_frend($nick);

    foreach ($resolt as $key) //здесь условие построено для того чтобы собрать масив с иминем и ником 
    {
      foreach ($ar_all as $keys => $value) {
        if ($key['frend'] == $value['nick']) {
          $arr[$keys] = array('nick' => $key['frend'], 'name' => $value['name']);
        }
      }
    }

    return $arr;
  }

  public function Poss_frends($nick) //метод получения возможных друзей
  {
    $ar_people = $this->Get_people($nick); //метод получения списка людей которых нет в твоем списке друзей по нику
    $ar_all = $this->All(); // метод получения всех людей
    $ar_frend = $this->All_frends($nick); // метод получения всех друзей по нику
    $poss_frend = $this->Almost_frend($nick);

    //здесь условие построено для того чтобы собрать масив с иминем и ником 
    foreach ($ar_people as $key) {
      foreach ($ar_all as $keys => $value) {
        if ($key['nick'] == $value['nick']) {
          $ar[$keys]  = array('nick' => $value['nick'], 'name' => $value['name']);
        }
      }
    }
    //СОБРАН МАСИВ $arr_peoples ГДЕ СТАТУС FREND РАВЕН 0


    if (isset($ar_frend)) { //тут происходит удаление людей из списка, тех что друзья
      $ar =   array_diff_assoc($ar, $ar_frend);
    }

    // **********************************//
    if (isset($poss_frend)) { //метод удаления  людей которые отправили запрос в друзья
      $ar =   array_diff_assoc($ar, $poss_frend);
    }

    return $ar;
  }



  public function All_frends($nick) //метод для получения  списка друзей 
  {
    $ar_frend = $this->Get_frend($nick);
    $ar_all = $this->All();

    foreach ($ar_frend as $key) //здесь условие построено для того чтобы собрать масив с иминем и ником 
    {
      foreach ($ar_all as $keys => $value) {
        if ($key['frend'] == $value['nick']) {
          $arr[$keys] = array('nick' => $key['frend'], 'name' => $value['name']);
        }
      }
    }
    return $arr;
  }






  public function Add_frends($add, $nick) //метод добавления друга
  {
    $this->Send_add_frend($add, $nick);
  }


  public function Aceept_add_frends($nick, $confirm)
  {
    $this->Aceept_add_frend($nick, $confirm);
  }



  public function Del_frends($nick, $dell) //метод удаление друга
  {

    $this->Dell_frend($nick, $dell);
  }
}

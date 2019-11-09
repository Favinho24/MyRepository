<?php
/**
 *
 */
class pj
{
  private $id;
  private $id_usuario;
  private $nombre;
  private $gold;
  private $hp;
  //private $str;
  //private $iq;
  private $hp_max;
  private $tiempo;

  function __construct($idCharacter, $UserId, $n, $g, $h, $hm, $t)  //$s, $i,
  {
    $this->id=$idCharacter;
    $this->id_usuario=$UserId;
    $this->nombre=$n;
    $this->gold=$g;
    $this->hp=$h;
    //$this->str=$s;
    //$this->iq=$i;
	  $this->hp_max=$hm;
    $this->tiempo=$t;
  }
  public function GetIdCharacter()
  {
    return $this->id;
  }
  public function GetUserId()
  {
    return $this->id_usuario;
  }
  public function GetNombre()
  {
    return $this->nombre;
  }
  public function GetGold()
  {
    return $this->gold;
  }
  public function GetHP()
  {
    return $this->hp;
  }
  // public function GetStr()
  // {
  //   return $this->str;
  // }
  // public function GetIQ()
  // {
  //   return $this->iq;
  // }
  public function GetHP_Max()
  {
    return $this->hp_max;
  }
  public function GetTiempo()
  {
    return $this->tiempo;
  }
  public function SetIdCharacter($idCharacter)
  {
    $this->id=$idCharacter;
  }
  public function SetUserId($UserId)
  {
    $this->id_usuario=$UserId;
  }
  public function SetNombre($n)
  {
    $this->nombre=$n;
  }
  public function SetGold($o)
  {
    $this->gold=$o;
  }
  public function SetHP($h)
  {
    $this->hp=$h;
  }
  // public function SetStr($s)
  // {
  //   $this->str=$s;
  // }
  // public function SetIQ($iq)
  // {
  //   $this->iq=$iq;
  // }
  public function SetHP_Max($hm)
  {
    $this->hp_max=$hm;
  }
  public function SetTiempo($t)
  {
    $this->tiempo=$t;
  }
  public function GetTodo()
  {
    return $this->id.' '.$this->id_usuario.' '.$this->nombre.' '.$this->gold.' '.$this->hp.' '.$this->tiempo;
  }
}
 ?>

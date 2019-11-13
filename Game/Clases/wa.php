<?php
include_once 'pj.php';
/**
 * <?php echo $Wa->GetIQ(); ?>
 */
class Warrior extends pj
{
  private $str;
  private $arm;

  function __construct($idCharacter, $UserId, $n, $g, $h, $s, $ar, $hm, $t)
  {
    parent:: __construct($idCharacter, $UserId, $n, $g, $h, $hm, $t);
    $this->str=$s;
    $this->arm=$ar;
  }
  public function GetStr()
    {
      return $this->str;
    }
  public function SetStr($s)
  {
    $this->str=$s;
  }
  public function GetArm()
    {
      return $this->arm;
    }
  public function SetAtm($ar)
  {
    $this->arm=$ar;
  }
}
 ?>

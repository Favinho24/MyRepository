<?php
include_once 'pj.php';
/**
 * <?php echo $Wa->GetIQ(); ?>
 */
class Warrior extends pj
{
  private $str;

  function __construct($idCharacter, $UserId, $n, $g, $h, $s, $hm, $t)
  {
    parent:: __construct($idCharacter, $UserId, $n, $g, $h, $hm, $t);
    $this->str=$s;
  }
  public function GetStr()
    {
      return $this->str;
    }
  public function SetStr($s)
  {
    $this->str=$s;
  }
}
 ?>

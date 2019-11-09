<?php
include_once 'pj.php';
/**
 *<?php echo $Wi->GetStr(); ?>
 */
class Wizzard extends pj
{
  private $iq;

  function __construct($idCharacter, $UserId, $n, $g, $h, $i, $hm, $t)
  {
    parent::__construct($idCharacter, $UserId, $n, $g, $h, $hm, $t);
    $this->iq=$i;
  }
  public function GetIQ()
  {
    return $this->iq;
  }
  public function SetIQ($iq)
  {
    $this->iq=$iq;
  }
}
 ?>

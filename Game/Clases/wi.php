<?php
include_once 'pj.php';
/**
 *<?php echo $Wi->GetStr(); ?>
 */
class Wizzard extends pj
{
  private $iq;
  private $rMag;

  function __construct($idCharacter, $UserId, $n, $g, $h, $i, $rM, $hm, $t)
  {
    parent::__construct($idCharacter, $UserId, $n, $g, $h, $hm, $t);
    $this->iq=$i;
    $this->rMag=$rM;
  }
  public function GetIQ()
  {
    return $this->iq;
  }
  public function SetIQ($iq)
  {
    $this->iq=$iq;
  }
  public function GetRMag()
  {
    return $this->rMag;
  }
  public function SetRMag($rMag)
  {
    $this->rMag=$rMag;
  }
}
 ?>

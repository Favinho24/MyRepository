<?php /**
 *
 */
class Usuario
{
  private $id;
  private $nombre;
  private $pass;

  public function __construct($i, $n, $p)
  {
    $this->id=$i;
    $this->name=$n;
    $this->pass=$p;
  }
  public function GetId()
  {
    return $this->id;
  }
  public function GetNombre()
  {
    return $this->nombre;
  }
  public function GetPass()
  {
    return $this->pass;
  }
  public function SetId($i)
  {
    $this->id=$i;
  }
  public function SetNombre($n)
  {
    $this->nombre=$n;
  }
  public function SetPass($p)
  {
    $this->pass=$p;
  }
}
 ?>

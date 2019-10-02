<?php /**
 *
 */
class Tienda
{
	private $id;
	private $name;
	private $daño;
	private $gc;
	private $prob_gc;
	private $valor;
	private $descrip;
	private $tipo;

  function __construct($i, $n, $d, $g, $p, $v, $de, $t)
  {
    $this->id=$i;
	$this->name=$n;
	$this->daño=$d;
	$this->gc=$g;
	$this->prob_gc=$p;
	$this->valor=$v;
	$this->descrip=$de;
	$this->tipo=$t;
  }
  public function GetId()
  {
    return $this->id;
  }
   public function GetName()
  {
    return $this->name;
  }
   public function GetDaño()
  {
    return $this->daño;
  }
   public function GetGC()
  {
    return $this->gc;
  }
  public function GetProb_gc()
  {
    return $this->prob_gc;
  }
   public function GetValor()
  {
    return $this->valor;
  }
   public function GetDescrip()
  {
    return $this->descrip;
  }
   public function GetTipo()
  {
    return $this->tipo;
  }
   public function SetId($i)
  {
    $this->id=$i;
  }
  public function SetName($n)
  {
    $this->name=$n;
  }
  public function SetDaño($d)
  {
    $this->daño=$d;
  }
  public function SetGC($g)
  {
    $this->gc=$g;
  }
  public function SetProb_gc($p)
  {
    $this->prob_gc=$p;
  }
  public function SetValor($v)
  {
    $this->valor=$v;
  }
  public function SetDescripcion($de)
  {
    $this->descrip=$de;
  }
  public function SetTipo($t)
  {
    $this->tipo=$t;
  }
  public function GetTodo()
  {
    return array('id'=>$this->id, 'nombre'=>$this->name, 'daño'=>$this->daño, 'gc'=>$this->gc, 'Prob_gc'=>$this->prob_gc, 'valor'=>$this->valor, 'descripcion'=>$this->descrip, 'tipo'=>$this->tipo);
  }
}
?>

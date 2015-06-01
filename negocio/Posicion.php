<?php 

include ("Coordenada.php");

/**
 *	Description de Posicion: Hereda de la clase Coordenada
 *	Representa la posicion que tiene el vehículo.
 *	coordenada + direccion = ($x, $y, $direccion)
 *
 * 	@author OSCAR
 */

class Posicion extends Coordenada{

	/**
	*	La variable posicion cardinal (PC) es de tipo array y constante.
	*	Representa la direcciones que tiene el vehículo.
	*	Direcciones: N = Norte, E = Este, S = Sur y O = Oeste
	*/
	const PC = array(1 => "N", 2 => "E", 3 => "S", 4 => "O");
	
	/*
	*	La variable $direccion, tiene como valor una de las direcciones del
	*	punto cardinal (PC).
	*/
	public $direccion;


	/*
	*	Constructor de la clase
	*	@param $x
	*	@param $y
	*	@param $direccion
	*/
	public function __construct($x, $y, $direccion) {
		//parent::__construct($x, $y);
		$this->x = $x;
		$this->y = $y;
		$this->direccion = $direccion;
	}
}

?>
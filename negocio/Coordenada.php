<?php 
/**
 *	Description de Coordenada
 *	Representa la coordenada del vehículo donde se encuentra.
 *
 * 	@author OSCAR
 */

class Coordenada{

	//	$x y $y es la coordenada del vehículo.
	public $x;
	public $y;

	/*
	*	Constructor de la clase
	*	@param $x
	*	@param $y
	*/
	function __constructor($x, $y){
		$this->x = $x;
		$this->y = $y;
	}

}

?>
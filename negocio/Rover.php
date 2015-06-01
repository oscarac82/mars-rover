<?php

include ("Posicion.php");

/**
 * 	Description of Rover
 *	Intrepreta los comandos de instrucciones que son enviadas por la NASA
 *	
 * 	@author OSCAR
 */

class Rover{

	/**
	*	La variable posición ($posicion) es un objeto de la clase Posicion.
	*	Representa la posición del vehículo.
	*/
	private $posicion;

	/*
	*	Constructor de la clase
	*/
	function __constructor(){
		$this->posicion = null;
	}

	/*
	*	procesarsIntruciones
	*	Encargado de procesar instruccion por instruccion que son enviados por la NASA
	*	que le indicar al rover como explorar el planeta
	*	@param $comando
	*/
	public function procesarsIntruciones($comando){
		$comando = str_split($comando);
		foreach ($comando as $control) {
			$this->moverRover($control);	
		}
	}

	/*
	*	moverRover
	*	Encargado de controlar al robot de la NASA
	*	L y R gira 90 grados a la izquierda y derecha respectivamente, manteniendo su posición actual.
	*	M avanza o se mueve hacia adelante en funcion a la coordenada (x, y), manteniendo su direccion actual.
	*	@param $comando
	*/
	private function moverRover($control){
		switch ($control) {
    		case "L": 
    			$this->girarIzquierda();
        		break;
    		case "R": 
    			$this->girarDerecha();
	        	break;
    		case "M":
    			$this->avanzar();
    			break;
		}
	}


	/*
	*	girarIzquierda
	*	Encargado de girar 90 grados a la izquierda en funcion del punto cardinal
	*/
	private function girarIzquierda(){
		$key = array_search($this->posicion->direccion, Posicion::PC);
		$this->posicion->direccion = $key - 1 < 1? Posicion::PC[4]: Posicion::PC[$key - 1];
	}

	/*
	*	girarDerecha
	*	Encargado de girar 90 grados a la derecha en funcion del punto cardinal
	*	@param $comando
	*/
	private function girarDerecha(){
		$key = array_search($this->posicion->direccion, Posicion::PC);
		$this->posicion->direccion = ($key + 1) > 4? Posicion::PC[1]: Posicion::PC[$key + 1];
	}

	/*
	*	avanzar
	*	Encargado de avanzar un paso adelante en funcion de la direccion que tiene el robot
	*	@param $comando
	*/
	private function avanzar(){
		switch ($this->posicion->direccion) {
    		case Posicion::PC[1]: 		//	N
    			$this->posicion->y++;
        		break;
    		case Posicion::PC[2]: 		//	E
    			$this->posicion->x++;
	        	break;
    		case Posicion::PC[3]:		//	S
    			$this->posicion->y--;
    			break;
    		case Posicion::PC[4]:		//	O
    			$this->posicion->x--;
    			break;
		}
	}

	/**
	 *	Retorna la posicion del robot
	 * 	@return $posicion
	 */
	public function getPosicion(){
		//return array($this->posicion->x, $this->posicion->y, $this->posicion->direccion);
		return $this->posicion;
	}

	/**
	 *	Asigna la posicion del robot
	 *	@param $x
	 *	@param $y
	 *	@param $direccion
	 */
	public function setPosicion($x, $y, $direccion){
		$this->posicion = new Posicion($x, $y, $direccion);
	}
}

?>
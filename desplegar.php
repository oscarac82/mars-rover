<?php 
include("negocio/Rover.php");

/*
*	Encargado de desplegar robot por robot
*	Datos de entrada: posicion(x, y, dir) y los comandos de instrucciones (L, R, M)
*	Datos de salida: la nueva posicion del robot
*/

//sleep(1);
$json = array("success" => false, "message" => "No existe una acción requerida.", "result" => "");

//	dependiendo de la accion se procesa la solicitud esperada
if( isset($_POST['accion']) ) {
	$accion = $_POST["accion"];

	switch ($accion) {
		case "desplegar": 
			if (isset($_POST['x']) && isset($_POST['y']) && isset($_POST['dir']) && isset($_POST['cmd'])){
				$x = limpiar($_POST['x']);
				$y = limpiar($_POST['y']);
				$dir = limpiar($_POST['dir']);
				$cmd = limpiar($_POST['cmd']);
				$result = desplegarRobot();
				$json = array("success" => true, "message" => "El móvil robot se desplego a la posición: ", "result" => $result);
			}
			else{
				$json["message"] = "Algunos datos no son válidos.";
			}
			break;		

		case "programar": 
			break;

		default:			
        	$json['message'] = "No se pudo procesar la acción solicida.";
			break;
	}

}

/*
*	Esta funcion se encarga del robot en desplazarse en base a las instrucciones dada por la NASA
*	creando una instancia de la clase Rover.
*	Datos de Entrada:	Posicion(x, y, dir) e Instruciones
*	Datos de Salida: 	Posicion(x, y, dir) 
*/
function desplegarRobot(){
	global $x, $y, $dir, $cmd;
	$rover = new Rover();
	$rover->setPosicion($x, $y, $dir);
	$rover->procesarsIntruciones($cmd);
	$pos = $rover->getPosicion();
	return array("x" => $pos->x, "y" => $pos->y, "dir" => $pos->direccion);
}

function limpiar($var) {
    $var = stripslashes($var);
    $var = strip_tags($var);
    return $var;
}

//	Datos enviados en formato json
header('Content-type: application/json; charset=utf-8');
echo json_encode($json);
?>
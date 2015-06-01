<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Problema de Mar Rovers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
<body>

	<div class="container-fluid well">
		<div class="row">
			<div class="col-xs-12">
				<h4 class="text-center"><strong>PROBLEMA DE MAR ROVERS</strong></h4>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-xs-8 col-xs-push-2 col-sm-6 col-sm-push-3 col-md-4 col-md-push-4 well">
							
				<!-- FORMULARIO PARA PROGRAMAR UN NUEVO ROBOT -->
				<form id="form" onsubmit="return false;" class="form-horizontal">
					<div>
						<h5 class="text-center"><strong>Programar un nuevo Robot</strong></h5>
					</div>
					<div class="form-group form-group-sm">
						<div class="col-sm-12 col-md-10 col-md-push-1">
							<input class="form-control" type="number" id="x" name="x" min="0" max="100" placeholder="Ingrese la coordenada X" required title="Se necesita una coordenada X del 1 al 100">
						</div>
					</div>

					<div class="form-group form-group-sm">
						<div class="col-sm-12 col-md-10 col-md-push-1">
							<input type="number" class="form-control" id="y" name="y" min="0" max="100" placeholder="Ingrese la coordenada Y" required title="Se necesita una coordenada Y del 1 al 100">								
						</div>
					</div>

					<div class="form-group form-group-sm">
						<div class="col-sm-12 col-md-10 col-md-push-1">
							<select required class="form-control" id="dir" name="dir">
								<option selected disabled value="">Seleccione la direción</option>
								<option value="N">NORTE</option>
								<option value="E">ESTE</option>
								<option value="S">SUR</option>
								<option value="O">OESTE</option>
							</select>
						</div>
					</div>

					<div class="form-group form-group-sm">
						<div class="col-sm-12 col-md-10 col-md-push-1">
							<input type="text" class="form-control" id="cmd" name="cmd" placeholder="Ingresar Instruciones" required pattern="[L,R,M]{1,100}" title="Instruciones aceptadas (L, R, M) entre 1 a 100 instruciones">
						</div>
					</div>

					<div class="form-group form-group-sm">
						<div class="col-xs-12 col-sm-4">
							<button type="submit" class="btn btn-primary form-control" id="programar">Adicionar</button>						
						</div>
						<!--<div class="col-xs-12 hidden-sm hidden-md hidden-lg"></div>-->
						<div class="col-xs-12 col-sm-5">
							<button type="button" class="btn btn-primary form-control" id="desplegar">Desplegar Robot</button>							
						</div>
						<div class="col-xs-12 col-sm-3">
							<button type="button" class="btn btn-primary form-control" id="clear">Reset</button>							
						</div>
					</div>

				</form>
				<!-- END FORMULARIO -->				
			</div>
		</div>		
	</div>

	<div class="container" id="shadow">
		
	</div>

	<div id="cargando" align="center"></div>
	<br>
	
	<script src="js/jquery.js"></script>
	<script src="js/funciones-ajax.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script>		
       	$(document).ready(function() {       		
		    var form = document.getElementById('form');
		    $('#programar').click(function() {
		    	if(form.checkValidity()){		    		
				    programarRobot(); 
                	setTimeout("form.reset()", 100);
		    		if (num_robot >= max_robot){
                		$("#programar").addClass("disabled");                		
		    		}
            	}            	
		    });

		    $('#desplegar').click(function() {
		    	if (num_robot > 0){
		   			desplegarRobot(); 
		    	}
		    	else{
		    		alert("No hay ningún robot programado, debe adicionar al menos un robot.");
		    	}
		    });

		    $('#clear').click(function() {
		   		num_robot = 0;
		   		setTimeout("form.reset()", 50);
		   		$("#shadow").html("");
		   		$("#programar").removeClass("disabled");
		    });
		}); 

       	//	encargado de crear o programar un robot.
       	function programarRobot(){
       		num_robot++;
       		data = $("#form").serialize()+"&accion=programar&num_robot="+num_robot;       		
        	div = "shadow";
			url = "robot.php";
			load(data, div, url);
       	}

       	//	despliega a todos los robots programados.
       	function desplegarRobot(){
			$("#shadow .row").each(function(index){
				index = index + 1;
         		data = $("#form"+index).serialize()+"&accion=desplegar";
         		div = "salida"+index;
         		url = "desplegar.php";
         		ajax(data, div, url);
            });
       	}

	</script>
</body>
</html>
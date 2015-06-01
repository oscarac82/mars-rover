<?php 
/*
*	Encargoado de adicionar un nuevo robot al index.php
*/


	$accion = $_GET["accion"];
	$num_robot = $_GET["num_robot"];
	$x = $_GET["x"];
	$y = $_GET["y"];
	$dir = $_GET["dir"];
	$cmd = $_GET["cmd"];
?>	


		
			<div class="col-xs-12">
				<div>
					<h5 class="text-center text-primary"><strong>Robot # <?php echo $num_robot; ?></strong></h5>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="col-xs-12">
					<div><h5 class="text-center text-success"><strong>Entrada de datos</strong></h5></div>
				</div>
				<form id="form<?php echo $num_robot; ?>" class="form-horizontal">
					<div class="form-group form-group-sm">
						<div class="col-xs-12">
							<label class="control-label">Posicion(x, y, direccion):</label>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input class="form-control" type="text" id="x" name="x" value="<?php echo $x; ?>" readonly>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input class="form-control" type="text" id="y" name="y" value="<?php echo $y; ?>" readonly>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input class="form-control" type="text" id="dir" name="dir" value="<?php echo $dir; ?>" readonly>
						</div>
					</div>

					<div class="form-group form-group-sm">
						<div class="col-xs-12">
							<label class="control-label">Instrucciones:</label>
						</div>
						<div class="col-xs-12">
							<input class="form-control" type="text" id="cmd" name="cmd" value="<?php echo $cmd; ?>" readonly>
						</div>
					</div>
				</form>	
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="col-xs-12">
					<div><h5 class="text-center text-success"><strong>Salida de datos</strong></h5></div>					
				</div>
				<div id="salida<?php echo $num_robot; ?>" class="col-xs-12"></div>				
			</div>
		
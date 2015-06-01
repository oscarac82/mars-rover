var num_robot = 0;		//	indica cuantos robots se tienen programado.
var max_robot = 10;		//	total de robot que puede programar.

/*
*	Descripcion load
*	Cargar datos desde el servidor y coloca el codigo HTML devuelto en el elemento div.
*	@param data: son los parametros enviados al servidor 
*	@param div: nuestro contenedor para cargar la pagina solicitada
*	@param url: especificar la url que desea cargar en el div
*/
function load(data, div, url){
	/*$("#"+div).load( url, param, function(response, status, xhr) {
		//	verificamos el status (estado de la solicitud)
	});*/
	id = "robot"+num_robot;
	row = $("<div>", {id:id, class:"row"});
	$("#"+div).append(row);
	$("#"+id).load(url, data);
}

/*
*	Descripcion ajax
*	Cargar datos desde el servidor y coloca el resultado devuelto en json en el elemento div.
*/
function ajax(data, div, url){
	$.ajax({
        url: url,		
        type: "post",			// 	especifico que será una petición POST
        data: data,
        dataType: "json",		//	el tipo de información que se espera de respuesta
        async: false,			//	es asincrono
        beforeSend: function (){
						$("#"+div).html("<div style='heigth: 30px; padding-top: 5px;' ><img src='img/loader.gif'></div>");					    
					},
		//	código a ejecutar si la petición es satisfactoria y la respuesta (resp) es pasada como argumento a la función.
        success: 	function (resp){
        				if ( resp && resp.success ){
					    	$("#"+div).html(resp.message+"<br><strong>Posicion("+resp.result.x+", "+resp.result.y+", "+resp.result.dir+")</strong>");
					    }
					    else{
					    	$("#"+div).html(resp.message);
					    }
					},
		// 	código a ejecutar si la petición falla.
        error: 		function (jqXHR, status, error){		    
					 	$("#"+div).html(error);
					}
    });
}	
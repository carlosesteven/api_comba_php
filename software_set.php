<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["sw_cod"] )
	&& isset( $_REQUEST["sw_nom"] ) 
	&& isset( $_REQUEST["sw_des"] )
)
{

	$existencia = $db->where('sw_cod', $_REQUEST["sw_cod"] )->has('software');

	if ( $existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "software ya se encuentra registrado";
	}else{
		$valida = $db->insert('software', 
				[
					'sw_cod' => $_REQUEST["sw_cod"], 
					'sw_nom' => $_REQUEST["sw_nom"],
					'sw_des' => $_REQUEST["sw_des"]
				]
			);

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "registro el software correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "error al intentar registrar el software";	
		}
	}
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "Faltan algunos parametros en la peticion para crear el software";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["sw_cod"] )
	&& isset( $_REQUEST["sw_nom"] ) 
	&& isset( $_REQUEST["sw_des"] )
) 
{

	$existencia = $db->where('sw_cod', $_REQUEST["sw_cod"] )->has('software');

	if ( !$existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "software no existe";
	}else{
		$valida = $db->where('sw_cod', $_REQUEST["sw_cod"])
		->update('software', 
				[
					'sw_cod' => $_REQUEST["sw_cod"], 
					'sw_nom' => $_REQUEST["sw_nom"],
					'sw_des' => $_REQUEST["sw_des"]
				]
			);

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "se edito el software correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "se produjo un error al intentar editar el software";	
		}
	}
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "Faltan algunos parametros en la peticion para editar el software";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
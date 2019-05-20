<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["fac_id"] )
	&& isset( $_REQUEST["fac_pro"] )
) 
{

	$existencia = $db->where('fac_id', $_REQUEST["fac_id"] )->has('facultad');

	if ( !$existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "facultad no existe";
	}else{
		$valida = $db->where('fac_id', $_REQUEST["fac_id"])
		->update('facultad', 
				[
					'fac_pro' => $_REQUEST["fac_pro"]
				]
			);

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "se edito la facultad correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "se produjo un error al intentar editar la facultad";	
		}
	}
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "Faltan algunos parametros en la peticion para editar la facultad";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
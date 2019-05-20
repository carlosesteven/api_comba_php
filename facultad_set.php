<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["fac_pro"] )
)
{
	$existencia = $db->where('fac_pro', $_REQUEST["fac_pro"] )->has('facultad');

	if ( $existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "facultad ya se encuentra registrado";
	}else{
		$valida = $db->insert('facultad', 
				[
					'fac_pro' => $_REQUEST["fac_pro"]
				]
			);

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "registro la facultad correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "error al intentar registrar la facultad";	
		}
	}
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "Faltan algunos parametros en la peticion para crear el facultad";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
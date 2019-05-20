<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["edi_id"] )
	&& isset( $_REQUEST["edi_nom"] ) 
)
{

	$existencia = $db->where('edi_id', $_REQUEST["edi_id"] )->has('editorial');

	if ( $existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "editorial ya se encuentra registrado";
	}else{
		$valida = $db->insert('editorial', 
				[
					'edi_id' => $_REQUEST["edi_id"], 
					'edi_nom' => $_REQUEST["edi_nom"]
				]
			);

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "registro el editorial correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "error al intentar registrar el editorial";	
		}
	}
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "Faltan algunos parametros en la peticion para crear el editorial";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
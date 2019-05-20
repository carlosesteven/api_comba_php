<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["edi_id"] )
	&& isset( $_REQUEST["edi_nom"] ) 
) 
{

	$existencia = $db->where('edi_id', $_REQUEST["edi_id"] )->has('editorial');

	if ( !$existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "editorial no existe";
	}else{
		$valida = $db->where('edi_id', $_REQUEST["edi_id"])
		->update('editorial', 
				[
					'edi_id' => $_REQUEST["edi_id"], 
					'edi_nom' => $_REQUEST["edi_nom"]
				]
			);

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "se edito el editorial correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "se produjo un error al intentar editar el editorial";	
		}
	}
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "Faltan algunos parametros en la peticion para editar el editorial";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
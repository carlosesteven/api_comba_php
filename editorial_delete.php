<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["edi_id"] ) )
{

	$existencia = $db->where('edi_id', $_REQUEST["edi_id"] )->has('editorial');

	if ( !$existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "editorial no existe";
	}else{
		$valida = $db
		->where('edi_id', $_REQUEST["edi_id"])
		->delete('editorial');

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "se elimino el editorial correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "se produjo un error al intentar eliminar el editorial";	
		}
	}
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "Faltan parametros en la peticion";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
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
		$valida = $db->where('edi_id', $_REQUEST["edi_id"] )->getOne('editorial');

		$respuesta["estado"] = "ok";
		$respuesta["detalles"] = "se encontro el editorial " . $_REQUEST["edi_id"];

		$respuesta["evento_data"] = $valida;
	}
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "Faltan parametros en la peticion";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
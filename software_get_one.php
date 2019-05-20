<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["sw_cod"] ) )
{

	$existencia = $db->where('sw_cod', $_REQUEST["sw_cod"] )->has('software');

	if ( !$existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "software no existe";
	}else{
		$valida = $db->where('sw_cod', $_REQUEST["sw_cod"] )->getOne('software');

		$respuesta["estado"] = "ok";
		$respuesta["detalles"] = "se encontro el software " . $_REQUEST["sw_cod"];

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
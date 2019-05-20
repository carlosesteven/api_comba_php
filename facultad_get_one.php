<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["fac_id"] ) )
{

	$existencia = $db->where('fac_id', $_REQUEST["fac_id"] )->has('facultad');

	if ( !$existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "facultad no existe";
	}else{
		$valida = $db->where('fac_id', $_REQUEST["fac_id"] )->getOne('facultad');

		$respuesta["estado"] = "ok";
		$respuesta["detalles"] = "se encontro la facultad " . $_REQUEST["fac_id"];

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
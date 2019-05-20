<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["rev_serie"] ) )
{

	$existencia = $db->where('rev_serie', $_REQUEST["rev_serie"] )->has('revista');

	if ( !$existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "revista no existe";
	}else{
		$valida = $db->where('rev_serie', $_REQUEST["rev_serie"] )->getOne('revista');

		$respuesta["estado"] = "ok";
		$respuesta["detalles"] = "se encontro la revista " . $_REQUEST["rev_serie"];

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
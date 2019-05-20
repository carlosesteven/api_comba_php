<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["art_issn"] ) )
{

	$existencia = $db->where('art_issn', $_REQUEST["art_issn"] )->has('articulo');

	if ( !$existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "articulo no existe";
	}else{
		$valida = $db->where('art_issn', $_REQUEST["art_issn"] )->getOne('articulo');

		$respuesta["estado"] = "ok";
		$respuesta["detalles"] = "se encontro el articulo " . $_REQUEST["art_issn"];

		$respuesta["user_data"] = $valida;
	}
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "Faltan parametros en la peticion";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
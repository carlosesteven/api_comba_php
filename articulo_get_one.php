<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["art_isbn"] ) )
{

	$existencia = $db->where('art_isbn', $_REQUEST["art_isbn"] )->has('articulo');

	if ( !$existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "articulo no existe";
	}else{
		$valida = $db->where('art_isbn', $_REQUEST["art_isbn"] )->getOne('articulo');

		$respuesta["estado"] = "ok";
		$respuesta["detalles"] = "se encontro el articulo " . $_REQUEST["art_isbn"];

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
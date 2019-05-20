<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["lib_isbn"] ) )
{

	$existencia = $db->where('lib_isbn', $_REQUEST["lib_isbn"] )->has('libro');

	if ( !$existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "libro no existe";
	}else{
		$valida = $db->where('lib_isbn', $_REQUEST["lib_isbn"] )->getOne('libro');

		$respuesta["estado"] = "ok";
		$respuesta["detalles"] = "se encontro el libro " . $_REQUEST["lib_isbn"];

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
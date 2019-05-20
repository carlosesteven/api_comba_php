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
		$valida = $db
		->where('lib_isbn', $_REQUEST["lib_isbn"])
		->delete('libro');

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "se elimino el libro correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "se produjo un error al intentar eliminar el libro";	
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
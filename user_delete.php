<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["user_cedula"] ) )
{

	$existencia = $db->where('user_cedula', $_REQUEST["user_cedula"] )->has('usuarios');

	if ( !$existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "usuario no existe";
	}else{
		$valida = $db
		->where('user_cedula', $_REQUEST["user_cedula"])
		->delete('usuarios');

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "se elimino el usuario correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "se produjo un error al intentar eliminar el usuario";	
		}
	}
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "faltan parametros en la peticion";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
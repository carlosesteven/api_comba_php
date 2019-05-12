<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["user_nombre"] )
	&& isset( $_REQUEST["user_apellido"] ) 
	&& isset( $_REQUEST["user_email"] )
	&& isset( $_REQUEST["user_cedula"] )
	&& isset( $_REQUEST["user_direccion"] )
	&& isset( $_REQUEST["user_telefono"] )
	&& isset( $_REQUEST["user_cvlac_num"] )
	&& isset( $_REQUEST["user_cvlac_dir"] )
	&& isset( $_REQUEST["user_orcid"] )
	&& isset( $_REQUEST["user_niv_aca"] ) ) 
{

	$existencia = $db->where('user_cedula', $_REQUEST["user_cedula"] )->has('usuarios');

	if ( $existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "usuario ya se encuentra registrado";
	}else{
		$valida = $db->insert('usuarios', 
				[
					'user_nombre' => $_REQUEST["user_nombre"], 
					'user_apellido' => $_REQUEST["user_apellido"],
					'user_email' => $_REQUEST["user_email"],
					'user_cedula' => $_REQUEST["user_cedula"],
					'user_direccion' => $_REQUEST["user_direccion"],
					'user_telefono' => $_REQUEST["user_telefono"],
					'user_cvlac_num' => $_REQUEST["user_cvlac_num"],
					'user_cvlac_dir' => $_REQUEST["user_cvlac_dir"],
					'user_orcid' => $_REQUEST["user_orcid"],
					'user_niv_aca' => $_REQUEST["user_niv_aca"]
				]
			);

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "registro el usuario correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "error al intentar registrar el usuario";	
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
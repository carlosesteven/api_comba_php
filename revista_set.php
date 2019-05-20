<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["rev_serie"] )
	&& isset( $_REQUEST["rev_nr"] ) 
	&& isset( $_REQUEST["rev_area"] )
	&& isset( $_REQUEST["rev_res"] )
	&& isset( $_REQUEST["rev_url"] )
	&& isset( $_REQUEST["rev_nom"] )
	&& isset( $_REQUEST["rev_vol"] )
	&& isset( $_REQUEST["rev_idi"] )
) 
{

	$existencia = $db->where('rev_serie', $_REQUEST["rev_serie"] )->has('revista');

	if ( $existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "revista ya se encuentra registrado";
	}else{
		$valida = $db->insert('revista', 
				[
					'rev_serie' => $_REQUEST["rev_serie"], 
					'rev_nr' => $_REQUEST["rev_nr"],
					'rev_area' => $_REQUEST["rev_area"],
					'rev_res' => $_REQUEST["rev_res"],
					'rev_url' => $_REQUEST["rev_url"],
					'rev_nom' => $_REQUEST["rev_nom"],
					'rev_vol' => $_REQUEST["rev_vol"],
					'rev_idi' => $_REQUEST["rev_idi"]					
				]
			);

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "registro el libro correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "error al intentar registrar el libro";	
		}
	}
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "Faltan algunos parametros en la peticion para crear el libro";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
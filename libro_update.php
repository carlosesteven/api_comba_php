<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["lib_isbn"] )
	&& isset( $_REQUEST["lib_col"] ) 
	&& isset( $_REQUEST["lib_tip"] )
	&& isset( $_REQUEST["lib_ind"] )
	&& isset( $_REQUEST["lib_tit"] )
	&& isset( $_REQUEST["lib_tit_cap"] )
	&& isset( $_REQUEST["lib_pre_mes"] )
	&& isset( $_REQUEST["lib_pre_anio"] )
	&& isset( $_REQUEST["lib_pais"] )
	&& isset( $_REQUEST["lib_edi_id"] ) 
) 
{

	$existencia = $db->where('lib_isbn', $_REQUEST["lib_isbn"] )->has('libro');

	if ( !$existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "libro no existe";
	}else{
		$valida = $db->where('lib_isbn', $_REQUEST["lib_isbn"])
		->update('libro', 
				[
					'lib_isbn' => $_REQUEST["lib_isbn"], 
					'lib_col' => $_REQUEST["lib_col"],
					'lib_tip' => $_REQUEST["lib_tip"],
					'lib_ind' => $_REQUEST["lib_ind"],
					'lib_tit' => $_REQUEST["lib_tit"],
					'lib_tit_cap' => $_REQUEST["lib_tit_cap"],
					'lib_pre_mes' => $_REQUEST["lib_pre_mes"],
					'lib_pre_anio' => $_REQUEST["lib_pre_anio"],
					'lib_pais' => $_REQUEST["lib_pais"],
					'lib_edi_id' => $_REQUEST["lib_edi_id"]	
				]
			);

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "se edito el libro correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "se produjo un error al intentar editar el libro";	
		}
	}
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "Faltan algunos parametros en la peticion para editar el libro";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
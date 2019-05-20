<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["art_isbn"] )
	&& isset( $_REQUEST["art_doi"] ) 
	&& isset( $_REQUEST["art_ind"] )
	&& isset( $_REQUEST["art_idi"] )
	&& isset( $_REQUEST["art_area"] )
	&& isset( $_REQUEST["art_tit"] )
	&& isset( $_REQUEST["art_pre_anio"] )
	&& isset( $_REQUEST["art_pre_mes"] )
	&& isset( $_REQUEST["art_pag_ini"] )
	&& isset( $_REQUEST["art_pag_fin"] ) 
	&& isset( $_REQUEST["art_urt"] ) 
	&& isset( $_REQUEST["art_res"] ) 
	&& isset( $_REQUEST["art_rev_id"] ) 
) 
{

	$existencia = $db->where('art_isbn', $_REQUEST["art_isbn"] )->has('articulo');

	if ( $existencia ) 
	{
		$respuesta["estado"] = "error";
		$respuesta["detalles"] = "articulo ya se encuentra registrado";
	}else{
		$valida = $db->insert('articulo', 
				[
					'art_isbn' => $_REQUEST["art_isbn"], 
					'art_doi' => $_REQUEST["art_doi"],
					'art_ind' => $_REQUEST["art_ind"],
					'art_idi' => $_REQUEST["art_idi"],
					'art_area' => $_REQUEST["art_area"],
					'art_tit' => $_REQUEST["art_tit"],
					'art_pre_anio' => $_REQUEST["art_pre_anio"],
					'art_pre_mes' => $_REQUEST["art_pre_mes"],
					'art_pag_ini' => $_REQUEST["art_pag_ini"],
					'art_pag_fin' => $_REQUEST["art_pag_fin"],
					'art_urt' => $_REQUEST["art_urt"],
					'art_res' => $_REQUEST["art_res"],
					'art_rev_id' => $_REQUEST["art_rev_id"]
				]
			);

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "registro el articulo correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "error al intentar registrar el articulo";	
		}
	}
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "Faltan algunos parametros en la peticion para crear el articulo";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
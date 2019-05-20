<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

if ( isset( $_REQUEST["eve_fec_ini"] ) 
	&& isset( $_REQUEST["eve_fec_fin"] )
	&& isset( $_REQUEST["eve_pais_des"] )
	&& isset( $_REQUEST["eve_pais_ori"] )
	&& isset( $_REQUEST["eve_tip_mov"] )
	&& isset( $_REQUEST["eve_val_apr"] )
	&& isset( $_REQUEST["eve_ent_ori"] )
	&& isset( $_REQUEST["eve_ent_des"] )
	&& isset( $_REQUEST["eve_tip_ben"] )
	&& isset( $_REQUEST["eve_anio"] )
	&& isset( $_REQUEST["eve_imp"] )
	&& isset( $_REQUEST["eve_obj"] )
	) 
{


		$valida = $db->insert('eventos', 
				[
					'eve_fec_ini' => $_REQUEST["eve_fec_ini"],
					'eve_fec_fin' => $_REQUEST["eve_fec_fin"],
					'eve_pais_des' => $_REQUEST["eve_pais_des"],
					'eve_pais_ori' => $_REQUEST["eve_pais_ori"],
					'eve_tip_mov' => $_REQUEST["eve_tip_mov"],
					'eve_val_apr' => $_REQUEST["eve_val_apr"],
					'eve_ent_ori' => $_REQUEST["eve_ent_ori"],
					'eve_ent_des' => $_REQUEST["eve_ent_des"],
					'eve_tip_ben' => $_REQUEST["eve_tip_ben"],
					'eve_anio' => $_REQUEST["eve_anio"],
					'eve_imp' => $_REQUEST["eve_imp"],
					'eve_obj' => $_REQUEST["eve_obj"]				
				]
			);

		if ( $valida == 1 ) 
		{
			$respuesta["estado"] = "ok";
			$respuesta["detalles"] = "registro el evento correctamente";	
		}else{
			$respuesta["estado"] = "error";
			$respuesta["detalles"] = "error al intentar registrar el evento";	
		}
	
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "Faltan algunos parametros en la peticion para crear el evento";	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
<?php

require __DIR__ . '/src/base_datos.php';

$respuesta = array();

$valida = $db->get('editorial');

$contador = count($valida);

if ( $contador > 0 )
{
	$respuesta["estado"] = "ok";
	$respuesta["detalles"] = "existen $contador editoriales registrados";	
	$respuesta["cantidad_resultados"] = $contador;	
	$respuesta["user_data"] = $valida;
}else{
	$respuesta["estado"] = "error";
	$respuesta["detalles"] = "no se encontro editorial registrada";	
	$respuesta["cantidad_resultados"] = $contador;	
}

# DEBUG
//echo "<pre>";
//print_r($respuesta);

echo json_encode($respuesta);
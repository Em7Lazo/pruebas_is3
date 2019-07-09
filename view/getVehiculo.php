<?php 
	$seudonimo = $_GET['equipo'];
	$connection = mysql_connect("localhost", "root", "");
	mysql_select_db("bd_proyecto_pj", $connection);
	mysql_set_charset("utf8");
	$sql = "SELECT v.ID_VEHICULO, v.N_PLACA , p.PARAM_DESCRIPCION AS MARCA, v.MODELO, v.COLOR, v.ANIO, v.KILOMETRAJE_AC FROM dt_vehiculos v INNER JOIN dt_parametros p ON v.ID_MARCA=p.ID_PARAMETRO WHERE v.N_PLACA= '$seudonimo' LIMIT 1";
	$result = mysql_query($sql, $connection);
	if (mysql_num_rows($result) > 0) {
		$equipo = mysql_fetch_object($result);
		$equipo->status = 200;
		echo json_encode($equipo);
	}else{
		$error = array('status' => 400);
		echo json_encode((object)$error);
	}
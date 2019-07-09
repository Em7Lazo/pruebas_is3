<?php
$con= new mysqli("localhost","root","","bd_proyecto_pj");
/*include("../../config/conexion.inc.php");*/

sleep(1);

$idcontrol  =   $_POST['idcontrol'];
$kilometraje_ing    =   $_POST['kilometraje_ing'];
$kilometraje    =   $_POST['kilometraje'];

ini_set('date.timezone','America/Lima');
$hora_ingreso   =   date('d-m-Y H:i:s');


   

   $con->query("UPDATE control_vehicular cv INNER JOIN dt_vehiculos ve ON cv.N_PLACA=ve.N_PLACA SET cv.KILOMETRAJE_FN ='$kilometraje_ing' , cv.F_REGISTRO_I='$hora_ingreso', cv.ESTADO_C='SD', ve.KILOMETRAJE_AC ='$kilometraje_ing', ve.CONTROL_ESTADO='DS' WHERE ID_CONTROL = '$idcontrol'");
  
   
   
?>


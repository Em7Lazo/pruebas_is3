<?php
$con= new mysqli("localhost","root","","bd_proyecto_pj");
/*include("../../config/conexion.inc.php");*/

sleep(1);

$placa  =   $_POST['placa'];
$kilometraje    =   $_POST['kilometraje'];
$combustible = '0';
$conductor  =   $_POST['conductor'];
$lugar_o    = $_POST['lugar_o'];
$lugar_d    =   $_POST['lugar_d'];
$actividades    =   $_POST['actividades'];
ini_set('date.timezone','America/Lima');
$fecha_salida   =   date('Y-m-d H:i:s');
$estado =   'ND';




$sql=$con->query("SELECT * FROM parametros WHERE descripcion_parametro= '".$placa."'");
$num=$sql->num_rows;

$sqlpro=$con->query("SELECT * FROM control_vehicular");
$numpro=$sqlpro->num_rows;

    if($num==0){

         $contador=str_pad($numpro+1, 5, "0", STR_PAD_LEFT);
         $insert=$con->query("INSERT INTO control_vehicular (ID_CONTROL, N_PLACA, KILOMETRAJE, COMBUSTIBLE, ID_USUARIO, L_ORIGEN, L_DESTINO, ACTIVIDADES, F_REGISTRO_S, KILOMETRAJE_FN, F_REGISTRO_I, ESTADO_C) VALUES ('$contador', '$placa', '$kilometraje', '$combustible', '$conductor', '$lugar_o', '$lugar_d', '$actividades', '$fecha_salida', 'N/I', 'N/R', '$estado');");
        
        $insert=$con->query("UPDATE dt_vehiculos SET CONTROL_ESTADO='OC' WHERE N_PLACA = '{$_POST['placa']}'");
         /*Mostrar alerta guardó con exito*/
         echo 1;
        

            }else{
            /*Mostrar códifgo de producto ya existe*/
            echo 0;


    }



?>
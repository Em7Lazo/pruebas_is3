<?php
$con= new mysqli("localhost","root","","bd_proyecto_pj");
/*include("../../config/conexion.inc.php");*/

/* ESTE SLEEP ES EL TIEMPO Q LE DAS AL GIF COMO SIMULACION Q CARGA*/
sleep(1);

$placa  =   $_POST['placa'];
$kilometraje    =   $_POST['kilometraje'];
$combustible = '0';
$conductor  =   $_POST['conductor'];
$lugar_o    = $_POST['lugar_o'];
$lugar_d    =   $_POST['lugar_d'];
$actividades    =   $_POST['actividades'];
$pasajeros    =   $_POST['pasajeros'];
ini_set('date.timezone','America/Lima');
$fecha_salida   =   date('Y-m-d');
$h_salida   =   date('H:i:s');
$estado =   'ND';




$sql=$con->query("SELECT * FROM dt_parametros WHERE PARAM_DESCRIPCION= '".$placa."'");
$num=$sql->num_rows;

$sqlpro=$con->query("SELECT * FROM control_vehicular");
$numpro=$sqlpro->num_rows;

    if($num==0){

         $contador=str_pad($numpro+1, 5, "0", STR_PAD_LEFT);
         $insert=$con->query("INSERT INTO control_vehicular (ID_CONTROL, N_PLACA, KILOMETRAJE, COMBUSTIBLE, ID_USUARIO, L_ORIGEN, L_DESTINO, ACTIVIDADES, PASAJEROS, F_REGISTRO_S, HORA_S, KILOMETRAJE_FN, F_REGISTRO_I, ESTADO_C) VALUES ('$contador', '$placa', '$kilometraje', '$combustible', '$conductor', '$lugar_o', '$lugar_d', '$actividades','$pasajeros', '$fecha_salida', '$h_salida', 'N/REGITRADO', 'N/REGISTRADO', '$estado');");
        
         $insert=$con->query("UPDATE dt_vehiculos SET CONTROL_ESTADO='OC' WHERE N_PLACA = '{$_POST['placa']}'");
         ;
         $insert=$con->query("UPDATE dt_usuarios SET CONTROL_ESTADO = 'OC' WHERE ID_EMPLEADO = '{$_POST['conductor']}'");
         /*Mostrar alerta guardó con exito*/
         echo 1;
        

            }else{
            /*Mostrar códifgo de producto ya existe*/
            echo 0;


    }



?>
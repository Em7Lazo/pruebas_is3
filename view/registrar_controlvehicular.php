<?php
require_once('../config/conexion.inc.php');
$f_ingreso= date('Y-m-d H:i:s');
if(isset($_POST['registrar'])){
    $con->query("UPDATE control_vehicular cv INNER JOIN vehiculos ve ON cv.N_PLACA=ve.N_PLACA SET cv.KILOMETRAJE_FN ='{$_POST['kilometraje_ing']}' , cv.F_REGISTRO_I='{$_POST['hora_ingreso']}', cv.ESTADO_C='SD', ve.CONTROL_ESTADO='DS' WHERE ID_CONTROL = '{$_POST['idcontrol']}'");
    header('Location: datatableRegistroIngreso.php');
}
?>

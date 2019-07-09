<?php
require_once('../config/conexion.inc.php');


class Vehiculos extends Conexion{

        function __construct(){

                parent::__construct();

        }
           
     function listar_vehiculos(){
          $st=$this->_db->prepare("SELECT ve.ID_VEHICULO, ve.N_PLACA, pa.PARAM_DESCRIPCION, ve.MODELO, ve.COLOR, ve.ANIO, ve.KILOMETRAJE_AC, ve.CILINDRAJE, ve.COMBUSTIBLE, ve.F_REGISTRO, ve.ESTADO_VEHICULO FROM dt_vehiculos ve INNER JOIN dt_parametros pa ON ve.ID_MARCA=pa.ID_PARAMETRO");
          $st->execute(array());
           return $st->fetchAll();
        }
    

    
}
?>
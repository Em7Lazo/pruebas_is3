<?php
require_once('../config/conexion.inc.php');


class Vehiculos extends Conexion{

        function __construct(){

                parent::__construct();

        }
            function save_vehiculos($cod,$nplaca,$marca,$modelo,$color,$anio,$combu,$cilindraje,$f_reg,$estado){
        		$array=array("error1"=>"Inconsistencia en el Proceso!","exito"=>"ok");
        		$msg=array();
            $st = $this->_db->prepare("INSERT INTO vehiculos (ID_VEHICULO, N_PLACA, ID_MARCA, MODELO, COLOR, ANIO, COMBUSTIBLE, CILINDRAJE, F_REGISTRO, ESTADO_VEHICULO) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $st->execute(array($cod,$nplaca,$marca,$modelo,$color,$anio,$combu,$cilindraje,$f_reg,$estado));              	
             if($st){
               $msg['mensaje']=$array['exito'];
             }else{
               $msg['mensaje']=$array['error1'];
             }
                return  json_encode($msg);
               		
                
        }
        function autocodigo($tabla){
          $st=$this->_db->prepare("SELECT * FROM $tabla");
          $st->execute(array());
          $count=$st->rowCount();
            if($count==0){
               $cod='00001';
            }else{
               $cod=str_pad($count+1, 5, "0", STR_PAD_LEFT); 
            }
            return $cod;
        }
    
     function listar_vehiculos(){
          $st=$this->_db->prepare("SELECT ve.ID_VEHICULO, ve.N_PLACA, pa.descripcion_parametro, ve.MODELO, ve.COLOR, ve.ANIO, ve.KILOMETRAJE_AC, ve.CILINDRAJE, ve.COMBUSTIBLE, ve.F_REGISTRO, ve.ESTADO_VEHICULO FROM vehiculos ve INNER JOIN parametros pa ON ve.ID_MARCA=pa.id_parametro");
          $st->execute(array());
           return $st->fetchAll();
        }
    

    
}
?>
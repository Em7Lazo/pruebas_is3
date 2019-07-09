<?php
require_once('../config/conexion.inc.php');


class Listar extends Conexion{

        function __construct(){

                parent::__construct();

        }
           
    function listar_empleados(){
          $st=$this->_db->prepare("SELECT emp.ID_EMPLEADO, emp.EMP_APELLIDOS, emp.EMP_NOMBRES, emp.DOC_IDENTIDAD, par.PARAM_DESCRIPCION AS SEXO, emp.EMP_EMAIL, emp.EMP_TELEFONO, emp.FECHA_NAC, emp.FECHA_REG, emp.EMP_ESTADO FROM dt_empleados emp INNER JOIN dt_parametros par ON emp.EMP_SEXO=par.ID_PARAMETRO");
          $st->execute(array());
           return $st->fetchAll();
        }
    
    function listar_usuarios(){
          $st=$this->_db->prepare("SELECT us.ID_USUARIO, emp.EMP_APELLIDOS, emp.EMP_NOMBRES,us.SEDE, par.PARAM_DESCRIPCION, us.USUARIO, us.PASS, us.FECHA_REG, us.USUARIO_ESTADO FROM dt_usuarios us INNER JOIN dt_empleados emp ON us.ID_EMPLEADO=emp.ID_EMPLEADO INNER JOIN dt_parametros par ON us.ID_NIVEL=par.ID_PARAMETRO");
          $st->execute(array());
           return $st->fetchAll();
        }
    

    
}
?>
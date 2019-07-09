<?php
/* ~Desarrollo#opc */
$con= new mysqli("localhost","root","","bd_proyecto_pj");
/* Auditoria */  

abstract class Conexion extends PDO
{
        protected $_db;

    public function __construct() 
        {
        parent::__construct(
                'mysql:host=' . 'localhost' .
                ';dbname=' . 'bd_proyecto_pj',
                'root', 
                '', 
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . 'utf8',
                                        PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
                    ));

        $this->_db = $this;        
    }
}
?>
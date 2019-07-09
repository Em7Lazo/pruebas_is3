<?php
  require_once('../config/conexion.inc.php');
  class Usuario extends Conexion
    {
    public function login($user, $clave)
    {
      
      parent::conectar();
     
      $user  = parent::salvar($user);
      $clave = parent::salvar($clave);      
      $consulta = 'select id, nombre, cargo from usuarios where email="'.$user.'" and clave= MD5("'.$clave.'")';      
      $verificar_usuario = parent::verificarRegistros($consulta);      
      if($verificar_usuario > 0){      
        $user = parent::consultaArreglo($consulta);        
        session_start();       
        $_SESSION['id']     = $user['id'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['cargo']  = $user['cargo'];  
        echo 'principal.php';     
      }else{
        echo 'error_3';
      }
        parent::cerrar();
    }
      
    public function registroUsuario($name, $email, $clave, $c)
 
  }

?>

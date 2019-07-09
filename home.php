<?php
session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $connection = mysqli_connect('localhost', 'root', '', 'bd_proyecto_pj');
    $data = mysqli_query($connection, "SELECT us.ID_USUARIO, emp.EMP_APELLIDOS, emp.EMP_NOMBRES,us.SEDE, par.PARAM_DESCRIPCION, us.USUARIO, us.PASS, us.FECHA_REG, us.USUARIO_ESTADO FROM dt_usuarios us INNER JOIN dt_empleados emp ON us.ID_EMPLEADO=emp.ID_EMPLEADO INNER JOIN dt_parametros par ON us.ID_NIVEL=par.ID_PARAMETRO WHERE us.ID_USUARIO = '{$user_id}'");
    $row_cnt = mysqli_num_rows($data);
        
        if($row_cnt == 1){
            $row = mysqli_fetch_array($data);
            $apellidos = $row['EMP_APELLIDOS'];
            $nombres = $row['EMP_NOMBRES'];
            $perfil = $row['PARAM_DESCRIPCION'];
            
        }
    }else{
    header("Location: index.php");
    exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./img/icono.png" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./img/icono.png" />
    <!-- Generated: 2018-03-20 15:36:58 +0100 -->
    <title>CSJP - Sistema Vehicular</title>
    
    <script src="assets/js/require.min.js"></script>
    <script type="text/javascript">
    //Ajusta el tamaño de un iframe al de su contenido interior para evitar scroll
        function autofitIframe(id){
        if (!window.opera && document.all && document.getElementById){
            id.style.height=id.contentWindow.document.body.scrollHeight;
            } else if(document.getElementById) {
            id.style.height=id.contentDocument.body.scrollHeight+"px";
            }
        } 
      
      
    </script>
    <script>
      requirejs.config({
          baseUrl: '.'
      		});
    </script>
    <!-- Dashboard Core -->
    <link href="assets/css/dashboard.css" rel="stylesheet" />
    <script src="assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="assets/plugins/charts-c3/plugin.js"></script>
    
    <script type="text/javascript" language="javascript" src="js/jquery-3.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/script_login.js"></script>
    <style type="text/css">
        
        .nav-item{
            
        }
    
        .dropdown-item {
            color: azure;
        }
        
        .dropdown-item.out{
            color:crimson;
        }
    
    </style>
  </head>
  
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header" style="background-image: url(img/fondo_gris.gif);">
          <div class="container" >
            <div class="navbar p-0">
              <a class="navbar-brand" style="font-size: 16px;">
                <img src="./img/icono.png" class="navbar-brand-img" alt="tabler.io"> Corte Superior de Justicia de Piura
              </a>
              <div class="nav order-lg-2" style="font-size: 12px;">
               
                <div class="dropdown ml-3">
                 <a  href="logout.php" style="color:red;" class="nav-link"><i class="fe fe-log-out"></i>&nbsp; Cerrar sesión</a>
                  
                </div>
              </div>
              
              
            </div>
          </div>
        </div>
        <div class="header-nav d-none d-lg-flex" style="background:#800000;">
          <div class="container">
            <div class="row align-items-center">
              <div class="col">
                <ul class="nav nav-tabs" style="font-size: 13px;">
                  <li class="nav-item">
                    <a href="view/estadistica_cv.php" target="main" class="nav-link"><i class="fe fe-home"></i> Home</a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-box"></i> Registro</a>
                    <div class="nav-submenu nav" style="background:#800000;">
                      <a href="view/datatable_empleados.php" target="main" class="nav-item "> Empleados</a>
                      <a href="view/datatable_usuarios.php" target="main" class="nav-item "> Usuarios</a>
                      <a href="view/datatable_vehiculos.php" target="main" class="nav-item "> Vehiculos</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fa fa-automobile"></i> Control vehicular</a>
                    <div class="nav-submenu nav" style="background:#800000;">
                      <a  href="view/datatableRegistroIngreso.php" target="main" class="nav-item "> Registrar Ingreso</a>
                      <a href="view/formregistroSalida.php" target="main" class="nav-item "> Registrar Salida</a>
                      
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="view/datatable_reportevehicular.php" target="_blank" class="nav-link" ><i class="fe fe-download"></i> Consultar</a>
                    
                  </li>
                  
                </ul>
                
              </div>
              
            </div>
          </div>
        </div>
        <div class="page-content">
          <div class="container">
            
            <div>
               <iframe id="miFrame" name="main" src=""  scrolling="NO" frameborder="0" width="100%"  onload="autofitIframe(this);"></iframe>
            </div>
           
            
          </div>
        </div>
      </div>
     
      <footer class="footer">
        <div class="container">
          <div class="row align-items-center flex-row-reverse">
          
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2017 <a href="http://www.pj.gob.pe/" target="_blank">Corte Superior de Justicia de Piura</a>. Todos los derechos reservados. 
            </div>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>
<?php
if (!$_SESSION['useruario_logeado']){
    header('Location: index.php');
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
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
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
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <script src="./assets/js/dashboard.js"></script>
   

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
        <div class="header">
          <div class="container">
            <div class="navbar p-0">
              <a class="navbar-brand" href="#">
                <img src="./img/icono.png" class="navbar-brand-img" alt="tabler.io"> Corte Superior de Justicia de Piura
              </a>
              <div class="nav order-lg-2">
               
                <div class="dropdown ml-3">
                  <a href="#" class="nav-link" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(./assets/images/faces/female/25.jpg)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">CARLOS EMILIO LAZO</span>
                      <small class="text-muted d-block mt-1">ADMINISTRADOR</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" style="background:#800000;">
                    <a class="dropdown-item" href="#">
                      <span>Perfil</span>
                    </a>
                    <a class="dropdown-item" href="#">
                      <span>Configuración</span>
                    </a>
                    <a class="dropdown-item" href="#">
                      <span class="float-right"><span class="badge badge-primary">6</span></span>
                      <span>Inbox</span>
                    </a>
                    
                    <div class="dropdown-divider"></div>
                    
                    <a class="dropdown-item out" href="logout.php" style="color:"><i class="fe fe-log-out"></i> Cerrar sesión</a>
                  </div>
                </div>
              </div>
              <!--
              <div class="collapse navbar-collapse order-lg-1" id="navbarToggler">
                <ul class="navbar-nav mt-2 mt-lg-0 mx-0 mx-lg-2">
                  <li class="nav-item"><a href="#" class="nav-link">Dashboard</a></li>
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Projects</a>
                    <div class="dropdown-menu mt-2 text-color" role="menu">
                      <a href="#" class="dropdown-item"><i class="dropdown-icon fa fa-tag"></i> Action </a>
                      <a href="#" class="dropdown-item"><i class="dropdown-icon fa fa-pencil"></i> Another action </a>
                      <a href="#" class="dropdown-item"><i class="dropdown-icon fa fa-reply"></i> Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item"><i class="dropdown-icon fa fa-ellipsis-h"></i> Separated link</a>
                    </div>
                  </li>
                </ul>
              </div>
              -->
            </div>
          </div>
        </div>
        <div class="header-nav d-none d-lg-flex" style="background:#800000;">
          <div class="container">
            <div class="row align-items-center">
              <div class="col">
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a href="principal.php" class="nav-link active"><i class="fe fe-home"></i> Home</a>
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
                  <!--
                  <li class="nav-item">
                    <a href="view/datatableRegistroIngreso.php" class="nav-link" target="main"><i class="fa fa-reply"></i> Registrar Entrada</a>
                  </li>
                  <li class="nav-item">
                    <a href="view/formregistroSalida.php" class="nav-link" target="main"><i class="fa fa-share"></i> Registrar Salida</a>
                  </li>
                  
                  -->
                  <li class="nav-item">
                    <a href="view/datatable_reportevehicular.php" class="nav-link" target="_blank"><i class="fe fe-download"></i> Consultar</a>
                    
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
            <div class="col-auto ml-auto">
              <div class="row align-items-center">
                <div class="col-auto">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">Coordinación de Informática - Área de Desarrollo</li>
                    
                  </ul>
                </div>
                
              </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2017 <a href="http://www.pj.gob.pe/" target="_blank">Corte Superior de Justicia de Piura</a>. Todos los derechos reservados. 
            </div>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>
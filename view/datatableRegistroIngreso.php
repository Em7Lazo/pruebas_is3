<?php
include("../config/conexion.inc.php");
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
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-03-20 15:36:58 +0100 -->
    <title>Homepage - tabler.github.io - a responsive, flat and full featured admin template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      		});
    </script>
    <!-- Dashboard Core -->
    <link href="../assets/css/dashboard.css" rel="stylesheet" />
    <script src="../assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="../assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="../assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="../assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="../assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="../assets/plugins/input-mask/plugin.js"></script>
    
    
  </head>
  <body class="">
    <div class="">
      <div class="">
       
        
        
          <div class="">
            
            
            
            <div class="row row-cards">
              
              
              
              <div class="col-sm-6 col-lg-12">
                <div class="row">
                  
                  
                  
                  
                </div>
              </div>
              <div class="col-12">
                <div class="card">
                  <!-- <div class="card-header">
                    <h3 class="card-title">Invoices</h3>
                  </div> -->
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-striped table-bordered" width="100%" cellspacing="0" >
                      <thead style="background-color:#339966;  padding: 15px 0px 15px 0px">
                        <tr >
                          
                          <th style="font-size:13px; width:7%;color: #003366;">Placa</th>
                          <th style="font-size:13px; width:18%; color:#003366;">Conductor asignado</th>
                          <th style="font-size:13px; width:10%; color:#003366;">LUGAR DE ORIGEN</th>
                          <th style="font-size:13px; width:10%; color:#003366;">Lugar destino</th>
                          <th style="font-size:13px; width:5%; color:#003366;">KM</th>
                          <th style="font-size:13px; width:23%; color:#003366;">PROPOSITO</th>
                          <th style="font-size:13px; width:12%; color:#003366;">HORA DE SALIDA</th>
                          <th style="font-size:13px; width:10%; color:#003366;">CONTROL</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                                #MOSTRAR TODOS LOS REGISTROS
                                $sql_todo=$con->query("SELECT c.ID_CONTROL, c.N_PLACA, c.KILOMETRAJE, c.L_ORIGEN, c.L_DESTINO, c.F_REGISTRO_S, c.F_REGISTRO_I, c.ACTIVIDADES, c.ESTADO_C, c.KILOMETRAJE_FN, e.EMP_APELLIDOS, e.EMP_NOMBRES FROM dt_empleados e INNER JOIN control_vehicular c ON e.id_empleado=c.ID_USUARIO INNER JOIN dt_vehiculos ve ON c.N_PLACA=ve.N_PLACA WHERE ID_USUARIO=e.ID_EMPLEADO AND ESTADO_C='ND' ORDER BY c.F_REGISTRO_S DESC");
                                while($row=$sql_todo->fetch_array()){
                                //echo $dato['ID_USUARIO'].' '.$dato['DATOS'].'<br>';

                                    ?>    
                        <tr>
                          <td  style="font-size:12px;"><?php echo $row['N_PLACA'];?></td>
                          <td style="font-size:12px;"><?php echo $row['EMP_APELLIDOS']. " ".$row['EMP_NOMBRES'];?></td>
                          <td style="font-size:12px;"><?php echo $row['L_ORIGEN'];?></td>
                          <td style="font-size:12px;"><?php echo $row['L_DESTINO'];?></td>
                          <td style="font-size:12px;"><?php echo $row['KILOMETRAJE'];?></td>
                          <td style="font-size:12px;"><?php echo $row['ACTIVIDADES'];?></td>
                          <td style="font-size:12px;"><?php echo $row['F_REGISTRO_S'];?></td>
                          <td>
                          <a href="formregistroIngreso.php?ID_CONTROL=<?php  echo $row['ID_CONTROL']; ?>">
                           <button type="button" class="btn btn-info btn-sm"><i class="fe fe-check-circle"></i></button>
                          </a>
                          
                           <button type="button" class="btn btn-warning btn-sm"><i class="fe fe-align-justify"></i></button>
                                            
                          
                          
                          </td>
                        </tr>
                       <?php
                         }
                        ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
      
      
    
  </body>
</html>
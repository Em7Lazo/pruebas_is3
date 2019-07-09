<?php
require_once('../config/conexion.inc.php');
    if(isset($_GET['ID_CONTROL'])){
       $datos = $con->query("SELECT c.ID_CONTROL, c.N_PLACA, c.KILOMETRAJE, c.L_ORIGEN, c.L_DESTINO, c.F_REGISTRO_S, c.F_REGISTRO_I, c.ACTIVIDADES, c.KILOMETRAJE_FN, e.ID_EMPLEADO, e.EMP_APELLIDOS, e.EMP_NOMBRES FROM dt_empleados e INNER JOIN control_vehicular c ON e.ID_EMPLEADO=c.ID_USUARIO INNER JOIN dt_vehiculos ve ON c.N_PLACA=ve.N_PLACA WHERE ID_CONTROL = '{$_GET['ID_CONTROL']}'");
        $control = mysqli_fetch_assoc($datos);
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
    
    <!-- Generated: 2018-03-20 15:36:58 +0100 -->
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link rel="stylesheet" href="../js/jquery-ui.css">
    
 
    <!-- Dashboard Core -->
    <link href="../assets/css/dashboard.css" rel="stylesheet" />
    
    
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/vendors/jquery-3.2.1.min.js"></script>
   
    
    <script  type="text/javascript" src="../js/jquery-3.min.js"></script>

    <script type="text/javascript" src="../jquery-ui/jquery-ui.js"></script>
    
    <script>
    $(function(){
        $('#registrar').on('click', function(e){
            e.preventDefault();

            
            var idcontrol   =   $('#idcontrol').val().trim();
            var kilometraje   =   $('#kilometraje').val().trim();
            var kilometraje_ing   =   $('#kilometraje_ing').val().trim();
            var hora_ingreso     =   $('#hora_ingreso').val();
            var km  =   $('#kilometraje').val();
            var km_ing   =   $('#kilometraje_ing').val();
            
            
             /* ajax */
            if(kilometraje_ing == ""){
            $('#ingresar_km').show();
            $('#ingresar_km_m').hide(); 
            }else{
            $('#ingresar_km').hide();
            $('#ingresar_km_m').hide();
           
                
            $.ajax({
                type: "POST",
                url: "controlador/registrar_ingresovehicular.php",
                data: ('idcontrol='+idcontrol+'&kilometraje_ing='+kilometraje_ing+'&hora_ingreso='+hora_ingreso),
                beforeSend: function(){
                    $('#procesando').show();
                    
                    $('#registrar').hide();
                    $('#cancelar').hide();
                    
                },
                success: function(respuesta){
                    $('#exito').show();
                    $('#cancelar').hide();
                    $('#procesando').hide();
                    if(respuesta==1){
                    $('#exito').show();
                        
                        

                    }
                    else{
                        
                    }
                    
                }
            }); /*<-- ajax*/
            
        }
        })
    })
    
    </script> 
    
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">


        <div class="page-content">
          <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <!--
            <div class="card-alert alert alert-success mb-0">
            <i class="fe fe-check"></i>        Se registro con exito
            </div>
            -->
            </div>
             <div class="col-lg-5">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Información del Vehiculo</h3>
                </div>
                <div class="card-body" style="">
                <form action="guardar.php" method="post">
                <div class="form-group">
                    <label class="form-label">Vehiculo N° de placa</label>
                    <input name="placa" id="placa" type="text" class="form-control" disabled value="<?php echo $control['N_PLACA']; ?>">
                  </div>
                 <div class="form-group">
                    <label class="form-label">Conductor asignado</label>
                    <input id="marca" type="text" class="form-control" disabled value="<?php echo $control['EMP_APELLIDOS']. " " . $control['EMP_NOMBRES'] ?>" >
                  </div>
                  <div class="form-group">
                    <label class="form-label">Fecha y hora de salida</label>
                    <input id="marca" type="text" class="form-control" disabled value="<?php echo $control['F_REGISTRO_S'] ?>">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Kilometraje</label>
                    <input id="kilometraje" type="text" class="form-control" disabled value="<?php echo $control['KILOMETRAJE'] ?>">
                  </div>
                  
                  </form>            
                     
                
                 
                 
                </div>
              </div>
     
            </div>    
            <div class="col-lg-7">
              <div class="card">
               
                <div class="card-body">
                  <h3 class="card-title">Registrar datos para el ingreso de vehiculo</h3>
                  
                  <div class="row">
                   
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="form-label">Kilometraje de recorrido</label>
                        <input type="text" name="kilometraje_ing" id="kilometraje_ing" class="form-control" >
                        <br>
                        <div id="ingresar_km" class="card-alert alert alert-danger mb-0" style="display:none;">
                        <i class="fe fe-alert-triangle"></i> Ingresar kilometraje recorrido
                        </div>
                        <div id="ingresar_km_m" class="card-alert alert alert-danger mb-0" style="display:none;">
                        <i class="fe fe-alert-triangle"></i> Kilometraje no es válido!
                        </div>
                      </div>
                    </div>


                
                    <div class="col-md-12">
                      <div class="form-group mb-0">
                        <label class="form-label">Observaciones</label>
                        
                        <textarea rows="2" class="form-control" id="actividades" name="actividades" value=""></textarea>
                      </div>
                    </div>
                  </div>
                    
                </div>
                <div class="card-footer text-right">
                  
                  <input type="hidden" name="idcontrol" id="idcontrol" value="<?php echo $control['ID_CONTROL']; ?>">
                                        <?php
                                        ini_set('date.timezone','America/Lima');
                                        $hora_ingreso= date('Y-m-d H:i:s');
                                        ?>
                                        
                  <input type="hidden" id="hora_ingreso" name="hora_ingreso" value="<?php echo $hora_ingreso ?>">
                  
                  <div   id="procesando" style="display:none;">
                    <img src="../img/gif/loading.gif" style="width:6%;" alt="">
                    <strong><label class="control-label" for="" style="color:;">Procesando...</label></strong> 			
                  </div>
                  <div class="card-alert alert alert-success mb-0" id="exito" style="display:none;">
                        <i class="fe fe-check-circle"></i> Ingreso de vehiculo se registro con éxito
                        </div>
                   <button type="submit" id="registrar" name="registrar" class="btn btn-cyan"><i class="fe fe-save"></i> Registrar</button>
                  <a href="datatableRegistroIngreso.php"><button id="cancelar" type="submit" class="btn btn-danger">Cancelar<i class="fe fe-x"></i></button></a>
                  
                </div>
                <div class="card-footer text-right" style="display:none;">
                  <div class="loader"></div>
                </div>
                  
              </div>
              
            </div>
           
          </div>
        </div>
      </div>
    </div>
    
    
  </div>
  
  
  <script  type="text/javascript" src="../js/jquery-3.min.js"></script>

<script type="text/javascript" src="../jquery-ui/jquery-ui.js"></script>
</body>
</html>

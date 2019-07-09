<?php  
    include("../config/conexion.inc.php");
 	
	$result = mysqli_query($con, "SELECT * FROM dt_vehiculos WHERE CONTROL_ESTADO = 'DS'");
	$array = array();
	if($result){
		while ($row = mysqli_fetch_array($result)) {
			$equipo = utf8_encode($row['N_PLACA']);
			array_push($array, $equipo); // equipos
		}
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
    
    <!-- c3.js Charts Plugin -->
    <link href="../assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    
    <!-- Google Maps Plugin -->
    <link href="../assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    
    <!-- Input Mask Plugin -->
   
    
    <script src="../assets/js/vendors/jquery-3.2.1.min.js"></script>
   
    
    <script  type="text/javascript" src="../js/jquery-3.min.js"></script>

    <script type="text/javascript" src="../jquery-ui/jquery-ui.js"></script>
    
    <script>
    /*PATA ESTE ES EL CODIGO JAVA+AJAX*/
    $(function(){
        $('#registrar').on('click', function(e){
            e.preventDefault();

            
            var placa   =   $('#placa').val().trim();
            var kilometraje    =   $('#kilometraje').val().trim();
            var conductor     =   $('#conductor').val();
            var lugar_o =  $('#lugar_o').val();
            var lugar_d   =   $('#lugar_d').val();
            var actividades       =   $('#actividades').val().trim();
            var pasajeros       =   $('#pasajeros').val().trim();
            
            /* ajax */
        if(placa == ""){
        $('#ingresar_placa').show();
        $('#placa').focus();   
        }else if($("#placa").val().length < 7){
        $('#seleccionar_placa').show();
        $('#ingresar_placa').hide();
        $('#placa').focus();

           }else if(conductor == 0){
            $('#seleccionar_conductor').show();
            $('#conductor').focus();   
            }            


                else{
                $('#ingresar_placa').hide();
                $('#seleccionar_placa').hide();
                $('#seleccionar_conductor').hide();


                $.ajax({
                    type: "POST",
                    url: "controlador/registrar_salidavehicular.php",
                    data: ('placa='+placa+'&kilometraje='+kilometraje+'&conductor='+conductor+'&lugar_o='+lugar_o+'&lugar_d='+lugar_d+'&actividades='+actividades+'&pasajeros='+pasajeros),
                    beforeSend: function(){
                        $('#procesando').show();
                        $('#registrar').hide();
                        $('#cancelar').hide();

                    },
                    success: function(respuesta){
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
                
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Registrar datos para la Salida del Vehiculo</h3>
                  <form method="post" id="formRegistroP" name="formRegistroP">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-label">N° de placa del vehiculo</label>
                        <input type="text" class="form-control form-control-sm" name="placa" id="placa">
                        <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        var items = <?= json_encode($array) ?>

                                                        $("#placa").autocomplete({
                                                            source: items,
                                                            select: function (event, item) {
                                                                var params = {
                                                                    equipo: item.item.value
                                                                };
                                                                $.get("getVehiculo.php", params, function (response) {
                                                                    var json = JSON.parse(response);
                                                                    if (json.status == 200){
                                                                        $("#marca").val(json.MARCA)
                                                                        $("#modelo").val(json.MODELO)
                                                                        $("#color").val(json.COLOR)
                                                                        $("#anio").val(json.ANIO)
                                                                        $("#kilometraje").val(json.KILOMETRAJE_AC)
                                                                        $("#km").val(json.KILOMETRAJE_AC)
                                                                        document.getElementById('placa').disabled=true;
                                                                    
                                                                        
                                                                        
                                                                        }else{

                                                                    }
                                                                }); // ajax
                                                            }
                                                        });
                                                    });
                        </script>
                        <br>
                        <div id="ingresar_placa" class="card-alert alert alert-info mb-0" style="display:none;">
                        <i class="fe fe-alert-triangle"></i> Ingresar N° placa.
                        </div>
                        <div id="seleccionar_placa" class="card-alert alert alert-warning mb-0" style="display:none;">
                        <i class="fe fe-alert-triangle"></i> Buscar y seleccionar placa.
                        </div>
                        <div id="error_placa" class="card-alert alert alert-danger mb-0"  style="display:none;">
                        <i class="fe fe-alert-triangle"></i> Placa no válida!
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <div class="form-group">
                        <label class="form-label">Kilometraje</label>
                        <input id="kilometraje" name="kilometraje" type="text" class="form-control" disabled="" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Conductor</label>
                        <select name="conductor" id="conductor" class="form-control border-input">
                            <option value="0"> SELECCIONAR. . .</option>
                            <?php
                            $sql_todo=$con->query("SELECT us.ID_USUARIO, em.ID_EMPLEADO, em.EMP_APELLIDOS, em.EMP_NOMBRES, pa.PARAM_DESCRIPCION, us.CONTROL_ESTADO FROM dt_usuarios us INNER JOIN dt_parametros pa ON us.ID_NIVEL=pa.ID_PARAMETRO INNER JOIN dt_empleados em ON us.ID_EMPLEADO=em.ID_EMPLEADO WHERE pa.PARAM_DESCRIPCION='CONDUCTOR' AND us.CONTROL_ESTADO='DS'");
                             while($row=$sql_todo->fetch_array()){  
                             ?>
                             <option value="<?php echo $row['EMP_APELLIDOS']. " " .$row['EMP_NOMBRES']; ?>"> <?php echo $row['EMP_APELLIDOS']. " " .$row['EMP_NOMBRES']; ?></option>
                        <?php } ?>
                        </select>
                        <br>
                        <div id="seleccionar_conductor" class="card-alert alert alert-info mb-0"  style="display:none;">
                        <i class="fe fe-alert-triangle"></i> Seleccionar Conductor
                      </div>
                      </div> 
                      
                    </div>
                  
               
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Lugar de origen</label>
                        <select name="lugar_o" id="lugar_o" class="form-control border-input">
                         <option value="0"> SELECCIONAR. . .</option>
                         <?php
                         $sql_todo=$con->query("SELECT * FROM dt_parametros WHERE PARAM_CATEGORIA='DEPENDENCIA'");
                         while($row=$sql_todo->fetch_array()){  
                         ?>
                         <option value="<?php echo $row['PARAM_DESCRIPCION']; ?>"> <?php echo $row['PARAM_DESCRIPCION']; ?></option>
                         <?php } ?>
                      </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Lugar de destino</label>
                        <select name="lugar_d" id="lugar_d" class="form-control border-input">
                         <option value="0"> SELECCIONAR. . .</option>
                         <?php
                         $sql_todo=$con->query("SELECT * FROM dt_parametros WHERE PARAM_CATEGORIA='DEPENDENCIA'");
                         while($row=$sql_todo->fetch_array()){  
                         ?>
                          <option value="<?php echo $row['PARAM_DESCRIPCION']; ?>"> <?php echo $row['PARAM_DESCRIPCION']; ?></option>
                         <?php } ?>
                        </select>
                                                
                      </div>
                    </div>

                
                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                        <label class="form-label">Propósito de viaje</label>
                        <textarea name="actividades" id="actividades" rows="1" class="form-control" placeholder="(max 150 caracteres)"></textarea>
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">Pasajeros</label>
                        <textarea name="pasajeros" id="pasajeros" rows="1" class="form-control" placeholder="(max 100 caracteres)"></textarea>
                      </div>
                    </div>
                  </div>
                    </form>
                </div>
                <div class="card-footer text-right">
                  <div   id="procesando" style="display:none;">
                    <img src="../img/gif/loading.gif" style="width:6%;" alt="">
                    <strong><label class="control-label" for="" style="color:;">Procesando...</label></strong> 			
                  </div>
                  
                  <div id="exito" class="card-alert alert alert-success mb-0" style="display:none;">
                    <i class="fe fe-check"></i> Salida de vehiculo, se registro con éxito.
                        
                    </div>
                    
                  <button type="submit" id="registrar" class="btn btn-cyan" ><i class="fe fe-save"></i> Registrar</button>
                  <a href="formregistroSalida.php"><button type="reset" id="cancelar" class="btn btn-danger"><i class="fe fe-x"></i> Cancelar</button></a>
                  
                </div>
                <div class="card-footer text-right" style="display:none;">
                  <div class="loader"></div>
                </div>
              </div>
              
            </div>
            <div class="col-lg-4">
             
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Información del Vehiculo</h3>
                </div>
                <div class="card-body" style="">
                  <div class="form-group">
                    <label class="form-label">Vehiculo</label>
                    <input id="marca" type="text" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Modelo</label>
                    <input id="modelo" type="text" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Color</label>
                    <input id="color" type="text" class="form-control"  disabled>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Año de fabric.</label>
                    <input type="text" class="form-control" id="anio" disabled>
                  </div>
                     
                
                 
                 
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

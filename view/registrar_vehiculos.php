<?php
require_once("../modelo/model_vehiculos.php");


$lista_vehiculos=new Vehiculos();
/*dato_empleados -- */
$dato_vehiculos=$lista_vehiculos->listar_vehiculos();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-03-20 15:36:58 +0100 -->
    <title>vehiculos</title>
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
                    <div class="content table-responsive table-full-width">
                    <table id="example" class="table table-bordered table-hover table-sm table-striped table-responsive w-auto" cellspacing="0" width="100%"  style="font-size:13px">
                    <thead   style="text-align:center; font-size:11px;">

                      <th style="width:7%;">CODIGO</th>
                      <th style="width:7%;">N° PLACA</th>
                      <th style="width:7%;">MARCA </th>
                      <th style="width:7%;">MODELO</th>
                      <th style="width:7%;">COLOR</th>
                      <th style="width:7%;">AÑO</th>
                      <th style="width:7%;">COMBUSTIBLE</th>
                      <th style="width:7%;">KM ACTUAL</th>
                      <th style="width:7%;">CILINDRAJE</th>
                      <th style="width:7%;">FECHA REGISTRO</th>
                      <th style="width:7%;">ESTADO</th> 				  
                      <th style="width:7%;">CONTROL</th> 	
                    </thead>
                        <tbody >

                         <?php 
                         foreach ($dato_vehiculos as $key ) {  
                            $estado=$key["ESTADO_VEHICULO"];
                             if ($estado=='AC') {
                                $btn='<button type="button" class="btn btn-green btn-sm"><i class="fe fe-check"></i></button>';
                             }else{
                                $btn='<button type="button" class="btn btn-danger btn-flat btn-sm"><i class="fe fe-x"></i></button>';
                             }
                             $cod=$key['ID_VEHICULO'];
                        ?>

                    <tr>
                       <td align="center" style="font-size:12px;"><?php echo $key['ID_VEHICULO'];?></td>
                       <td style="font-size:12px;"><?php echo $key['N_PLACA'];?></td>
                       <td style="font-size:12px;"><?php echo $key['descripcion_parametro'];?></td>
                       <td style="font-size:12px;"><?php echo $key['MODELO'];?></td>
                       <td style="font-size:12px;"><?php echo $key['COLOR'];?></td>
                       <td style="font-size:12px;"><?php echo $key['ANIO'];?></td>
                       <td style="font-size:12px;"><?php echo $key['COMBUSTIBLE'];?></td>
                       <td style="font-size:12px;"><?php echo $key['KILOMETRAJE_AC'];?></td>
                       <td style="font-size:12px;"><?php echo $key['CILINDRAJE'];?></td>                    
                       <td style="font-size:12px;" align="center"><?php echo $key['F_REGISTRO'];?></td>                   
                       <td  align="center"><?php echo $btn; ?></td> 				   
                       <td  align="center">
                        <button type="button" class="btn bg-red btn-sm" onclick="editar('<?php echo $cod; ?>','<?php echo $key['per_apellidos']; ?>','<?php echo $key['per_nombres']; ?>','<?php echo $key['pa_id_parametro']; ?>' ,'<?php echo $key['documento_identidad']; ?>','<?php echo $key['pa2_id_parametro']; ?>','<?php  echo $key['per_fecha_nacimiento']; ?>','<?php echo $key['per_email']; ?>');" data-toggle="modal" data-target="#modal-default">
                            <i class="fa fa-remove"></i>

                        </button>
                       </td>
                    </tr>
                        <?php } ?>
                        </tbody>     
                                </table>

                        </div>
                  </div>
                </div>
               
              </div>
              
            </div>
          </div>
        </div>
      </div>
      
      
    
  </body>
</html>
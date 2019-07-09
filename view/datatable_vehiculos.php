<?php

require_once("../modelo/vehiculos.php");
require_once("PDF_reporte_v.php");

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
    <title>Homepage - tabler.github.io - a responsive, flat and full featured admin template</title>
    <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../css/buttons.bootstrap4.min.css" rel="stylesheet">    
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script> 
    <script src="../js/dataTables.buttons.min.js"></script> 
    <script src="../js/buttons.bootstrap4.min.js"></script> 
  
 
    
	
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    
    <script>
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        
        
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">    
     <script src="../assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      		});
    </script>
    <!-- Dashboard Core -->
    <link href="../assets/css/dashboard.css" rel="stylesheet" />
    <script src="../assets/js/dashboard.js"></script>   
    

   
    <!-- c3.js Charts Plugin 
    <link href="../assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="../assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin 
    <link href="../assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="../assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin 
    <script src="../assets/plugins/input-mask/plugin.js"></script>-->
  </head>
  <body class="">
    <div class="">
      <div class="">
          <div class="">
            
                        
             <div class="row row-cards">
              
              <br>
              <div class="col-12">
                <div class="card">
                 <br>
                  <!-- table-bordered -->
                   <div class="table-responsive">
                   
                    <table  class="table  table-sm"  width="100%"  style="">
                      <thead>
                      <!--
                       <tr style="font-size:13px; background-color: #cccccc; color: #e0ebeb;">
                      -->      
                        <tr>  
                          <th style="font-size:12px; width:1%;"></th>
                          <th style="font-size:12px; width:88%;">
                          <a href="">
                           <button type="button" class="btn bg-lime-lighter btn-sm" title="Agregar nuevo vehiculo"><i class="fa fa-plus-square"></i> Agregar vehiculo</button>
                          </a>
                          <th style="font-size:12px; width:6%;">
                        
                           <button type="button" class="btn btn-default btn-sm"><i class="fe fe-printer"></i>   Imprimir</button>
                         
                          
                          </th>
                          <th>
                            <form method="post" target="_blank">
                	        <input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                	        <button type="submit" name="create_pdf" class="btn btn-danger pull-right btn-sm"><i class="fa fa-file-pdf-o"></i>   Generar PDF</button>
                	       
                	        </form>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                       
                        
                      </tbody>
                    </table>
                    
                    
                     <div class="content table-responsive table-full-width">
                    <table id="example" class="table table-bordered table-hover table-sm table-striped table-responsive w-auto" cellspacing="0" width="100%"  style="font-size:13px">
                    <thead   style="text-align:center; font-size:11px;">

                      <th style="font-size:12px; width:10%;">CODIGO</th>
                      <th style="font-size:12px; width:10%;">N° PLACA</th>
                      <th style="font-size:12px; width:10%;">MARCA </th>
                      <th style="font-size:12px; width:10%;">MODELO</th>
                      <th style="font-size:12px; width:10%;">COLOR</th>
                      <th style="font-size:12px; width:5%;">AÑO</th>
                      <th style="font-size:12px; width:15%;">COMBUSTIBLE</th>
                      <th style="font-size:12px; width:10%;">KM</th>
                      
                      
                      <th style="font-size:12px; width:7%;">ESTADO</th> 				  
                      <th style="font-size:12px; width:8%;">CONTROL</th> 	
                    </thead>
                        <tbody >

                         <?php 
                         foreach ($dato_vehiculos as $key ) {  
                            $estado=$key["ESTADO_VEHICULO"];
                             if ($estado=='AC') {
                                $btn='<button type="button" class="btn btn-green btn-sm"><i class="fe fe-unlock"></i></button>';
                             }else{
                                $btn='<button type="button" class="btn btn-danger btn-flat btn-sm"><i class="fe fe-lock"></i></button>';
                             }
                             $cod=$key['ID_VEHICULO'];
                        ?>

                    <tr>
                       <td align="center" style="font-size:12px;"><?php echo $key['ID_VEHICULO'];?></td>
                       <td style="font-size:12px;"><?php echo $key['N_PLACA'];?></td>
                       <td style="font-size:12px;"><?php echo $key['PARAM_DESCRIPCION'];?></td>
                       <td style="font-size:12px;"><?php echo $key['MODELO'];?></td>
                       <td style="font-size:12px;"><?php echo $key['COLOR'];?></td>
                       <td style="font-size:12px;"><?php echo $key['ANIO'];?></td>
                       <td style="font-size:12px;"><?php echo $key['COMBUSTIBLE'];?></td>
                       <td style="font-size:12px;"><?php echo $key['KILOMETRAJE_AC'];?></td>
                                    
                                      
                       <td  align="center"><?php echo $btn; ?></td> 				   
                       <td  align="center">
                        <button type="button" class="btn bg-orange btn-sm">
                            <i class="fa fa-pencil-square-o"></i>
                        </button>
                        <button type="button" class="btn bg-red btn-sm">
                            <i class="fa fa-remove"></i>
                        </button>
                       </td>
                    </tr>
                        <?php } ?>
                        </tbody>     
                                </table>

                        </div>
                  </div>
                  <br>
                </div>
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
  </body>
</html>
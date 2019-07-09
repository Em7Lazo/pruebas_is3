<?php

require_once("../modelo/listar_datatable.php");


$lista_usuarios=new Listar();
/*dato_empleados -- */
$dato_usuarios=$lista_usuarios->listar_usuarios();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    
    <link rel="icon" href="../img/icono.png" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-03-20 15:36:58 +0100 -->
    <title>CSJPI - Usuarios</title>
    <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../css/buttons.bootstrap4.min.css" rel="stylesheet">    
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script> 
    <script src="../js/dataTables.buttons.min.js"></script> 
    <script src="../js/buttons.bootstrap4.min.js"></script> 
    <!--<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <script>
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false, 
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
    </script>
    
    <!--
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">  -->  
    <script src="../assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      		});
    </script>
    <!-- Dashboard Core -->
    <link href="../assets/css/dashboard.css" rel="stylesheet" />
    <script src="../assets/js/dashboard.js"></script>
    <style type="text/css">

    </style>   

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
                       <tr>
                          <th style="font-size:12px; width:1%;"></th>
                          <th style="font-size:12px; width:88%;">
                          
                           <button type="button" class="btn bg-lime-lighter btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" ><i class="fe fe-plus"></i> Agregar Usuario</button>
                          
                          <th style="font-size:12px; width:6%;">
                          
                           <button type="button" class="btn btn-default btn-sm"><i class="fe fe-printer"></i>   Imprimir</button>
                                                        
                          </th>
                         
                          
                        </tr>
                      </thead>
                      <tbody>
                        
                       
                        
                      </tbody>
                    </table>
                    
                    
                     <div class="content table-responsive table-full-width">
                    <table id="example" class="table table-bordered table-hover table-sm table-striped table-responsive w-auto" cellspacing="0" width="100%"  style="font-size:12px">
                    <thead   style="text-align:center; font-size:11px;">

                      <th style="font-size:12px; width:8%;">ITEM</th>
                      <th style="font-size:12px; width:25%;">DATOS</th>
                      
                      <th style="font-size:12px; width:12%;">DEPENDENCIA</th>
                      <th style="font-size:12px; width:14%;">PERFIL</th>
                      <th style="font-size:12px; width:7%;">USUARIO</th>
                      <th style="font-size:12px; width:10%;">CONTRASEÑA</th>
                      <th style="font-size:12px; width:10%;">FECHA_REG</th>
                      
                      
                      <th style="font-size:12px; width:7%;">ESTADO</th> 				  
                      <th style="font-size:12px; width:8%;">CONTROL</th> 	
                    </thead>
                        <tbody >

                         <?php 
                         foreach ($dato_usuarios as $key ) {  
                            $estado=$key["USUARIO_ESTADO"];
                             if ($estado=='AC') {
                                $btn='<button type="button" class="btn btn-green btn-sm"><i class="fe fe-unlock"></i></button>';
                             }else{
                                $btn='<button type="button" class="btn btn-danger btn-flat btn-sm"><i class="fe fe-lock"></i></button>';
                             }
                             $cod=$key['ID_USUARIO'];
                        ?>

                    <tr>
                       <td align="center" style="font-size:12px;"><?php echo $key['ID_USUARIO'];?></td>
                       <td style="font-size:12px;"><?php echo $key['EMP_APELLIDOS'].' '.$key['EMP_NOMBRES'];;?></td>
                       
                       <td style="font-size:12px;"><?php echo $key['SEDE'];?></td>
                       <td style="font-size:12px;"><?php echo $key['PARAM_DESCRIPCION'];?></td>
                       <td style="font-size:12px;"><?php echo $key['USUARIO'];?></td>
                       <td style="font-size:12px;"><?php echo $key['PASS'];?></td>
                       <td style="font-size:12px;"><?php echo $key['FECHA_REG'];?></td>
                                    
                                      
                       <td  align="center"><?php echo $btn; ?></td> 				   
                       <td  align="center">
                        <button type="button" class="btn bg-orange btn-sm">
                            <i class="fe fe-edit"></i>
                        </button>
                        <button type="button" class="btn bg-red btn-sm">
                          <i class="fe fe-delete"></i>
                            
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

 <!-- Modal Usuarios -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario registro de Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <!--  
          <span aria-hidden="true">&times;</span>
        -->
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">ID Usuario :</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Apellidos y Nombres:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Usuario:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Contraseña:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Estado:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          
          <!--
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>


        </div>
      </div>
  </body>
</html>
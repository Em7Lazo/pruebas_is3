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
    header("Location: ../index.php");
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
    
    <link rel="icon" href="../img/icono.png" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="../img/icono.png" />
    <!-- Generated: 2018-03-20 15:36:58 +0100 -->
    <title>Reporte vehicular CSJP</title>
    <script>

    </script>
    
    <!-- Dashboard Core -->
      <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css">
      
      <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
     
      
 
  
  </head>
  <!--
  <body style="background-color: #f5f7fb;">
  --> 
   <body style="background-image: url(../img/fondo_gris.gif);">
       
    <div>
      <div class="">
          <div style="padding: 20px 25px 0px 20px;">
            
            <div class="row row-cards">
              <div class="col-12">
                <div class="card table-responsive">
                
                  <!-- Table cabecera-->
                  <div class="">
                     <table  class="table" cellspacing="0"  class="table  table-striped  table-hover">
                      <thead>
                        <tr>
                          <th colspan="10" style="font-family: sans-serif; font-size:10px; text-align:center; background-color:#006699; color: #cccc00; padding: 15px 0px 15px 0px" >CONSULTAR REGISTRO DIARIO DE SALIDA E INGRESO DE VEHICULOS</th>
                        </tr>
                      </thead>
                      <tbody >
                        
                        <tr style="background-color: #FFF; color: black;">
                          
                          <th style="font-size:12px; width:10%;"></th>
                          <th style="font-size:12px; width:10%;"></th>
                          <td style="font-family: sans-serif; font-size:10px; width:10%; text-align:right;padding: 15px;">FENCHA INICIAL:</td>
                          <td style="width:10%;" class="input-daterange"> <input type="text" style="width:160px;height:26px;font-size:12px;" name="start_date" id="start_date"  class="form-control"/></td>
                         
                         
                          <td style="font-family: sans-serif; font-size:10px; width:5%; text-align:right;padding: 15px;">FECHA FINAL:</td>
                          <td style="width:10%;" class="input-daterange"><input type="text" style="width:160px;height:26px;font-size:12px;" name="end_date" id="end_date"  class="form-control" /></td>  
                          <td style="text-align:left; width:10%;">
                           <button type="button" class="btn btn-default btn-sm"><i class="fe fe-printer"></i>   A</button> 
                          </td>
                          <td style="text-align:center; width:10%;">
                          
                          
                          </td>
                         
                        </tr>
                         
                         <tr style="background-color: #FFF; color: black;">
                          
                          <th></th>
                          <th></th>
                          <td>
                          </td>  
                         
                          <td style="text-align:right;">
                          <!-- Consulta -->
                          <input type="button" name="search" id="search" value="Buscar" class="btn btn-info btn-sm active" /> 
                          
                          </td>
                          
                          <td style=" width:10%;">
                          <!--
                           <button type="button" class="btn btn-danger btn-sm"><i class="fe fe-printer"></i> Generar PDF</button>
                          -->
                          <a target="_blank" href="../PDF_reporte_vehicular.php" class="btn btn-danger btn-sm">Generar PDF</a>
                          
                          </td>
                          <td style=" width:10%;">
                                                  
                          </td>
                          <td style=""></td>
                          <td>
                              
                          </td>
                         
                         
                          
                        </tr>
                       
                        
                      </tbody>
                    </table>
                  </div>
                  
                </div>
                
              </div>
              
            </div>
            
            <div class="row row-cards">
              
              
              <br/>
             
                <div  class="card table-responsive" style="padding: 5px 20px 0px 20px; background-color: #fff;font-size:12px;">
                 <br>
                  <!-- <div class="card-header">
                    <h3 class="card-title">Invoices</h3>
                  </div> -->
                
                     <table id="order_data" class="table  table-striped  table-hover table-bordered " style="" >
                      <thead>
                        <tr>
                          
                          <th style="font-size:11px; ">Placa</th>
                          <th style="font-size:11px; ">Conductor</th>
                          <th style="font-size:11px; ">Lugar origen</th>
                          <th style="font-size:11px; ">Lugar destino</th>
                          
                         
                          <th style="font-size:11px; ">Fecha de salida</th>
                          <th style="font-size:11px; ">Kilometraje</th>
                          <th style="font-size:11px; ">Fecha de Salida</th>
                          <th style="font-size:11px; ">Fecha de Ingreso</th>
                          
                          
                        </tr>
                      </thead>
                   
                    </table>
                  
                  <br>
                </div>
          
              
            </div>
          </div>
        </div>
      </div>
      <script src="bootstrap-3.3.7/js/jQuery-2.1.4.min.js"></script>
      <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
      <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
      <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
      <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
  </body>
</html>


<script type="text/javascript" language="javascript" >



$(document).ready(function(){
 
 $('.input-daterange').datepicker({
    "locale": {
                "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "Hasta",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    },
  
  format: "yyyy-mm-dd",
  autoclose: true

 });

 fetch_data('no');

 function fetch_data(is_date_search, start_date='', end_date='')
 {
  var dataTable = $('#order_data').DataTable({

    "language":{
       "lengthMenu":"Mostrar _MENU_ registros por página.",
       "zeroRecords": "Lo sentimos. No se encontraron registros.",
             "info": "Mostrando página _PAGE_ de _PAGES_",
             "infoEmpty": "No hay registros aún.",
             "infoFiltered": "(Filtrados de un total de _MAX_ registros)",
             "search" : "Búsqueda",
             "LoadingRecords": "Cargando ...",
             "Processing": "Procesando...",
             "SearchPlaceholder": "Comience a teclear...",
             "paginate": {
     "previous": "Anterior",
     "next": "Siguiente", 
     }
      },

   "processing" : true,
   "serverSide" : true,
   "sort": false,
   "order" : [],
   "ajax" : {
    url:"ajax.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }

 $('#search').click(function(){
      var start_date = $('#start_date').val();
      var end_date = $('#end_date').val();
      if(start_date != '' && end_date !='')
      {
       $('#order_data').DataTable().destroy();
       fetch_data('yes', start_date, end_date);
      }
      else
      {
       alert("Por favor seleccione la fecha");
      }
     }); 
});
    
    function reportePDF(){
        var desde = $('#start_date').val();
        var hasta = $('#end_date').val();
        window.open('../PDF_reporte_vehicular.php?desde='+desde+'&hasta='+hasta);
    }
</script>

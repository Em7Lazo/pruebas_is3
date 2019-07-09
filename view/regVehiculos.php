<?php
session_start();
require_once("../model/model_vehiculos.php");
$sql=$con->query("SELECT u.id_usuario , u.id_persona, u.usuario , u.pass , u.id_sede , u.id_nivel , u.estado_usuario , u.fecha_registro , p.emp_apellidos, p.emp_nombres , pa.descripcion_parametro as descripcion_sede , pa2.descripcion_parametro as descripcion_nivel FROM usuarios u INNER JOIN empleados p ON u.id_persona=p.id_empleado INNER JOIN parametros pa ON pa.id_parametro=u.id_sede INNER JOIN parametros pa2 ON pa2.id_parametro=u.id_nivel WHERE u.usuario=
'".$_SESSION['usuario']."'");
$dato=$sql->fetch_array();
$lista_vehiculos=new Vehiculos();
/*dato_empleados -- */
$dato_vehiculos=$lista_vehiculos->listar_vehiculos();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../img/icono.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../img/icono.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
	<title>SYS GIV - PJ</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!--
    <script src="../css/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../css/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../css/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script	>
	<script src="../css/bootstrap/js/bootstrap.min.js"></script>
	<script src="../css/datatables.net/js/jquery.dataTables.js"></script>
    -->
    
      <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">  
	  <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">  
	  <link rel="stylesheet" href="../css/Ionicons/css/ionicons.min.css">  
	  <link rel="stylesheet" href="../css/datatables.net-bs/css/dataTables.bootstrap.min.css">  
	  <link rel="stylesheet" href="../css/dash/css/AdminLTE.min.css">  
	  <link rel="stylesheet" href="../css/dash/css/skins/_all-skins.min.css">	 
	   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	
	

     

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="../assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/themify-icons.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
	<script src="../js/jquery.js"></script>
	
	<script>
    $(document).ready(function() {
    
    
    /*MOSTRAR FORMULARIO DE EMPLEADOS*/
	$('#mostrar').click(function(){
	
        if($('#f_mostrar').css('display') == 'none'){
           $('#f_mostrar').show();
        }else{
           $('#f_mostrar').hide();
        }
  	 });
   
    
    function myTrim(x) {
    	return x.replace(/^\s+|\s+$/gm,'');
	}

 	function validar(id,campo){
 		var dato =$("#"+id).val();
 		variable=myTrim(dato);
 		if(variable==""){
 			alert("Complete el Campo "+campo); 			
 			$("#"+id).focus();
 		}else{
 			return true;
 		}

 	}
    /* Fin Script Validar */
 
 	/* Guardar Productos */
    $("#guardar_informacion").click(function(){
		var form = $("#form_vehiculos").serialize()+ '&action=save';
		var nplaca=validar('nplaca','Numero de Placa');
		var modelo=validar('modelo','Modelo de Vehiculo');
		
		
			if(nplaca==true && modelo==true){
							
				$.ajax({
						type:"POST",
						dataType: "json",
						url:"../controller/ct_vehiculos.php",
						data:form,
						success: function(response){
							if(response.mensaje=='ok'){
								window.location.href='regVehiculos.php';
							}else{
								alert(response.mensaje);
							}
						}
					});
				}else{
					alert("Inconsistencia en el Proceso de Registro de Empleados!");
					return false;
				}
		});
 	/* Fin Guardar Productos */
     
     });    
    </script>
 


</head>
<body >

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper" >
            <div class="logo">
               
                 <a class="simple-text" style="color:#006699;">
                    <img src="../img/cabecera.png" alt="">
                    
                    <!--<?php echo $dato['descripcion_nivel']; ?>-->
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="../principal.php">
                        <i class="ti-panel"></i>
                        <p>PRINCIPAL</p>
                    </a>
                </li>
                <li>
                    <a href="../registro.inc.php">
                        <i class="fa fa-plus"></i>
                        <p>Registro</p>
                    </a>
                    <ul >
                      <a href="regEmpleados.php">
                       <i class="ti-user"></i>
                        <p>Empleados</p>
                        <br>
                      <a href="regUsuarios.php">
                       <i class="ti-user"></i>
                          <p>Usuarios</p></a>
                        <br>
                      <a href="regVehiculos.php">
                       <i class="ti-user"></i>
                          <p>Vehiculos</p></a>
                    </ul>
  
                    
                    
                </li>
                

                <li>
                    <a href="../control.inc.php">
                        <i class="ti-text"></i>
                        <p>Control</p>
                    </a>
                    
                </li>

                
               
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-email"></i>
								<p>Correo</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!--<i class="ti-bell"></i>-->
                                    <p class="ti-user"></p> <?php echo $dato['emp_nombres'].' '.$dato['emp_apellidos']; ?>
									
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Cerrar Sesión</a></li>
                                
                              </ul>
                        </li>
                        <!--
						<li>
                            <a href="#">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li>
                        -->
                    </ul>

                </div>
            </div>
        </nav>
        <!-- FORMULARIO -->
        
         <div class="content"  id="f_mostrar" style="display: none;">
            <div class="container-fluid">
                <div class="row">
                    
                    <!--
                    Formulario
                    -->
                    
                    <div class="col-lg-12 col-md-7" >
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Información Registro de Vehiculos</h4>
                            </div>
                            <div class="content">
                                <form id="form_vehiculos" name="form_vehiculos" method="POST">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Numero de Placa:</label>
                                                <input type="text" name="nplaca" id="nplaca" class="form-control border-input">
                                                                           
                                </div>
                                        </div>
                                       <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Marca:</label>
                                                 <select name="marca" id="marca" class="form-control select2" style="width: 100%;">
                                                 <option value="0">SELECCIONAR</option>
									<?php
									$sss=$con->query("SELECT * FROM parametros WHERE categoria_parametro='MARCA' AND estado_parametro='AC'");
									 while($dato2=$sss->fetch_array()){ 
									 	?>
								    
									<option value="<?php echo $dato2['id_parametro']; ?>"><?php echo  $dato2['descripcion_parametro'];?></option>							
									<?php } ?>
					                </select>
                                        
                                              
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Modelo:</label>
                                                <input type="text" name="modelo" id="modelo" class="form-control border-input"  >
                                                                                   
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Año de Fabr:</label>
                                                <input type="text" name="anio" id="anio" class="form-control border-input">
                                                                           
                                           </div>
                                        </div>
                                           <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Cilindraje</label>
                                                <input type="text" name="cilindraje" id="cilindraje" class="form-control border-input"  >
                                                                                   
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Combustible:</label>
                                                <input type="text" name="combu" id="combu" class="form-control border-input"  >
                                                                                   
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Color de Vehiculo</label>
                                                <input type="text" name="color" id="color" class="form-control border-input"  >
                                                                                   
                                            </div>
                                        </div>
                                         
                                    </div>
                               
                                    <div class="text-center">
                                        <!--<button type="button" value="enviar" id="enviar-btn" class="btn btn-info btn-fill btn-wd">Guardar</button>-->
                                        <button type="button" id="guardar_informacion" class="btn btn-info btn-fill btn-wd">Guardar </button>
                                    </div>
                                    
                                    <!--
                                    <div class="text-center">
                                        <button type="submit" value="enviar" id="enviar-btn" class="btn btn-info btn-fill btn-wd">Guardar</button>
                                    </div>
                                    
                                    
                                    <input name="submit" type="submit" value="enviar" id="enviar-btn" />
                                      -->
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>   
<center>
<fieldset style="width: 95%">
<br>
	<div align="left">
	<legend> 
		<button type="button"  id="mostrar" class="btn btn-info btn-fill btn-wd"><span class="glyphicon glyphicon-plus"></span> Nuevo Vehiculo</button>
		<br>
		<br>
 
	</legend>
	</div>
   
     
                    <!--
                    Formulario
                    -->
   
   
    </fieldset>
        </center>
         <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                               <!--
                                <h4 class="title">Registro de Usuarios</h4>
                                <p class="category">Usuarios registrados</p>-->
                                <div class="row">
                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <label form="buscar_empleado">Buscar:</label>
                                                <input type="text" name="buscar_empleado" id="buscar_empleado" class="form-control border-input">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                <thead  align="center" style="font-size:10px; color:#009973; align="center" ">
                 
                  <th>CODIGO</th>
                  <th>N° PLACA</th>
                  <th>MARCA </th>
                    
                  
                  <th>MODELO</th>
                  <th>COLOR</th>
                  <th>AÑO</th>
                  <th>COMBUSTIBLE</th>
                  <th>KILOMETRAJE</th>
                  <th>CILINDRAJE</th>
                  <th>FECHA REGISTRO</th>
			                  
				  <th>ESTADO</th> 				  
				  <th>CONTROL</th> 	
                                    </thead>
                                    <tbody >
                                    
                 <?php 
                     foreach ($dato_vehiculos as $key ) {  
  						$estado=$key["ESTADO_VEHICULO"];
  						 if ($estado=='AC') {
  						 	$btn='<button type="button" class="btn btn-success btn-flat btn-xs"><span class="glyphicon glyphicon-ok"></span></button>';
  						 }else{
  						 	$btn='<button type="button" class="btn btn-danger btn-flat btn-xs"><span class="glyphicon glyphicon-remove"></span></button>';
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
				   	<button type="button" class="btn bg-orange btn-flat btn-xs" onclick="editar('<?php echo $cod; ?>','<?php echo $key['per_apellidos']; ?>','<?php echo $key['per_nombres']; ?>','<?php echo $key['pa_id_parametro']; ?>' ,'<?php echo $key['documento_identidad']; ?>','<?php echo $key['pa2_id_parametro']; ?>','<?php  echo $key['per_fecha_nacimiento']; ?>','<?php echo $key['per_email']; ?>');" data-toggle="modal" data-target="#modal-default">
				   		<span class="glyphicon glyphicon-pencil"></span>
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



        <footer class="footer">
            <div class="container-fluid">

				<div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, Corte Superior de Justicia de Piura | Desarrollo 
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

</html>

 
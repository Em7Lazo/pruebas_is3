<?php 
	require_once('config/conexion.php');	
	$usuario = 'SELECT * FROM vehiculos ORDER BY ID_VEHICULO ASC';	
	$usuarios=$mysqli->query($usuario);

if(isset($_POST['create_pdf'])){
	require_once('tcpdf/tcpdf.php');

	$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Miguel Caro');
	$pdf->SetTitle($_POST['reporte_name']);

	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '';

	$content .= '
		<div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">'.$_POST['reporte_name'].'</h1>

      <table border="1" cellpadding="5">
        <thead>
          <tr>
            <th>DNI</th>
            <th>A. PATERNO</th>
            <th>A. MATERNO</th>
            <th>NOMBRES</th>
            <th>AREA</th>
            <th>SUELDO</th>
          </tr>
        </thead>
	';

	while ($user=$usuarios->fetch_assoc()) { 
			if($user['ESTADO_VEHICULO']=='AC'){  $color= '#f5f5f5'; }else{ $color= '#fbb2b2'; }
	$content .= '
		<tr bgcolor="'.$color.'">
            <td>'.$user['N_PLACA'].'</td>
            <td>'.$user['ID_MARCA'].'</td>
            <td>'.$user['MODELO'].'</td>
            <td>'.$user['ANIO'].'</td>
            <td>'.$user['KILOMETRAJE_AC'].'</td>
            <td>S/. '.$user['ESTADO_VEHICULO'].'</td>
        </tr>
	';
	}

	$content .= '</table>';

	$content .= '
		<div class="row padding">
        	<div class="col-md-12" style="text-align:center;">
            	<span>Pdf Creator </span><a href="http://www.redecodifica.com">By Miguel Angel</a>
            </div>
        </div>

	';

	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
}

?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Exportar a PDF - Miguel Angel Caro Rojas</title>
<meta name="keywords" content="">
<meta name="description" content="">
<!-- Meta Mobil
================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
        <div class="row padding">
        	<div class="col-md-12">
            	<?php $h1 = "Reporte de Empleados - Enero 2017";  
            	 echo '<h1>'.$h1.'</h1>'
				?>
            </div>
        </div>
    	<div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>DNI</th>
            <th>A. PATERNO</th>
            <th>A. MATERNO</th>
            <th>NOMBRES</th>
            <th>AREA</th>
            <th>SUELDO</th>
          </tr>
        </thead>
        <tbody>
        <?php 
			while ($user=$usuarios->fetch_assoc()) {   ?>
          <tr class="<?php if($user['ESTADO_VEHICULO']=='Ac'){ echo 'active';}else{ echo 'danger';} ?>">
            <td><?php echo $user['N_PLACA']; ?></td>
            <td><?php echo $user['ID_MARCA']; ?></td>
            <td><?php echo $user['MODELO']; ?></td>
            <td><?php echo $user['ANIO']; ?></td>
            <td><?php echo $user['KILOMETRAJE_AC']; ?></td>
            <td>S/. <?php echo $user['ESTADO_VEHICULO']; ?></td>
          </tr>
         <?php } ?>
        </tbody>
      </table>
              <div class="col-md-12">
              	<form method="post">
                	<input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                	<a href="" target="_blank">
                	<input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
                	</a>
                </form>
              </div>
      	</div>
    </div>
</body>
</html>
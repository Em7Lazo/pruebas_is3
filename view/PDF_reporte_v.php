<?php 
	require_once('config/conexion.php');	
	$usuario = 'SELECT * FROM dt_vehiculos ORDER BY ID_VEHICULO ASC';	
	$usuarios=$mysqli->query($usuario);

if(isset($_POST['create_pdf'])){
	require_once('tcpdf/tcpdf.php');

	$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Miguel Caro');
	
   
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();
    $image_file = K_PATH_IMAGES. 'logo_pj.png';
    $pdf->Image($image_file, 5,5,20, '', 'PNG', '', 'T', false, 20, '', false, false);
    $pdf->Cell(0, 5, 'PODER JUDICIAL DEL PERU', 0, 5, 'M');
    
    $pdf->Cell(0, 5, 'Justicia Honorable, País Respetable', 0, 5, 'M');
    $pdf->Ln(10);
	$content = '';
    
	$content .= '
		<div class="row">
        	<div class="col-md-12">
            	

      <table border="1" cellpadding="5" class="w3-table-all" style="font-size:8px;">
        <thead>
          <tr>
            
                      <th>N° PLACA</th>
                      <th>MARCA </th>
                      <th>MODELO</th>
                      <th>COLOR</th>
                      <th>AÑO</th>
                      <th>COMBUSTIBLE</th>
                      <th>KM</th>
                      
                       	
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
            <td>'.$user['COLOR'].'</td>
            <td>'.$user['ANIO'].'</td>
            <td>'.$user['KILOMETRAJE_AC'].'</td>
            <td>'.$user['ESTADO_VEHICULO'].'</td>
        </tr>
	';
	}
  
	$content .= '</table>';

	$content .= '
		<div class="row padding">
        	<div class="col-md-12" style="text-align:center;">
            	<span>Pdf </span>
            </div>
        </div>

	';

	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
}
 
?>

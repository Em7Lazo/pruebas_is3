<?php
	require_once('tcpdf/config/lang/eng.php');
	require_once('tcpdf/tcpdf.php');
	require_once('conexion.php');

	$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
	$pdf->SetTitle('PDF Autogenerado en PHP'); //Titlo del pdf
	$pdf->setPrintHeader(false); //No se imprime cabecera
	$pdf->setPrintFooter(false); //No se imprime pie de pagina
	$pdf->SetMargins(20, 20, 20, false); //Se define margenes izquierdo, alto, derecho
	$pdf->SetAutoPageBreak(true, 20); //Se define un salto de pagina con un limite de pie de pagina
	$pdf->addPage();

	$sql = "SELECT c.ID_CONTROL, c.N_PLACA, c.KILOMETRAJE, c.L_ORIGEN, c.L_DESTINO, c.F_REGISTRO_S, c.HORA_S,  c.F_REGISTRO_I, c.ACTIVIDADES, c.ESTADO_C, c.KILOMETRAJE_FN, e.emp_apellidos, e.emp_nombres FROM empleados e INNER JOIN control_vehicular c ON e.id_empleado=c.ID_USUARIO INNER JOIN vehiculos ve ON c.N_PLACA=ve.N_PLACA WHERE ID_USUARIO=e.id_empleado ORDER BY c.F_REGISTRO_S DESC";
	$cosas = $mysqli->query($sql);
	$html = '';
	$item = 1;
	foreach($cosas as $row){
		$descripcion = $row['N_PLACA'];
		$manufacturero = $row['emp_apellidos'];
		$registro = date('d/m/Y', strtotime($row['F_REGISTRO_S']));
		
		$barcode = $row['KILOMETRAJE_FN'];
		
		$html .= '<table border="1">
                      <thead>
                        <tr style="text-align:center;">
                          
                          <th style="font-size:12px; width:7%;">Placa</th>
                          <th style="font-size:12px; width:23%;">Conductor asignado</th>
                          <th style="font-size:12px; width:15%;">Lugar origen</th>
                          <th style="font-size:12px; width:15%;">Lugar destino</th>
                          
                         
                          <th style="font-size:12px; width:13%;">Fecha de salida</th>
                          <th style="font-size:12px; width:7%;">KM S</th>
                          <th style="font-size:12px; width:13%;">Fecha de Ingreso</th>
                          <th style="font-size:12px; width:7%;">KM I</th>
                          
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                         
                        <tr>
                          <td style="font-size:12px;">'.$item.'</td>
                          <td style="font-size:12px;"></td>
                          <td style="font-size:12px;"></td>
                          <td style="font-size:12px;"></td>
                         
                          <td style="font-size:12px;"></td>
                          <td style="font-size:12px;"></td>
                          <td style="font-size:12px;"></td>
                          
                          <td style="font-size:12px;"></td>
                          <td style="text-align:center;"></td>
                          
                        </tr>
                                              
                      </tbody>
                    </table>';

		$item = $item+1;
	}

	$pdf->SetFont('Helvetica', '', 10);
	$pdf->writeHTML($html, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
?>
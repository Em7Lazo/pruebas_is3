<?php
session_start();
date_default_timezone_set('America/Lima');
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
    header("Location: index.php");
    exit;
}
/*
if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
    $desde = $_GET['desde'];
    $hasta = $_GET['hasta'];
    
    $verDesde = date('d/m/Y', strtotime($desde));
    $verHasta = date('d/m/Y', strtotime($hasta));
}else{
    $desde = '1111-01-01';
    $hasta = '9999-12-30';
    $verDesde = '__/__/____';
    $verHasta = '__/__/____';
}
*/

require('fpdf/fpdf.php');
require('config/conexion.inc.php');

function Footer()
    {
        function Footer() // Pie de página
        {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        /* Cell(ancho, alto, txt, border, ln, alineacion)
         * ancho=0, extiende el ancho de celda hasta el margen de la derecha
         * alto=10, altura de la celda a 10
         * txt= Texto a ser impreso dentro de la celda
         * border=T Pone margen en la posición Top (arriba) de la celda
         * ln=0 Indica dónde sigue el texto después de llamada a Cell(), en este caso con 0, enseguida de nuestro texto
         * alineación=C Texto alineado al centro
         */
        $this->Cell(0,10,'Este es el pie de página creado con el método Footer() de la clase creada PDF que hereda de FPDF','T',0,'C');
        }
    }

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('helvetica','','11');
$pdf->image('img/CABECERA.gif','0','0','75','20', 'GIF');
$pdf->Cell(103,8,'','0');
$pdf->Cell(150,8,'CORTE SUPERIOR DE JUSTICIA DE PIURA','0');
$pdf->SetFont('helvetica','','8');
$pdf->Cell(25,4,'Fecha: '.date('d-m-Y').'','0');
$pdf->Ln(4);
$pdf->Cell(253,4,'','0');

$pdf->Cell(25,4,'Hora de reporte: '.date('H:i:s').'','0');

$pdf->Ln(5);
/*
$pdf->Cell(253,4,'','0');

$pdf->Cell(25,4,'Pagina 1 de 2','0');

$pdf->Ln(6);

*/
$pdf->SetFont('helvetica','U','8');
$pdf->Cell(95,6,'','0');
$pdf->Cell(150,6,'REPORTE DE REGISTRO DIARIO DE SALDIA E INGRESO VEHICULAR','0');
$pdf->Ln(6);
$pdf->SetFont('helvetica','','7');
$pdf->Cell(117,4,'','0');
$pdf->Cell(26,4,'DESDE: 15-07-2018','0');
//COLOR
//$pdf->setTextColor(230,230,230); 
$pdf->Cell(5,4,'|','0');
$pdf->Cell(26,4,'HASTA: 15-07-2018','0');

$pdf->Ln(12);

$pdf->SetFont('Arial','','8');
$pdf->SetFillColor('217','217','217');
$pdf->Cell(8,8,'N','1', '0', 'C', true);
$pdf->Cell(18,8,'Placa','1' ,'0', 'C', true);
$pdf->Cell(12,8,'KM out','1' ,'0', 'C', true);
$pdf->Cell(12,8,'KM in','1' ,'0', 'C', true);
$pdf->Cell(48,8,'Conductor Asignado','1' ,'0', 'C', true);
$pdf->Cell(40,8,'Lugar de Origen','1' ,'0', 'C', true);
$pdf->Cell(40,8,'Lugar de Destino','1' ,'0', 'C', true);
$pdf->Cell(28,8,'Fecha de Salida','1' ,'0', 'C', true);
$pdf->Cell(28,8,'Fecha de Ingreso','1' ,'0', 'C', true);
$pdf->Cell(45,8,'Actividades','1' ,'0', 'C', true);
$pdf->Ln(8);
$pdf->SetFont('Arial','','6');

//CONSULTA

$reporte = mysqli_query($con, "SELECT cv.ID_CONTROL, cv.N_PLACA, cv.KILOMETRAJE, cv.KILOMETRAJE_FN, emp.EMP_NOMBRES, emp.EMP_APELLIDOS, cv.L_ORIGEN, cv.L_DESTINO, cv.F_REGISTRO_S, cv.HORA_S, cv.F_REGISTRO_I, cv.ACTIVIDADES FROM control_vehicular cv INNER JOIN dt_empleados emp ON emp.ID_EMPLEADO=cv.ID_USUARIO");
$item = 0;
while($reporte2 = mysqli_fetch_array($reporte)){
    $item = $item+1;
    //$pdf->setTextColor(26,26,26); 
    
    $pdf->Cell(8,11, $item, 1, 0, 'C');
    $pdf->Cell(18,11, $reporte2['N_PLACA'], 1);
    $pdf->Cell(12,11, $reporte2['KILOMETRAJE'], 1);
    $pdf->Cell(12,11, $reporte2['KILOMETRAJE_FN'], 1);
    $pdf->Cell(48,11, $reporte2['EMP_NOMBRES'].' '. $reporte2['EMP_APELLIDOS'], 1);
    $pdf->Cell(40,11, $reporte2['L_ORIGEN'], 1);
    $pdf->Cell(40,11, $reporte2['L_DESTINO'], 1);
    $pdf->Cell(28,11, $reporte2['F_REGISTRO_S'].' '.$reporte2['HORA_S'], 1, 0, 'C');
    $pdf->Cell(28,11, $reporte2['F_REGISTRO_I'], 1, 0, 'C'); 
    $pdf->Cell(45,11, $reporte2['ACTIVIDADES'], 1, 0, '');
    
    $pdf->Ln(11);
}
$pdf->SetFont('Times','',10);
$pdf->AliasNbPages();
$pdf->Output();

?>
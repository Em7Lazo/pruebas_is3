<?php
$date1 = date("d-m-Y H:i:s", strtotime($_POST['date1']));
$date2 = date("d-m-Y H:i:s", strtotime($_POST['date2']));

if (!empty($_POST['date1']) and  !empty($_POST['date1'])){
	list($dia,$mes,$anio)=explode("/",$_POST['date1']);
	$date1="$anio-$mes-$dia";
	list($dia,$mes,$anio)=explode("/",$_POST['date2']);
	$date2="$anio-$mes-$dia";
	
	$sWhere="WHERE `F_REGISTRO_S` BETWEEN '$date1' AND '$date2'";
	
} else {
	$sWhere="";	
}

#Conectare a la base de datos
include("conexion.php");
	
$q_book = $conn->query("SELECT * FROM `control_vehicular` $sWhere ORDER BY `F_REGISTRO_S` ASC") or die(mysqli_error());
$v_book = $q_book->num_rows;
if($v_book > 0){
	while($f_book = $q_book->fetch_array()){
	?>
	<tr>
		<td><?php echo $f_book['N_PLACA']?></td>
        <td><?php echo $f_book['L_ORIGEN']?></td>
        <td><?php echo $f_book['L_DESTINO']?></td>
        <td><?php echo $f_book['F_REGISTRO_S'])?></td>
        <td><?php echo $f_book['KILOMETRAJE']?></td>
        <td><?php echo $f_book['F_REGISTRO_I']?></td>
        <td><?php echo $f_book['KILOMETRAJE_FN']?></td>
        <td></td>
	</tr>
	<?php
	}
}else{
		echo '
		<tr>
			<td colspan = "3" class="text-center">No se encontraron registros</td>
		</tr>
		';
}
	?>
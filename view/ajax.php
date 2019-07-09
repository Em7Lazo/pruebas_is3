<?php
$connect = mysqli_connect("localhost","root","","bd_proyecto_pj");//Configurar los datos de conexion
$columns = array('ID_CONTROL','N_PLACA', 'KILOMETRAJE', 'ID_USUARIO', 'L_ORIGEN', 'L_DESTINO','F_REGISTRO_S', 'HORA_S');

$query = "SELECT * FROM control_vehicular WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'F_REGISTRO_S BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (ID_CONTROL LIKE "%'.$_POST["search"]["value"].'%" 
  OR N_PLACA LIKE "%'.$_POST["search"]["value"].'%" 
  OR ID_USUARIO LIKE "%'.$_POST["search"]["value"].'%" 
  OR L_ORIGEN LIKE "%'.$_POST["search"]["value"].'%"
  OR L_DESTINO LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY ID_CONTROL DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $fecha=date("Y-m-d", strtotime($row["F_REGISTRO_S"]));			
 $sub_array = array();
 $sub_array[] = $row["N_PLACA"];
 $sub_array[] = $row["ID_USUARIO"];
 $sub_array[] = $row["L_ORIGEN"];
 $sub_array[] = $row["L_DESTINO"];
 $sub_array[] = $row["L_ORIGEN"];
 $sub_array[] = $row["L_DESTINO"];
 $sub_array[] = $fecha.' '.$row["HORA_S"];
 $sub_array[] = $fecha.' '.$row["HORA_S"];
 
 
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM control_vehicular";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
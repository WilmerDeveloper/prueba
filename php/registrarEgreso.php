<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$fecha1 = $_POST['fecha1'];
$tipo = $_POST['tipo'];
$cons = $_POST['cons'];
$bene = $_POST['bene'];
$conc = $_POST['conc'];
//$nombre = $_POST['nombre'];
$num = $_POST['num'];
$det = $_POST['det'];
$val = $_POST['val'];
//$tel = $_POST['tel'];

$comprobar = mysql_num_rows(mysql_query("SELECT * FROM egreso WHERE cons = '$cons'"));

if($comprobar == 0){
	
	
mysql_query("INSERT INTO egreso (fecha_egre, tipo, cons,beneficiario,num_concepto,num_egre,detalle,valor)VALUES('$fecha1', '$tipo', '$cons', '$bene', '$conc', '$num', '$det', '$val') ");

$_SESSION['conc'] = $cons;


//DEVOLVER LOS NOMBRES DE LOS clientes REGISTRADOS
$resultado1 = mysql_query("SELECT * FROM egreso e, concepto c WHERE e.cons='$cons' AND e.num_concepto = c.num_concepto");

echo '<table class="table table-bordered table-condensed table-hover">';
			echo'<tr>';
              echo  '<td>'."Fecha".'</td>';
			  echo  '<td>'."Tipo".'</td>';
			  echo  '<td>'."Cons".'</td>';
			  echo  '<td>'."Beneficiario".'</td>';
			  echo  '<td>'."Concepto".'</td>';
			  echo  '<td>'."Num".'</td>';
			  echo  '<td>'."Valor".'</td>';
			 // echo  '<td>'."Factura".'</td>';
			echo'</tr>';
			


while($mostrar = mysql_fetch_array($resultado1)){
	
	echo '<tbody>';
	echo '<tr>';
	echo '<td>'.$mostrar['fecha_egre'].'</td>';
	echo '<td>'.$mostrar['tipo'].'</td>';
	echo '<td>'.$mostrar['cons'].'</td>';
	echo '<td>'.$mostrar['beneficiario'].'</td>';
	echo '<td>'.$mostrar['concepto'].'</td>';
	echo '<td>'.$mostrar['num_egre'].'</td>';
	echo '<td>'.$mostrar['valor'].'</td>';
	//echo '<td>'.$mostrar['num_fact'].'</td>';
	echo '</tr>';
	echo '</tbody>';
}

echo '</table>';






}else{
	
 	echo 'existe';
 
}
?>
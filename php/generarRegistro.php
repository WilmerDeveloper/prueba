<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

//$codigo = $_POST['codigo'];
$num = $_POST['num'];
$prop = $_POST['prop'];
$bar = $_POST['bar'];
$dir = $_POST['dir'];
$tel = $_POST['tel'];
$can = $_POST['can'];
$cat = $_POST['cat'];
$cast = $_POST['cast'];


/*$numeral = mysql_query("SELECT MAX(numeracion) FROM empresa WHERE nit_empresa = '$emp'");
$mos = mysql_fetch_array($numeral);
$nal=$mos['MAX(numeracion)'];*/
//echo $nal;
//$codigo=$nal+1;
//echo $emp;
//echo $codigo;


$comprobar = mysql_num_rows(mysql_query("SELECT * FROM registro WHERE num_reg = '$num' "));


if($comprobar == 0){
	
	
mysql_query("INSERT INTO registro (num_reg, propietario,cod_barrio,direccion,telefono,caninos,felinos,castrados)VALUES('$num', '$prop','$bar','$dir','$tel','$can','$cat','$cast') ");





$_SESSION['num_reg'] = $num;


//DEVOLVER LOS NOMBRES DE LOS clientes REGISTRADOS
$resultado1 = mysql_query("SELECT * FROM barrio b, registro g WHERE num_reg = '$num' AND b.cod_barrio=g.cod_barrio ");

echo '<table class="table table-bordered table-condensed table-hover">';
			echo'<tr>';
              echo  '<td align="center" bgcolor="#CCCCCC">'."Propietario".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Caninos".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Felinos".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Castrados".'</td>';
			 // echo  '<td>'."Factura".'</td>';
			echo'</tr>';
			
			
			


while($mostrar = mysql_fetch_array($resultado1)){
	
	echo '<tbody>';
	echo '<tr>';
	echo '<td align="center">'.$mostrar['propietario'].'</td>';
	echo '<td align="center">'.$mostrar['caninos'].'</td>';
	echo '<td align="center">'.$mostrar['felinos'].'</td>';
	echo '<td align="center">'.$mostrar['castrados'].'</td>';
	//echo '<td>'.$mostrar['num_fact'].'</td>';
	echo '</tr>';
	echo '</tbody>';
}





echo '</table>';






}else{
	
 	echo 'existe';
 
}
?>
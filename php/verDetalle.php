<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$cod = $_POST['codigo'];
$codigo = substr($cod,1,-1);

//DEVOLVER LOS NOMBRES DE LOS clientes REGISTRADOS
$resultado1 = mysql_query("SELECT * FROM cliente c, factura f WHERE num_fact = '$codigo' AND c.num_cli=f.num_cli ");

echo '<table class="table table-bordered table-condensed table-hover">';
			echo'<tr>';
              echo  '<td>'."Nombre".'</td>';
			  echo  '<td>'."Sucursal".'</td>';
			  echo  '<td>'."Dirección".'</td>';
			  echo  '<td>'."Telefono".'</td>';
			  echo  '<td>'."Factura".'</td>';
			echo'</tr>';
			


while($mostrar = mysql_fetch_array($resultado1)){
	
	echo '<tbody>';
	echo '<tr>';
	echo '<td>'.$mostrar['per_contacto'].'</td>';
	echo '<td>'.$mostrar['sucursal'].'</td>';
	echo '<td>'.$mostrar['direccion'].'</td>';
	echo '<td>'.$mostrar['telefono'].'</td>';
	echo '<td>'.$mostrar['num_fact'].'</td>';
	echo '</tr>';
	echo '</tbody>';
}

echo '</table>';





$resultado = mysql_query("SELECT * FROM producto p, detalle_factura d WHERE num_fact = '$codigo' AND d.num_prod = p.num_prod ORDER BY d.num_detalle ASC");

echo '<table class="table table-bordered table-condensed table-hover">';
				echo'<tr>';
                      echo  '<td align="center">'."No".'</td>';
					  //echo  '<td>'."Factura".'</td>';
					  echo  '<td align="center">'."Producto".'</td>';
					  echo  '<td align="center">'."Cantidad".'</td>';
					  echo  '<td align="center">'."Precio".'</td>';
					  echo  '<td align="center">'."Subtotal".'</td>';
                      
                 echo'</tr>';
$d=0;
while($mostrar = mysql_fetch_array($resultado)){
	echo '<tr>';
	
	echo '<td align="center">'.$mostrar['num_detalle'].'</td>';
	//echo '<td>'.$mostrar['num_fact'].'</td>';
	echo '<td>'.$mostrar['nom_prod'].'</td>';
	echo '<td align="center">'.$mostrar['cantidad'].'</td>';
	echo '<td align="right">'.$mostrar['precio'].'</td>';
	echo '<td align="right">'.$mostrar['subtotal'].'</td>';
	/*$a=$mostrar['cantidad'];
	$b=$mostrar['precio'];*/
	$c=$mostrar['subtotal'];
	$d=$d+$c;
	//echo '<td>'.$c.'</td>';
	echo '</tr>';
}

	

//echo '</table>';


$resultado1 = mysql_query("SELECT * FROM factura WHERE num_fact = '$codigo' ");
while($mostrar1 = mysql_fetch_array($resultado1)){
	echo '<tr>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."Valor".'</td>';
		echo '<td align="right">'.$mostrar1['valor_fact'].'</td>';
	echo '</tr>';
}


$resultado3 = mysql_query("SELECT * FROM factura WHERE num_fact = '$codigo' ");

while($mostrar3 = mysql_fetch_array($resultado3)){
	$des=$mostrar3['desc_com']+$mostrar3['devolucion']+$mostrar3['averias']+$mostrar3['retefuente']+$mostrar3['reteica'];
	echo '<tr>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."Descuentos".'</td>';
		echo '<td align="right">'.$des.'</td>';
	echo '</tr>';
}

/*
$resultado4 = mysql_query("SELECT * FROM factura WHERE num_fact = '$codigo' ");
while($mostrar7 = mysql_fetch_array($resultado4)){
	echo '<tr>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."Devoluciones".'</td>';
		echo '<td align="right">'.$mostrar7['devolucion'].'</td>';
	echo '</tr>';
}

$resultado5 = mysql_query("SELECT * FROM factura WHERE num_fact = '$codigo' ");
while($mostrar4 = mysql_fetch_array($resultado5)){
	echo '<tr>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."Averias".'</td>';
		echo '<td align="right">'.$mostrar4['averias'].'</td>';
	echo '</tr>';
}

$resultado6 = mysql_query("SELECT * FROM factura WHERE num_fact = '$codigo' ");
while($mostrar5 = mysql_fetch_array($resultado6)){
	echo '<tr>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."R fuente".'</td>';
		echo '<td align="right">'.$mostrar5['averias'].'</td>';
	echo '</tr>';
}

$resultado7 = mysql_query("SELECT * FROM factura WHERE num_fact = '$codigo' ");
while($mostrar6 = mysql_fetch_array($resultado7)){
	echo '<tr>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."R ICA".'</td>';
		echo '<td align="right">'.$mostrar6['averias'].'</td>';
	echo '</tr>';
}

*/
$resultado2 = mysql_query("SELECT * FROM factura WHERE num_fact = '$codigo' ");
while($mostrar2 = mysql_fetch_array($resultado2)){
	echo '<tr>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."".'</td>';
		echo  '<td>'."Valor Neto".'</td>';
		echo '<td align="right">'.$mostrar2['valor_neto'].'</td>';
	echo '</tr>';
}

	

echo '</table>';



echo '<center><a href="indexfac.php"><img src="img/fact.png" height="35" /></a></center>';

?>
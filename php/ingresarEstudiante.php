<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$fact = $_SESSION['num_fact'];
//$fact = '16';
$ndet = $_POST['ndet'];
$nprod = $_POST['nprod'];
$cantidad = $_POST['cantidad'];

//$res1 = mysql_num_rows(mysql_query("SELECT * FROM detalle_factura WHERE num_fact='".$_SESSION['num_fact']."' "));
//$res1 = mysql_query("SELECT * FROM detalle_factura WHERE num_fact='$fact' ");




$res = mysql_query("SELECT * FROM producto  WHERE num_prod = '$nprod' ");
$mostrar = mysql_fetch_array($res);
$precio = $mostrar['precio'];
$subtotal=$cantidad*$precio;

mysql_query("INSERT INTO detalle_factura (num_detalle,num_fact,num_prod,cantidad, precio, subtotal)VALUES($ndet,'$fact',$nprod,'$cantidad', '$precio', '$subtotal') ");
$resv = mysql_query("SELECT * FROM factura  WHERE num_fact = '$fact' ");
$mostrarv = mysql_fetch_array($resv);
$valor=$mostrarv['valor_fact'];
//echo  $valor;
$valorf=$valor+$subtotal;
mysql_query("UPDATE factura SET valor_fact='$valorf', valor_neto='$valorf' WHERE num_fact=$fact");

//DEVOLVER LOS NOMBRES DE LOS detalles REGISTRADOS
$resultado = mysql_query("SELECT * FROM detalle_factura d, producto p WHERE num_fact = '$fact' AND d.num_prod=p.num_prod ");

echo '<table class="table table-bordered table-condensed table-hover">';
			echo'<tr>';
              echo  '<td>'."No".'</td>';
			  //echo  '<td>'."Factura".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Producto".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Cantidad".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Precio".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Subtotal".'</td>';
			  
			  //echo  '<td>'."Eliminar".'</td>';
            echo'</tr>';

$d=0;
while($mostrar = mysql_fetch_array($resultado)){
	
	echo '<tbody>';
	echo '<tr>';
	echo '<td align="right">'.$mostrar['num_detalle'].'</td>';
	//echo '<td>'.$mostrar['num_fact'].'</td>';
	echo '<td>'.$mostrar['nom_prod'].'</td>';
	echo '<td align="center">'.$mostrar['cantidad'].'</td>';
	echo '<td align="right">'.$mostrar['precio'].'</td>';
	echo '<td align="right">'.$mostrar['subtotal'].'</td>';
	//echo  '<td><input type="button" value="-" class="btn btn-success" onClick="eliminarDetalle(/'.$mostrar['num_detalle'].','.$mostrar['num_fact'].'/)"></td>';
	/*$a=$mostrar['cantidad'];
	$b=$mostrar['precio'];*/
	$c=$mostrar['subtotal'];
	$d=$d+$c;
	//echo '<td>'.$c.'</td>';
	echo '</tr>';
	echo '</tbody>';
}

echo'<tr>';
              echo  '<td></td>';
			 // echo  '<td></td>';
			  echo  '<td></td>';
			  echo  '<td></td>';
			  echo  '<td>'."TOTAL".'</td>';
			  echo  '<td>'.$d.'</td>';
            echo'</tr>';

echo '</table>';







?>
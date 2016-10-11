<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$nprod = $_POST['nprod'];
$prod = $_POST['prod'];
$cbar = $_POST['cbar'];
$pre = $_POST['pre'];
$stk = $_POST['stk'];


$comprobar = mysql_num_rows(mysql_query("SELECT * FROM producto WHERE num_prod = '$nprod'"));


mysql_query("UPDATE producto SET nom_prod='$nprod', cod_barras='$cbar', precio='$pre',  stock='$stk' WHERE num_prod = '$nprod'");	
	
//mysql_query("INSERT INTO producto (num_prod,nom_prod,cod_barras,precio,stock)VALUES('$nprod','$prod','$cbar','$pre','$stk')");

$resultado1 = mysql_query("SELECT * FROM producto  WHERE num_prod = '$nprod' ");

echo '<table class="table table-bordered table-condensed table-hover">';
			echo'<tr>';
              echo  '<td>'."Numero".'</td>';
			  echo  '<td>'."Producto".'</td>';
			  echo  '<td>'."Código de barras".'</td>';
			  echo  '<td>'."Precio".'</td>';
			  echo  '<td>'."Cantidad".'</td>';
			 // echo  '<td>'."Factura".'</td>';
			echo'</tr>';
while($mostrar = mysql_fetch_array($resultado1)){
	
	echo '<tbody>';
	echo '<tr>';
	echo '<td>'.$mostrar['num_prod'].'</td>';
	echo '<td>'.$mostrar['nom_prod'].'</td>';
	echo '<td>'.$mostrar['cod_barras'].'</td>';
	echo '<td>'.$mostrar['precio'].'</td>';
	echo '<td>'.$mostrar['stock'].'</td>';
	echo '</tr>';
	echo '</tbody>';
}

echo '</table>';


?>
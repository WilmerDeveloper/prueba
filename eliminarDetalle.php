<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$cod = $_POST['codigo'];
$codigo = substr($cod,1,-1);
$fact = $_POST['fact'];
$factura = substr($cod,1,-1);

mysql_query("DELETE FROM detalle_factura WHERE num_detalle = '$codigo' AND num_fact='$factura'  ");

//echo '<center><img src="img/del.jpg" height="20" /></center>';
echo '<center><a href="indexprod.php"><img src="img/productos.png" height="35" /></a></center>';
?>
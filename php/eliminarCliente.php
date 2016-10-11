<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$cod = $_POST['codigo'];
$codigo = substr($cod,1,-1);

mysql_query("DELETE FROM cliente WHERE num_cli = '$codigo' ");

//echo '<center><img src="img/del.jpg" height="20" /></center>';
echo '<center><a href="indexcliente.php"><img src="img/clientes.png" height="35" /></a></center>';
?>
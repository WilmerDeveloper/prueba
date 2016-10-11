<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$cod = $_POST['cod'];
$suc = $_POST['suc'];
$zon = $_POST['zon'];
$niv = $_POST['niv'];
$rs = $_POST['rs'];
$nit = $_POST['nit'];
$dir = $_POST['dir'];
$tel = $_POST['tel'];
$mail = $_POST['mail'];
$cont = $_POST['cont'];
$ruta = $_POST['ruta'];



$comprobar = mysql_num_rows(mysql_query("SELECT * FROM cliente WHERE num_cli = '$cod' or nit_cliente = '$nit'"));

if($comprobar == 0){
	
	
mysql_query("INSERT INTO cliente (num_cli,sucursal,zona,descuento_tipo,razon_social,nit_cliente,direccion,telefono,email,per_contacto,ruta)
VALUES('$cod','$suc','$zon','$niv','$rs','$nit','$dir','$tel','$mail','$cont','$ruta')");

$resultado1 = mysql_query("SELECT * FROM cliente  WHERE num_cli = '$cod' ");

echo '<table class="table table-bordered table-condensed table-hover">';
			echo'<tr>';
              echo  '<td>'."Sucursal".'</td>';
			  echo  '<td>'."Dirección".'</td>';
			  echo  '<td>'."Telefono".'</td>';
			  echo  '<td>'."Persona de contacto".'</td>';
			  echo  '<td>'."Ruta".'</td>';
			 // echo  '<td>'."Factura".'</td>';
			echo'</tr>';
while($mostrar = mysql_fetch_array($resultado1)){
	
	echo '<tbody>';
	echo '<tr>';
	echo '<td>'.$mostrar['sucursal'].'</td>';
	echo '<td>'.$mostrar['direccion'].'</td>';
	echo '<td>'.$mostrar['telefono'].'</td>';
	echo '<td>'.$mostrar['per_contacto'].'</td>';
	echo '<td>'.$mostrar['ruta'].'</td>';
	echo '</tr>';
	echo '</tbody>';
}

echo '</table>';

}

else{
	
 	echo 'existe';
 
}
?>
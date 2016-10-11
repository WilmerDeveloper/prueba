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
                      echo  '<td>'."No".'</td>';
					  //echo  '<td>'."Factura".'</td>';
					  echo  '<td>'."Producto".'</td>';
					  echo  '<td>'."Cantidad".'</td>';
					  echo  '<td>'."Precio".'</td>';
					  echo  '<td>'."Subtotal".'</td>';
                      
                 echo'</tr>';
$d=0;
while($mostrar = mysql_fetch_array($resultado)){
	echo '<tr>';
	
	echo '<td>'.$mostrar['num_detalle'].'</td>';
	//echo '<td>'.$mostrar['num_fact'].'</td>';
	echo '<td>'.$mostrar['nom_prod'].'</td>';
	echo '<td>'.$mostrar['cantidad'].'</td>';
	echo '<td>'.$mostrar['precio'].'</td>';
	echo '<td>'.$mostrar['subtotal'].'</td>';
	/*$a=$mostrar['cantidad'];
	$b=$mostrar['precio'];*/
	$c=$mostrar['subtotal'];
	$d=$d+$c;
	//echo '<td>'.$c.'</td>';
	echo '</tr>';
}

echo'<tr>';
              echo  '<td></td>';
			  //echo  '<td></td>';
			  echo  '<td></td>';
			  echo  '<td></td>';
			  echo  '<td>'."TOTAL".'</td>';
			  echo  '<td>'.$d.'</td>';
            echo'</tr>';

echo '</table>';

echo '<center><a href="indexfac.php"><img src="img/fact.png" height="35" /></a></center>';

?>
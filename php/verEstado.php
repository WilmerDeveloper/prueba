<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$cod = $_POST['codigo'];
$codigo = substr($cod,1,-1);

//DEVOLVER LOS NOMBRES DE LOS clientes REGISTRADOS
//$resultado1 = mysql_query("SELECT * FROM cliente c, factura f WHERE num_fact = '$codigo' AND c.nit_cliente=f.nit_cliente ");
$resultado1 = mysql_query("SELECT * FROM cliente WHERE num_cli = '$codigo'");

echo '<table class="table table-bordered table-condensed table-hover">';
			echo'<tr>';
              echo  '<td align="center">'."Nombre".'</td>';
			  echo  '<td align="center">'."Sucursal".'</td>';
			  echo  '<td align="center">'."Dirección".'</td>';
			  echo  '<td align="center">'."Telefono".'</td>';
			 // echo  '<td>'."Factura".'</td>';
			echo'</tr>';
			


while($mostrar = mysql_fetch_array($resultado1)){
	
	echo '<tbody>';
	echo '<tr>';
	echo '<td>'.$mostrar['per_contacto'].'</td>';
	echo '<td>'.$mostrar['sucursal'].'</td>';
	echo '<td>'.$mostrar['direccion'].'</td>';
	echo '<td>'.$mostrar['telefono'].'</td>';
	//echo '<td>'.$mostrar['num_fact'].'</td>';
	echo '</tr>';
	echo '</tbody>';
}

echo '</table>';
/*********************************************************/
echo '<table class="table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                
                <th>FACTURA</th>
                
                <th>FECHA</th>
                <th>FORMA DE PAGO</th>
				<th>ESTADO</th>
				<th>VALOR</th>
				
            </tr>
        </thead>
        <tbody>';
            $sql = mysql_query("SELECT * FROM factura WHERE num_cli='$codigo' AND estado='Abierta'");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				$suma=0;
				while($mostrar = mysql_fetch_array($sql)){
	
					$item = $item+1;
					
					$suma=$suma+$mostrar['valor_fact'];
					
					echo '<tr>
								
								<td align="center">'.$mostrar['num_fact'].'</td>
								<td align="center">'.$mostrar['fecha_fac'].'</td>
								<td align="center">'.$mostrar['forma_pago'].'</td>
								<td align="center">'.$mostrar['estado'].'</td>
								<td align="right">'.$mostrar['valor_fact'].'</td>
						
		<td><input type="button" value="Detalle" class="btn btn-success" onClick="verDetalle2(/'.$mostrar['num_fact'].'/)"></td>
							</tr>';
					
				}
				echo '<tr>
								
								<td align="center"></td>
								<td align="center"></td>
								<td align="center"></td>
								<td align="center">Total</td>
								<td align="right">'.$suma.'</td>
						
		
							</tr>';
			}else{
				echo '<tr><td colspan="5">No se encontraron registros...</td></tr>';
			}
		

echo '</tbody>
    </table>';

echo '<center><a href="indexcliente.php"><img src="img/clientes.png" height="35" /></a></center>';

?>
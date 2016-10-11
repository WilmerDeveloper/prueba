<?php
session_start();
class sistema{
		public function conexion(){
			$host        = 'localhost';
			$usuario    = 'root';
			$password = '';
			$dataBase  = 'mascotas';
			
			$conexion = mysql_connect($host, $usuario, $password);
			$seleccion = mysql_select_db($dataBase, $conexion);
		
		}
		
		function mostrarRegistros(){
			//$sql = mysql_query("SELECT * FROM factura f cliente c WHERE f.nit_cliente=c.nit_cliente");
			$sql = mysql_query("SELECT * FROM registro r, barrio b WHERE  b.cod_barrio = r.cod_barrio");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					
					
		
					$item = $item+1;
					echo '<tr>
								<td align="center">'.$item.'</td>
								<td>'.$mostrar['propietario'].'</td>
								<td>'.$mostrar['barrio'].'</td>
								<td>'.$mostrar['direccion'].'</td>
								<td>'.$mostrar['telefono'].'</td>
								<td align="center">'.$mostrar['caninos'].'</td>
								<td align="center">'.$mostrar['felinos'].'</td>
								<td align="center">'.$mostrar['castrados'].'</td>
								
						
	<td><input type="button" value="Eliminar" class="btn btn-success" onClick="eliminarProducto(/'.$mostrar['num_reg'].'/)"></td>
							</tr>';
				}
			}else{
				echo '<tr><td colspan="5">No se encontraron registros...</td></tr>';
			}
		}
		
		
		
		function mostrarEgresos(){
			//$sql = mysql_query("SELECT * FROM factura f cliente c WHERE f.nit_cliente=c.nit_cliente");
			$sql = mysql_query("SELECT * FROM egreso e, concepto c WHERE  e.num_concepto = c.num_concepto");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
	
					$item = $item+1;
					echo '<tr>
								
								<td>'.$mostrar['fecha_egre'].'</td>
								<td>'.$mostrar['cons'].'</td>
								<td>'.$mostrar['tipo'].'</td>
								<td>'.$mostrar['num_egre'].'</td>
								<td>'.$mostrar['beneficiario'].'</td>
								<td>'.$mostrar['concepto'].'</td>
								<td>'.$mostrar['detalle'].'</td>
								<td>'.$mostrar['valor'].'</td>
						</tr>';
	//<td><input type="button" value="Detalle" class="btn btn-success" onClick="verDetalleEgre(/'.$mostrar['cons'].'/)"></td>
							
				}
			}else{
				echo '<tr><td colspan="5">No se encontraron registros...</td></tr>';
			}
		}
		
		
		
		
		
		function mostrarProductos(){
			$sql = mysql_query("SELECT * FROM producto");
			$num_total = mysql_num_rows($sql);
			//$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
	
					//$item = $item+1;
					echo '<tr>
								<td>'.$mostrar['num_prod'].'</td>
								<td>'.$mostrar['nom_prod'].'</td>
								<td>'.$mostrar['cod_barras'].'</td>
								<td>'.$mostrar['precio'].'</td>
								
						


							</tr>';
				}
			}else{
				echo '<tr><td colspan="5">No se encontraron registros...</td></tr>';
			}
		}
		
		
		
		function mostrarDetalles(){
			$sql1 = mysql_query("SELECT * FROM detalle_factura");
			$item1 = 0;
			if(mysql_num_rows($sql1)>0){
				while($mostrar1 = mysql_fetch_array($sql1)){
	//$estudiantes1 = mysql_num_rows(mysql_query("SELECT * FROM detalle_factura WHERE num_fact = '".$mostrar1['num_fact']."' "));
					$item1 = $item1+1;
					echo '<tr>
								<td>'.$mostrar['num_detalle'].'</td>
								<td>'.$mostrar['num_fact'].'</td>
								<td>'.$mostrar['num_prod'].'</td>
								<td>'.$mostrar['cantidad'].'</td>
								<td>'.$mostrar['precio'].'</td>
						
								<td><input type="button" value="Detalle" class="btn btn-success" onClick="verDetalle(/'.$mostrar['num_fact'].'/)"></td>
							</tr>';
				}
			}else{
				echo '<tr><td colspan="5">No se encontraron registros...</td></tr>';
			}
		}
	/********************************************************************/	
	
		function mostrarClientes(){
			$sql2 = mysql_query("SELECT * FROM cliente");
			$num_total2 = mysql_num_rows($sql2);
			//$item = 0;
			if(mysql_num_rows($sql2)>0){
				while($mostrar2 = mysql_fetch_array($sql2)){
	
					//$item = $item+1;
					echo '<tr>
								<td>'.$mostrar2['num_cli'].'</td>
								<td>'.$mostrar2['sucursal'].'</td>
								<td>'.$mostrar2['zona'].'</td>
								<td>'.$mostrar2['descuento_tipo'].'</td>
								
								<td>'.$mostrar2['nit_cliente'].'</td>
								<td>'.$mostrar2['direccion'].'</td>
								<td>'.$mostrar2['telefono'].'</td>
								
								<td>'.$mostrar2['per_contacto'].'</td>
								<td>'.$mostrar2['ruta'].'</td>
								
								
						

<td><input type="button" value="Estado de Cartera" class="btn btn-success" onClick="EstadoCuenta(/'.$mostrar2['num_cli'].'/)"></td>
							</tr>';
				}
			}else{
				echo '<tr><td colspan="5">No se encontraron registros...</td></tr>';
			}
		}
		
		
}
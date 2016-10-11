<?php
include('/class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$cod = $_POST['cli'];
$fec1 = $_POST['fec1'];
$fec2 = $_POST['fec2'];
$codigo = substr($cod,1,-1);


$resultado1 = mysql_query("SELECT * FROM cliente WHERE num_cli = '$cod'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de Egresos</title> 
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="css/estilos.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/calendario.css">
<script src="js/jquery.js"></script>
<script src="js/myjava.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="js/calendario.js"></script>
	
	<script type="text/javascript">
		$(function(){
			$("#fecha1").datepicker({dateFormat: 'yy-mm-dd',});
			
			$("#fecha2").datepicker({
				changeMonth:true,
				changeYear:true,
				
			});
			$("#fecha3").datepicker({
				changeMonth:true,
				changeYear:true,
				showOn: "button",
				buttonImage: "css/images/ico.png",
				buttonImageOnly: true,
				showButtonPanel: true,
			})
		})
	</script>
</head>
<body>
<section>
<table class="table table-bordered table-condensed table-hover">
			<tr>
              <td align="center">Nombre</td>
			  <td align="center">Sucursal</td>
			  <td align="center">Dirección</td>
			  <td align="center">Telefono</td>
			 
			</tr>
			

<?php
while($mostrar = mysql_fetch_array($resultado1)){
?>	
	<tbody>
	<tr>
	<td><?php echo $mostrar['per_contacto'] ;?></td>
	<td><?php echo $mostrar['sucursal'] ;?></td>
	<td><?php echo $mostrar['direccion'] ;?></td>
	<td><?php echo $mostrar['telefono'] ;?></td>
	
	</tr>
	</tbody>
    <?php
}
?>
</table>

<?php
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
$sql = mysql_query("SELECT * FROM factura WHERE num_cli='$cod' AND estado='Abierta' AND fecha_fac BETWEEN '$fec1' AND '$fec2' ");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				$suma=0;
				while($mostrar = mysql_fetch_array($sql)){
	
					$item = $item+1;
					$suma=$suma+$mostrar['valor_fact'];
					//echo '<table class="table table-bordered table-condensed table-hover">';
					echo '<tr>
								
								<td align="center">'.$mostrar['num_fact'].'</td>
								
								<td align="center">'.$mostrar['fecha_fac'].'</td>
								<td align="center">'.$mostrar['forma_pago'].'</td>
								<td align="center">'.$mostrar['estado'].'</td>
								<td align="right">'.$mostrar['valor_fact'].'</td>';
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
		
//echo '</table>';
echo '        </tbody>
    </table>';


echo '<center><a href="indexcliente.php"><img src="img/clientes.png" height="35" /></a></center>';

?>
</section>

</body>
</html>
<?php
	include('class/classAsistencias.php');
	$clase = new sistema;
	$clase->conexion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de Facturas</title> 
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
<section class="sectionF">
 
 <tr >
 <center>
    <td>
    <img src="img/saludablesbanner.png" height="100" />
    </td>
    <td>
    <img src="img/ubicacion.png" height="100" />
    </td>
  </center>
 </tr>
    
    <br />
    <br />
    
    
    <?php

$cod = $_POST['codigo'];
//$raz = $_POST['raz'];
//echo $cod;
//$codigo = substr($cod,1,-1);

//DEVOLVER LOS NOMBRES DE LOS clientes REGISTRADOS
$resultado1 = mysql_query("SELECT * FROM cliente c, factura f WHERE num_fact = '$cod' AND c.num_cli=f.num_cli AND nit_empresa='88195885-8' ");


echo '<table class="table table-bordered table-condensed table-hover">';
			echo'<tr>';
              echo  '<td align="center" bgcolor="#CCCCCC">'."Factura de venta".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Cliente".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Nit".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Sucursal".'</td>';
			 // echo  '<td>'."Factura".'</td>';
			echo'</tr>';
			
			
			


while($mostrar = mysql_fetch_array($resultado1)){
	
	echo '<tbody>';
	echo '<tr>';
	echo '<td align="center">'.$mostrar['num_fact'].'</td>';
	echo '<td align="center">'.$mostrar['razon_social'].'</td>';
	echo '<td align="center">'.$mostrar['nit_cliente'].'</td>';
	echo '<td align="center">'.$mostrar['sucursal'].'</td>';
	//echo '<td>'.$mostrar['num_fact'].'</td>';
	echo '</tr>';
	echo '</tbody>';
}

$resultado2 = mysql_query("SELECT * FROM cliente c, factura f WHERE num_fact = '$cod' AND c.num_cli=f.num_cli AND nit_empresa='88195885-8' ");


			echo'<tr>';
              echo  '<td align="center" bgcolor="#CCCCCC">'."Dirección".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Telefono".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Correo".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Forma de pago".'</td>';
			 // echo  '<td>'."Factura".'</td>';
			echo'</tr>';
			
				


while($mostrar1 = mysql_fetch_array($resultado2)){
	
	echo '<tbody>';
	echo '<tr>';
	echo '<td align="center">'.$mostrar1['direccion'].'</td>';
	echo '<td align="center">'.$mostrar1['telefono'].'</td>';
	echo '<td align="center">'.$mostrar1['email'].'</td>';
	echo '<td align="center">'.$mostrar1['forma_pago'].'</td>';
	//echo '<td>'.$mostrar['num_fact'].'</td>';
	echo '</tr>';
	echo '</tbody>';
}



echo '</table>';





$resultado = mysql_query("SELECT * FROM producto p, detalle_factura d WHERE num_fact = '$cod' AND d.num_prod = p.num_prod ORDER BY d.num_detalle ASC");

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



$resul = mysql_query("SELECT * FROM producto num_fact = '$cod' ");
while($ver = mysql_fetch_array($resultado)){
echo'<tr>';
              echo  '<td></td>';
			  //echo  '<td></td>';
			  echo  '<td></td>';
			  echo  '<td></td>';
			  echo  '<td>'."TOTAL".'</td>';
			  echo  '<td>'.$ver['valor_fact'].'</td>';
            echo'</tr>';
}
echo '</table>';

//echo '<center><a href="gestionar.php"><img src="img/desc.png" height="35" /></a></center>';
/************************************************************************************************/


$resultado99 = mysql_query("SELECT * FROM factura  WHERE num_fact = '$cod' ");


echo '<fieldset>
				<table class="tbl-registro" width="100%">';
echo '<form action="actfactura.php" method="post">';
echo '<table class="table table-bordered table-condensed table-hover">';

//$d=0;
while($mostrar99 = mysql_fetch_array($resultado99)){
	

	
	echo '<tr>';
	
	echo '<input type="hidden" class="form-control" name="codigo" value='.$mostrar99["num_fact"].'>';
	echo '<input type="hidden" class="form-control" name="val" value='.$mostrar99["valor_fact"].'>';
	?>
	
	
    <?php
	echo  '<td><center>'."Valor Factura".'</center></td>';
	
	echo '<td><input type="text" class="form-control" name="vv" value='.$mostrar99["valor_fact"].'></td>';
	/*echo '<td><input type="text" name="sub" value='.$mostrar["precio"].'></td>';
	echo '<td><input type="text" name="sub" value='.$mostrar["stock"].'></td>';*/
	echo '</tr>';
}

$resultado77 = mysql_query("SELECT * FROM factura  WHERE num_fact = '$cod' ");
				echo'<tr>';
                      //echo  '<td>'."No".'</td>';
					  echo  '<td><center>'."Descuento Comercial".'</center></td>';
					  echo  '<td><center>'."Devoluciones".'</center></td>';
					  /*echo  '<td>'."Precio".'</td>';
					  echo  '<td>'."Existencias".'</td>';*/
                      
                 echo'</tr>';
//$d=0;
while($mostrar = mysql_fetch_array($resultado77)){
	

	
	echo '<tr>';
	
	echo '<input type="hidden" class="form-control" name="codigo" value='.$mostrar["num_fact"].'>';
	echo '<input type="hidden" class="form-control" name="val" value='.$mostrar["valor_fact"].'>';
	?>
	
	
    <?php
	echo '<td><input type="text" class="form-control" name="com" value='.$mostrar["desc_com"].'></td>';
	echo '<td><input type="text" class="form-control" name="dev" value='.$mostrar["devolucion"].'></td>';
	/*echo '<td><input type="text" name="sub" value='.$mostrar["precio"].'></td>';
	echo '<td><input type="text" name="sub" value='.$mostrar["stock"].'></td>';*/
	echo '</tr>';
}



				echo'<tr>';
                     /* echo  '<td>'."No".'</td>';
					  echo  '<td>'."Producto".'</td>';
					  echo  '<td>'."Código de barras".'</td>';*/
					  echo  '<td><center>'."Averias".'</center></td>';
					  echo  '<td><center>'."Retencion en la fuente".'</center></td>';
                      
                 echo'</tr>';
//$d=0;

$resultado78 = mysql_query("SELECT * FROM factura  WHERE num_fact = '$cod' ");
while($mostrar1 = mysql_fetch_array($resultado78)){
	
	echo '';
	echo '<tr>';
	
	/*echo '<td>'.$mostrar['num_prod'].'</td>';
	echo '<td><input type="text" size="20" name="sub" value='.$mostrar["nom_prod"].'></input></td>';
	echo '<td><input type="text" name="sub" value='.$mostrar["cod_barras"].'></td>';*/
	echo '<td><input type="text" class="form-control" name="ave" value='.$mostrar1["averias"].'></td>';
	echo '<td><input type="text" class="form-control" name="retef" value='.$mostrar1["retefuente"].'></td>';
	echo '</tr>';
}

echo '</tr>';



echo'<tr>';
                     /* echo  '<td>'."No".'</td>';
					  echo  '<td>'."Producto".'</td>';
					  echo  '<td>'."Código de barras".'</td>';*/
					  echo  '<td><center>'."Retención ICA".'</center></td>';
					  echo  '<td><center>'."Valor Neto".'</center></td>';
                      
                 echo'</tr>';
//$d=0;

$resultado79 = mysql_query("SELECT * FROM factura  WHERE num_fact = '$cod' ");
while($mostrar1 = mysql_fetch_array($resultado79)){
	
	echo '';
	echo '<tr>';
	
	/*echo '<td>'.$mostrar['num_prod'].'</td>';
	echo '<td><input type="text" size="20" name="sub" value='.$mostrar["nom_prod"].'></input></td>';
	echo '<td><input type="text" name="sub" value='.$mostrar["cod_barras"].'></td>';*/
	echo '<td><input type="text" class="form-control" name="retei" value='.$mostrar1["reteica"].'></td>';
	echo '<td><input type="text" class="form-control" name="neto" value='.$mostrar1["valor_neto"].' disabled="disabled"></td>';
	echo '</tr>';
}

echo '</tr>';


	
	echo '<tr>';
				echo '<td align="center">';			
				echo 'Estado';
				echo '</td>';


				echo '<td align="center">';			
				echo 'Forma de Pago';
				echo '</td>';
	
	echo '</tr>';


echo '<tr>';
				echo '<td>';			
										echo '<select class="form-control" name="est" >
										<option>Abierta</option>
										<option>Pagada</option>
										<option>Anulada</option>';
				echo '</td>';






	echo '<td>';			
							echo '<select class="form-control" name="forma">
                            <option>Seleccionar</option>
                            <option>Efectivo</option>
                            <option>Transferecia</option>
                            <option>Consignación</option>';
	echo '</td>';



echo '</tr>';

	echo '<tr>';
				echo '<td align="center">';			
				echo 'Fecha de Pago';
				echo '</td>';


				echo '<td align="center">';			
				echo 'Referencia de Pago';
				echo '</td>';
	
	echo '</tr>';


echo '<tr>';
				echo '<td><input type="text" class="form-control" id="fecha1"  name="fecha"/></td>';






	echo '<td><input type="text" class="form-control" name="ref" /></td>';



echo '</tr>';


echo '</table>';
//echo '<input type="text" name="sub" value='.$mostrar["nom_prod"].'></input>';


echo'<tr>
      
           <td colspan="4"><input type="submit"  class="btn btn-success" value="Registrar" /></td>
                    </tr>
            </form>       
                </table>
                </fieldset>';

?>
</section>

</body>


<center><a href="facturasSaludables.php"><img src="img/regresar.png" height="100" /></a></center>
</html>
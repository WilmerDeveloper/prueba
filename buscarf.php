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
 
 <h2><center><img src="img/bannerbarrios.png" height="100" /></center></h2>
    
    <br />
    <br />
    
    
    <?php

$cod = $_POST['cod'];



//DEVOLVER LOS NOMBRES DE LOS clientes REGISTRADOS
$resultado1 = mysql_query("SELECT * FROM registro r, barrio b WHERE  r.cod_barrio = '$cod' AND r.cod_barrio=b.cod_barrio ");


echo '<table class="table table-bordered table-condensed table-hover">';
			echo'<tr>';
              echo  '<td align="center" bgcolor="#CCCCCC">'."Propietario".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Barrio".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Dirección".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Telefono".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Caninos".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Felinos".'</td>';
			  echo  '<td align="center" bgcolor="#CCCCCC">'."Castrados".'</td>';
			  
			 // echo  '<td>'."Factura".'</td>';
			echo'</tr>';
			
			
$can=0;
$cat=0;
$cast=0;		


while($mostrar = mysql_fetch_array($resultado1)){
	$can=$can+$mostrar['caninos'];
	$cat=$cat+$mostrar['felinos'];
	$cast=$cast+$mostrar['castrados'];
	echo '<tbody>';
	echo '<tr>';
			echo '<td align="center">'.$mostrar['propietario'].'</td>';
			echo '<td align="center">'.$mostrar['barrio'].'</td>';
			echo '<td align="center">'.$mostrar['direccion'].'</td>';
			echo '<td align="center">'.$mostrar['telefono'].'</td>';
			echo '<td align="center">'.$mostrar['caninos'].'</td>';
			echo '<td align="center">'.$mostrar['felinos'].'</td>';
			echo '<td align="center">'.$mostrar['castrados'].'</td>';
	//echo '<td>'.$mostrar['num_fact'].'</td>';
	echo '</tr>';
	}
	echo '<tr>';
			echo '<td align="center" bgcolor="#CCCCCC"></td>';
			echo '<td align="center" bgcolor="#CCCCCC"></td>';
			echo '<td align="center" bgcolor="#CCCCCC"></td>';
			echo '<td align="center" bgcolor="#CCCCCC"></td>';
			echo '<td align="center" bgcolor="#CCCCCC">'.$can.'</td>';
			echo '<td align="center" bgcolor="#CCCCCC">'.$cat.'</td>';
			echo '<td align="center" bgcolor="#CCCCCC">'.$cast.'</td>';
	//echo '<td>'.$mostrar['num_fact'].'</td>';
	echo '</tr>';
	
	
	echo '</tbody>';







echo '</table>';






//echo '<center><a href="gestionar.php"><img src="img/desc.png" height="35" /></a></center>';
/************************************************************************************************/



?>
</section>

</body>


<center><a href="indexmascotas.php"><img src="img/regresar.png" height="100" /></a></center>
</html>
<?php
	include('class/classAsistencias.php');
	$clase = new sistema;
	$clase->conexion();
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
<section class="sectionF">
    <center><h2><img src="img/ingre.png" height="100" /></h2></center>
    <br />
    <table class="tbl-registro" width="30%" align="center">
    
     <?php

$fec1 = $_POST['fec1'];
$fec2 = $_POST['fec2'];

?>
   <form action="buscarEgreso.php" class="formulario" method="post">
    
    <tr> 
    <td>
      <center>Desde</center>
       
    </td>
    <td>
      <center>Hasta</center>
      
    </td>
    
    
    </tr>
    
    
    
    <tr> 
    <td>
      <input type="text" size="10" name="fec1" class="form-control" id="fecha1" value="<?php echo$fec1; ?>" disabled="disabled"/>
       
    </td>
    <td>
      <input type="text" size="10" name="fec2" class="form-control" id="fecha1" value="<?php echo$fec2; ?>" disabled="disabled"/>
      
    </td>
    
    
    </tr>
    </form>
    </table>
    <br />
    <br />
    <table class="table table-bordered table-condensed table-hover">
        <?php


//$codigo = substr($cod,1,-1);

//DEVOLVER LOS NOMBRES DE LOS clientes REGISTRADOS
$resultado1 = mysql_query("SELECT SUM(valor_neto), num_fact, fecha_fac, sucursal FROM factura f, cliente c WHERE fecha_fac BETWEEN '$fec1'  AND '$fec2' AND estado='pagada' AND f.num_cli=c.num_cli GROUP BY num_fact");

echo '<table class="table table-bordered table-condensed table-hover"  width="30%" align="center">';
			echo'<tr>';
			  echo  '<td><center>'."Fecha".'</center></td>';
              echo  '<td><center>'."Número".'</center></td>';
			  echo  '<td><center>'."Cliente".'</center></td>';
			  echo  '<td><center>'."Total".'</center></td>';
			  
			echo'</tr>';
			

$ig1=0;
while($mostrar = mysql_fetch_array($resultado1)){
$ig=$mostrar['SUM(valor_neto)'];
$ig1=$ig1+$ig;	
	echo '<tbody>';
	echo '<tr>';
	echo  '<td>'.$mostrar['fecha_fac'].'</td>';
	echo  '<td>'.$mostrar['num_fact'].'</td>';
	echo  '<td>'.$mostrar['sucursal'].'</td>';
	echo '<td align="right">'.$mostrar['SUM(valor_neto)'].'</td>';
	
	
	//echo '<td>'.$mostrar['valor_fact'].'</td>';
	echo '</tr>';
	echo '</tbody>';
}
echo'<tr>';
              
			  echo  '<td></td>';
			  echo  '<td></td>';
			  echo  '<td>'."Total".'</td>';
			  echo  '<td align="right">'.$ig1.'</td>';
            echo'</tr>';
echo '</table>';




?>
        
    </table>
</section>


      
      
   

</body>


<center><a href="indexingreso.php"><img src="img/regresar.png" height="100" /></a></center>
</html>
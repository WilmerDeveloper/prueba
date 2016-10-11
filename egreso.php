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
    <center><h2><img src="img/egre.png" height="100" /></h2></center>
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
    
    <table class="table table-bordered table-condensed table-hover">
        <?php


//$codigo = substr($cod,1,-1);

//DEVOLVER LOS NOMBRES DE LOS clientes REGISTRADOS


echo '<table class="table table-bordered table-condensed table-hover"  width="50%" align="center">';
$resultado1 = mysql_query("SELECT SUM(valor), concepto  FROM egreso e, concepto c WHERE e.num_concepto = c.num_concepto AND fecha_egre BETWEEN '$fec1'  AND '$fec2' GROUP BY concepto ");


			echo'<tr>';
              echo  '<td><center>'."Descripción".'</center></td>';
			  echo  '<td>'."Total".'</td>';
			  
			 // echo  '<td>'."Factura".'</td>';
			echo'</tr>';
			

$eg1=0;
while($mostrar = mysql_fetch_array($resultado1)){
$eg=$mostrar['SUM(valor)'];
$eg1=$eg1+$eg;
	
	echo '<tbody>';
	echo '<tr>';
	echo  '<td>'.$mostrar['concepto'].'</td>';
	echo '<td align="right">'.$mostrar['SUM(valor)'].'</td>';
	/*echo '<td>'.$mostrar['num_cli'].'</td>';
	echo '<td>'.$mostrar['fecha_fac'].'</td>';
	echo '<td>'.$mostrar['valor_fact'].'</td>';*/
	//echo '<td>'.$mostrar['num_fact'].'</td>';
	echo '</tr>';
	echo '</tbody>';
}
echo'<tr>';
              
			  
			  echo  '<td>'."Total".'</td>';
			  echo  '<td align="right">'.$eg1.'</td>';
            echo'</tr>';

echo '</table>';





?>
        
    </table>
</section>


      
      
   

</body>


<center><a href="indexegreso.php"><img src="img/regresar.png" height="100" /></a></center>
</html>
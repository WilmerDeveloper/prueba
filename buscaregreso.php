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
	
	
</head>
<body>
<section>
    <center><h2><img src="img/pagos.png" height="100" /></h2></center>
    <br />
    <br />
    
    
    <?php

$cod = $_POST['codigo'];
$resultado77 = mysql_query("SELECT * FROM egreso WHERE cons = '$cod'");
?>

<fieldset>


<table class="tbl-registro" width="30%">
<form action="actfactura.php" method="post">
<table class="table table-bordered table-condensed table-hover">

				<tr>
                      
					  <td><center>Fecha</center></td>
					  <td><center>Tipo</center></td>
					  
                      
               </tr>
<?php
//$d=0;
while($mostrar = mysql_fetch_array($resultado77)){
	$w=$mostrar["fecha_egre"];
	$x=$mostrar["tipo"];
?>	

	
	<tr>
	
   
	<td align="center"><input type="text" class="form-control" name="com" value="<?php echo $w;?>" disabled="disabled"></td>
	<td><input type="text" class="form-control" name="dev" value="<?php echo $x;?>" disabled="disabled"></td>
	
	</tr>
    
 <?php    
}
?>


				<tr>
                     
					<td><center>Consecutivo Interno</center></td>
					 <td><center>Beneficiario</center></td>
                      
                 </tr>
<?php

$resultado78 = mysql_query("SELECT * FROM egreso WHERE cons = '$cod'");
while($mostrar1 = mysql_fetch_array($resultado78)){
	$a= $mostrar1["beneficiario"];
	$b= $mostrar1["cons"];
?>	
	<tr>
        <td><input type="text" class="form-control" name="ave" value="<?php echo $b;?>" disabled="disabled"></td>
        <td><input type="text" class="form-control" name="ave" value="<?php echo $a;?>" disabled="disabled"></td>
	</tr>
   
<?php
}	
?>


			<tr>
                     
					  <td><center>Concepto</center></td>
					  <td><center>Número de Egreso</center></td>
                      
                </tr>

<?php
$resultado79 = mysql_query("SELECT * FROM egreso e, concepto c WHERE  e.num_concepto = c.num_concepto AND cons = '$cod'");
while($mostrar1 = mysql_fetch_array($resultado79)){
	$c= $mostrar1["concepto"];
	$d= $mostrar1["num_egre"];
	?>
	
	<tr>
	
	
	<td><input type="text" class="form-control" name="retei" value="<?php echo $c;?>" disabled="disabled"></td>
	<td><input type="text" class="form-control" name="neto" value="<?php echo $d;?>" disabled="disabled"></td>
	</tr>
  
  <?php
}
?>
</tr>



</tr>




</table>



<tr>
      
           
                    </tr>
            </form>       
                </table>
			
                </fieldset>


</section>

</body>


<center><a href="indexpago.php"><img src="img/regresar.png" height="100" /></a></center>

</html>
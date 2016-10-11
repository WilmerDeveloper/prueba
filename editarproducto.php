<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clientes</title> 
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
			$("#fecha12").datepicker({dateFormat: 'yy-mm-dd',});
			
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
<h2>Actualizar Producto</h2>
<?php

include('/class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$cod = $_POST['codigo'];
$resultado = mysql_query("SELECT * FROM producto  WHERE num_prod = '$cod' ");

?>






<fieldset>
				<table class="tbl-registro" width="50%">
				
<table class="table table-bordered table-condensed table-hover">
<form action="actprod.php" class="formulario" method="post">

				<tr>
                      
					  <td><center>Producto</center></td>
					  <td><center>Código de barras</center></td>
					  
                      
              </tr>
<?php
while($mostrar = mysql_fetch_array($resultado)){
	$a= $mostrar["nom_prod"];
	$b= $mostrar["cod_barras"];
	echo '<input type="hidden" class="form-control" name="nprod" value='.$mostrar["num_prod"].'>';
?>	
	<tr>
	
	
	<td><input type="text" class="form-control" name="prod" maxlength="200" value="<?php echo $a; ?>"></td>

	<td><input type="text" class="form-control" name="cbar" maxlength="200" value="<?php echo $b; ?>"></td>
	
	</tr>
<?php
}
?>


			<tr>
                     
					 <td><center>Precio</center></td>
					 
                      
                 </tr>

<?php
$resultado1 = mysql_query("SELECT * FROM producto  WHERE num_prod = '$cod' ");
while($mostrar1 = mysql_fetch_array($resultado1)){
	$c= $mostrar1["precio"];
	
?>
	<tr>
	
	<td><input type="text" class="form-control" name="pre" maxlength="200" value="<?php echo $c; ?>"></td>
	
	</tr>
    <tr>
    <center><input type="submit" value="EDITAR"  class="btn btn-primary"/></center>
    </tr>
    
<?php
}
?>

</form>

</table>



<tr>
                    
                
     </tr>
                    
 </table>
</fieldset>


</section>
<center><a href="indexprod.php"><img src="img/regresar.png" height="100" /></a></center>
</body>
</html>


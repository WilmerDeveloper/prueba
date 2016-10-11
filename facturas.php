<?php
	include('class/classAsistencias.php');
	$clase = new sistema;
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
    <h2><center><img src="img/facturas.png" height="100" /></center></h2>
    <br />
    
    <table class="tbl-registro" width="100%">
    <tr>
   
   
   <td><center><a href="facturasNutriIntegrales.php"><img src="img/nutri.png" height="50" /></a></center></td>
   <td><center><a href="facturasSaludables.php"><img src="img/saludables.png" height="50" /></a></center></td>
   <td><center><a href="index.php"><img src="img/remision.png" height="50" /></a></center></td>
                        
   
    </tr>
    </table>
    <br />
    <br />
   
</section>


</body>


<center><a href="index.php"><img src="img/regresar.png" height="100" /></a></center>
</html>
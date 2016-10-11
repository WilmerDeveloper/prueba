<?php
	include('class/classAsistencias.php');
	$clase = new sistema;
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
    <center><h2><img src="img/pagos.png" height="100" /></h2></center>
    <br />
    <table class="tbl-registro" width="100%">
    <tr>
   <form action="buscarEgreso.php" class="formulario" method="post">
    <td>
    <input type="button" value="GENERAR NUEVO EGRESO" id="nuevoEgreso" class="btn btn-primary"/>
    </td>
     
    <td>
      <input type="text" size="10" name="codigo"/>
      <input type="submit" value="BUSCAR"  class="btn btn-primary"/> 
    </td>
    </form>
    </tr>
    </table>
    <br />
    <br />
    <table class="table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>FECHA</th>
                <th>#</th>
                <th>TIPO</th>
                <th>NUMERO</th>
                <th>A NOMBRE DE</th>
                <th>POR CONCEPTO DE</th>
                <th>POR CONCEPTO DE</th>
                <th>VALOR</th>
            </tr>
        </thead>
        <tbody>
            <?php $clase->conexion();
              $clase->mostrarEgresos(); ?>
        </tbody>
    </table>
</section>

<!-- MODAL DE REGISTRO -->

 <div class="modal fade" id="modalEgreso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <?php 
			
			$resultado1 = mysql_query("SELECT concepto, num_concepto FROM concepto order by num_concepto ASC");
			//$resultado2 = mysql_query("SELECT num_prod, nom_prod FROM producto order by nom_prod ASC");
			$resultado3 = mysql_query("SELECT MAX(num_egre) FROM egreso");
			$fila=mysql_fetch_row($resultado3);
			$cont=$fila['0'];
			$cont1=$cont+1;
			
			
			?>
            
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registro de Egresos</b></h4>
            </div>
            <div class="modal-body">
            <fieldset><legend>Generar Registro</legend>
				<table class="tbl-registro" width="100%">
                	<tr>
                    	<td>Fecha: </td>
                        <td><input type="text" class="form-control" id="fecha1" /></td>
                        <td>Consecutivo: </td>
                        <td><input type="text" class="form-control" id="cons" value="<?php echo $cont1;?>" disabled="disabled" />
                        </td>
                        
                        
                        
                        
                    </tr>
                  
                    <tr>	
                    	<td>Tipo: </td>
                        <td>
                            <select name="tipo" class="form-control" id="tipo">
                            <option>Seleccionar</option>
                            <option>Factura</option>
                            <option>Comprobante</option>
                            </select>
                            </td>
                       <td>Número: </td>
                        <td><input type="text" class="form-control" id="num" /></td>
                        
                            
                    </tr>
                    
                    <center>
                    <tr>
                    	<td>Beneficiario: </td>
                        <td><input type="text" class="form-control" id="bene" /></td>
                    	<td>Concepto: </td>
                        <td>
                            <select name="con" class="form-control" id="conc">
                            <option value="">Seleccionar</option>
                            	<?php 
								while($fila=mysql_fetch_row($resultado1)){
									echo "<option value='".$fila['1']."'>" .$fila['0']. "</option>";
									
									}
								?>
                            </select>
                            </td>
                        
                    </tr>
                    </center>
                    
                    <tr>
                    <td>Detalle: </td>
                    <td><input type="text" class="form-control" id="det" maxlength="200" /></td>
                    <td>Valor: </td>
                    <td><input type="text" class="form-control" id="val"  /></td>
                    </tr>
                    
                    
                    <tr>
                    
                 <td colspan="4"><input type="button" id="generarEgreso" class="btn btn-success" value="Generar Egreso" /></td>
                    </tr>
                    
                </table>
                </fieldset>
                <tr>
                    <div id="mostrando"></div>
                    </tr>
                <div id="mensaje"></div>

                
               <div class="modal-footer">
                	<input type="button" id="guardar" class="btn btn-default" value="Guardar"/>
                </div>
            </div>
          </div>
        </div>
      </div>
      
      
   <!-- MODAL PARA MOSTRAR EL DETALLE -->
<div class="modal-header" id="mostrando"></div>
 <div class="modal fade" id="modalDetalle12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Detalle de Egreso</b></h4>
            <div  id="mostrando"></div> 
            
            <div class="modal-body" id="datosAqui"></div>
            
            </div>
            
          </div>
       </div>
                     	
               
   </div>   

</body>


<center><a href="index.php"><img src="img/regresar.png" height="100" /></a></center>
</html>
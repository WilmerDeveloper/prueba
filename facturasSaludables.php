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
    <h2><center><img src="img/saludablesbanner.png" height="100" /></center></h2>
    <br />
    <table class="tbl-registro" width="100%">
    <tr>
   <form action="buscarvivir.php" class="formulario" method="post">
    <td>
    <input type="button" value="GENERAR NUEVA FACTURA" id="nuevaAsistencia" class="btn btn-primary"/>
    </td>
     
    <td>
      <input type="text" size="10" name="codigo"/>
      <input type="submit" value="CARGAR PAGO"  class="btn btn-primary"/> 
    </td>
    </form>
    </tr>
    </table>
    <br />
    <br />
    <table class="table table-bordered table-condensed table-hover">
        <thead>
            
        </thead>
        <tbody>
            
        </tbody>
    </table>
</section>

<!-- MODAL DE REGISTRO -->

 <div class="modal fade" id="modalAsistencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <?php 
			
			$resultado1 = mysql_query("SELECT sucursal, nit_cliente, num_cli FROM cliente order by sucursal ASC");
			$resultado4 = mysql_query("SELECT razon_social, nit_empresa FROM empresa WHERE nit_empresa='700145462-1' order by razon_social ASC");
			$resultado3 = mysql_query("SELECT MAX(num_fact) FROM factura");
			$fila=mysql_fetch_row($resultado3);
			$cont=$fila['0'];
			$cont1=$cont+1;
			//echo $cont1;
			//$resultado2 = mysql_query("SELECT num_prod, nom_prod FROM producto order by nom_prod ASC");
			
			
			?>
            
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><h2><center><img src="img/saludablesbanner.png" height="80" /></center></h2>
    <br /></h4>
            </div>
            <div class="modal-body">
            <fieldset><legend>1. Generar Registro</legend>
				<table class="tbl-registro" width="100%">
                	<tr>
                    	
                        <td>Cliente: </td>
                        <td>
                            <select name="Forma de pago" class="form-control" id="nit">
                            <option value="">Seleccionar</option>
                            	<?php 
								while($fila=mysql_fetch_row($resultado1)){
									echo "<option value='".$fila['2']."'>" .$fila['0']. "</option>";
									
									}
								?>
                            </select>
                            </td>
                            
                            
                            	
                     <td>
                     <input type="hidden" class="form-control" value="<?php while($fila3=mysql_fetch_row($resultado4))
					 			{
									echo $fila3['1'];
								
								} ?>" id="emp" />
                                
                          </td>
                            
                        
                        
                    </tr>
                  
                    <tr>	
                        <td>Fecha: </td>
                        <td><input type="text" class="form-control" id="fecha1" /></td>
                        <td>Estado: </td>
                      	<td>
                        <select name="estado" class="form-control" id="estado">
                        <option>Seleccionar</option>
                        <option>Abierta</option>
                        <option>Pagada</option>
                        <option>Anulada</option>
                        </select>
                        </td>
                            
                    </tr>
                    
                    
                    
                    
                    <tr>
                    <td>
                    </td>
                    
              <td colspan="4" align="center"><input type="button" id="generarAsistencia" class="btn btn-success" value="Crear Factura" /></td>
              <td>
                    </td>
                    </tr>
                    
                </table>
                </fieldset>
                <tr>
                    <div id="mostrando"></div>
                    </tr>
                <div id="mensaje"></div>
                <fieldset><legend>2. Registrar Detalles</legend>
                <?php 
			
			//$resultado1 = mysql_query("SELECT razon_social, nit_cliente FROM cliente order by razon_social ASC");
			$resultado2 = mysql_query("SELECT num_prod, nom_prod FROM producto");
			
			
			?>
                <table class="tbl-registro" width="100%">
                <tr>
         <td><input type="text" placeholder="detalle" class="form-control" id="ndet" value="1" disabled="disabled" size="1"/></td>
                    <td><select name="Forma de pago" class="form-control" id="nprod">
                            <option value="">Seleccionar</option>
                            	<?php 
								while($fila2=mysql_fetch_row($resultado2)){
									echo "<option value='".$fila2['0']."'>".$fila2['1']."</option>";
									
									}
								
								?>
                            </select></td>
                    <td><input type="text" placeholder="cantidad" class="form-control" id="cantidad" disabled="disabled"/></td>
                    <td><input type="button" id="regEstudiante" class="btn btn-primary" value="+" disabled="disabled"/></td>
                </tr>
                
                
                </table>
                </fieldset>
                <br />
              
               <div id="contenidoRegistro"></div>
                
               <div class="modal-footer">
                	<input type="button" id="guardar" class="btn btn-default" value="Guardar"/>
                </div>
            </div>
          </div>
        </div>
      </div>
      
      
   <!-- MODAL PARA MOSTRAR EL DETALLE -->
<div class="modal-header" id="mostrando"></div>
 <div class="modal fade" id="modalDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Detalle de Factura</b></h4>
            <div  id="mostrando"></div>  
            <div class="modal-body" id="datosAqui"></div>
            
            </div>
            
          </div>
       </div>
                     	
               
   </div>   

</body>


<center><a href="facturas.php"><img src="img/regresar.png" height="100" /></a></center>
</html>
<?php
	include('class/classAsistencias.php');
	$clase = new sistema;
	$clase->conexion();
?>
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
<section class="sectionN">
    <center><h2><img src="img/cli.png" height="100" /></h2></center>
    <br />
    <input type="button" value="INGRESAR CLIENTE" id="nuevoCliente" class="btn btn-primary"/>
    <br />
    <br />
    
    
    <table class="tbl-registro" width="50%" align="center">
    <form action="VerEstadoRango.php" class="formulario" method="post">
    <?php
	
	$resultado1 = mysql_query("SELECT sucursal, nit_cliente, num_cli FROM cliente order by sucursal ASC");
	
	
	?>
    <tr> 
    <td>
      <center>Cliente</center>
       
    </td>
    <td>
      <center>Desde</center>
       
    </td>
    <td>
      <center>Hasta</center>
      
    </td>
    <td>
      
      
    </td>
    
    </tr>
    
    
    
     <tr>
     <td>
                            <select class="form-control" name="cli">
                            <option value="">Seleccionar</option>
                            	<?php 
								while($fila=mysql_fetch_row($resultado1)){
									echo "<option value='".$fila['2']."'>" .$fila['0']. "</option>";
									
									}
								?>
                            </select>
                            </td>
    <td>
      <input type="text" size="10" name="fec1" class="form-control" id="fecha1"/>
       
    </td>
    <td>
      <input type="text" size="10" name="fec2" class="form-control" id="fecha12"/>
      
    </td>
    <td>
      
      <input type="submit" value="Estado de Cartera"  class="btn btn-primary"/> 
    </td>
    </tr>
    </form>
    </table>
    
    
    <table class="table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>SUCURSAL</th>
                <th>ZONA</th>
                <th>D</th>
                
                <th>NIT</th>
                <th>DIRECCIÓN</th>
                <th>TELEFONO</th>
                
                <th>CONTACTO</th>
                <th>RUTA</th>
            </tr>
        </thead>
        <tbody>
            <?php $clase->conexion();
              $clase->mostrarClientes(); ?>
        </tbody>
    </table>
</section>

<!-- MODAL DE REGISTRO -->

 <div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registro de Clientes</b></h4>
            </div>
            <div class="modal-body">
            <fieldset>
				<table class="tbl-registro" width="100%">
                	<tr>
                    	<td>Código: </td>
                        <td><input type="text" class="form-control" id="cod" maxlength="5"/></td>
                        <td>Sucursal: </td>
                        <td><input type="text" class="form-control" id="suc" maxlength="200"/></td>
                    </tr>
                  
                    <tr>	
                        <td>Zona: </td>
                        <td><input type="text" class="form-control" id="zon"/></td>
                        <td>Nivel: </td>
                        <td><input type="text" class="form-control" id="niv"/></td>
                    </tr>
                   
                    <tr>
                        <td>Razón social: </td>
                        <td><input type="text" class="form-control" id="rs" /></td>
                        <td>Nit: </td>
                        <td><input type="text" class="form-control" id="nit" /></td>
                        
                    </tr>
                    
                    <tr>
                        <td>Dirección: </td>
                        <td><input type="text" class="form-control" id="dir" /></td>
                        <td>Telefono: </td>
                        <td><input type="text" class="form-control" id="tel" /></td>
                        
                    </tr>
                    
                    <tr>
                        <td>E-mail: </td>
                        <td><input type="text" class="form-control" id="mail" /></td>
                        <td>Contacto: </td>
                        <td><input type="text" class="form-control" id="cont" /></td>
                        
                    </tr>
                    
                    <tr align="center">
                    
                        <td>Ruta: </td>
                        <td><input type="text" class="form-control" id="ruta" /></td>
                        
                        
                    </tr>
                    
                    
                    
                    
                    <tr>
                    
                 <td colspan="4"><input type="button" id="regCliente" class="btn btn-success" value="Registrar" /></td>
                    </tr>
                    
                </table>
                </fieldset>
                <tr>
                    <div id="mostrando"></div>
                    </tr>
                <div id="mensaje"></div>

                <br />
              
               <div id="muestracliente"></div>
                
               <div class="modal-footer">
                	<input type="button" id="guardar" class="btn btn-default" value="Guardar"/>
                </div>
            </div>
          </div>
        </div>
      </div>
      
      
   <!-- MODAL PARA Eliminar el producto -->

 <div class="modal fade" id="modaleliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><b>Resultado de la operación</b></h4>
            </div>
              
             <center>
            		<img src="img/del.jpg" height="70" />
            </center> 
              
            <div class="modal-body" id="mostrar"></div>
            
            </div>
            
          </div>
       </div>
                	
               
   </div>   
   
   
   
   <!-- MODAL PARA Editar el producto -->
   
   
 <div class="modal fade" id="modalestado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><b>Estado de Cartera</b></h4>
            </div>
             
 
              
              
         <div class="modal-body" id="mostrando23"></div>
         
            
            </div>
            
          </div>
       </div> 	
               
   </div>  
 
  <!-- MODAL PARA DETALLE --> 
 
 <div class="modal fade" id="modalDetalle1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Detalle de Factura</b></h4>
            <div  id="mostrando45"></div>  
            
            
            </div>
            
          </div>
       </div>
                     	
               
   </div>   
   
   
   
   
   

</body>
<center><a href="index.php"><img src="img/regresar.png" height="100" /></a></center>
</html>
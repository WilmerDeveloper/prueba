<?php
	include('class/classAsistencias.php');
	$clase = new sistema;
	$clase->conexion();
	$resultado2 = mysql_query("SELECT num_prod, nom_prod FROM producto");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Productos</title> 
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
<section class="sectionP">
    <center><h2><img src="img/prod.png" height="100" /></h2></center>
    <br />
    
    <table class="tbl-registro" width="100%">
    <tr>
   <form action="editarproducto.php" class="formulario" method="post">
    <td>
    <input type="button" value="INGRESAR PRODUCTO" id="nuevoProducto" class="btn btn-primary"/>
    </td>
     <td><select name="codigo" class="form-control" >
                            <option value="">Seleccionar</option>
                            	<?php 
								while($fila2=mysql_fetch_row($resultado2)){
									echo "<option value='".$fila2['0']."'>".$fila2['1']."</option>";
									
									}
								
								?>
                            </select></td>
    <td>
      
      <input type="submit" value="EDITAR"  class="btn btn-primary"/> 
    </td>
    </form>
    </tr>
    </table>
    <br />
    <br />
    <table class="table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>NUMERO</th>
                <th>PRODUCTO</th>
                <th>CODIGO DE BARRAS</th>
                <th>PRECIO</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $clase->conexion();
              $clase->mostrarProductos(); ?>
        </tbody>
    </table>
</section>

<!-- MODAL DE REGISTRO -->

 <div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registro de Productos</b></h4>
            </div>
            <div class="modal-body">
            <fieldset>
				<table class="tbl-registro" width="100%">
                	<tr>
                    	<td>Número: </td>
                        <td><input type="text" class="form-control" id="nprod" maxlength="5"/></td>
                        <td>Producto: </td>
                        <td><input type="text" class="form-control" id="prod" maxlength="200"/></td>
                    </tr>
                  
                    <tr>	
                        <td>Código de Barras: </td>
                        <td><input type="text" class="form-control" id="cbar"/></td>
                    </tr>
                   
                    <tr>
                        <td>Precio de Venta: </td>
                        <td><input type="text" class="form-control" id="pre" /></td>
                        <td>Stock: </td>
                        <td><input type="text" class="form-control" id="stk" /></td>
                        
                    </tr>
                    
                    
                    
                    
                    <tr>
                    
                 <td colspan="4"><input type="button" id="regProducto" class="btn btn-success" value="Registrar" /></td>
                    </tr>
                    
                </table>
                </fieldset>
                <tr>
                    <div id="mostrando"></div>
                    </tr>
                <div id="mensaje"></div>

                <br />
              
               <div id="contenidoRegistro"></div>
                
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
   
   
 <div class="modal fade" id="modaleditarprod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><b>Reporte</b></h4>
            </div>
             
 
              
              
         <div class="modal-body" id="mostrar1"></div>
            
            </div>
            
          </div>
       </div> 	
               
   </div>  
 
   
   
  
   
   
   
   

</body>
<center><a href="index.php"><img src="img/regresar.png" height="100" /></a></center>
</html>
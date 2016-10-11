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
<section class="sectionF">
    <h2><center><img src="img/0013004819.jpg" height="100" /></center></h2>
    <br />
    <table class="tbl-registro" width="100%">
    <tr>
   <form action="buscarf.php" class="formulario" method="post">
    <td>
    <input type="button" value="GENERAR NUEVO REGISTRO" id="nuevaAsistencia" class="btn btn-primary"/>
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
                <th>ITEM</th>
                <th>PROPIETARIO</th>
                <th>BARRIO</th>
                <th>DIRECCION</th>
                <th>TELEFONO</th>
                <th>CANINOS</th>
                <th>FELINOS</th>
                <th>CASTRADOS</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $clase->conexion();
              $clase->mostrarRegistros(); ?>
        </tbody>
    </table>
</section>

<!-- MODAL DE REGISTRO -->

 <div class="modal fade" id="modalAsistencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <?php 
			
			
			$resultado4 = mysql_query("SELECT barrio, cod_barrio FROM barrio order by barrio ASC");
			$resultado3 = mysql_query("SELECT MAX(num_reg) FROM registro");
			$fila=mysql_fetch_row($resultado3);
			$cont=$fila['0'];
			$cont1=$cont+1;
			
			?>
            
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Censo de Mascotas</b></h4>
            </div>
            <div class="modal-body">
            <fieldset><legend>Generar Registro</legend>
				<table class="tbl-registro" width="100%">
                	<tr>
                    	
                        <input type="hidden" class="form-control" value="<?php  echo $cont1 ?>" id="num"/>
                        <td>Propietario: </td>
                        <td><input type="text" class="form-control" value="" id="prop"/></td>
                         <td>Barrio: </td>
                        <td>
                            <select name="Forma de pago" class="form-control" id="bar">
                            <option value="">Seleccionar</option>
                            	<?php 
								while($fila3=mysql_fetch_row($resultado4)){
									echo "<option value='".$fila3['1']."'>" .$fila3['0']. "</option>";
									
									}
								?>
                            </select>
                            </td>                        
                        
                        
                        
                    </tr>
                  
                    <tr>	
                   		<td>Dirección: </td>
                        <td><input type="text" class="form-control" value="" id="dir"/></td>
                        
                        <td>Telefono: </td>
                        <td><input type="text" class="form-control" value="" id="tel"/></td>
                            
                    </tr>
                    
                    <tr>	
                   		<td>Caninos: </td>
                        <td><input type="text" class="form-control" value="" id="can"/></td>
                        
                        <td>Felinos: </td>
                        <td><input type="text" class="form-control" value="" id="cat"/></td>
                        
                            
                    </tr>
                     <tr>	
                   		
                        
                        <td></td>
                        <td></td>
                        <td>Castrados: </td>
                        <td><input type="text" class="form-control" value="" id="cast"/></td>
                            
                    </tr>
                    
                    
                    
                    
                    <tr>
                    <td>
                    </td>
                    
    <td colspan="4" align="center"><input type="button" id="generarAsistencia" class="btn btn-success" value="Registrar" /></td>
              <td>
                    </td>
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
      
      
   
   

</body>


<center><a href="index.php"><img src="img/regresar.png" height="100" /></a></center>
</html>
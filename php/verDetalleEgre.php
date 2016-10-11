<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

//$cod = $_POST['codigo'];
//$codigo = substr($cod,1,-1);



$cod = $_POST['codigo'];
$codigo = substr($cod,1,-1);
$resultado77 = mysql_query("SELECT * FROM egreso WHERE cons = '$codigo'");
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

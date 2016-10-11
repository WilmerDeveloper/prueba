$(function() {
	$('#guardar').on('click', function(){
		var url = document.URL;
		location.href=url;
	});
	
	$('#nuevaAsistencia').on('click', function(){
		$('#modalAsistencia').modal({
			show:true,
			backdrop:'static',
		});
	});
	
	$('#nuevoProducto').on('click', function(){
		$('#modalProducto').modal({
			show:true,
			backdrop:'static',
		});
	});
	
	$('#nuevoCliente').on('click', function(){
		$('#modalCliente').modal({
			show:true,
			backdrop:'static',
		});
	});
	
	$('#nuevoEgreso').on('click', function(){
		$('#modalEgreso').modal({
			show:true,
			backdrop:'static',
		});
	});
	
	
	$('#generarAsistencia').on('click', function(){
		
		//var codigo = $('#codRegistro').val();
		var num = $('#num').val();
		var sum = parseInt(num)  + parseInt(1);
		var prop = $('#prop').val();
		var bar = $('#bar').val();
		var dir = $('#dir').val();
		var tel = $('#tel').val();
		var can = $('#can').val();
		var cat = $('#cat').val();
		var cast = $('#cast').val();
		
		var data = '&num='+num+'&prop='+prop+'&bar='+bar+'&dir='+dir+'&tel='+tel+'&can='+can+'&cat='+cat+'&cast='+cast;
		
		if(prop.length>0){
					
			$.ajax({
				type: 'POST',
				data: data,
				url: 'php/generarRegistro.php',
				success: function(data){
					if(data == 'existe'){
	$('#mensaje').html('<p class="alert alert-danger">Espere!!, este numero de registro ya fue ingresado anteriormente, ingrese otro porfavor.</p>');
					}
					else{
						
					
					$('#num').val(sum);
					$('#prop').val('').focus();
					$('#bar').val('');
					$('#dir').val('');
					$('#tel').val('');
					$('#can').val('');
					$('#cat').val('');
					$('#cast').val('');
					$('#mostrando').html(data);
					
										
					
					}
				}
						
				
			});
		}else{
			$('#mensaje').html('<p class="alert alert-warning">Espere!!, tiene que ingresar el nombre del propietario.</p>');
		}
	});
	
	$('#regEstudiante').on('click', function(){
		var ndet = $('#ndet').val();
		var sum = parseInt(ndet)  + parseInt(1);
		var nprod = $('#nprod').val();
		var cantidad = $('#cantidad').val();
		//var precio = $('#precio').val();
		var data = 'ndet='+ndet+'&nprod='+nprod+'&cantidad='+cantidad;
		
		
		
		if(ndet.length>0){
			$.ajax({
				type: 'POST',
				data: data,
				url: 'php/ingresarEstudiante.php',
				success: function(data){
					$('#ndet').val(sum);
					$('#nprod').val('').focus();
					$('#cantidad').val('');
					//$('#precio').val('');
					$('#contenidoRegistro').html(data);
				}
			});
		}else{
			$('#mensaje').html('<p class="alert alert-warning">Espere!!, tiene que ingresar el número del detalle.</p>');
		}
	});
	
	
	/*******************egreso***********************************/
	
	$('#generarEgreso').on('click', function(){
		var fecha1 = $('#fecha1').val();
		var tipo = $('#tipo').val();
		var cons = $('#cons').val();
		var bene = $('#bene').val();
		var conc = $('#conc').val();
		var num = $('#num').val();
		var det = $('#det').val();
		var val = $('#val').val();
		//var precio = $('#precio').val();
		var data = 'fecha1='+fecha1+'&tipo='+tipo+'&cons='+cons+'&bene='+bene+'&conc='+conc+'&num='+num+'&val='+val+'&det='+det;
		
		
		
		if(cons.length>0){
			$.ajax({
				type: 'POST',
				data: data,
				url: 'php/registrarEgreso.php',
				success: function(data){
					
					$('#fecha1').val('');
					$('#tipo').val('');
					$('#cons').val('');
					$('#bene').val('');
					$('#conc').val('');
					$('#num').val('');
					//$('#det').val('');
					$('#val').val('');
					
					$('#mostrando').html(data);
				}
			});
		}else{
			$('#mensaje').html('<p class="alert alert-warning">Espere!!, tiene que ingresar el número del egreso.</p>');
		}
	});
	
	
	
	/*******************producto********************************/
	
		$('#regProducto').on('click', function(){
		var nprod = $('#nprod').val();
		//var sum = parseInt(ndet)  + parseInt(1);
		var prod = $('#prod').val();
		var cbar = $('#cbar').val();
		var pre = $('#pre').val();
		var stk = $('#stk').val();
		var data = 'nprod='+nprod+'&prod='+prod+'&cbar='+cbar+'&pre='+pre+'&stk='+stk;
		
		
		
		if(nprod.length>0){
			$.ajax({
				type: 'POST',
				data: data,
				url: 'php/ingresarProducto.php',
				success: function(data){
					if(data == 'existe'){
	$('#mensaje').html('<p class="alert alert-danger">Espere!!, este numero de producto ya fue ingresado anteriormente, ingrese otro porfavor.</p>');
					}
					else{
					$('#nprod').val('').focus();
					$('#prod').val('');
					$('#cbar').val('');
					$('#pre').val('');
					$('#stk').val('');
					$('#contenidoRegistro').html(data);
					}// else
				}
			});
		}else{
			$('#mensaje').html('<p class="alert alert-warning">Espere!!, tiene que ingresar el número del detalle.</p>');
		}
	});



	/*************actualizar producto**************/
$('#actProducto').on('click', function(){
		var nprod = $('#nprod').val();
		//var sum = parseInt(ndet)  + parseInt(1);
		var prod = $('#prod').val();
		var cbar = $('#cbar').val();
		var pre = $('#pre').val();
		var stk = $('#stk').val();
		var data = 'nprod='+nprod+'&prod='+prod+'&cbar='+cbar+'&pre='+pre+'&stk='+stk;
		
		
		
		if(nprod.length>0){
			$.ajax({
				type: 'POST',
				data: data,
				url: 'php/updateProducto.php',
				success: function(data){
					
					$('#nprod').val('').focus();
					$('#prod').val('');
					$('#cbar').val('');
					$('#pre').val('');
					$('#stk').val('');
					$('#contenidoRegistro').html(data);
					
				}
			});
		}else{
			$('#mensaje').html('<p class="alert alert-warning">Espere!!, tiene que ingresar el número del detalle.</p>');
		}
	});	
	
/******************************cliente*************************************/
$('#regCliente').on('click', function(){
		var cod = $('#cod').val();
		var suc = $('#suc').val();
		var zon = $('#zon').val();
		var niv = $('#niv').val();
		var rs = $('#rs').val();
		var nit = $('#nit').val();
		var dir = $('#dir').val();
		var tel = $('#tel').val();
		var mail = $('#mail').val();
		var cont = $('#cont').val();
		var ruta = $('#ruta').val();
		var data = 'cod='+cod+'&suc='+suc+'&zon='+zon+'&niv='+niv+'&rs='+rs+'&nit='+nit+'&dir='+dir+'&tel='+tel+'&mail='+mail+'&cont='+cont+'&ruta='+ruta;
		
		
		
		if(cod.length>0){
			$.ajax({
				type: 'POST',
				data: data,
				url: 'php/ingresarCliente.php',
				success: function(data){
					if(data == 'existe'){
	$('#mensaje').html('<p class="alert alert-danger">Espere!!, este número de Nit ya fue ingresado anteriormente, ingrese otro por favor.</p>');
					}
					else{
					$('#cod').val('').focus();
					$('#suc').val('');
					$('#zon').val('');
					$('#niv').val('');
					$('#rs').val('');
					$('#nit').val('');
					$('#dir').val('');
					$('#tel').val('');
					$('#mail').val('');
					$('#cont').val('');
					$('#ruta').val('');			
					$('#muestracliente').html(data);
					}// else
				}
			});
		}else{
			$('#mensaje').html('<p class="alert alert-warning">Espere!!, tiene que ingresar el número del Nit.</p>');
		}
	});
	
/**************************************************************************/	

});


function verDetalle(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'php/verDetalle.php',
				success: function(data){
						$('#mostrando').html(data);
						$('#datosAqui').html(data);
						$('#modalDetalle').modal({
								show:true,
								backdrop:'static',
						});
				}
			});
		return false;
}

function eliminarDetalle(codigo, fact){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo+'&fact='+fact,
				url: 'php/eliminarDetalle.php',
				success: function(data){
						
						$('#modalDetalle').modal({
								show:true,
								backdrop:'static',
						});
				}
			});
		return false;
}


function verDetalle2(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'php/verDetallecl.php',
				success: function(data){
						$('#mostrando45').html(data);
						$('#datosAqui').html(data);
						$('#modalDetalle1').modal({
								show:true,
								backdrop:'static',
						});
				}
			});
		return false;
}


function verDetalleEgre(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'php/verDetalleEgre.php',
				success: function(data){
						$('#mostrando45').html(data);
						$('#datosAqui').html(data);
						$('#modalDetalle12').modal({
								show:true,
								backdrop:'static',
						});
				}
			});
		return false;
}


function EstadoCuenta(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'php/verEstado.php',
				success: function(data){
						$('#mostrando23').html(data);
						$('#datosAqui2').html(data);
						$('#modalestado').modal({
								show:true,
								backdrop:'static',
						});
				}
			});
		return false;
}



function eliminarProducto(codigo){
	$('#modaleliminar').modal({
								show:true,
								backdrop:'static',
						});
	
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'php/eliminarProducto.php',
				success: function(data){
					
					$('#mostrar').html(data);
					
					
				}
			});
		return false;
}


function eliminarCliente(codigo){
	$('#modaleliminar').modal({
								show:true,
								backdrop:'static',
						});
	
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'php/eliminarCliente.php',
				success: function(data){
					
					$('#mostrar').html(data);
					
					
				}
			});
		return false;
}



function editarproducto(codigo){
	$('#modaleditarprod').modal({
						
					show:true,
					backdrop:'static',
						});
	
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'php/editarproducto.php',
				success: function(data){
					$('#mostrar1').html(data);
					
					
				}
			});
		return false;
}

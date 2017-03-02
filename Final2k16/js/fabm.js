$(document).ready(function(){$("#nv").load('html/navegacion.php'); Listar();});

function Listar(){ $("#contenido").load('html/listado.php'); }

function MostrarAlta(){ $("#contenido").load('html/form_alta.php'); }

function MostrarModificar($parametro){

	console.log($parametro);

			$("#contenido").load('html/form_modificar.php').ready(function(){

			$.ajax({url:"nexo.php",type:"post",data:{queHacer:"MostrarModificar",
													 parametro:$parametro}}
			).then(function(exito){

							
							var e = JSON.parse(exito);

							$("#atributo1").val(e.atributo1);
							$("#atributo2").val(e.atributo2);
							$("#atributon").val(e.atributon);

							$("#botonguardar").html('<button type="button" onclick="Modificar('+e.key+')">Guardar</button>');
					
			},function(error){

							$("#contenidoinner").html(error);	
			});

	});
}

function Alta(){

	//VALIDACION DE QUE LOS ELEMENTOS DEL FORM NO ESTEN VACIOS
	if (!($("#atributo1").val()) || !($("#atributo2").val())){

		$("#contenidoinner").html("<br>*Los campos no pueden estar vacios");

	}else{

		//VALIDACION DE QUE EL ATRIBUTO 2 SEA VALOR NUMERICO
		if(!($.isNumeric($("#atributo2").val()))){
			
			$("#contenidoinner").html("<br>*El atributo 2 debe ser numerico");

		
		}else{

			//ALTA DE OBJETO ABM
			var form = new FormData($("#formulario")[0]);
		    form.append("queHacer","Alta");

		    $.ajax({url: "nexo.php", type: "POST", data: form, contentType: false, processData: false})
		    .then(function(exito){
				
				if($.trim(exito)=="si"){
							$("#contenidoinner").html("<br>Alta Correcta");
							$("#atributo1").val(null);
							$("#atributo2").val(null);
							$("#atributon").val(null);
						}else{
							$("#contenidoinner").html("<br>Error de Alta:"+$.trim(exito));

						}		
		                     
            },function(error){

            		$("#contenidoinner").html(error);
            });
     	}
	}
}

function Baja($parametro){

	//PIDE CONFIRMACION DE ELIMINACION
	var r = confirm("Seguro que desea eliminar? No podra recuperarse");
	
	if (r == true) {
    
    	$.ajax({url:"nexo.php",type:"post",data:{queHacer:"Baja",
													 parametro:$parametro}}
			).then(function(exito){

						if($.trim(exito)=="si"){

							$("#contenidoinner").addClass("form");
							$("#contenidoinner").html("Eliminado Correctamente");
							window.setTimeout(function(){
        													Listar();
    													}, 300);

						}else{
							$("#contenidoinner").addClass("form");
							$("#contenidoinner").html("<br>Error de Baja:"+$.trim(exito));

						}		

			},function(error){

							$("#contenidoinner").html(error);	
			});

	}
}

function Modificar($parametro){

	//VALIDACION DE QUE LOS ELEMENTOS DEL FORM NO ESTEN VACIOS
	if (!($("#atributo1").val()) || !($("#atributo2").val())){

		$("#contenidoinner").html("<br>*Los campos no pueden estar vacios");

	}else{

		//VALIDACION DE QUE EL ATRIBUTO 2 SEA VALOR NUMERICO
		if(!($.isNumeric($("#atributo2").val()))){
			
			$("#contenidoinner").html("<br>*El atributo 2 debe ser numerico");

		
		}else{

			//ALTA DE OBJETO ABM
			var form = new FormData($("#formulario")[0]);
		    form.append("queHacer","Modificar");
		    form.append("key",$parametro);

		    $.ajax({url: "nexo.php", type: "POST", data: form, contentType: false, processData: false})
		    .then(function(exito){
				
				console.log(exito);

						if($.trim(exito)=="si"){
							Listar();
						}else{
							$("#contenidoinner").html("<br>Error:"+$.trim(exito));
						}			
		                     
            },function(error){

            		$("#contenidoinner").html(error);
            });
     	}
	}

	
}



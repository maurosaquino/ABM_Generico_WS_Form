function Login($par){


	$.ajax({url:"nexologin.php",type:"post",data:{queHacer:"Login"+$par,
											 em:$("#usuario").val(),
											 ps:$("#clave").val()}}
	).then(function(exito){

							
							console.log(exito);

							if($.trim(exito)=="si"){

								window.location.replace("index.html");				
							
							}else{

								$("#contenedor").html("El usuario o clave son incorrectos");	
							}	

		},function(error){
							$("#contenedor").html(error);	
		});
}


function Logout($par){


	$.ajax({url:"nexologin.php",type:"post",data:{queHacer:"Logout"}}
	).then(function(exito){

							window.location.replace("login.php");				


		},function(error){
							$("#contenedor").html(error);	
		});
}

function BorrarCookie(){

	$.ajax({url:"nexologin.php",type:"post",data:{queHacer:"BC"}}
	).then(function(exito){

							$("#cookie").html("");

	},function(error){
							$("#contenedor").html(error);	
	});

}

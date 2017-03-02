<?php
	session_start();
	
	if(isset($_POST)){

		require_once('class/servicios.php');
		require_once('class/Imagen.php');

		
		switch($_POST['queHacer']){

			case "Alta": 


				$imagen =  Imagen::ValidarImagen("Alta");
				
				if($imagen != "error_img"){
					move_uploaded_file($_FILES["file"]["tmp_name"], 'img/'.$imagen);
					$array = array("",$_POST["atributo1"],$_POST["atributo2"],$_POST["atributo3"],$imagen);
					$cliente = servicios::generarServicioL("N");
					$retorno = servicios::llamarServicio('IngresarUnABM',$array,$cliente);
					unset($_FILES);	
					echo "si";	
				}else{
					echo "Error con la imagen cargada";	
				}



			break;

			case "Baja": 

				$array = array($_POST["parametro"],"","","","");
				$cliente = servicios::generarServicioL("N");
				$retorno = servicios::llamarServicio('EliminarUnABM',$array,$cliente);		
				
				echo $retorno;			
			break;

			case "MostrarModificar":

				$cliente = servicios::generarServicioL("N");
				$array = array($_POST["parametro"],"","","","");
				$retorno = servicios::llamarServicio('ObtenerUnicoAbm',$array,$cliente);	

				$array = array("key"=>$retorno[0]["primary_key"],
							   "atributo1"=>$retorno[0]["atributo1"],
							   "atributo2"=>$retorno[0]["atributo2"],
							   "atributo3"=>$retorno[0]["atributo3"],
							   "atributon"=>$retorno[0]["atributon"]
							   );

				echo json_encode($array);

			break;	

			case "Modificar": 

				if($_FILES["file"]["type"]==""){
						$imagen = $_POST["atributon"];
				}else{
						$imagen =  Imagen::ValidarImagen();
						if($imagen != "error_img"){

							move_uploaded_file($_FILES["file"]["tmp_name"], 'img/'.$imagen);
							unset($_FILES);	

						}else{
							echo "Error con la imagen cargada";
							break;	
						}
				}

				$array = array($_POST["key"],$_POST["atributo1"],$_POST["atributo2"],$_POST["atributo3"],$imagen);
				$cliente = servicios::generarServicioL("N");
				$retorno = servicios::llamarServicio('ModificarUnABM',$array,$cliente);		
				
				echo $retorno;			
			break;



				


		}
	}


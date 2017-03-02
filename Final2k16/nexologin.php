<?php
	session_start();
	
	if(isset($_POST)){

		require_once('class/claselogueo.php');
		require_once('class/servicios.php');

		
		switch($_POST['queHacer']){

			case "LoginWSF": 

				$array = array($_POST["em"],$_POST["ps"]);
				$retorno = claselogueo::ValidarUsuarioWSF($array);

				if (empty($retorno)){
						
						echo "no";
						

					}else{

						$_SESSION['registrado']= "si";
						$_SESSION['perfil']    = $retorno[0]['perfil'];
						$_SESSION['email']     = $retorno[0]['email'];
						
						echo "si";
							
				}

			break;

			case "LoginA": 

				$array = array($_POST["em"],$_POST["ps"]);
				$retorno = claselogueo::ValidarUsuarioArchivo($array);

				if (empty($retorno)){
					
					echo "no";

					}else{
					
					$_SESSION['registrado']= "si";
					$_SESSION['perfil']    = $retorno[2];
					$_SESSION['email']     = $retorno[0];

					setcookie('email', $retorno[2], time()+3600);
					setcookie('clave', $retorno[1], time()+3600);
				
					echo "si";
				} 
			
			break;

			case "LoginBD": 

				$array = array($_POST["em"],$_POST["ps"]);
				$cliente = servicios::generarServicioL("N");
				$retorno = servicios::llamarServicio('LoginBD',$array,$cliente);

				if (empty($retorno)){
					
					echo "no";

					}else{
					
					$_SESSION['registrado']= "si";
					$_SESSION['perfil']    = $retorno[0]['perfil'];
					$_SESSION['email']     = $retorno[0]['email'];

					setcookie('email', $retorno[0]['perfil'], time()+3600);
					setcookie('clave', $retorno[0]['clave'], time()+3600);
				
					echo "si";
				} 
			
			break;

			case "BC":

				
				setcookie("email", "", time()-3600);
				setcookie("clave", "", time()-3600);
				unset($_COOKIE);

			break;

			case "Logout":

				$_SESSION["registrado"]="no";
				$_SESSION["perfil"]="";
				$_SESSION["email"]="";
				session_destroy();				

			break;


		}

		
	
		
	}

?>	



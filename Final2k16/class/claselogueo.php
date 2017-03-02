<?php 
	
class claselogueo{

			public $email;
			public $password;
			public $perfil;

			function __construct($user,$pass){

				$this->email = $user;
				$this->password = $pass;
			}

			function setPerfil($perfil){

				$this->perfil = $perfil;
			}

			//EN CASO DE VALIDAR POR BASE DE DATOS
			static function ValidarUsuarioBD($claselogueo){

				require_once('AccesoDatos.php');

				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

				$consulta =$objetoAccesoDato->RetornarConsulta('SELECT *
																FROM usuarios 
																WHERE UPPER(email)=:ema
																AND clave =:pass');
				$consulta->bindValue(':pass',  $claselogueo["Password"],    PDO::PARAM_INT);
				$consulta->bindValue(':ema',   $claselogueo["Email"],    PDO::PARAM_INT);
				$consulta->execute();

				return $consulta->fetchall(); 
			}	

			//EN CASO DE VALIDAR POR ARCHIVO

			static function ValidarUsuarioArchivo($claselogueo){
			
				$miarchivo = fopen('.\txt\usuarios.txt',"r");
				
				while (!feof($miarchivo)){
				
					$_renglon=fgets($miarchivo);
					$_user=explode("=>",$_renglon);
				
					if($_user[0]!=""){
						
						if(strtoupper($_user[0]) == strtoupper($claselogueo[0]) && $_user[1] == $claselogueo[1]){		
							return $_user;
						
						}
					}
				}
				
				fclose($miarchivo);
				
				return;

			}

			//EN CASO DE LOGUEO POR WEB SERVICE FORANEO

			static function ValidarUsuarioWSF($claselogueo){
	
				require_once('servicios.php');

				$cliente = servicios::generarServicioF();
				$retorno = servicios::llamarServicio('LoginWS',$claselogueo,$cliente);

				return $retorno;

		
			}


}
?>
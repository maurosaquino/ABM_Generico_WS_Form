<?php 
	require_once('./lib/nusoap.php'); 
	require_once('../class/AccesoDatos.php');
	require_once('../class/claseABM.php');
	require_once('../class/claselogueo.php');

	
	$server = new nusoap_server(); 

	$server->configureWSDL('WebService Con PDO', 'urn:wsPdo'); 

	$server->wsdl->addComplexType(
								'objeto',
								'complexType',
								'struct',
								'all',
								'',
								array('key' 	  => array('name' => 'key', 'type' => 'xsd:int'),
									  'atributo1' => array('name' => 'atributo1', 'type' => 'xsd:string'),
									  'atributo2' => array('name' => 'atributo2', 'type' => 'xsd:string'),
									  'atributo3' => array('name' => 'atributo3', 'type' => 'xsd:string'),
									  'atributon' => array('name' => 'atributon', 'type' => 'xsd:string')	
									 )
								);

	$server->wsdl->addComplexType(
									'user',
									'complexType',
									'struct',
									'all',
									'',
									array('email' 	  => array('name' => 'email', 'type' => 'xsd:string'),
										  'clave' 	  => array('name' => 'clave', 'type' => 'xsd:string')
										 )
								);

///**********************************************************************************************************///								
//REGISTRO METODO SIN PARAMETRO DE ENTRADA Y PARAMETRO DE SALIDA 'ARRAY de ARRAYS'
	$server->register('LoginBD',                	
						array('user' => 'tns:user'),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#LoginBD',             
						'rpc',                        		
						'encoded',                    		
						'Valida un usuario de la BD'    			
					);


	$server->register('ObtenerTodosLosAbm',                	
						array(),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#ObtenerTodosLosAbm',             
						'rpc',                        		
						'encoded',                    		
						'Obtiene todos los ABM de la Base de Datos'    			
					);

	$server->register('ObtenerUnicoAbm',                	
						array('objeto' => 'tns:objeto'),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#ObtenerUnicoAbm',             
						'rpc',                        		
						'encoded',                    		
						'Obtiene un ABM de la Base de Datos'    			
					);

	$server->register('IngresarUnABM',                	
						array('objeto' => 'tns:objeto'),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',               		
						'urn:wsPdo#IngresarUnABM',             
						'rpc',                        		
						'encoded',                    		
						'Ingresa un ABM'    			
					);

	$server->register('EliminarUnABM',                	
						array('objeto' => 'tns:objeto'),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#EliminarUnABM',             
						'rpc',                        		
						'encoded',                    		
						' un ABM'    			
					);

	$server->register('ModificarUnABM',                	
						array('objeto' => 'tns:objeto'),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#EliminarUnABM',             
						'rpc',                        		
						'encoded',                    		
						' un ABM'    			
					);

	function LoginBD($user) {

			
		//return $user;

		return claselogueo::ValidarUsuarioBD($user);

	}	


	function ObtenerTodosLosAbm() {
		
		return claseABM::TraerTodosABM();
	}


	function ObtenerUnicoAbm($objeto) {
		
		$elobjeto = new claseABM();
		$elobjeto->key  = $objeto['key'];

		return claseABM::TraerUnicoABM($elobjeto);

	}



	function IngresarUnABM($objeto) {
		

		$elobjeto = new claseABM();

		$elobjeto->atributo1  	= $objeto['atributo1'];
		$elobjeto->atributo2    = $objeto['atributo2'];
		$elobjeto->atributo3    = $objeto['atributo3'];
		$elobjeto->atributon    = $objeto['atributon'];

		return claseABM::IngresarABM($elobjeto);



	}


	function EliminarUnABM($objeto) {
		
		$elobjeto = new claseABM();
		$elobjeto->key  = $objeto['key'];

		return claseABM::BorrarABM($elobjeto);

	}


	function ModificarUnABM($objeto) {
		
		$elobjeto = new claseABM();
		$elobjeto->key  = $objeto['key'];
		$elobjeto->atributo1  	= $objeto['atributo1'];
		$elobjeto->atributo2    = $objeto['atributo2'];
		$elobjeto->atributo3    = $objeto['atributo3'];
		$elobjeto->atributon    = $objeto['atributon'];

		return claseABM::ModificarABM($elobjeto);

	}
///**********************************************************************************************************///								

	$HTTP_RAW_POST_DATA = file_get_contents("php://input");	
	$server->service($HTTP_RAW_POST_DATA);

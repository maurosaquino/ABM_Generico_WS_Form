<?php

class servicios{

	//EN CASO DE VALIDR POR WEBSERVICE FORANEO
	static function generarServicioF(){

		require_once('SERVIDOR/lib/nusoap.php');
 
        $host = 'http://maxineiner.tuars.com/webservice/ws_segundo_parcial.php?wsdl';

        $client = new nusoap_client($host);
        $err = $client->getError();
        if ($err) {
                        die();
                        return '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
                    }
        return $client;

	}	

	//PARA TODOS LOS WEB SERVICES LOCALES
	static function generarServicioL($par){

		if($par=="T"){
		require_once('../SERVIDOR/lib/nusoap.php');
		}else{
		require_once('SERVIDOR/lib/nusoap.php');
		}

		$host = 'http://localhost/Final2k16/SERVIDOR/ws.php?wsdl';	
  
        $client = new nusoap_client($host);
        $err = $client->getError();
        if ($err) {
                        die();
                        return '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
                    }
        return $client;

	}	


	static function llamarServicio($servi,$parametro,$servicio){

		 require_once('claselogueo.php');
		 require_once('claseABM.php');

		 $client = $servicio;
		 
		 switch ($servi){

				case 'LoginWS':
		 
					$entrada = array('Email'   =>$parametro[0],
									 'Password'=>$parametro[1]);
		 			$resultado = $client->call($servi, array($entrada));
		 			break;

		 		case 'LoginBD':
		 
					$entrada = array('Email'   =>$parametro[0],
									 'Password'=>$parametro[1]);
		 			$resultado = $client->call($servi, array($entrada));
		 			break;	
		 		
		 		case 'ObtenerTodosLosAbm':

		 			$resultado = $client->call($servi, array());
		 			break;

		 		case 'ObtenerUnicoAbm':
					
					$entrada = array('key' 		 => $parametro[0],
		 							 'atributo1' => "",
		 							 'atributo2' => "",
		 							 'atributo3' => "",
		 							 'atributon' => "");

					$resultado = $client->call($servi, array($entrada));
			 		break;
		  	
		  		case 'IngresarUnABM':

		  			$entrada = array('key' 		 => "",
		 							 'atributo1' => $parametro[1],
		 							 'atributo2' => $parametro[2],
		 							 'atributo3' => $parametro[3],
		 							 'atributon' => $parametro[4]);

					$resultado = $client->call($servi, array($entrada));
			 		break;

		  		case 'EliminarUnABM':

					$entrada = array('key' 		 => $parametro[0],
		 							 'atributo1' => "",
		 							 'atributo2' => "",
		 							 'atributo3' => "",
		 							 'atributon' => "");

					$resultado = $client->call($servi, array($entrada));
			  		break;

		  		case 'ModificarUnABM':

		 			$entrada = array('key' 		 => $parametro[0],
		 							 'atributo1' => $parametro[1],
		 							 'atributo2' => $parametro[2],
		 							 'atributo3' => $parametro[3],
		 							 'atributon' => $parametro[4]);

					$resultado = $client->call($servi, array($entrada));
					break;	
		 }



         if ($client->fault) {
                     
         			$mensaje ='<h2>ERROR AL INVOCAR METODO:</h2><pre>'.print_r($resultado).'</pre>';

         			return $mensaje;

                        } else {

		                            $err = $client->getError();
		                            
		                            if ($err) {
		                                $mensaje = '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
		                    			
		                    			return $mensaje;

		                    			}else{ 
		                            	
		                            		return $resultado;

		                         	} 
                     			
		                         	
                     			}


	}

}


?>
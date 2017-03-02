<?php

class Imagen{

	static function ValidarImagen(){		

		
			$allowedExts = array("gif", "jpeg", "jpg", "png"); 
			$extension = explode(".", $_FILES["file"]["name"]);

			if($_FILES["file"]["type"]==""){

				$foto = "default.jpg";
				return $foto;

			}else{

				if ( //Validar tipo de Archivo
					(($_FILES["file"]["type"] != "image/gif")  && ($_FILES["file"]["type"] != "image/jpeg")  && ($_FILES["file"]["type"] != "image/jpg") && ($_FILES["file"]["type"] != "image/png"))  
				    || ($_FILES["file"]["size"] > (1*1024*1024)) 				  ///Valida el tamaño menor a 1MB
				    || !in_array($extension[1],$allowedExts)      				  ///Valida la extensión del archivo
				   )
					{
						 
						return 'error_img'; //Devuelve un error relacionado con la imagen
					
					}
				else{

					$foto = $_FILES["file"]["name"];	 ///Se le da un nombre al archivo
					
					return $foto;
					
				}	
			}	
		}
	

}
?>
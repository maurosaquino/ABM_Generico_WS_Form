<?php 
	
	session_start();

	if(!(empty($_SESSION))){

		if($_SESSION["registrado"]=="si"){


			echo '<div class="login-page">
						<div class="form">
							<form enctype="multipart/form-data" id="formulario">
								<input  type="text" id="atributo1" name="atributo1" placeholder="Ingrese atributo 1...">
								<input  type="text" id="atributo2" name="atributo2" placeholder="Ingrese atributo 2..."><br>
								SELECT:
								<select id="atributo3" name="atributo3">
									<option value="opcion1" selected>Opcion 1</option>
									<option value="opcion2">Opcion 2</option>
									<option value="opcion3">Opcion 3</option>
								</select><br><br>
								<input  type="file" id="archivo" name="file">
								<input  type="hidden" id="atributon" name="atributon">
								<span id="botonguardar"></span>
								<button type="button" onclick="Listar()">Volver</button>
							</form>
							<br>
							<div id="contenidoinner">
							</div>	
						</div>
					</div>';			

		}


	}

?>
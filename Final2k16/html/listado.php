<?php 
	
	session_start();

	if(!(empty($_SESSION))){

		if($_SESSION["registrado"]=="si"){

			require_once('../class/servicios.php');
			$client = servicios::generarServicioL("T");
			$abms = servicios::llamarServicio('ObtenerTodosLosAbm',array(),$client);

			echo '	<div class="table-title">
							<table class="table-fill">
							<tr>
								<th class="text-left">ID</th>
								<th class="text-left">ATRIBUTO1</th>
								<th class="text-left">ATRIBUTO2</th>
								<th class="text-left">ATRIBUTO3</th>
								<th class="text-left">ATRIBUTON</th>
								<th class="text-left">ACCIONES</th>
							</tr>';
					
					foreach($abms as $abm)
					{
						echo '<tr>
								<td class="text-left">'.$abm['primary_key'].'</td>
								<td class="text-left">'.$abm['atributo1'].'</td>
								<td class="text-left">'.$abm['atributo2'].'</td>
								<td class="text-left">'.$abm['atributo3'].'</td>
								<td class="text-left"><img src=img/'.$abm['atributon'].' height=70 width=70></td>
								<td class="text-left">
									<button id = "boton_tabla" type="button" onclick="MostrarModificar('.$abm['primary_key'].')">Modificar</button>
									<button id = "boton_tabla" type="button" onclick="Baja('.$abm['primary_key'].')">Eliminar</button>
							  </tr>';
					}

			echo '</table>
				  </div>
				  <br>
				  <div class="login-page">
						<div id="contenidoinner">
				  		</div>
				  </div>';

		}


	}

?>
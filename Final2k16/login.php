<?php session_start(); ?>

<html>
<head>
	<title>Segundo Parcial - Login</title>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/flogin.js"></script>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
		<div class="login-page">
			<div class="form">
			<form>
				<input type="text"       id="usuario" placeholder="Ingrese usuario...">
				<input type="password"   id="clave"   placeholder="Ingrese clave...">
				<input type="button" 	 value="Login Web Service Foraneo" onclick="Login('WSF')">
				<input type="button" 	 value="Login Archivo" onclick="Login('A')">
				<input type="button" 	 value="Login Base Datos" onclick="Login('BD')">
				<input type="button" 	 value="Borrar Cookie" onclick="BorrarCookie()">
			</form>

				<div id="contenedor">
				</div>
				
				<br><br>

				<div>
				Usuarios que funcionan para login basado en el web service foraneo:<br><br>
				<table>
				<tr><th>User</th><th>Pass</th></tr>
				<tr><td>admin@admin.com</td><td>123456</td></tr>
				<tr><td>user@user.com</td><td>123456</td></tr>
				<tr><td>invitado@guest.com</td><td>123456</td></tr>
				</table>
				<div id="cookie">

				<?php

				echo '<br>';
				if(sizeof($_COOKIE)>=2){
				
				echo '<u>INFORMACION DE LA COOKIE:</u></br>'.$_COOKIE["email"]."<br>".$_COOKIE["clave"];
				
				}

				?>
				</div>
			</div>
		</div>

</body>
</html>	




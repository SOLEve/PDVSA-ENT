<?php 
session_start();
	include("librerias.php");
	$_SESSION["login"]=0;
	$_SESSION["conex"]=0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<link href="images/icono.png" type="image/x-icon" rel="shortcut icon" />
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Sistema de Reportes para GTRMax</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/style1.css" />
		<script src="js/modernizr.custom.63321.js"></script>

		<style>
			@import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
			body {
					background:#555 url(images/pattern.png) repeat top left;
					color:#000;
					font-family: 'PT Sans Narrow', Arial, sans-serif;
					font-size:12px;
					overflow-y:scroll;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		</style>
    </head>
   
	<body>


        <div class="container">
			<div class="header" style="position:absolute;left:375px;top:50px;">
					<h1>Sistema de Reportes Sala CICENT<br></h1>
			</div>
			
			<div class="header" style="position:absolute;left:350px;top:95px;">
					<h1>PDVSA Empresa Nacional de Transporte<br></h1>
			</div>
			
			<div class="header" style="position:absolute;left:480px;top:140px;">
					<h1>Distrito Metropolitano<br></h1>
			</div>
			
			<section class="main" style="position:absolute;left:50px;top:150px;">
				<form method="post" action="" class="form-3" style="width:450px;height:150px;">
				    <p class="clearfix">
				        <label for="login">Usuario</label>
				        <input type="text" name="User" id="login" placeholder="Usuario">
				    </p>
				    <p class="clearfix">
				        <label for="password">Contraseña</label>
				        <input type="password" name="pass" id="password" placeholder="Contraseña"> 
				    </p>
				    <p class="clearfix">
						<a href="Recuperar.php"target= \"_blank\">
							<label for="remember">Recuperar Contraseña</label>
						</a>
				    </p>
					
					<?php
						if(isset($_POST["ingresar"]))
						{
							$consulta="SELECT login,rol_id_rol FROM usuario WHERE login='".$_POST["User"]."' AND clave='".$_POST["pass"]."'";
							$res=consultar1($consulta);
							$fila=mysqli_fetch_row($res);
							if(isset($fila[0]))
								{
								$_SESSION['login']=$fila[0];
								$_SESSION["conex"]=1;
								echo $fila[1];
								validar($fila[1]);
								}else
									{
									$_SESSION["conex"]=0;
									echo 'USUARIO O CLAVE INCORRECTA';
									}
						}
					?>
					
				    <p class="clearfix">
				        <input type="submit" name="ingresar" value="Ingresar">
				    </p>       
				</form>
			</section>
		</div>
    </body>
</html>
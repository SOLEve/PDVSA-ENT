<?php 
session_start(); 
error_reporting(0);
	include("Librerias.php");
	
	if(isset($_SESSION["conex"]))
	{
		if($_SESSION["conex"]==0)
		{
		echo '<script language="JavaScript" type="text/javascript">
				document.location= "index.php";
				</script>';
		}	
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Reportes para GTRMax</title>
	<link href="images/icono.png" type="image/x-icon" rel="shortcut icon" />
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html;">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="jscookmenu.min.js"></script>
	<script type="text/javascript" src="./ThemeVista/theme.js"></script>
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style6.css" />
    <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
	
	<style type="text/css">
		#wb_Form1
		{
		   background-color: #FFFFFF;
		   border: 4px #000000 none;
		}
	</style>
</head>
<body>
	<div id="wb_Text1" style="position:absolute;left:200px;top:930px;width:915px;height:16px;z-index:33;text-align:left;">
		<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
			Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.
		</span>
	</div>
	
	<div class="header" style="color:#FFFFFF;font-family:'News Cycle', Georgia, serif;font-size:34px;clear:both;text-shadow:0px 0px 1px #000;padding-top:8px;">
		Sistema de Reportes Sala CICENT
	</div>

	<a href="index.php">
		<input class="btn" type="submit" id="Button1" name="" value="Cerrar sesi&oacute;n" style="position:absolute;left:200px;top:460px;width:96px;height:25px;z-index:36;">
	</a>

	<div id="wb_Text2" style="position:absolute;left:202px;top:350px;width:139px;height:32px;z-index:37;text-align:left;">
		<span style="color:#FF0000;font-family:'Bookman Old Style';font-size:27px;">
			<strong>
				Usuario
			</strong>
		</span>
		
		<br>
	
		<h3 style="color:#FFFFFF">
			<?php
				$consulta="SELECT nombre, apellido FROM usuario WHERE Login ='".$_SESSION["login"]."'";
				$res=consultar($consulta);
				while($row=mysql_fetch_array($res))
				{
					echo $row['nombre'];
					echo"<br>";
					echo $row['apellido'];
				}
									 
			?>
		</h3>
		
	</div>
	
    <div class="container">
		<div class="content">
            <ul class="ca-menu">
				<li>
                    <a href="index_usuario.php">
                        <span class="ca-icon">F</span>
							<div class="ca-content">
                                <h2 class="ca-main">Atras</h2>
                                <h3 class="ca-sub">Regrese al Panel de Usuario</h3>
                            </div>
                        </a>
                </li>
                <li>
                    <a href="#">
                        <span class="ca-icon">&#43;</span>
                        <div class="ca-content">
                            <h2 class="ca-main">Agregar Usuario</h2>
                            <h3 class="ca-sub">Inserte un Nuevo Registro</h3>
                        </div>
                     </a>
                </li>
                <li>
                    <a href="Modificar_Usuario.php">
                            <span class="ca-icon">&#126;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Modificar Usuario</h2>
                                <h3 class="ca-sub">Actualice un Registro</h3>
                            </div>
                    </a>
                </li>
                <li>
                    <a href="Consultar_Usuario.php">
                        <span class="ca-icon">&#76;</span>
                         <div class="ca-content">
                            <h2 class="ca-main">Consultar Usuario</h2>
                             <h3 class="ca-sub">Consulte un Registro</h3>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="Eliminar_Usuario.php">
                        <span class="ca-icon">&#39;</span>
                        <div class="ca-content">
                            <h2 class="ca-main">Eliminar Usuario</h2>
                            <h3 class="ca-sub">Elimina un Registro</h3>
                        </div>
                    </a>
                </li>
            </ul>
         </div><!-- content -->
    </div>
	
	<div id="wb_Form1" style="position:absolute;left:530px;top:350px;width:460px;height:550px;z-index:40;">
		<form  method="post"  action="#" class="form-horizontal" style="width:500px;height:600px;">
			
			<div id="wb_Text3" style="position:absolute;left:37px;top:45px;width:383px;height:29px;z-index:0;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:24px;">
					<strong>
						Ingrese Datos del Nuevo Usuario
					</strong>
				</span>
			</div>

			<input type="text" placeholder="ejemplo 14000111" name="inputCedula" onkeyUp="return ValNumero(this);" style="position:absolute;left:215px;top:80px;width:198px;height:18px;line-height:18px;z-index:1;">
			
			<div id="wb_Text4"  style="position:absolute;left:85px;top:80px;width:59px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Cedula
					</strong>
				</span>
			</div>

			<input type="text" name="inputNombre" style="position:absolute;left:215px;top:120px;width:198px;height:18px;line-height:18px;z-index:4;">
			
			<div id="wb_Text5" for="inputNombre" style="position:absolute;left:85px;top:120px;width:69px;height:19px;z-index:3;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;" >
					<strong>
						Nombre
					</strong>
				</span>
			</div>

			<input type="text"  name="inputApellido" style="position:absolute;left:215px;top:160px;width:198px;height:18px;line-height:18px;z-index:6;"  value="">
			
			<div id="wb_Text6" style="position:absolute;left:85px;top:160px;width:69px;height:19px;z-index:5;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Apellido
					</strong>
				</span>
			</div>

			<input type="text" placeholder="solo numeros" name="inputTelefono" onkeyUp="return ValNumero(this);" style="position:absolute;left:215px;top:200px;width:198px;height:18px;line-height:18px;z-index:7;"  value="">
			
			<div id="wb_Text7" style="position:absolute;left:85px;top:200px;width:69px;height:38px;z-index:8;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Telefono
					</strong>
				</span>
			</div>

			<input type="email" placeholder="ejem correo@pdvsa.com"  name="inputCorreo" style="position:absolute;left:215px;top:240px;width:198px;height:18px;line-height:18px;z-index:9;"  value="">
			
			<div id="wb_Text8" style="position:absolute;left:85px;top:240px;width:63px;height:19px;z-index:10;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Correo
					</strong>
				</span>
			</div>

			<input type="text"  name="inputLogin"style="position:absolute;left:215px;top:280px;width:198px;height:18px;line-height:18px;z-index:11;"  value="">
			
			<div id="wb_Text9" style="position:absolute;left:85px;top:280px;width:48px;height:19px;z-index:19;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Login
					</strong>
				</span>
			</div>

			<input type="password" name="inputClave" style="position:absolute;left:215px;top:320px;width:198px;height:18px;line-height:18px;z-index:13;"  value="">
			
			<div id="wb_Text12" style="position:absolute;left:85px;top:320px;width:49px;height:19px;z-index:14;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Clave
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:360px;width:129px;height:18px;line-height:18px;z-index:12;">
				<select name="inputRol" class="span2">
					<?php
						$consulta="SELECT id_rol,nombre_rol FROM rol";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[id_rol]\">$row[nombre_rol]</option>";
						}
					?>	
				</select>
			</div>
		
			<div id="wb_Text13" style="position:absolute;left:85px;top:360px;width:33px;height:19px;z-index:15;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Rol
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:400px;width:153px;height:20px;z-index:23;">
				<select name="inputDpto" class="span2">
					<?php
						$consulta="SELECT id_dpto,nombre_dpto FROM departamento";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[id_dpto]\">$row[nombre_dpto]</option>";
						}
					?>	
				</select>
			</div>
	
			<div id="wb_Text14" style="position:absolute;left:85px;top:400px;width:116px;height:19px;z-index:16;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Departamento
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:155px;top:440px;width:293px;height:20px;z-index:23;">
				<select name="inputPregunta" class="span4" >
					<option value="Cual es el nombre de tu madre o padre">Cual es el nombre de tu madre y/o padre?					</option>
					<option value="Cual es el nombre de tu actor o actriz favorito">Cual es el nombre de tu actor/actriz favorito?	</option>
					<option value="Cual es tu cantante favorito">Cual es tu cantante favorito?										</option>
					<option value="Cual es el nombre de tu mascota">Cual es el nombre de tu mascota?								</option>
					<option value="Cual es tu comida preferida">Cual es tu comida preferida?										</option>
					<option value="Cual es tu pelicula favorita">Cual es tu pelicula favorita?										</option>
					<option value="Cual es tu lugar de nacimiento">Cual es tu lugar de nacimiento?									</option>
					<option value="Cual es tu libro favorito">Cual es tu libro favorito?											</option>
					<option value="Cual es tu equipo de futbol preferido">Cual es tu equipo de futbol preferido?					</option>
					<option value="Cual es tu comiquita preferida">Cual es tu comiquita preferida?									</option>
				</select>
			</div>
	
			<div id="wb_Text11" style="position:absolute;left:6px;top:440px;width:145px;height:19px;z-index:17;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Pregunta Secreta
					</strong>
				</span>
			</div>

			<input type="password"  style="position:absolute;left:155px;top:480px;width:288px;height:18px;line-height:18px;z-index:22;" name="inputRespuesta" value="">
			
			<div id="wb_Text10" style="position:absolute;left:6px;top:480px;width:88px;height:19px;z-index:20;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Respuesta
					</strong>
				</span>
			</div>
	
			<button type="submit" name="b_agregar" style="position:absolute;left:166px;top:520px;width:96px;height:25px;z-index:23;" class="btn-danger">
				Registrar
			</button>
	
			<?php
				if(isset($_POST["b_agregar"]))
				{
					$cedula=$_POST["inputCedula"];
					$nombre=$_POST["inputNombre"];
					$apellido=$_POST["inputApellido"];
					$telefono=$_POST["inputTelefono"];
					$correo=$_POST["inputCorreo"];
					$login=$_POST["inputLogin"];
					$clave=$_POST["inputClave"];
					$id_rol=$_POST["inputRol"];
					$id_dep=$_POST["inputDpto"];
					$pregunta=$_POST["inputPregunta"];
					$respuesta=$_POST["inputRespuesta"];							
					$insertar="INSERT
					INTO usuario 
					VALUES('$cedula','$nombre','$apellido','$telefono','$correo','$login','$clave','$id_rol','$id_dep','$pregunta','$respuesta')";

					if (!actualizar_bd($insertar)) 
					{
						echo "<div class=\"alert alert-error\">";
						echo "Error el usuario no se ha podido crear!";
						echo "</div>";
					}else
						{
							echo "<div class=\"alert alert-success\">";
							echo "El usuario ".$nombre." ha sido creado exitosamente!";
							echo "</div>";
						}
					}
			?>
		</form>
	</div>

<!-- ==============================================
		 JavaScript ! 															-->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript">
   
    function Solo_Numerico(variable){
        Numer=parseInt(variable);
        if (isNaN(Numer)){
            return "";
        }
        return Numer;
    }
    function ValNumero(Control){
        Control.value=Solo_Numerico(Control.value);
    }
</script>
</body>
</html>
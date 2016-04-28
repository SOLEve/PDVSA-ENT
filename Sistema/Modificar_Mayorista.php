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

		<div class="header" style="color:#FFFFFF;font-family:'News Cycle', Georgia, serif;font-size:34px;clear:both;text-shadow:0px 0px 1px #000;padding-top:8px;">
			Sistema de Reportes Sala CICENT
		</div>
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:700px;width:915px;height:16px;z-index:33;text-align:left;">
			<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
				Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.
			</span>
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
                        <a href="index_cliente.php">
                            <span class="ca-icon">F</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Atrás</h2>
                                <h3 class="ca-sub">Regrese al Panel Cliente</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="Crear_Mayorista.php">
                            <span class="ca-icon">&#43;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Agregar Mayorista</h2>
                                <h3 class="ca-sub">Inserte un Nuevo Registro</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="ca-icon">&#126;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Modificar Mayorista</h2>
                                <h3 class="ca-sub">Actualice Información de un Registro</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="Consultar_Mayorista.php">
                            <span class="ca-icon">&#76;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Consultar Mayorista</h2>
                                <h3 class="ca-sub">Realice una Búsqueda de un Registro</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="Eliminar_Mayorista.php">
                            <span class="ca-icon">&#39;</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Eliminar Mayorista</h2>
                                <h3 class="ca-sub">Elimina un Registro</h3>
                            </div>
                        </a>
                    </li>
                </ul>
            </div><!-- content -->
        </div>
	
	<div id="wb_Form1" style="position:absolute;left:530px;top:350px;width:460px;height:300px;z-index:40;">
		<form  method="post"  action="#" class="form-horizontal" >
			<?php
				if(isset($_POST['b_consultar']))
				{
					$consulta="SELECT id_mayorista,nombre_may FROM mayorista WHERE id_mayorista='".$_POST["sel_ced"]."'";
					$res=consultar($consulta);
					$fila=mysql_fetch_array($res);
					$_POST["inputCedula"] =$fila[id_mayorista];
					$_POST["inputNombre"] =$fila[nombre_may];
				}
						
				if(isset($_POST['b_modificar']))
				{
					$id_mayorista=$_POST["inputCedula"];
					$nombre_may=$_POST["inputNombre"];
					$act="UPDATE mayorista SET id_mayorista='$id_mayorista',nombre_may='$nombre_may' WHERE id_mayorista='$id_mayorista'";
					if (!actualizar_bd($act)) 
					{
    					echo "<div class=\"alert alert-error\">";
  						echo "Error el Mayorista no se ha podido modificar!";
						echo "</div>";
					}
					else
					{
						echo "<div class=\"alert alert-success\">";
  						echo "El Mayorista ".$nombre_may." ha sido Modificado exitosamente!";
						echo "</div>";
					}
				}
			
			?>
			
			<div id="wb_Text3" style="position:absolute;left:50px;top:45px;width:430px;height:29px;z-index:0;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:24px;">
					<strong>
						Datos del Mayorista a Modificar
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:80px;width:198px;height:18px;line-height:18px;z-index:1;">
				<select name="sel_ced" class="span2">
					<?php
						echo"<option selected value=\"$_GET[id]\">$_GET[nombre]</option>";
						$consulta="SELECT id_mayorista,nombre_may FROM mayorista WHERE id_mayorista='$_POST[inputCedula].'";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo"<option selected value=\"$row[id_zona]\">$row[nombre_zona]</option>";
						} 
						$consulta="SELECT id_mayorista,nombre_may FROM mayorista ORDER BY id_mayorista";
						$res=consultar($consulta);
	    				while($row=mysql_fetch_array($res))
	    				{
	    					echo "<option value=\"$row[id_mayorista]\">$row[nombre_may]</option>";
	    				}
    				?>	
				</select>
				<button type="submit" name="b_consultar" class="btn-inverse" style="position:absolute;left:140px;top:0px;width:90px;height:30px;line-height:18px;z-index:1;">Consultar</button>
			</div>

			<div id="wb_Text4"  style="position:absolute;left:0px;top:80px;width:230px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Seleccione Mayorista
					</strong>
				</span>
			</div>

			<input readonly type="text" name="inputCedula" style="position:absolute;left:215px;top:115px;width:198px;height:18px;line-height:18px;z-index:1;" value="<?php echo $_POST["inputCedula"];?>">
			<div id="wb_Text4"  style="position:absolute;left:0px;top:115px;width:200px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Código Mayorista
					</strong>
				</span>
			</div>

			<input type="text" name="inputNombre" style="position:absolute;left:215px;top:150px;width:198px;height:18px;line-height:18px;z-index:4;" value="<?php echo $_POST["inputNombre"];?>">
			<div id="wb_Text5" for="inputNombre" style="position:absolute;left:35px;top:150px;width:200px;height:19px;z-index:3;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;" >
					<strong>
						Nombre Mayorista
					</strong>
				</span>
			</div>

			<button type="submit" name="b_modificar" style="position:absolute;left:166px;top:250px;width:96px;height:25px;z-index:23;" class="btn-danger">Modificar</button>

				
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
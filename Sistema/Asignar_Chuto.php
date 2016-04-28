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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:650px;width:915px;height:16px;z-index:33;text-align:left;">
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
                    <a href="index_administrador.php">
                        <span class="ca-icon">F</span>
							<div class="ca-content">
                                <h2 class="ca-main">Atras</h2>
                                <h3 class="ca-sub">Regrese al Panel principal</h3>
                            </div>
                        </a>
                </li>
            </ul>
         </div><!-- content -->
    </div>
	
	<div id="wb_Form1" style="position:absolute;left:530px;top:50px;width:460px;height:550px;z-index:40;">
		<form  method="post"  action="#" class="form-horizontal" >
			<?php
				if(isset($_POST['b_consultar']))
				{
					$consulta=mysql_query
					("
						SELECT placal_chuto,nombre_cond,conductor_id_conductor
						FROM  chuto
						INNER JOIN condicion_chuto
						INNER JOIN ch_cd
						WHERE Placal_Chuto ='".$_POST["sel_ced"]."'
						AND condicion_chuto_id_condicion=id_condicion
						AND placal_chuto=chuto_placal_chuto
					");			
					$número_filas = mysql_num_rows($consulta);
					
					if($número_filas==0)
					{
						$consulta="
						SELECT placal_chuto,nombre_cond
						FROM  chuto
						INNER JOIN condicion_chuto
						WHERE Placal_Chuto ='".$_POST["sel_ced"]."'
						AND condicion_chuto_id_condicion=id_condicion
						";
						$res=consultar($consulta);
						$fila=mysql_fetch_array($res);
						$_POST["inputPlaca"] =$fila[placal_chuto];
						$_POST["inputCondicion"] =$fila[nombre_cond];
						$_POST["inputCondu1"]="no tiene";
						$_POST["inputConductor1"]="Seleccione Conductor...";
						$_POST["inputConductor2"]="Seleccione Conductor...";
						$_POST["inputCondu2"]="no tiene";
					}
					else
					{
						$consulta="
						SELECT placal_chuto,nombre_cond,conductor_id_conductor,nombre,apellido
						FROM  chuto
						INNER JOIN condicion_chuto
						INNER JOIN ch_cd
						INNER JOIN conductor
						WHERE Placal_Chuto ='".$_POST["sel_ced"]."'
						AND condicion_chuto_id_condicion=id_condicion
						AND placal_chuto=chuto_placal_chuto
						AND id_conductor = conductor_id_conductor";
						$res=consultar($consulta);
						$fila=mysql_fetch_array($res);
						$_POST["inputPlaca"] =$fila[placal_chuto];
						$_POST["inputCondicion"] =$fila[nombre_cond];
						$_POST["inputCondu1"] =$fila[nombre]." ".$fila[apellido]." C.I:".$fila[conductor_id_conductor];
						$_POST["inputConductor1"]=$fila[conductor_id_conductor];
						
						$fila1=mysql_fetch_array($res);
						$_POST["inputCondu2"] =$fila1[nombre]." ".$fila1[apellido]." C.I:".$fila1[conductor_id_conductor];
						$_POST["inputConductor2"]=$fila1[conductor_id_conductor];
					}

				}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////								
				if(isset($_POST['b_modificar']))
				{
					if($_POST["inputCondicion"]=="Solo")
					{
						$consulta=mysql_query
						("
							SELECT chuto_placal_chuto
							FROM  ch_cd
							WHERE chuto_placal_chuto ='".$_POST["inputPlaca"]."'
						");			
						$número_chutos = mysql_num_rows($consulta);
						
						$consulta=mysql_query
						("
							SELECT conductor_id_conductor
							FROM  ch_cd
							WHERE conductor_id_conductor ='".$_POST["inputConductor1"]."'
						");			
						$número_cond = mysql_num_rows($consulta);
					
						if($número_chutos==0)
						{
							if($número_cond==0)
							{
								$placa=$_POST["inputPlaca"];
								$condu=$_POST["inputConductor1"];							
								$insertar=" 
									INSERT 
									INTO 
									ch_cd (conductor_id_conductor,chuto_placal_chuto)
									VALUES ('$condu','$placa')
									";
								if (!actualizar_bd($insertar))
								{
								echo "<div class=\"alert alert-error\">";
								echo "Error el Conducto no ha sido asignado!";
								echo "</div>";
								}
								else
								{
									echo "<div class=\"alert alert-success\">";
									echo "El conductor ha sido asignado";
									echo "</div>";
								}
							}
							
							if($número_cond!=0)
							{
								$placa=$_POST["inputPlaca"];
								$condu=$_POST["inputConductor1"];
								
								$eliminar="DELETE FROM ch_cd WHERE conductor_id_conductor='".$condu."'";
								actualizar_bd($eliminar);
								
								$insertar=" 
									INSERT 
									INTO 
									ch_cd (conductor_id_conductor,chuto_placal_chuto)
									VALUES ('$condu','$placa')
									";
								
								if (!actualizar_bd($insertar)) 
								{
									echo "<div class=\"alert alert-error\">";
									echo "Error el Conductor no ha sido asignado!";
									echo "</div>";
								}
								else
								{
									echo "<div class=\"alert alert-success\">";
									echo "El conductor ha sido asignado!";
									echo "</div>";
								}								
							}
						}
										
						if($número_chutos!=0)
						{						
							if($número_cond==0)
							{
								$placa=$_POST["inputPlaca"];
								$condu=$_POST["inputConductor1"];							
								$act="
								UPDATE ch_cd 
								SET 
								conductor_id_conductor='$condu'
								WHERE chuto_placal_chuto='$placa'";
								
								if (!actualizar_bd($act)) 
								{
									echo "<div class=\"alert alert-error\">";
									echo "Error el Conducto no ha sido asignado!";
									echo "</div>";
								}
								else
								{
									echo "<div class=\"alert alert-success\">";
									echo "El conductor ha sido asignado!";
									echo "</div>";
								}
							}					
							if($número_cond!=0)
							{
								$placa=$_POST["inputPlaca"];
								$condu=$_POST["inputConductor1"];
								
								$eliminar="DELETE FROM ch_cd WHERE chuto_placal_chuto='".$_POST["inputPlaca"]."'";
								actualizar_bd($eliminar);
								
								$act="
								UPDATE ch_cd 
								SET 
								chuto_placal_chuto='$placa'
								WHERE conductor_id_conductor='$condu'";
								
								if (!actualizar_bd($act)) 
								{
									echo "<div class=\"alert alert-error\">";
									echo "Error el Conducto no ha sido asignado!";
									echo "</div>";
								}
								else
								{
									echo "<div class=\"alert alert-success\">";
									echo "El conductor ha sido asignado!";
									echo "</div>";
								}								
							}			
							
						}
					}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////					
					if($_POST["inputCondicion"]=="Dupla")
					{
						$consulta=mysql_query
						("
							SELECT chuto_placal_chuto
							FROM  ch_cd
							WHERE chuto_placal_chuto ='".$_POST["inputPlaca"]."'
						");			
						$número_chutos = mysql_num_rows($consulta);
						
						$consulta=mysql_query
						("
							SELECT conductor_id_conductor
							FROM  ch_cd
							WHERE conductor_id_conductor ='".$_POST["inputConductor1"]."'
						");			
						$número_cond1 = mysql_num_rows($consulta);
						
						$consulta=mysql_query
						("
							SELECT conductor_id_conductor
							FROM  ch_cd
							WHERE conductor_id_conductor ='".$_POST["inputConductor2"]."'
						");			
						$número_cond2 = mysql_num_rows($consulta);
						
						if($número_chutos==0)
						{
							if($número_cond1==1)
							{
								$eliminar="DELETE FROM ch_cd WHERE conductor_id_conductor='".$_POST["inputConductor1"]."'";
								actualizar_bd($eliminar);
							}
							if($número_cond2==1)
							{
								$eliminar="DELETE FROM ch_cd WHERE conductor_id_conductor='".$_POST["inputConductor2"]."'";
								actualizar_bd($eliminar);
							}
						
							$placa=$_POST["inputPlaca"];
							$condu1=$_POST["inputConductor1"];
							$condu2=$_POST["inputConductor2"];					
							
							$insertar=" 
								INSERT 
								INTO 
								ch_cd (conductor_id_conductor,chuto_placal_chuto)
								VALUES ('$condu1','$placa')
								";
							actualizar_bd($insertar);
							
							$insertar=" 
								INSERT 
								INTO 
								ch_cd (conductor_id_conductor,chuto_placal_chuto)
								VALUES ('$condu2','$placa')
								";
							if (!actualizar_bd($insertar)){
							echo "<div class=\"alert alert-error\">";
							echo "Error los Conductores no han sido asignados!";
							echo "</div>";
							}
							else
							{
								echo "<div class=\"alert alert-success\">";
								echo "Los conductores fueron asignados";
								echo "</div>";
							}
						}
						
						if($número_chutos==1)
						{					
							$eliminar="DELETE FROM ch_cd WHERE chuto_placal_chuto='".$_POST["inputPlaca"]."'";
							actualizar_bd($eliminar);
							
							$consulta="
							SELECT chuto_placal_chuto
							FROM  ch_cd
							WHERE conductor_id_conductor ='".$_POST["inputConductor1"]."'";
							$res=consultar($consulta);
							$fila=mysql_fetch_array($res);
							$c1 =$fila[chuto_placal_chuto];
							$eliminar="DELETE FROM ch_cd WHERE chuto_placal_chuto='$c1'";
							actualizar_bd($eliminar);
							
							$consulta="
							SELECT chuto_placal_chuto
							FROM  ch_cd
							WHERE conductor_id_conductor ='".$_POST["inputConductor2"]."'";
							$res=consultar($consulta);
							$fila=mysql_fetch_array($res);
							$c2 =$fila[chuto_placal_chuto];
							$eliminar="DELETE FROM ch_cd WHERE chuto_placal_chuto='$c2'";
							actualizar_bd($eliminar);
							
							$placa=$_POST["inputPlaca"];
							$condu1=$_POST["inputConductor1"];
							$condu2=$_POST["inputConductor2"];					
							
							$insertar=" 
								INSERT 
								INTO 
								ch_cd (conductor_id_conductor,chuto_placal_chuto)
								VALUES ('$condu1','$placa')	";
							actualizar_bd($insertar);
							
							$insertar=" 
								INSERT 
								INTO 
								ch_cd (conductor_id_conductor,chuto_placal_chuto)
								VALUES ('$condu2','$placa')
								";
							if (!actualizar_bd($insertar))
							{
								echo "<div class=\"alert alert-error\">";
								echo "Error los Conductores no han sido asignados!";
								echo "</div>";
							}
							else
							{
								echo "<div class=\"alert alert-success\">";
								echo "Los conductores fueron asignados";
								echo "</div>";
							}
						}
						if($número_chutos==2)
						{					
							$eliminar="DELETE FROM ch_cd WHERE chuto_placal_chuto='".$_POST["inputPlaca"]."'";
							actualizar_bd($eliminar);
							
							$consulta="
							SELECT chuto_placal_chuto
							FROM  ch_cd
							WHERE conductor_id_conductor ='".$_POST["inputConductor1"]."'";
							$res=consultar($consulta);
							$fila=mysql_fetch_array($res);
							$c1 =$fila[chuto_placal_chuto];
							$eliminar="DELETE FROM ch_cd WHERE chuto_placal_chuto='$c1'";
							actualizar_bd($eliminar);
							
							$consulta="
							SELECT chuto_placal_chuto
							FROM  ch_cd
							WHERE conductor_id_conductor ='".$_POST["inputConductor2"]."'";
							$res=consultar($consulta);
							$fila=mysql_fetch_array($res);
							$c2 =$fila[chuto_placal_chuto];
							$eliminar="DELETE FROM ch_cd WHERE chuto_placal_chuto='$c2'";
							actualizar_bd($eliminar);
							
							$placa=$_POST["inputPlaca"];
							$condu1=$_POST["inputConductor1"];
							$condu2=$_POST["inputConductor2"];					
							
							$insertar=" 
								INSERT 
								INTO 
								ch_cd (conductor_id_conductor,chuto_placal_chuto)
								VALUES ('$condu1','$placa')	";
							actualizar_bd($insertar);
							
							$insertar=" 
								INSERT 
								INTO 
								ch_cd (conductor_id_conductor,chuto_placal_chuto)
								VALUES ('$condu2','$placa')
								";
							if (!actualizar_bd($insertar))
							{
								echo "<div class=\"alert alert-error\">";
								echo "Error los Conductores no han sido asignados!";
								echo "</div>";
							}
							else
							{
								echo "<div class=\"alert alert-success\">";
								echo "Los conductores fueron asignados";
								echo "</div>";
							}
						}				
					}
				}						
			?>
			<div id="wb_Text3" style="position:absolute;left:60px;top:45px;width:383px;height:29px;z-index:0;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:24px;">
					<strong>
						Seleccione Chuto y Conductor
					</strong>
				</span>
			</div>

			<div class="control-group" style="position:absolute;left:215px;top:100px;width:198px;height:18px;line-height:18px;z-index:1;">
				<select name="sel_ced" class="span2">
					<?php
						$consulta="SELECT placal_chuto FROM chuto WHERE condicion_chuto_id_condicion !=3 ORDER BY placal_chuto";
						$res=consultar($consulta);
						while($row=mysql_fetch_array($res))
						{
							echo "<option value=\"$row[placal_chuto]\">$row[placal_chuto]</option>";
						}
					?>	
				</select>
				<button type="submit" name="b_consultar" class="btn-inverse" style="position:absolute;left:140px;top:0px;width:90px;height:30px;line-height:18px;z-index:1;">Consultar</button>
			</div>
			
			<div id="wb_Text4"  style="position:absolute;left:-10px;top:100px;width:190px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Seleccione Chuto
					</strong>
				</span>
			</div>

			<input type="text"  name="inputPlaca" style="position:absolute;left:215px;top:140px;width:198px;height:18px;line-height:18px;z-index:1;"value="<?php echo $_POST["inputPlaca"];?>">
			<div id="wb_Text4" style="position:absolute;left:-5px;top:140px;width:80px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Placa
					</strong>
				</span>
			</div>

			<input type="text" readonly name="inputCondicion" style="position:absolute;left:215px;top:180px;width:198px;height:18px;line-height:18px;z-index:1;"value="<?php echo $_POST["inputCondicion"];?>">
			<div id="wb_Text4" style="position:absolute;left:10px;top:180px;width:80px;height:19px;z-index:2;text-align:center;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Condición
					</strong>
				</span>
			</div>

			<?php
				if($_POST["inputCondicion"]=="Dupla" || $_POST["inputCondicion"]=="Solo")
				{
					echo"
						<div class=\"control-group\" style=\"position:absolute;left:215px;top:220px;width:129px;height:18px;line-height:18px;z-index:12;\" value=\"$_POST[inputConductor1]\">
						<select name=\"inputConductor1\" class=\"span3\">
						<option selected value=\"$_POST[inputConductor1]\">$_POST[inputConductor1]</option>";
						
					$consulta="SELECT id_conductor,nombre,apellido FROM conductor ORDER BY nombre";
					$res=consultar($consulta);
					while($row=mysql_fetch_array($res))
					{
						echo "<option value=\"$row[id_conductor]\">$row[nombre] $row[apellido] $row[id_conductor]</option>";
					}
					$consulta="SELECT id_conductor,nombre FROM conductor WHERE id_conductor='$_POST[inputTipo].'";
					$res=consultar($consulta);
					while($row=mysql_fetch_array($res))
					{
						echo"<option selected value=\"$row[id_conductor]\">$row[nombre] $row[apellido] $row[id_conductor]</option>";
					} 
					 echo"  		
						</select>
					</div>
					<div id=\"wb_Text13\" style=\"position:absolute;left:10px;top:220px;width:200px;height:19px;z-index:15;text-align:left;\">
					<span style=\"color:#000000;font-family:Arial;font-size:17px;\"><strong>Seleccione Conductor 1</strong></span></div>

					<input type=\"text\" readonly name=\"inputCondu1\" style=\"position:absolute;left:215px;top:260px;width:210px;height:18px;line-height:18px;z-index:1;\" value=\"$_POST[inputCondu1]\">
					<div id=\"wb_Text4\" style=\"position:absolute;left:0px;top:260px;width:200px;height:19px;z-index:2;text-align:center;\">
					<span style=\"color:#000000;font-family:Arial;font-size:17px;\"><strong>Conductor 1 Asignado</strong></span></div>
					";
			}

			if($_POST["inputCondicion"]=="Dupla")
			{
					echo "
					<div class=\"control-group\" style=\"position:absolute;left:215px;top:300px;width:129px;height:18px;line-height:18px;z-index:12;\" value=\"$_POST[inputConductor2]\">
					<select name=\"inputConductor2\" class=\"span3\">
					<option selected value=\"$_POST[inputConductor2]\">$_POST[inputConductor2]</option>";
						
					$consulta="SELECT id_conductor,nombre,apellido FROM conductor ORDER BY nombre";
					$res=consultar($consulta);
					while($row=mysql_fetch_array($res))
					{
						echo "<option value=\"$row[id_conductor]\">$row[nombre] $row[apellido] $row[id_conductor]</option>";
					}
					$consulta="SELECT id_conductor,nombre FROM conductor WHERE id_conductor='$_POST[inputTipo].'";
					$res=consultar($consulta);
					while($row=mysql_fetch_array($res))
					{
						echo"<option selected value=\"$row[id_conductor]\">$row[nombre] $row[apellido] $row[id_conductor]</option>";
					} 
					echo"
						</select>
					</div>
					<div id=\"wb_Text13\" style=\"position:absolute;left:10px;top:300px;width:200px;height:19px;z-index:15;text-align:left;\">
					<span style=\"color:#000000;font-family:Arial;font-size:17px;\"><strong>Seleccione Conductor 2</strong></span></div>

					<input type=\"text\" readonly name=\"inputCondu2\" style=\"position:absolute;left:215px;top:340px;width:210px;height:18px;line-height:18px;z-index:1;\" value=\"$_POST[inputCondu2]\">
					<div id=\"wb_Text4\" style=\"position:absolute;left:0px;top:340px;width:200px;height:19px;z-index:2;text-align:center;\">
					<span style=\"color:#000000;font-family:Arial;font-size:17px;\"><strong>Conductor 2 Asignado</strong></span></div>
					";
			}
			?>	

			<button type="submit" name="b_modificar" style="position:absolute;left:166px;top:400px;width:96px;height:25px;z-index:23;" class="btn-danger">Asignar</button>
						
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
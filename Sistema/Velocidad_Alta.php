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
	
	function cambiarfecha_mysql($fecha)
	{
		list($dia,$mes,$ano)=explode("/",$fecha);
		$fecha="$ano-$mes-$dia";
		return $fecha;
	}
	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once 'excel_reader2.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Reportes para GTRMax</title>
	<link href="images/icono.png" type="image/x-icon" rel="shortcut icon" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet" >
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

	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>
   <script type="text/javascript">
         function  efecto(){
                             $('#fotocargando').hide();
                             $('#contenidoWeb').fadeIn(500);
        }
   </script>
   
</head>
	<body>

		<div class="header" style="color:#FFFFFF;font-family:'News Cycle', Georgia, serif;font-size:34px;clear:both;text-shadow:0px 0px 1px #000;padding-top:8px;">
			Sistema de Reportes Sala CICENT
		</div>
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:1100px;width:915px;height:16px;z-index:33;text-align:left;">
			<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
				Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.
			</span>
		</div>
	

	<a href="index.php">
		<input class="btn" type="submit" id="Button1" name="" value="Cerrar sesi&oacute;n" style="position:absolute;left:100px;top:520px;width:96px;height:25px;z-index:36;">
	</a>

	<div id="wb_Text2" style="position:absolute;left:100px;top:400px;width:139px;height:32px;z-index:37;text-align:left;">
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
	
    <div class="container"style="position:absolute;left:-100px;">
		<div class="content">
            <ul class="ca-menu">
				<li>
                    <a href="index_administrador.php">
                        <span class="ca-icon">F</span>
							<div class="ca-content">
                                <h2 class="ca-main">Atras</h2>
                                <h3 class="ca-sub">Regrese al Panel Principal</h3>
                            </div>
                        </a>
                </li>
            </ul>
         </div><!-- content -->
    </div>
	
	<div id="wb_Form1" style="position:absolute;left:280px;top:50px;width:1040px;height:950px;z-index:40;overflow:auto;">
		<form  method="post"  action="#" enctype="multipart/form-data" class="form-horizontal" >

			<div id="wb_Text3" style="position:absolute;left:325px;top:45px;width:450px;height:29px;z-index:0;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:24px;">
					<strong>
						Reporte Velocidad de los Veh&iacute;culos
					</strong>
				</span>
			</div>

		<div id="wb_Line4" style="position:absolute;left:300px;top:70px;width:449px;height:0px;z-index:41;">
		<img src="images/img0015.png" id="Line4" alt=""></div>

		<input type="file" name="foto" style="position:absolute;left:215px;top:100px;width:198px;height:30px;line-height:18px;z-index:7;">
		<div id="wb_Text7" style="position:absolute;left:10px;top:100px;width:200px;height:38px;z-index:8;text-align:left;">
		<span style="color:#000000;font-family:Arial;font-size:17px;"><strong>Buscar Reporte de Excel</strong></span></div>

		<button type="submit" name="b_agregar" style="position:absolute;left:500px;top:100px;width:96px;height:25px;z-index:23;" class="btn-danger">Importar</button>
		<a  href="Velocidad_Sin_Conductor.php"  name="b_agregar" style="position:absolute;left:20px;top:20px;width:150px;height:30px;z-index:23;text-align: center;" class="btn-danger">Alarmas Sin Conductor</a>

		<table class="table" style="width: 100%; height: 15;position:absolute;left:0px;top:150px;text-align: center;">
			<caption>
				<h4>Lista de Viajes Despachados</h4>
			</caption>
			
			<thead>
				<tr>
					<th>Fecha Alarma</th>
					<th>Hora Alarma</th>
					<th>Unidad</th>
					<th>Ubicacion</th>
					<th>Latitud</th>
					<th>Longitud</th>
					<th>Velocidad</th>
					<th style="width: 30%;">Conductor Culpable</th>
				</tr>
			</thead>
		<tbody>
		
			<?php
				$fecha;		//2
				$hora;		//2
				$unidad;	//3
				$ubicacion;	//4
				$latitud;	//5
				$longitud;	//6	
				$velocidad;	//10
				$cont1=0;
				$cont2=0;
				
				if(isset($_POST["b_agregar"]))
				{
					$nombreExcel=$_FILES['foto']['name'];
					$ruta=$_FILES['foto']['tmp_name'];
					$destino = "excel/".$nombreExcel;
					copy($ruta,$destino);

					echo "<a style=\"position:absolute;left:600px;top:100px;width:120px;height:25px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"exportar1.php?id=$nombreExcel\" class=\"btn-success\">Exportar Excel</a>";
						
					$data = new Spreadsheet_Excel_Reader("excel/".$nombreExcel);
					$nrows = $data->sheets[0]['numRows'];  
					$ncols = $data->sheets[0]['numCols'];
						
					for($i=0;$i<=20;$i++)
					{
						for($j=0;$j<=20;$j++)
						{
							$var=$data->sheets[0]['cells'][$i][$j];
							if ($var=='Fecha/Hora ' || $var=='Fecha/Hora'){$col_fecha=$j;}
							if ($var=='Unidad ' || $var=='Unidad'){$col_unidad=$j;}
							if ($var=='Dirección' || $var=='Dirección '){$col_direccion=$j;}
							if ($var=='Lat ' || $var=='Lat'){$col_lat=$j;}
							if ($var=='Lon ' || $var=='Lon'){$col_lon=$j;}
							if ($var=='Velocidad ' || $var=='Velocidad'){$col_velocidad=$j;}
						}
					}
							
					$cont=0;	
					for($i=5;$i<$nrows;$i++)
					{
						echo " <tr>";
						for($j=2;$j<=$ncols;$j++)
						{
							if ($j==$col_fecha){$fecha=$data->sheets[0]['cells'][$i][$j];$hora=substr($fecha, -8);$fecha=substr($fecha, 0, -9);}
							if ($j==$col_unidad){$unidad=$data->sheets[0]['cells'][$i][$j];$unidad=substr($unidad, 13, -1);}
							if ($j==4){$ubicacion=$data->sheets[0]['cells'][$i][$j];}
							if ($j==$col_lat){$latitud=$data->sheets[0]['cells'][$i][$j];}
							if ($j==$col_lon){$longitud=$data->sheets[0]['cells'][$i][$j];}
							if ($j==$col_velocidad){$velocidad=$data->sheets[0]['cells'][$i][$j];}
						}
							
						if($velocidad<=99)
						{	
							$cont1++;
							echo "<td bgcolor=\"caefc7\">".$fecha."</td>";
							echo "<td bgcolor=\"caefc7\">".$hora."</td>";
							echo "<td bgcolor=\"caefc7\">".$unidad."</td>";
							echo "<td bgcolor=\"caefc7\">".$ubicacion."</td>";
							echo "<td bgcolor=\"caefc7\">".$latitud."</td>";
							echo "<td bgcolor=\"caefc7\">".$longitud."</td>";			
							echo "<td bgcolor=\"caefc7\">".$velocidad."</td>";	
							$fecha=cambiarfecha_mysql($fecha);			
							
							$consulta_condicion="SELECT condicion_chuto_id_condicion FROM chuto WHERE placal_chuto LIKE '%$unidad%' 
							OR serial_carroceria LIKE '%$unidad%'";
							$res=consultar($consulta_condicion);
							$fila=mysql_fetch_array($res);
							$condicion =$fila[condicion_chuto_id_condicion];
								
							$consulta_cedula="
							SELECT conductor_id_conductor 
							FROM ch_cd 
							WHERE 
							chuto_placal_chuto = (SELECT placal_chuto from chuto WHERE placal_chuto LIKE '%$unidad%' 
							OR serial_carroceria LIKE '%$unidad%' )";
							$res=consultar($consulta_cedula);
								
							$consulta_chuto="
							SELECT chuto_placal_chuto  
							FROM ch_cd 
							WHERE 
							chuto_placal_chuto = (SELECT placal_chuto from chuto WHERE placal_chuto LIKE '%$unidad%' 
							OR serial_carroceria LIKE '%$unidad%' )";
							$chu=consultar($consulta_chuto);
							$fchuto=mysql_fetch_array($chu);
							$unidad=$fchuto[chuto_placal_chuto];
								
							if($condicion==1)
							{
								$fila1=mysql_fetch_array($res);
								$cedula =$fila1[conductor_id_conductor];	
							}
							if($condicion==2)
							{
								while($fila1=mysql_fetch_array($res))
								{
									if($cont==0){$cedula =$fila1[conductor_id_conductor];}
									if($cont==1){$cedula1 =$fila1[conductor_id_conductor];}
									$cont=$cont+1;	
								}
									
								
								$consulta="SELECT hora_salida FROM viajes WHERE fecha_viaje='$fecha' and hora_salida<'$hora' and conductor_id_conductor='$cedula'";
								$res=consultar($consulta);
								while($row1=mysql_fetch_array($res))
								{
									$hora1 =$row1[hora_salida];
								}
									
								$consulta1="SELECT hora_salida FROM viajes WHERE fecha_viaje='$fecha' and hora_salida<'$hora' and conductor_id_conductor='$cedula1'";
								$res1=consultar($consulta1);
								while($row2=mysql_fetch_array($res1))
								{
									$hora2 =$row2[hora_salida];
								}
								
								if($hora1>$hora2){$cedula =$cedula;}
								if($hora2>$hora1){$cedula =$cedula1;}
							}
							
							$cont=0;
							$consulta2=mysql_query("SELECT conductor_id_conductor FROM viajes WHERE fecha_viaje='$fecha' and hora_salida<'$hora' and conductor_id_conductor='$cedula'");			
							$numero = mysql_num_rows($consulta2);
								
							if($numero>0)
							{
								$consulta1= "SELECT nombre,apellido,id_conductor FROM conductor WHERE id_conductor='$cedula' ";
								$res1=consultar($consulta1);
								$fila1=mysql_fetch_array($res1);
								$nombre =$fila1[0]." ".$fila1[1]." ".$fila1[2];	
								echo "<td bgcolor=\"caefc7\">".$nombre."</td>";
								
								$insertar="INSERT INTO viajes2 (fecha_viaje,hora_alarma,velocidad,ubicacion,latitud,longitud,ch_cd_chuto_placal_chuto,CH_CD_Conductor_ID_Conductor) VALUES('$fecha','$hora','$velocidad','$ubicacion','$latitud','$longitud','$unidad','$cedula')";
								actualizar_bd($insertar);								
								if($cont%400==0){set_time_limit(0);}				
							}
							else
							{
								$insertar1="INSERT INTO viajes3 (fecha_viaje,hora_alarma,velocidad,ubicacion,latitud,longitud,V_placal_chuto,V_ID_Conductor) VALUES('$fecha','$hora','$velocidad','$ubicacion','$latitud','$longitud','$unidad','0')";
								
								actualizar_bd($insertar1);	
								echo "	<td bgcolor=\"caefc7\">
												Información! Puede que el Conductor:<br>&#8226;
												No cargó combustible en esta planta<br>&#8226;
												Cargó combustible antes de la fecha<br>&#8226;
												El chuto no tenga asignado chofer<br>&#8226;
												El chuto no este registrado en sistema<br>&#8226;
												El chuto no este haciendo trabajos de transporte de combustible
										</td>";	
							}
						}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////						
						if($velocidad>99)
						{									
							echo "<td  bgcolor=\"f9f88e\">".$fecha."</td>";
							echo "<td  bgcolor=\"f9f88e\">".$hora."</td>";
							echo "<td  bgcolor=\"f9f88e\">".$unidad."</td>";
							echo "<td  bgcolor=\"f9f88e\">".$ubicacion."</td>";
							echo "<td  bgcolor=\"f9f88e\">".$latitud."</td>";
							echo "<td  bgcolor=\"f9f88e\">".$longitud."</td>";			
							echo "<td  bgcolor=\"f9f88e\">".$velocidad."</td>";	
							$fecha=cambiarfecha_mysql($fecha);
							
							$cont2++;
							$consulta_condicion="SELECT condicion_chuto_id_condicion from chuto WHERE placal_chuto LIKE '%$unidad%' 
							OR serial_carroceria LIKE '%$unidad%'";
							$res=consultar($consulta_condicion);
							$fila=mysql_fetch_array($res);
							$condicion =$fila[condicion_chuto_id_condicion];
								
							$consulta_cedula="
							SELECT conductor_id_conductor 
							FROM ch_cd 
							WHERE 
							chuto_placal_chuto = (SELECT placal_chuto from chuto WHERE placal_chuto LIKE '%$unidad%' 
							OR serial_carroceria LIKE '%$unidad%' )";
							$res=consultar($consulta_cedula);
								
							$consulta_chuto="
							SELECT chuto_placal_chuto  
							FROM ch_cd 
							WHERE 
							chuto_placal_chuto = (SELECT placal_chuto from chuto WHERE placal_chuto LIKE '%$unidad%' 
							OR serial_carroceria LIKE '%$unidad%' )";
							$chu=consultar($consulta_chuto);
							$fchuto=mysql_fetch_array($chu);
							$unidad=$fchuto[chuto_placal_chuto];
								
							if($condicion==1)
							{
								$fila1=mysql_fetch_array($res);
								$cedula =$fila1[conductor_id_conductor];	
							}
							if($condicion==2)
							{
								while($fila1=mysql_fetch_array($res))
								{
									if($cont==0){$cedula =$fila1[conductor_id_conductor];}
									if($cont==1){$cedula1 =$fila1[conductor_id_conductor];}
									$cont=$cont+1;	
								}
									

								$consulta="SELECT hora_salida FROM viajes WHERE fecha_viaje='$fecha' and hora_salida<'$hora' and conductor_id_conductor='$cedula'";
								$res=consultar($consulta);
								while($row1=mysql_fetch_array($res))
								{
									$hora1 =$row1[hora_salida];
								}
									
								$consulta1="SELECT hora_salida FROM viajes WHERE fecha_viaje='$fecha' and hora_salida<'$hora' and conductor_id_conductor='$cedula1'";
								$res1=consultar($consulta1);
								while($row2=mysql_fetch_array($res1))
								{
									$hora2 =$row2[hora_salida];
								}
									
								if($hora1>$hora2){$cedula =$cedula;}
								if($hora2>$hora1){$cedula =$cedula1;}
							}
							$cont=0;
							
							$consulta2=mysql_query("SELECT conductor_id_conductor FROM viajes WHERE fecha_viaje='$fecha' and hora_salida<'$hora' and conductor_id_conductor='$cedula'");			
							$numero = mysql_num_rows($consulta2);
							
							if($numero>0)
							{
								$consulta1= "SELECT nombre,apellido,id_conductor FROM conductor WHERE id_conductor='$cedula' ";
								$res1=consultar($consulta1);
								$fila1=mysql_fetch_array($res1);
								$nombre =$fila1[0]." ".$fila1[1]." ".$fila1[2];
									
								$insertar="INSERT INTO viajes2 (fecha_viaje,hora_alarma,velocidad,ubicacion,latitud,longitud,ch_cd_chuto_placal_chuto,CH_CD_Conductor_ID_Conductor) VALUES('$fecha','$hora','$velocidad','$ubicacion','$latitud','$longitud','$unidad','$cedula')";
								actualizar_bd($insertar);
								if($cont%400==0){set_time_limit(0);}
								echo "<td bgcolor=\"f9f88e\">".$nombre."</td>";										
							}
							else
							{
								$insertar="INSERT INTO viajes3 (fecha_viaje,hora_alarma,velocidad,ubicacion,latitud,longitud,v_placal_chuto,v_ID_Conductor) VALUES('$fecha','$hora','$velocidad','$ubicacion','$latitud','$longitud','$unidad','0')";
								actualizar_bd($insertar);
									echo "
									<td bgcolor=\"f9f88e\">
											Falta Informacion! Puede que el Conductor:<br>&#8226;
											No cargó combustible en esta planta<br>&#8226;
											Cargó combustible antes de la fecha $fecha1<br>&#8226;
											El chuto no tenga asignado chofer<br>&#8226;
											El chuto no este registrado en sistema<br>&#8226;
											El chuto no este haciendo trabajos de transporte de combustible
									</td>
									";	
							}
						}
							echo"</tr>";
					}
						echo "<a target= \"_blank\" style=\"position:absolute;left:725px;top:100px;width:120px;height:25px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Ver_Grafica2.php?fecha=$fecha&id1=$cont1&id2=$cont2\" class=\"btn-primary\">Ver Grafica</a>";
				}
		
			?>
				</tbody>
			</table>
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
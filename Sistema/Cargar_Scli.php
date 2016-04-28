<?php 
session_start(); 
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
function RestarHoras($horaini,$horafin)
	{
		$horai=substr($horaini,0,2);
		$mini=substr($horaini,3,2);
		//$segi=substr($horaini,6,2);
	 
		$horaf=substr($horafin,0,2);
		$minf=substr($horafin,3,2);
		//$segf=substr($horafin,6,2);
	 
		$ini=((($horai*60)*60)+($mini*60)/*+$segi*/);
		$fin=((($horaf*60)*60)+($minf*60)/*+$segf*/);
	 
		$dif=$fin-$ini;
	 
		$difh=floor($dif/3600);
		$difm=floor(($dif-($difh*3600))/60);
		//$difs=$dif-($difm*60)-($difh*3600);
		return date("H:i",mktime($difh,$difm));
		//return date("H-i-s",mktime($difh,$difm,$difs));
	}

	function SumarHoras($horaini,$horafin)
	{
    $horai=substr($horaini,0,2);
    $mini=substr($horaini,3,2);
    //$segi=substr($horaini,6,2);
 
    $horaf=substr($horafin,0,2);
    $minf=substr($horafin,3,2);
    //$segf=substr($horafin,6,2);
 
    $ini=((($horai*60)*60)+($mini*60)/*+$segi*/);
    $fin=((($horaf*60)*60)+($minf*60)/*+$segf*/);
 
    $dif=$fin+$ini;
 
    $difh=floor($dif/3600);
    $difm=floor(($dif-($difh*3600))/60);
    //$difs=$dif-($difm*60)-($difh*3600);
    return date("H:i",mktime($difh,$difm));
    //return date("H-i-s",mktime($difh,$difm,$difs));
}

function cambiarfecha_mysql($fecha)
{    list($dia,$mes,$ano)=explode("/",$fecha);
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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:400px;width:915px;height:16px;z-index:33;text-align:left;">
			<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
				Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.
			</span>
		</div>
	

	<a href="index.php">
		<input class="btn" type="submit" id="Button1" name="" value="Cerrar sesi&oacute;n" style="position:absolute;left:1100px;top:250px;width:96px;height:25px;z-index:36;">
	</a>

	<div id="wb_Text2" style="position:absolute;left:1100px;top:100px;width:139px;height:32px;z-index:37;text-align:left;">
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
	
    <div class="container" style="position:absolute;left:-100px;">
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
	
	<div id="wb_Form1" style="position:absolute;left:300px;top:50px;width:700px;height:300px;z-index:40;">
		<form  method="post"  action="#" enctype="multipart/form-data" class="form-horizontal" >
		
			<div id="wb_Text3" style="position:absolute;left:200px;top:45px;width:383px;height:29px;z-index:0;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:24px;">
					<strong>
						Cargar Reporte SCLI
					</strong>
				</span>
			</div>

			<div id="wb_Line4" style="position:absolute;left:300px;top:70px;width:449px;height:0px;z-index:41;">
				<img src="images/img0015.png" id="Line4" alt="">
			</div>

			<input type="file" name="foto" style="position:absolute;left:215px;top:100px;width:198px;height:30px;line-height:18px;z-index:7;">
			<div id="wb_Text7" style="position:absolute;left:10px;top:100px;width:200px;height:38px;z-index:8;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:17px;">
					<strong>
						Buscar Reporte de Excel
					</strong>
				</span>
			</div>

			<button type="submit" name="b_agregar" style="position:absolute;left:500px;top:100px;width:96px;height:25px;z-index:23;" class="btn-danger">Importar</button>

					<?php
						date_default_timezone_set('America/Caracas');
						$fecha_actual = localtime(time(),1);
						$anyo_actual = $fecha_actual['tm_year'] + 1900;
						$mes_actual = $fecha_actual['tm_mon'] + 1;
						$dia_actual = $fecha_actual['tm_mday'];
						$hora_actual = $fecha_actual['tm_hour'];
						$minuto_actual = $fecha_actual['tm_min'];
						if($hora_actual<10){$hora_actual="0".$hora_actual;}
						if($minuto_actual<10){$minuto_actual="0".$minuto_actual;}
						$cont1=0;
						$cont2=0;					
						
						error_reporting(0);
						if(isset($_POST["b_agregar"]))
						{
							$nombreExcel=$_FILES['foto']['name'];
							$ruta=$_FILES['foto']['tmp_name'];
							$destino = "excel/".$nombreExcel;
							copy($ruta,$destino);
							$data = new Spreadsheet_Excel_Reader("excel/".$nombreExcel);
							
							$nrows = $data->sheets[0]['numRows'];  
							
							for($i=0;$i<=20;$i++)
							{

								for($j=0;$j<=20;$j++)
								{
									$var=$data->sheets[0]['cells'][$i][$j];
									if ($var=='DESPACHO ' || $var=='DESPACHO'){$col_despacho=$j;}
									if ($var=='FECHA ' || $var=='FECHA'){$col_fecha=$j;}
									if ($var=='Hora Sal. ' || $var=='Hora Sal.'){$col_hora=$j;}
									if ($var=='CLIENTE ' || $var=='CLIENTE'){$col_cliente=$j;}
									if ($var=='CI Conductor ' || $var=='CI Conductor'){$col_cedula=$j;}
									if ($var=='Diesel ' || $var=='Diesel'){$col_diesel=$j;}
									if ($var=='G-91 ' || $var=='G-91'){$col_g91=$j;}
									if ($var=='G-95 ' || $var=='G-95'){$col_g95=$j;}									
								}
							}
						
							
							for($i=11;$i<=$nrows;$i++)
							{

								for($j=2;$j<=11;$j++)
								{
									if ($j==$col_despacho){$despacho=$data->sheets[0]['cells'][$i][$j];}
									if ($j==$col_fecha){$fecha=$data->sheets[0]['cells'][$i][$j];}
									if ($j==$col_hora){$hora=$data->sheets[0]['cells'][$i][$j];}
									if ($j==$col_cliente){$cliente=$data->sheets[0]['cells'][$i][$j];}
									if ($j==$col_cedula){$cedula=$data->sheets[0]['cells'][$i][$j];}
									if ($j==$col_diesel){$diesel=$data->sheets[0]['cells'][$i][$j];}
									if ($j==$col_g91){$g91=$data->sheets[0]['cells'][$i][$j];}
									if ($j==$col_g95){$g95=$data->sheets[0]['cells'][$i][$j];}
								}
								
								$fil[$i]=$i;
								$des[$i]=$despacho;
								$fec[$i]=$fecha;
								$hor[$i]=$hora;
								$cli[$i]=$cliente;
								$ced[$i]=$cedula;
								$die[$i]=$diesel;
								$gn1[$i]=$g91;
								$gn5[$i]=$g95;
							}
							
							$cont=0;
							for($i=11;$i<=$nrows;$i++)
							{
								$consulta="SELECT id_cli FROM cliente WHERE nombre_cli='$cli[$i]'";
								$res=consultar1($consulta);
								$fila=mysqli_fetch_row($res);	
								$id =$fila[0];
							
								$consulta1="SELECT Chuto_Placal_Chuto FROM ch_cd WHERE Conductor_ID_Conductor='$ced[$i]'";
								$res1=consultar1($consulta1);
								$fila1=mysqli_fetch_row($res1);	
								$chuto =$fila1[0];
								
								$cont++;								
								$insertar="INSERT INTO viajes (fecha_viaje,hora_salida,num_despacho,conductor_id_conductor,cliente_id_cli,v1_placal_chuto,diesel,g91,g95)
										  VALUES('$fec[$i]','$hor[$i]','$des[$i]','$ced[$i]','$id','$chuto','$die[$i]','$gn1[$i]','$gn5[$i]')";								
								
								if (!actualizar_bd($insertar)) 
								{
									$consulta2=mysql_query("SELECT id_conductor FROM conductor WHERE id_conductor='$ced[$i]'");			
									$numero = mysql_num_rows($consulta2);
									if($numero==0)
									{
										mkdir("fotos_conductor/'$ced[$i]'");
										$destino1 = "fotos_conductor/$ced[$i]/sinfoto.png";
										$ruta="fotos_conductor/sinfoto.png";
										copy($ruta,$destino);
										$insertar="INSERT INTO conductor (id_conductor,nombre,apellido,telefono,foto)VALUES('$ced[$i]','Desconocido','Desconocido','0','$destino1')";
										actualizar_bd($insertar);
										$insertar="INSERT INTO viajes (fecha_viaje,hora_salida,num_despacho,conductor_id_conductor,cliente_id_cli,v1_placal_chuto,diesel,g91,g95)
										  VALUES('$fec[$i]','$hor[$i]','$des[$i]','$ced[$i]','$id','$chuto','$die[$i]','$gn1[$i]','$gn5[$i]')";	
										actualizar_bd($insertar);
									}
								}
								else
								{
								
								}
																	
								$consulta="SELECT distancia_cli FROM cliente WHERE nombre_cli='$cli[$i]'";
								$res=consultar1($consulta);
								$fila=mysqli_fetch_row($res);	
								$distancia =$fila[0];

						
								$consulta="SELECT placal_chuto,km_recorridos,km_recorridos_h FROM chuto INNER JOIN ch_cd WHERE conductor_id_conductor='$ced[$i]' AND placal_chuto = chuto_placal_chuto";
								$res=consultar1($consulta);
								$fila=mysqli_fetch_row($res);				
								$placa=$fila[0];
								$dist=$distancia + $fila[1];
								$dist1=$distancia + $fila[2];
								
								
								$act="UPDATE chuto SET km_recorridos = '$dist',km_recorridos_h = '$dist1'	WHERE placal_chuto = '$placa'";
								actualizar_bd1($act);

								$insertar="INSERT INTO km_cond (fecha_km,km_cond,conductor_id_conductor,num_desp)  VALUES('$fec[$i]','$distancia','$ced[$i]','$des[$i]')";								
								actualizar_bd1($insertar);
								
								
								if($cont%400==0){set_time_limit(0);}
							}
							
							echo"<audio src='mp3/carga_finalizada.wav' autoplay></audio>";
						}							
				?>
		</form>
	</div>
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
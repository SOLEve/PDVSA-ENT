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
		
		<div id="wb_Text1" style="position:absolute;left:200px;top:1000px;width:915px;height:16px;z-index:33;text-align:left;">
			<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">
				Sistema de Reportes GTRMAx de petr&oacute;leos de Venezuela S.A.- Empresa Nacional de Transporte Copyright &copy;  2013 PDVSA. Todos los derechos reservados.
			</span>
		</div>
	

	<a href="index.php">
		<input class="btn" type="submit" id="Button1" name="" value="Cerrar sesi&oacute;n" style="position:absolute;left:75px;top:550px;width:96px;height:25px;z-index:36;">
	</a>

	<div id="wb_Text2" style="position:absolute;left:75px;top:400px;width:139px;height:32px;z-index:37;text-align:left;">
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
	
	<div id="wb_Form1" style="position:absolute;left:300px;top:50px;width:1040px;height:950px;z-index:40;overflow:auto;">
		<form  method="post"  action="#" enctype="multipart/form-data" class="form-horizontal" >
		
<div id="wb_Text3" style="position:absolute;left:350px;top:45px;width:383px;height:29px;z-index:0;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:24px;"><strong>Tiempo Recorrido de Veh&iacute;culos</strong></span></div>

<div id="wb_Line4" style="position:absolute;left:300px;top:70px;width:449px;height:0px;z-index:41;">
<img src="images/img0015.png" id="Line4" alt=""></div>

<input type="file" name="foto" style="position:absolute;left:215px;top:100px;width:198px;height:30px;line-height:18px;z-index:7;">
<div id="wb_Text7" style="position:absolute;left:10px;top:100px;width:200px;height:38px;z-index:8;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:17px;"><strong>Buscar Reporte de Excel</strong></span></div>

<button type="submit" name="b_agregar" style="position:absolute;left:500px;top:100px;width:96px;height:25px;z-index:23;" class="btn-danger">Importar</button>

<table class="table" style="width: 100%; height: 15;position:absolute;left:0px;top:150px;text-align: center;">
  							<caption>
  							<h4>Lista de Viajes Despachados</h4>
  							</caption>
  							<thead>
    							<tr>
      								<th>Num Despacho</th>
      								<th>Nombre Cliente</th>
      								<th>Fecha Salida</th>
									<th>Hora Salida</th>
									<th>Dist Cliente(Km)</th>
									<th>Tiempo Cliente(Hr)</th>
									<th>Hr aprox lleg</th>
									<th>Hora Actual</th>
									<th>Tempo restante</th>
									<th>Conductor</th>
    							</tr>
  							</thead>
  							<tbody>
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

						
		if(isset($_POST["b_agregar"]))
		{
			$nombreExcel=$_FILES['foto']['name'];
			$ruta=$_FILES['foto']['tmp_name'];
			$destino = "excel/".$nombreExcel;
			copy($ruta,$destino);
			echo "<h4>Archivo Subido:".$nombreExcel."</h4>";
			echo "<a style=\"position:absolute;left:600px;top:100px;width:120px;height:25px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"exportar.php?id=$nombreExcel\" class=\"btn-success\">Exportar Excel</a>";
			
			$data = new Spreadsheet_Excel_Reader("excel/".$nombreExcel);
			$nrows = $data->sheets[0]['numRows'];  

			$nin="";
			for($i=11;$i<$nrows;$i++)
			{
			    echo " <tr>";
				for($j=2;$j<=8;$j++)
				{
					if ($j==2){$despacho=$data->sheets[0]['cells'][$i][$j];}
					if ($j==3){$fecha=$data->sheets[0]['cells'][$i][$j];}
					if ($j==5){$hora=$data->sheets[0]['cells'][$i][$j];}
					if ($j==6){$cliente=$data->sheets[0]['cells'][$i][$j];}
					if ($j==8){$cedula=$data->sheets[0]['cells'][$i][$j];}
				}
				
				if($cedula != "- ")
				{
				
		
					$consulta = "SELECT tiempo_cli FROM cliente WHERE nombre_cli='$cliente'";
					$link = conectar1();
					if ($sentencia = mysqli_prepare($link, $consulta)) 
					{

						/* ejecutar la consulta */
						mysqli_stmt_execute($sentencia);

						/* almacenar el resultado */
						mysqli_stmt_store_result($sentencia);

						$número_chutos = mysqli_stmt_num_rows($sentencia);

						/* cerrar la sentencia */
						mysqli_stmt_close($sentencia);
						mysqli_close ( $link );
					}
					
					if($número_chutos==1)
					{   
						$consulta="SELECT tiempo_cli,distancia_cli FROM cliente WHERE nombre_cli='$cliente'";
						$res=consultar1($consulta);
						$fila=mysqli_fetch_row($res);
						$tiempito =$fila[0];
						$distancia =$fila[1];
						
						$consulta="SELECT nombre,apellido FROM conductor WHERE id_conductor='$cedula'";
						$res=consultar1($consulta);
						$fila=mysqli_fetch_row($res);
						$nombre =$fila[0]." ".$fila[1];
						$nombre= $cedula." ".$nombre;
						
						$horafin=$hora;				
						$horaini= $tiempito;
						$hraprox = SumarHoras($horaini,$horafin);
						$horac=$hora_actual.":".$minuto_actual;
						
							$mes=substr($fecha, 0, -8);
							$dia=substr($fecha, 3, -5);
							$ano=substr($fecha, 6);
							$fecha=$dia."/".$mes."/".$ano;
						if($horac<$hraprox)
						{
							
							$cont1++;
							$restante= RestarHoras($horac,$hraprox);
							echo "<td bgcolor=\"caefc7\">".$despacho."</td>";
							echo "<td bgcolor=\"caefc7\">".$cliente."</td>";
							echo "<td bgcolor=\"caefc7\">".$fecha."</td>";
							echo "<td bgcolor=\"caefc7\">".$hora."</td>";
							echo "<td bgcolor=\"caefc7\">".$distancia."</td>";				
							echo "<td bgcolor=\"caefc7\">".$tiempito."</td>";
							echo "<td bgcolor=\"caefc7\">".$hraprox."</td>";
							echo "<td bgcolor=\"caefc7\">".$hora_actual.":".$minuto_actual."</td>";
							echo "<td bgcolor=\"caefc7\"> Gandola debe llegar en ".$restante."</td>";
							echo "<td bgcolor=\"caefc7\">".$nombre."</td>";
							$fecha=cambiarfecha_mysql($fecha);

						}else
						{
							$cont2++;
							echo "<td bgcolor=\"f9f88e\">".$despacho."</td>";
							echo "<td bgcolor=\"f9f88e\">".$cliente."</td>";
							echo "<td bgcolor=\"f9f88e\">".$fecha."</td>";
							echo "<td bgcolor=\"f9f88e\">".$hora."</td>";
							echo "<td bgcolor=\"f9f88e\">".$distancia."</td>";				
							echo "<td bgcolor=\"f9f88e\">".$tiempito."</td>";
							echo "<td bgcolor=\"f9f88e\">".$hraprox."</td>";
							echo "<td bgcolor=\"f9f88e\">".$hora_actual.":".$minuto_actual."</td>";
							echo "<td bgcolor=\"f9f88e\"> Debio haber llegado hace ".RestarHoras($hraprox,$horac)."</td>";
							echo "<td bgcolor=\"f9f88e\">".$nombre."</td>";
							$fecha=cambiarfecha_mysql($fecha);
							


						}				
						

					}
							

				
				}
				echo"</tr>";
			}
			echo "<a target= \"_blank\" style=\"position:absolute;left:725px;top:100px;width:120px;height:25px;z-index:23;text-align: center;color:#FFFFFF;\" href=\"Ver_Grafica.php?id1=$cont1&id2=$cont2\" class=\"btn-primary\">Ver Grafica</a>";
		echo"<audio src='mp3/carga_finalizada.wav' autoplay></audio>";
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
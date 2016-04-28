 <?php
session_start(); 
	error_reporting(0);  
	include("Librerias.php");

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

error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';

header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
date_default_timezone_set('America/Caracas');
$fecha_actual = localtime(time(),1);
$anyo_actual = $fecha_actual['tm_year'] + 1900;
$mes_actual = $fecha_actual['tm_mon'] + 1;
$dia_actual = $fecha_actual['tm_mday'];
$hora_actual = $fecha_actual['tm_hour'];
$minuto_actual = $fecha_actual['tm_min'];
header("content-disposition: attachment;filename=Reporte_CICENT_Tiempo_Recorrido_Fecha:".$dia_actual."/".$mes_actual."/".$anyo_actual."_Hora".$hora_actual.":".$minuto_actual.".xls");
?>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<table border="1">
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
error_reporting(0);  
date_default_timezone_set('America/Caracas');
$fecha_actual = localtime(time(),1);
$anyo_actual = $fecha_actual['tm_year'] + 1900;
$mes_actual = $fecha_actual['tm_mon'] + 1;
$dia_actual = $fecha_actual['tm_mday'];
$hora_actual = $fecha_actual['tm_hour'];
$minuto_actual = $fecha_actual['tm_min'];
if($hora_actual<10){$hora_actual="0".$hora_actual;}
if($minuto_actual<10){$minuto_actual="0".$minuto_actual;}

$data = new Spreadsheet_Excel_Reader("excel/".$_GET["id"]);
$nrows = $data->sheets[0]['numRows'];  
$nin="";

	for($i=11;$i<$nrows;$i++)
	{
		
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
				
					$consulta=mysql_query("SELECT tiempo_cli FROM cliente WHERE nombre_cli='$cliente'");			
					$numero_chutos = mysql_num_rows($consulta);
					
					$consulta="SELECT tiempo_cli,distancia_cli FROM cliente WHERE nombre_cli='$cliente'";
					$res=consultar($consulta);
					$fila=mysql_fetch_array($res);
					$tiempito =$fila[tiempo_cli];
					$distancia =$fila[distancia_cli];
					if($numero_chutos==1)
					{  
					echo " <tr>";					
						$consulta="SELECT tiempo_cli,distancia_cli FROM cliente WHERE nombre_cli='$cliente'";
						$res=consultar($consulta);
						$fila=mysql_fetch_array($res);
						$tiempito =$fila[tiempo_cli];
						$distancia =$fila[distancia_cli];
						
						$consulta="SELECT nombre,apellido FROM conductor WHERE id_conductor='$cedula'";
						$res=consultar($consulta);
						$fila=mysql_fetch_array($res);
						$nombre =$fila[nombre]." ".$fila[apellido];
						$nombre= $cedula." ".$nombre;
						
						$horafin=$hora;				
						$horaini= $tiempito;
						$hraprox = SumarHoras($horaini,$horafin);
						$horac=$hora_actual.":".$minuto_actual;
						
						
						if($horac<$hraprox)
						{
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
						}else
						{
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
						}				
						
						echo"</tr>";
					}
					
				}
			
				
		
	}



?>
</tbody>
</table>

</body>
</html>

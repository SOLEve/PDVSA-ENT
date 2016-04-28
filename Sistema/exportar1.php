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
function cambiarfecha_mysql($fecha)
{
    list($dia,$mes,$ano)=explode("/",$fecha);
    $fecha="$ano-$mes-$dia";
    return $fecha;
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
header("content-disposition: attachment;filename=Reporte_CICENT_Velocidad_Fecha:".$dia_actual."/".$mes_actual."/".$anyo_actual."_Hora".$hora_actual.":".$minuto_actual.".xls");

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
											<th>Fecha Alarma</th>
											<th>Hora Alarma</th>
											<th>Unidad</th>
											<th>Ubicacion</th>
											<th>Latitud</th>
											<th>Longitud</th>
											<th>Velocidad</th>
											<th>Conductor Culpable</th>
    							</tr>
  							</thead>
  							<tbody>
							
<?php
error_reporting(0);

				$fecha;		//2
				$hora;		//2
				$unidad;	//3
				$ubicacion;	//4
				$latitud;	//5
				$longitud;	//6	
				$velocidad;	//10
				$cont1=0;
				$cont2=0;

				$data = new Spreadsheet_Excel_Reader("excel/".$_GET["id"]);
				$nrows = $data->sheets[0]['numRows'];  
				$ncols = $data->sheets[0]['numCols'];
						
						$nin="";
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
								if ($j==$col_fecha){$fecha=$data->sheets[0]['cells'][$i][$j];$hora=substr($fecha, -5);$fecha=substr($fecha, 0, -6);}
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
								
								$consulta_condicion="SELECT condicion_chuto_id_condicion from chuto WHERE placal_chuto LIKE '%".$unidad."%' 
								OR chuto.serial_carroceria LIKE '%".$unidad."%'";
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
								
								if($condicion==1){$cedula =$fila[conductor_id_conductor];	}
								if($condicion==2)
								{
									while($fila1=mysql_fetch_array($res))
									{
										if($cont==0){$cedula =$fila1[conductor_id_conductor];}
										if($cont==1){$cedula1 =$fila1[conductor_id_conductor];}
										$cont=$cont+1;	
									}
									
									$fecha=cambiarfecha_mysql($fecha);
									$consulta="SELECT hora_salida FROM viajes WHERE fecha_viaje='$fecha' and hora_salida<'$hora' and id_conductor='$cedula'";
									$res=consultar($consulta);
									while($row1=mysql_fetch_array($res))
									{
										$hora1 =$row1[hora_salida];
									}
									
									$consulta1="SELECT hora_salida FROM viajes WHERE fecha_viaje='$fecha' and hora_salida<'$hora' and id_conductor='$cedula1'";
									$res1=consultar($consulta1);
									while($row2=mysql_fetch_array($res1))
									{
										$hora2 =$row2[hora_salida];
									}
									
									if($hora1>$hora2){$cedula =$cedula;}
									if($hora2>$hora1){$cedula =$cedula1;}
								}
								$cont=0;
							
								$consulta2=mysql_query("SELECT id_conductor FROM viajes WHERE tipo='1' and fecha_viaje='$fecha' and hora_salida<'$hora' and id_conductor='$cedula'");			
								$numero = mysql_num_rows($consulta2);
								
									
								if($numero>0)
								{
									$consulta1= "SELECT nombre,apellido,id_conductor FROM conductor WHERE id_conductor='$cedula' ";
									$res1=consultar($consulta1);
									$fila1=mysql_fetch_array($res1);
									$nombre =$fila1[0]." ".$fila1[1]." ".$fila1[2];
									echo "<td bgcolor=\"caefc7\">".$nombre."</td>";	
									
									
									$insertar="INSERT INTO viajes2 (fecha_viaje,hora_salida,tipo,velocidad,ubicacion,latitud,longitud,ch_cd_chuto_placal_chuto,id_conductor) VALUES('$fecha','$hora','2','$velocidad','$ubicacion','$latitud','$longitud','$unidad','$cedula')";
									actualizar_bd($insertar);
									if($cont%400==0){set_time_limit(0);}									
								}
								else
								{
									echo "<td bgcolor=\"caefc7\">Falta Informacion! Puede que el Conductor:<br>&#8226;No cargó combustible en esta planta<br>&#8226;Cargó combustible antes de la fecha $fecha1<br>&#8226;El chuto no tenga asignado chofer<br>&#8226;El chuto no este haciendo trabajos de transporte de combustible</td>";	
								}
							}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////						
							if($velocidad>99)
							{
								$cont2++;
								echo "<td  bgcolor=\"f9f88e\">".$fecha."</td>";
								echo "<td  bgcolor=\"f9f88e\">".$hora."</td>";
								echo "<td  bgcolor=\"f9f88e\">".$unidad."</td>";
								echo "<td  bgcolor=\"f9f88e\">".$ubicacion."</td>";
								echo "<td  bgcolor=\"f9f88e\">".$latitud."</td>";
								echo "<td  bgcolor=\"f9f88e\">".$longitud."</td>";			
								echo "<td  bgcolor=\"f9f88e\">".$velocidad."</td>";
								
								$consulta_condicion="SELECT condicion_chuto_id_condicion from chuto WHERE placal_chuto LIKE '%".$unidad."%' 
								OR chuto.serial_carroceria LIKE '%".$unidad."%'";
								$res=consultar($consulta_condicion);
								$fila=mysql_fetch_array($res);
								$condicion =$fila[condicion_chuto_id_condicion];
								
								$consulta_cedula="
								SELECT conductor_id_conductor  
								FROM ch_cd 
								WHERE 
								chuto_placal_chuto = (SELECT placal_chuto from chuto WHERE placal_chuto LIKE '%$unidad%' OR serial_carroceria LIKE '%$unidad%' )";
								$res=consultar($consulta_cedula);
								
								$consulta_chuto="
								SELECT chuto_placal_chuto  
								FROM ch_cd 
								WHERE 
								chuto_placal_chuto = (SELECT placal_chuto from chuto WHERE placal_chuto LIKE '%$unidad%' OR serial_carroceria LIKE '%$unidad%' )";
								$chu=consultar($consulta_chuto);
								$fchuto=mysql_fetch_array($chu);
								$unidad=$fchuto[chuto_placal_chuto];	
								
								if($condicion==1){$cedula =$fila[conductor_id_conductor];}
								if($condicion==2)
								{
									while($fila1=mysql_fetch_array($res))
									{
										if($cont==0){$cedula =$fila1[conductor_id_conductor];	}
										if($cont==1){$cedula1 =$fila1[conductor_id_conductor];}
										$cont=$cont+1;											
									}
									
									$fecha=cambiarfecha_mysql($fecha);
									$consulta="SELECT hora_salida FROM viajes WHERE fecha_viaje='$fecha' and hora_salida<'$hora' and id_conductor='$cedula'";
									$res=consultar($consulta);
									while($row1=mysql_fetch_array($res))
									{
										$hora1 =$row1[hora_salida];
									}
									
									$consulta1="SELECT hora_salida FROM viajes WHERE fecha_viaje='$fecha' and hora_salida<'$hora' and id_conductor='$cedula1'";
									$res1=consultar($consulta1);
									while($row2=mysql_fetch_array($res1))
									{
										$hora2 =$row2[hora_salida];
									}
									
									if($hora1>$hora2){$cedula =$cedula;}
									if($hora2>$hora1){$cedula =$cedula1;}
								}
								$cont=0;
							
								$consulta2=mysql_query("SELECT id_conductor FROM viajes WHERE tipo='1' and fecha_viaje='$fecha' and hora_salida<'$hora' and id_conductor='$cedula'");			
								$numero = mysql_num_rows($consulta2);
								
									
								if($numero>0)
								{
									$consulta1= "SELECT nombre,apellido,id_conductor FROM conductor WHERE id_conductor='$cedula' ";
									$res1=consultar($consulta1);
									$fila1=mysql_fetch_array($res1);
									$nombre =$fila1[0]." ".$fila1[1]." ".$fila1[2];
									echo "<td bgcolor=\"f9f88e\">".$nombre."</td>";	
									
									$insertar="INSERT INTO viajes2 (fecha_viaje,hora_salida,tipo,velocidad,ubicacion,latitud,longitud,ch_cd_chuto_placal_chuto,id_conductor) VALUES('$fecha','$hora','2','$velocidad','$ubicacion','$latitud','$longitud','$unidad','$cedula')";
									actualizar_bd($insertar);
									if($cont%400==0){set_time_limit(0);}									
								}
								else
								{
									echo "<td bgcolor=\"f9f88e\">Falta Informacion! Puede que el Conductor:<br>&#8226;No cargó combustible en esta planta<br>&#8226;Cargó combustible antes de la fecha $fecha1<br>&#8226;El chuto no tenga asignado chofer<br>&#8226;El chuto no este haciendo trabajos de transporte de combustible</td>";	
								}
							}
							echo"</tr>";
						}

					
?>
</tbody>
</table>

</body>
</html>

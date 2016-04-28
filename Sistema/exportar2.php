 <?php
session_start(); 
	include("Librerias.php");

function cambiarfecha_mysql($fecha)
{    list($dia,$mes,$ano)=explode("/",$fecha);
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
header("content-disposition: attachment;filename=Reporte_CICENT_Cantidad_Viajes_Fecha:".$dia_actual."/".$mes_actual."/".$anyo_actual."_Hora".$hora_actual.":".$minuto_actual.".xls");
?>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<table border="1">
  							<caption>
  							<h4>Lista de Viajes por Conductores</h4>
  							</caption>
  							<thead>
    							<tr>
      								<th>C.I Conductor</th>
      								<th>Nombre Conductor</th>
									<th>Cantidad Viajes</th>
									<th>Fecha</th>
    							</tr>
  							</thead>
  							<tbody>
							
<?php
$fecha= $_GET["fecha"];



			$consulta="SELECT id_conductor, COUNT(*) as cant FROM viajes WHERE tipo='1' and fecha_viaje = '$fecha' GROUP BY id_conductor";
			$res=consultar($consulta);
				
			$consulta1=mysql_query("SELECT id_conductor, COUNT(*) as cant1 FROM viajes WHERE tipo='1' and fecha_viaje = '$fecha'  GROUP BY id_conductor");			
			$numero = mysql_num_rows($consulta1);

			
			for($i=0;$i<$numero;$i++)
			{
			    echo " <tr>";
				for($j=0;$j<1;$j++)
				{
					$fila=mysql_fetch_array($res);
					$cedula =$fila[id_conductor];
					$cant=$fila[cant];
					
					$consulta1="SELECT nombre,apellido FROM conductor WHERE id_conductor='$cedula'";
					$res1=consultar($consulta1);
					$fila1=mysql_fetch_array($res1);
					$nombre =$fila1[nombre]." ".$fila1[apellido];
						
					echo"<td>".$cedula."</td>";
					echo"<td>".$nombre."</td>";
					echo"<td>".$cant."</td>";
					echo"<td>".$fecha."</td>";
				}
				echo"</tr>";
			}					
		
		
?>
</tbody>
</table>

</body>
</html>

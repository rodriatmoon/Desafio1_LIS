<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/estilos.css">
	<title>Préstamo</title>
</head>
<body>
	<header>
		<h1>Calculadora de Tabla de Amortización</h1>
	</header>
	<tbody>
		<div>
			<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
				<div class="box01">
						<h4>Sistema de amortización</h4>
						<select name="SA">
							<option value="1">Interés simple</option>
							<option value="2">Interés compuesto</option>
						</select>
						<h4>Fecha de desembolso (D/M/A): </h4>
						<input type="date" name="Fecha">
						<h4>Importe del préstamo: </h4>
						<input type="number" name="IP"/>
						<h4>Periodo: </h4>
						<select name="P">
							<option value="1">Diario</option>
							<option value="2">Semanal</option>
							<option value="3">Quincenal</option>
							<option value="4">Mensual</option>
							<option value="5">Anual</option>
						</select>
						<h4>Interés diario: </h4>
						<input type="number" name="ID"> % </input>
						<h4>Plazo: </h4>
						<input type="number" name="Plazo"/>
						<h2></h2>
						<input type="submit" value="Calcular"/>
				</div>
			</form>
			<?php
				if($_POST){

					$SAmortizacion=$_POST['SA'];
					$FechaD=$_POST['Fecha'];
					$Importe=$_POST['IP'];
					$Periodo = $_POST['P'];
					$Interes = $_POST['ID'];
					$Plazo = $_POST['Plazo'];

					if($SAmortizacion == 1) {
						//I= C x i x t
										
						$I = $Importe * ($Interes/100) * $Plazo + $Importe;
						$Cuota = $I / $Plazo;						
						$IPeriodico = ($I - $Importe) / $Plazo;
						$Capital = ($Importe / $Plazo);
						$FechaI = $FechaD;
						$Saldo = $Importe;
						
										
						echo "<table align=\"center\" border=\"1\">";
						echo "<tr>";							
						echo "<th>Fecha</th>";
						echo "<th>Cuota</th>";
						echo "<th>Capital</th>";
						echo "<th>Interés</th>";
						echo "<th>Saldo</th>";
						echo "</tr>";

						$contador = $Plazo;

						while($contador > 0)
						{
							switch ($Periodo){
								case 1:
									$FechaI = date("d-m-Y",strtotime($FechaI."+ 1 days"));
								break;
								case 2:
									$FechaI =date("d-m-Y",strtotime($FechaI."+ 1 week"));
								break;
								case 3:
									$FechaI =date("d-m-Y",strtotime($FechaI."+ 15 days "));
								break;
								case 4:
									$FechaI =date("d-m-Y",strtotime($FechaI."+ 1 month"));
								break;
								case 4:
									$FechaI =date("d-m-Y",strtotime($FechaI."+ 1 year"));
								break;								
								
							}
							
							$Saldo = $Saldo - $Capital;


							echo "<tr>";
							echo "<td> $FechaI </td>";
							echo "<td> $Cuota </td>";
							echo "<td> $Capital </td>";
							echo "<td> $IPeriodico </td>";
							echo "<td> $Saldo </td>";
							echo "</tr>";

							$contador = $contador-1;
						}
						
						echo "</table>";
					} else {
						
						$Ia = 0;
						$Capital = ($Importe / $Plazo);
						$FechaI = $FechaD;
						$Saldo = $Importe;
						$Inter = 0;
						
						echo "<table align=\"center\" border=\"1\">";
						echo "<tr>";							
						echo "<th>Fecha</th>";
						echo "<th>Cuota</th>";
						echo "<th>Capital</th>";
						echo "<th>Interés</th>";
						echo "<th>Saldo</th>";
						echo "</tr>";
						
						for($n=1; $n<=$Plazo; $n++){

							$A = (1+($Interes/100));
							$B = pow($A, $n);

							$Inter = $Importe * $B - $Importe - $Ia;
							$Ia += $Inter;
							$Cuota = $Capital + $Ia;

							switch ($Periodo){
								case 1:
									$FechaI = date("d-m-Y",strtotime($FechaI."+ 1 days"));
								break;
								case 2:
									$FechaI =date("d-m-Y",strtotime($FechaI."+ 1 week"));
								break;
								case 3:
									$FechaI =date("d-m-Y",strtotime($FechaI."+ 15 days "));
								break;
								case 4:
									$FechaI =date("d-m-Y",strtotime($FechaI."+ 1 month"));
								break;
								case 4:
									$FechaI =date("d-m-Y",strtotime($FechaI."+ 1 year"));
								break;								
								
							}
							
							$Saldo = $Saldo - $Capital;


							echo "<tr>";
							echo "<td> $FechaI </td>";
							echo "<td> " . round($Cuota, 2) . " </td>";
							echo "<td> $Capital </td>";
							echo "<td> " . round($Inter, 2) . "</td>";
							echo "<td> $Saldo </td>";
							echo "</tr>";

						}						
					}
				}												
					
			?>
		</div>
	</tbody>
</body>
</html>